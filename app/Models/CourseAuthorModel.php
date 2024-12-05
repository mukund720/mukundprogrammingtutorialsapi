<?php

namespace App\Models;

use CodeIgniter\Model;

class CourseAuthorModel extends Model
{
    protected $table = 'CourseAuthors';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'title', 'description', 'image', 'linkedin', 'courseId', 
        'dateAdded', 'dateUpdated'
    ];
    protected $useTimestamps = true;
    protected $createdField = 'dateAdded';
    protected $updatedField = 'dateUpdated';
}
