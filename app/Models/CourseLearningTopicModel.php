<?php

namespace App\Models;

use CodeIgniter\Model;

class CourseLearningTopicModel extends Model
{
    protected $table = 'CourseLearningsTopics';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'title',
        'icon',
        'learningId',
        'dateAdded',
        'dateUpdated'
    ];
    protected $useTimestamps = true;
    protected $createdField = 'dateAdded';
    protected $updatedField = 'dateUpdated';
}
