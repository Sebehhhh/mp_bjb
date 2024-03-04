<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductCatModel; // Adjusted model namespace

class CatProductController extends BaseController // Adjusted class name
{
    private function setFlashAlert($type, $title, $message)
    {
        // Set Sweet Alert using session flashdata
        session()->setFlashdata('alert', [
            'type' => $type,
            'title' => $title,
            'message' => $message
        ]);
    }

    public function index()
    {
        // Check logged_in session
        if (!session()->get('logged_in')) {
            return view('errors/html/error_401');
        }

        // If logged_in session is true, retrieve data from model and pass to view
        $productCatModel = new ProductCatModel(); // Adjusted model
        $data['categories'] = $productCatModel->findAll();
        return view('catproduct/index', $data); // Adjusted view name
    }

    public function store()
    {
        // Check logged_in session
        if (!session()->get('logged_in')) {
            return view('errors/html/error_401');
        }

        // Validate input data
        $validation = \Config\Services::validation();
        $validation->setRules([
            'name' => 'required'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Retrieve input data
        $name = $this->request->getPost('name');
        $createdBy = session()->get('user_id'); // Retrieve user_id from session

        // Save data into the database using the model
        $productCatModel = new ProductCatModel(); // Adjusted model
        $productCatModel->insert([
            'name' => $name,
            'created_by' => $createdBy // Set created_by with user_id from session
        ]);

        // Set success alert message
        $this->setFlashAlert('success', 'Success', 'Category has been added successfully.');

        return redirect()->back();
    }

    public function update($id)
    {
        // Check logged_in session
        if (!session()->get('logged_in')) {
            return view('errors/html/error_401');
        }

        // Validate input data
        $validation = \Config\Services::validation();
        $validation->setRules([
            'name' => 'required'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Retrieve input data
        $name = $this->request->getPost('name');
        $updatedBy = session()->get('user_id'); // Retrieve user_id from session

        // Update data in the database using the model
        $productCatModel = new ProductCatModel(); // Adjusted model
        $productCatModel->update($id, [
            'name' => $name,
            'updated_by' => $updatedBy // Set updated_by with user_id from session
        ]);

        // Set success alert message
        $this->setFlashAlert('success', 'Success', 'Category has been updated successfully.');

        return redirect()->back();
    }

    public function delete($id)
    {
        // Check logged_in session
        if (!session()->get('logged_in')) {
            return view('errors/html/error_401');
        }

        // Check if the category with the given ID exists in the database
        $productCatModel = new ProductCatModel(); // Adjusted model
        $category = $productCatModel->find($id);

        // If category not found, show error message or redirect to appropriate page
        if (!$category) {
            return redirect()->back()->with('error', 'Category not found.');
        }

        // Delete category from the database
        $productCatModel->delete($id);

        // Set success alert message
        $this->setFlashAlert('success', 'Success', 'Category has been deleted successfully.');

        return redirect()->back();
    }
}
