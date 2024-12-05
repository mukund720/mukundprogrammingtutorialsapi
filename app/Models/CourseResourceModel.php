<?php

namespace App\Models;

use CodeIgniter\Model;

class CourseResourceModel extends Model
{
    protected $table = 'Resources';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'title', 'description', 'externalLink', 'courseId', 
        'dateAdded', 'dateUpdated'
    ];
    protected $useTimestamps = true;
    protected $createdField = 'dateAdded';
    protected $updatedField = 'dateUpdated';
}
