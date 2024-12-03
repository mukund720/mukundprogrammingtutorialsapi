<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class InqueryController extends ResourceController
{
    protected $modelName = 'App\Models\InqueryModel'; // Your Model
    protected $format    = 'json'; // Ensure JSON format for the response

    // Index method (GET /api/items)
    public function index()
    {
        try {
            // Fetch all data from the model
            $data = $this->model->findAll();

            if ($data) {
                return $this->respond($data);
            } else {
                return $this->failNotFound('No data found');
            }
        } catch (\Exception $e) {
            return $this->failServerError('An error occurred: ' . $e->getMessage());
        }
    }


    // Show method (GET /api/items/{id})
    public function show($id = null)
    {
        // Assuming `$id` is the email
        $item = $this->model->where('email', $id)->first();
    
        if ($item) {
            return $this->respond($item);
        } else {
            return $this->failNotFound('data not found');
        }
    }

    public function create()
    {
        header('Content-type: application/json');
        $input = json_decode(file_get_contents('php://input'), true);

        // Insert the new data into the model
        if ($this->model->insert($input)) {
            return $this->respondCreated($input);
        } else {
            return $this->failValidationErrors('Invalid data');
        }
    }


    // Delete method (DELETE /api/items/{id})
    public function delete($id = null)
    {
        if ($this->model->delete($id)) {
            return $this->respondDeleted('Item deleted');
        } else {
            return $this->failNotFound('Item not found');
        }
    }
}
