<?php

namespace App\Models;

use CodeIgniter\Model;

class ProjectFeatureModel extends Model
{
    protected $table = 'ProjectFeatures';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'title', 'courseId', 'dateAdded', 'dateUpdated'
    ];
    protected $useTimestamps = true;
    protected $createdField = 'dateAdded';
    protected $updatedField = 'dateUpdated';
}
