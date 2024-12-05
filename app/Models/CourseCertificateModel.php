<?php

namespace App\Models;

use CodeIgniter\Model;

class CourseCertificateModel extends Model
{
    protected $table = 'CourseCertificates';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'title', 'description', 'image', 'courseId', 
        'dateAdded', 'dateUpdated'
    ];
    protected $useTimestamps = true;
    protected $createdField = 'dateAdded';
    protected $updatedField = 'dateUpdated';
}
