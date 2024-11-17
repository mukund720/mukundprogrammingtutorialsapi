<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'users'; // Ensure this matches your table name
    protected $primaryKey = 'id'; // Set the correct primary key

    // Allowed fields for insert and update
    protected $allowedFields = ['name', 'email', 'password', 'insertDate', 'updateDate']; 

    // Enable timestamps (this will auto-update the `insertDate` and `updateDate` fields)
    protected $useTimestamps = false; // Automatically manage `insertDate` and `updateDate` timestamps

    // Specify the date format if necessary
    protected $dateFormat = 'datetime';

    // Optional: Define validation rules
    protected $validationRules = [
        'name'     => 'required|min_length[3]',
        'email'    => 'required|valid_email',
        'password' => 'required|min_length[6]'
    ];

    // Optional: Define custom validation messages
    protected $validationMessages = [
        'name' => [
            'required' => 'Name is required.',
            'min_length' => 'Name must be at least 3 characters long.'
        ],
        'email' => [
            'required' => 'Email is required.',
            'valid_email' => 'Please enter a valid email address.'
        ],
        'password' => [
            'required' => 'Password is required.',
            'min_length' => 'Password must be at least 6 characters long.'
        ]
    ];
    public function findByEmail($email)
    {
        return $this->where('email', $email)->first();
    }
}
