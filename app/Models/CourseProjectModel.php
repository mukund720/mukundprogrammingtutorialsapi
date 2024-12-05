<?php

namespace App\Models;

use CodeIgniter\Model;

class CourseProjectModel extends Model
{
    protected $table = 'CourseProjects';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'title', 'description', 'image', 'link', 'courseId', 
        'dateAdded', 'dateUpdated'
    ];
    protected $useTimestamps = true;
    protected $createdField = 'dateAdded';
    protected $updatedField = 'dateUpdated';
}
