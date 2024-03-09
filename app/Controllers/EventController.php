<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EventModel;
use CodeIgniter\HTTP\ResponseInterface;

class EventController extends BaseController
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
        $eventModel = new EventModel(); // Adjusted model
        $data['events'] = $eventModel->findAll();
        return view('event/index', $data); // Adjusted view name
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
            'description' => 'required',
            'description' => 'required',
            'link' => 'required',
            'thumbnail' => 'uploaded[thumbnail]|max_size[thumbnail,2048]|is_image[thumbnail]|mime_in[thumbnail,image/jpg,image/jpeg,image/png]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Retrieve input data
        $title = $this->request->getPost('title');
        $description = $this->request->getPost('description');
        $date = $this->request->getPost('date');
        $link = $this->request->getPost('link');
        $thumbnail = $this->request->getFile('thumbnail');
        $createdBy = session()->get('user_id'); // Retrieve user_id from session

        // Move uploaded file to public directory and get its name
        $newThumbnailName = $thumbnail->getRandomName();
        $thumbnail->move(ROOTPATH . 'public/uploads/events', $newThumbnailName);

        // Save data into the database using the model
        $eventModel = new EventModel(); // Adjusted model
        $eventModel->insert([
            'title' => $title,
            'description' => $description,
            'date' => $date,
            'link' => $link,
            'thumbnail' => $newThumbnailName, // Save only the name of the thumbnail
            'created_by' => $createdBy // Set created_by with user_id from session
        ]);

        // Set success alert message
        $this->setFlashAlert('success', 'Success', 'Event has been added successfully.');

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
        $description = $this->request->getPost('description');
        $date = $this->request->getPost('date');
        $link = $this->request->getPost('link');
        $thumbnail = $this->request->getFile('thumbnail');
        $updatedBy = session()->get('user_id'); // Retrieve user_id from session

        // Initialize variable to hold the new thumbnail name
        $newThumbnailName = '';

        // Check if a new thumbnail is uploaded
        if ($thumbnail->isValid() && !$thumbnail->hasMoved()) {
            // Move uploaded file to public directory and get its name
            $newThumbnailName = $thumbnail->getRandomName();
            $thumbnail->move(ROOTPATH . 'public/uploads/events', $newThumbnailName);

            // Validate input data including the thumbnail when a new thumbnail is uploaded
            $validation = \Config\Services::validation();
            $validation->setRules([
                'title' => 'required',
                'description' => 'required',
                'date' => 'required',
                'link' => 'required',
                // 'thumbnail' => 'uploaded[thumbnail]|max_size[thumbnail,2048]|is_image[thumbnail]|mime_in[thumbnail,image/jpg,image/jpeg,image/png]'
            ]);

            if (!$validation->withRequest($this->request)->run()) {
                return redirect()->back()->withInput()->with('errors', $validation->getErrors());
            }
        } else {
            // If no new thumbnail is uploaded, keep the existing thumbnail name
            $eventModel = new EventModel(); // Adjusted model
            $event = $eventModel->find($id);
            $newThumbnailName = $event['thumbnail'];

            // Validate input data except for the thumbnail when no new thumbnail is uploaded
            $validation = \Config\Services::validation();
            $validation->setRules([
                'title' => 'required',
                'description' => 'required',
                'date' => 'required',
                'link' => 'required'
            ]);

            if (!$validation->withRequest($this->request)->run()) {
                return redirect()->back()->withInput()->with('errors', $validation->getErrors());
            }
        }

        // Update data in the database using the model
        $eventModel = new EventModel(); // Adjusted model
        $eventModel->update($id, [
            'title' => $title,
            'description' => $description,
            'date' => $date,
            'link' => $link,
            'thumbnail' => $newThumbnailName, // Save only the name of the thumbnail
            'updated_by' => $updatedBy // Set updated_by with user_id from session
        ]);

        // Set success alert message
        $this->setFlashAlert('success', 'Success', 'Event has been updated successfully.');

        return redirect()->back();
    }

    public function delete($id)
    {
        // Check logged_in session
        if (!session()->get('logged_in')) {
            return view('errors/html/error_401');
        }

        // Check if the event with the given ID exists in the database
        $eventModel = new EventModel(); // Adjusted model
        $event = $eventModel->find($id);

        // If event not found, show error message or redirect to appropriate page
        if (!$event) {
            return redirect()->back()->with('error', 'Event not found.');
        }

        // Delete event's thumbnail from the public directory
        if (file_exists(ROOTPATH . 'public/uploads/events/' . $event['thumbnail'])) {
            unlink(ROOTPATH . 'public/uploads/events/' . $event['thumbnail']);
        }

        // Delete event from the database
        $eventModel->delete($id);

        // Set success alert message
        $this->setFlashAlert('success', 'Success', 'Event has been deleted successfully.');

        return redirect()->back();
    }
}
