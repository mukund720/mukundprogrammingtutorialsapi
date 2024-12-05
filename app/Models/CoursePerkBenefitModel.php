<?php

namespace App\Models;

use CodeIgniter\Model;

class CoursePerkBenefitModel extends Model
{
    protected $table = 'CoursePerksBenefits';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'title', 'description', 'icon', 'courseId', 
        'dateAdded', 'dateUpdated'
    ];
    protected $useTimestamps = true;
    protected $createdField = 'dateAdded';
    protected $updatedField = 'dateUpdated';
}
