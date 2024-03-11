<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\VideoModel;

class VideoController extends BaseController
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
        $videoModel = new VideoModel();
        $data['videos'] = $videoModel->findAll();
        return view('videos/index', $data);
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
            'link' => 'required',
            'showed' => 'required'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Retrieve input data
        $title = $this->request->getPost('title');
        $link = $this->request->getPost('link');
        $showed = $this->request->getPost('showed');
        $createdBy = session()->get('user_id'); // Retrieve user_id from session

        // Save data into the database using the model
        $videoModel = new VideoModel();
        $videoModel->insert([
            'title' => $title,
            'link' => $link,
            'showed' => $showed,
            'created_by' => $createdBy
        ]);

        // Set success alert message
        $this->setFlashAlert('success', 'Success', 'Video has been added successfully.');

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
            'title' => 'required',
            'link' => 'required',
            'showed' => 'required'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Retrieve input data
        $title = $this->request->getPost('title');
        $link = $this->request->getPost('link');
        $showed = $this->request->getPost('showed');
        $updatedBy = session()->get('user_id'); // Retrieve user_id from session

        // Update data in the database using the model
        $videoModel = new VideoModel();
        $videoModel->update($id, [
            'title' => $title,
            'link' => $link,
            'showed' => $showed,
            'updated_by' => $updatedBy
        ]);

        // Set success alert message
        $this->setFlashAlert('success', 'Success', 'Video has been updated successfully.');

        return redirect()->back();
    }

    public function delete($id)
    {
        // Check logged_in session
        if (!session()->get('logged_in')) {
            return view('errors/html/error_401');
        }

        // Check if the video with the given ID exists in the database
        $videoModel = new VideoModel();
        $video = $videoModel->find($id);

        // If video not found, show error message or redirect to appropriate page
        if (!$video) {
            return redirect()->back()->with('error', 'Video not found.');
        }

        // Delete video from the database
        $videoModel->delete($id);

        // Set success alert message
        $this->setFlashAlert('success', 'Success', 'Video has been deleted successfully.');

        return redirect()->back();
    }
}
