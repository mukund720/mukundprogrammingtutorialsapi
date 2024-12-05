<?php

namespace App\Models;

use CodeIgniter\Model;

class CourseTestModel extends Model
{
    protected $table = 'Tests';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'title', 'description', 'externalLink', 'courseId', 
        'dateAdded', 'dateUpdated'
    ];
    protected $useTimestamps = true;
    protected $createdField = 'dateAdded';
    protected $updatedField = 'dateUpdated';
}
