<?php

namespace App\Models;

use CodeIgniter\Model;

class InqueryModel extends Model
{
    protected $table      = 'inquery'; // Ensure this matches your table name
    protected $primaryKey = 'id'; // Set the correct primary key

    // Allowed fields for insert and update
    protected $allowedFields = ['name', 'email', 'courseId','mobile','message', 'insertDate', 'updateDate']; 

    // Enable timestamps (this will auto-update the `insertDate` and `updateDate` fields)
    protected $useTimestamps = false; // Automatically manage `insertDate` and `updateDate` timestamps

    // Specify the date format if necessary
    protected $dateFormat = 'datetime';

    // Optional: Define validation rules
    protected $validationRules = [
        'name'     => 'required|min_length[3]',
        'email'    => 'required|valid_email',
        'mobile' => 'required|min_length[10]|max_length[10]',
        'courseId'    => 'required',
        'message'    => 'required',


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
        'mobile' => [
            'required' => 'Mobile is required.',
            'min_length' => 'Mobile must be 10 characters long.'
        ],
        'courseId' => [
            'required' => 'Course is required.',
        ],
        'message' => [
            'required' => 'Message is required.',
        ]
    ];
    public function findByEmail($email)
    {
        return $this->where('email', $email)->first();
    }
}
