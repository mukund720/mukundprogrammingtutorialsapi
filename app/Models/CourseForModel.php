<?php

namespace App\Models;

use CodeIgniter\Model;

class CourseForModel extends Model
{
    protected $table = 'CourseFor';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'title', 'description', 'courseId', 
        'dateAdded', 'dateUpdated'
    ];
    protected $useTimestamps = true;
    protected $createdField = 'dateAdded';
    protected $updatedField = 'dateUpdated';
}
