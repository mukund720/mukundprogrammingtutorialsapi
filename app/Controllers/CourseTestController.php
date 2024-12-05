<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class CourseTestController extends ResourceController
{
    protected $modelName = 'App\Models\CourseTestModel'; // Replace ModelName with your specific model class
    protected $format = 'json';

   

    // Add a new record
    public function create()
    {
        $data = $this->request->getPost();

        if ($this->model->save($data)) {
            return $this->respondCreated(['message' => 'Record created successfully.']);
        } else {
            return $this->failValidationErrors($this->model->errors());
        }
    }

    // Show all records
    public function index()
    {
        $records = $this->model->findAll();
        return $this->respond($records);
    }

    // Show a single record by ID
    public function show($id = null)
    {
        $record = $this->model->find($id);
        
        if ($record) {
            return $this->respond($record);
        } else {
            return $this->failNotFound('Record not found.');
        }
    }

    // Show records by a specific field (e.g., `courseId`)
    public function showByField($courseId = null, $value = null)
    {
        if ($courseId === null || $value === null) {
            return $this->fail('Field and value are required.');
        }

        $records = $this->model->where($courseId, $value)->findAll();

        if (!empty($records)) {
            return $this->respond($records);
        } else {
            return $this->failNotFound('Records not found for the given criteria.');
        }
    }

    // Update a record by ID
    public function update($id = null)
    {
        if ($id === null) {
            return $this->fail('Record ID is required.');
        }

        $data = $this->request->getRawInput();
        $data['id'] = $id;

        if ($this->model->save($data)) {
            return $this->respondUpdated(['message' => 'Record updated successfully.']);
        } else {
            return $this->failValidationErrors($this->model->errors());
        }
    }

    // Delete a record by ID
    public function delete($id = null)
    {
        if ($id === null) {
            return $this->fail('Record ID is required.');
        }

        if ($this->model->delete($id)) {
            return $this->respondDeleted(['message' => 'Record deleted successfully.']);
        } else {
            return $this->failNotFound('Record not found.');
        }
    }
}
