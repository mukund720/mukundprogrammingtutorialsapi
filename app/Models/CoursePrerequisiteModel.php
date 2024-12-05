<?php

namespace App\Models;

use CodeIgniter\Model;

class CoursePrerequisiteModel extends Model
{
    protected $table = 'Prerequisites';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'title', 'description', 'externalLink', 'courseId', 
        'dateAdded', 'dateUpdated'
    ];
    protected $useTimestamps = true;
    protected $createdField = 'dateAdded';
    protected $updatedField = 'dateUpdated';
}
