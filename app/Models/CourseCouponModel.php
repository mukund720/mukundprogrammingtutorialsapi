<?php

namespace App\Models;

use CodeIgniter\Model;

class CourseCouponModel extends Model
{
    protected $table = 'CourseCoupons';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'code', 'price', 'isExpired', 'courseId', 
        'dateAdded', 'dateUpdated'
    ];
    protected $useTimestamps = true;
    protected $createdField = 'dateAdded';
    protected $updatedField = 'dateUpdated';
}
