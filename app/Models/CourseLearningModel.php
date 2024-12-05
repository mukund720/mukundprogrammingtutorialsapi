<?php

namespace App\Models;

use CodeIgniter\Model;

class CourseLearningModel extends Model
{
    protected $table = 'CourseLearnings';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'title', 'topicList', 'courseId', 
        'dateAdded', 'dateUpdated'
    ];
    protected $useTimestamps = true;
    protected $createdField = 'dateAdded';
    protected $updatedField = 'dateUpdated';
}
