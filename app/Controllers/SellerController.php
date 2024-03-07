<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SellerModel;

class SellerController extends BaseController // Adjusted class name
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
        $sellerModel = new SellerModel(); // Adjusted model
        $data['sellers'] = $sellerModel->findAll();
        return view('seller/index', $data); // Adjusted view name
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
            'name' => 'required',
            'code' => 'required',
            'serial' => 'required',
            'description' => 'required',
            'picture' => 'uploaded[picture]|max_size[picture,2048]|is_image[picture]|mime_in[picture,image/jpg,image/jpeg,image/png]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Retrieve input data
        $name = $this->request->getPost('name');
        $code = $this->request->getPost('code');
        $serial = $this->request->getPost('serial');
        $picture = $this->request->getFile('picture');
        $description = $this->request->getPost('description');
        $createdBy = session()->get('user_id'); // Retrieve user_id from session

        // Move uploaded file to public directory and get its name
        $newPictureName = $picture->getRandomName();
        $picture->move(ROOTPATH . 'public/uploads/sellers', $newPictureName);

        // Save data into the database using the model
        $sellerModel = new SellerModel(); // Adjusted model
        $sellerModel->insert([
            'name' => $name,
            'kode' => $code,
            'serial' => $serial,
            'picture' => $newPictureName, // Save only the name of the picture
            'description' => $description, // Save the description
            'created_by' => $createdBy // Set created_by with user_id from session
        ]);

        // Set success alert message
        $this->setFlashAlert('success', 'Success', 'Seller has been added successfully.');

        return redirect()->back();
    }


    public function update($id)
    {
        // Check logged_in session
        if (!session()->get('logged_in')) {
            return view('errors/html/error_401');
        }

        // Retrieve input data
        $name = $this->request->getPost('name');
        $code = $this->request->getPost('code');
        $serial = $this->request->getPost('serial');
        $picture = $this->request->getFile('picture');
        $description = $this->request->getPost('description');
        $updatedBy = session()->get('user_id'); // Retrieve user_id from session

        // Initialize variable to hold the new picture name
        $newPictureName = '';

        // Check if a new picture is uploaded
        if ($picture->isValid() && !$picture->hasMoved()) {
            // Move uploaded file to public directory and get its name
            $newPictureName = $picture->getRandomName();
            $picture->move(ROOTPATH . 'public/uploads/sellers', $newPictureName);

            // Validate input data including the picture when a new picture is uploaded
            $validation = \Config\Services::validation();
            $validation->setRules([
                'name' => 'required',
                'code' => 'required',
                'serial' => 'required',
                'description' => 'required',
                'picture' => 'uploaded[picture]|max_size[picture,2048]|is_image[picture]|mime_in[picture,image/jpg,image/jpeg,image/png]'
            ]);

            if (!$validation->withRequest($this->request)->run()) {
                return redirect()->back()->withInput()->with('errors', $validation->getErrors());
            }
        } else {
            // If no new picture is uploaded, keep the existing picture name
            $sellerModel = new SellerModel(); // Adjusted model
            $seller = $sellerModel->find($id);
            $newPictureName = $seller['picture'];

            // Validate input data except for the picture when no new picture is uploaded
            $validation = \Config\Services::validation();
            $validation->setRules([
                'name' => 'required',
                'code' => 'required',
                'serial' => 'required',
                'description' => 'required'
            ]);

            if (!$validation->withRequest($this->request)->run()) {
                return redirect()->back()->withInput()->with('errors', $validation->getErrors());
            }
        }

        // Update data in the database using the model
        $sellerModel = new SellerModel(); // Adjusted model
        $sellerModel->update($id, [
            'name' => $name,
            'kode' => $code,
            'serial' => $serial,
            'picture' => $newPictureName, // Save only the name of the picture
            'description' => $description, // Save the description
            'updated_by' => $updatedBy // Set updated_by with user_id from session
        ]);

        // Set success alert message
        $this->setFlashAlert('success', 'Success', 'Seller has been updated successfully.');

        return redirect()->back();
    }

    public function serialUpdate()
    {
        // Check logged_in session
        if (!session()->get('logged_in')) {
            return view('errors/html/error_401');
        }

        // Load the model
        $sellerModel = new SellerModel(); // Adjusted model

        // Retrieve all sellers
        $sellers = $sellerModel->findAll();

        // Array to hold used serial numbers
        $usedSerials = [];

        // Loop through each seller to generate and update serial
        foreach ($sellers as $seller) {
            do {
                // Generate random serial number between 1 and 100
                $newSerial = rand(1, 100);
            } while (in_array($newSerial, $usedSerials)); // Ensure the generated serial is unique

            // Update the seller's serial
            $sellerModel->update($seller['id'], ['serial' => $newSerial]);

            // Add the new serial to the used serials array
            $usedSerials[] = $newSerial;
        }

        // Set success alert message
        $this->setFlashAlert('success', 'Success', 'Serials have been updated successfully.');

        return redirect()->back();
    }


    public function delete($id)
    {
        // Check logged_in session
        if (!session()->get('logged_in')) {
            return view('errors/html/error_401');
        }

        // Check if the seller with the given ID exists in the database
        $sellerModel = new SellerModel(); // Adjusted model
        $seller = $sellerModel->find($id);

        // If seller not found, show error message or redirect to appropriate page
        if (!$seller) {
            return redirect()->back()->with('error', 'Seller not found.');
        }

        // Delete seller's picture from the public directory
        if (file_exists(ROOTPATH . 'public/uploads/sellers/' . $seller['picture'])) {
            unlink(ROOTPATH . 'public/uploads/sellers/' . $seller['picture']);
        }

        // Delete seller from the database
        $sellerModel->delete($id);

        // Set success alert message
        $this->setFlashAlert('success', 'Success', 'Seller has been deleted successfully.');

        return redirect()->back();
    }
}
