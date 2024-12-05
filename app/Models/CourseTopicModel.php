<?php

namespace App\Models;

use CodeIgniter\Model;

class CourseTopicModel extends Model
{
    protected $table = 'Topics';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'title', 'description', 'externalLink', 'source', 'isFree', 
        'courseId', 'dateAdded', 'dateUpdated'
    ];
    protected $useTimestamps = true;
    protected $createdField = 'dateAdded';
    protected $updatedField = 'dateUpdated';
}
