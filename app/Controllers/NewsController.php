<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\NewsModel; // Adjusted model

class NewsController extends BaseController // Adjusted class name
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
        $newsModel = new NewsModel(); // Adjusted model
        $data['news'] = $newsModel->findAll();
        return view('news/index', $data); // Adjusted view name
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
            'title' => 'required',
            'content' => 'required',
            'picture' => 'uploaded[picture]|max_size[picture,2048]|is_image[picture]|mime_in[picture,image/jpg,image/jpeg,image/png]'
        ]);
        // dd($validation);
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Retrieve input data
        $title = $this->request->getPost('title');
        $picture = $this->request->getFile('picture');
        $content = $this->request->getPost('content');
        $createdBy = session()->get('user_id'); // Retrieve user_id from session

        // Move uploaded file to public directory and get its name
        $newPictureName = $picture->getRandomName();
        $picture->move(ROOTPATH . 'public/uploads/news', $newPictureName);

        // Save data into the database using the model
        $newsModel = new NewsModel(); // Adjusted model
        $newsModel->insert([
            'title' => $title,
            'picture' => $newPictureName, // Save only the name of the picture
            'content' => $content, // Save the content
            'created_by' => $createdBy // Set created_by with user_id from session
        ]);

        // Set success alert message
        $this->setFlashAlert('success', 'Success', 'News has been added successfully.');

        return redirect()->back();
    }

    public function update($id)
    {
        // Check logged_in session
        if (!session()->get('logged_in')) {
            return view('errors/html/error_401');
        }

        // Retrieve input data
        $title = $this->request->getPost('title');
        $picture = $this->request->getFile('picture');
        $content = $this->request->getPost('content');
        $updatedBy = session()->get('user_id'); // Retrieve user_id from session

        // Initialize variable to hold the new picture name
        $newPictureName = '';

        // Check if a new picture is uploaded
        if ($picture->isValid() && !$picture->hasMoved()) {
            // Move uploaded file to public directory and get its name
            $newPictureName = $picture->getRandomName();
            $picture->move(ROOTPATH . 'public/uploads/news', $newPictureName);

            // Validate input data including the picture when a new picture is uploaded
            $validation = \Config\Services::validation();
            $validation->setRules([
                'title' => 'required',
                'content' => 'required',
                'picture' => 'uploaded[picture]|max_size[picture,2048]|is_image[picture]|mime_in[picture,image/jpg,image/jpeg,image/png]'
            ]);

            if (!$validation->withRequest($this->request)->run()) {
                return redirect()->back()->withInput()->with('errors', $validation->getErrors());
            }
        } else {
            // If no new picture is uploaded, keep the existing picture name
            $newsModel = new NewsModel(); // Adjusted model
            $news = $newsModel->find($id);
            $newPictureName = $news['picture'];

            // Validate input data except for the picture when no new picture is uploaded
            $validation = \Config\Services::validation();
            $validation->setRules([
                'title' => 'required',
                'content' => 'required'
            ]);

            if (!$validation->withRequest($this->request)->run()) {
                return redirect()->back()->withInput()->with('errors', $validation->getErrors());
            }
        }

        // Update data in the database using the model
        $newsModel = new NewsModel(); // Adjusted model
        $newsModel->update($id, [
            'title' => $title,
            'picture' => $newPictureName, // Save only the name of the picture
            'content' => $content, // Save the content
            'updated_by' => $updatedBy // Set updated_by with user_id from session
        ]);

        // Set success alert message
        $this->setFlashAlert('success', 'Success', 'News has been updated successfully.');

        return redirect()->back();
    }


    public function delete($id)
    {
        // Check logged_in session
        if (!session()->get('logged_in')) {
            return view('errors/html/error_401');
        }

        // Check if the news with the given ID exists in the database
        $newsModel = new NewsModel(); // Adjusted model
        $news = $newsModel->find($id);

        // If news not found, show error message or redirect to appropriate page
        if (!$news) {
            return redirect()->back()->with('error', 'News not found.');
        }

        // Delete news's picture from the public directory
        if (file_exists(ROOTPATH . 'public/uploads/news/' . $news['picture'])) {
            unlink(ROOTPATH . 'public/uploads/news/' . $news['picture']);
        }

        // Delete news from the database
        $newsModel->delete($id);

        // Set success alert message
        $this->setFlashAlert('success', 'Success', 'News has been deleted successfully.');

        return redirect()->back();
    }
}
