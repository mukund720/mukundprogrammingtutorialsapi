<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class ApiController extends ResourceController
{
    protected $modelName = 'App\Models\UserModel'; // Your Model
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
                return $this->failNotFound('No users found');
            }
        } catch (\Exception $e) {
            return $this->failServerError('An error occurred: ' . $e->getMessage());
        }
    }
    

    // Show method (GET /api/items/{id})
    public function show($id = null)
    {
        $data = $this->model->find($id);
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('Item not found');
        }
    }

    // Create method (POST /api/items)
    public function create()
    {
        // Get the input data
        $input = $this->request->getPost();
        
        // Ensure the password is hashed before storing it
        if (isset($input['password'])) {
            $input['password'] = password_hash($input['password'], PASSWORD_BCRYPT);
        } else {
            return $this->failValidationError('Password is required');
        }

        // Insert the new data into the model
        if ($this->model->insert($input)) {
            return $this->respondCreated($input);
        } else {
            return $this->failValidationErrors('Invalid data');
        }
    }

    // Update method (PUT /api/items/{id})
    public function update($id = null)
    {
        $input = $this->request->getRawInput();
        
        // If password is being updated, hash it
        if (isset($input['password'])) {
            $input['password'] = password_hash($input['password'], PASSWORD_BCRYPT);
        }

        if ($this->model->update($id, $input)) {
            return $this->respondUpdated($input);
        } else {
            return $this->failNotFound('Item not found');
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

    // Login method (POST /api/login)
    public function login()
    {
        // Get the input data (email and password)
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        
        // Validate input
        if (empty($email) || empty($password)) {
            return $this->failValidationError('Email and password are required');
        }
        
        // Find the user by email
        $user = $this->model->findByEmail($email);
    
        if ($user) {
            // Verify the password (Assume passwords are hashed in the database)
            if (password_verify($password, $user['password'])) {
                // Return user data or a success response
                return $this->respond([
                    'message' => 'Login successful',
                    'user' => $user
                ]);
            } else {
                return $this->failUnauthorized('Invalid email or password');
            }
        } else {
            return $this->failNotFound('User not found');
        }
    }
}
