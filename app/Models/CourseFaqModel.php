<?php

namespace App\Models;

use CodeIgniter\Model;

class CourseFaqModel extends Model
{
    protected $table = 'Faqs';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'title', 'description', 'externalLink', 'courseId', 
        'dateAdded', 'dateUpdated'
    ];
    protected $useTimestamps = true;
    protected $createdField = 'dateAdded';
    protected $updatedField = 'dateUpdated';
}
