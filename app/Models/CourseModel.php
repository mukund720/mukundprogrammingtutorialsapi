<?php

namespace App\Models;

use CodeIgniter\Model;

class CourseModel extends Model
{
    protected $table = 'Courses';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'title', 'description', 'image', 'fee', 'rating', 
        'numberOfTopics', 'badgeText', 'source', 'externalLink', 
        'categoryDisplayId', 'courseDisplayId', 'objective', 
        'discount', 'courseBulletPoints', 'dateAdded', 'dateUpdated'
    ];
    protected $useTimestamps = true;
    protected $createdField = 'dateAdded';
    protected $updatedField = 'dateUpdated';
}
