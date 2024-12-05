<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class CourseController extends ResourceController
{
    protected $modelName = 'App\Models\CourseModel';
    protected $format = 'json';

    // Get all courses
    public function index()
    {
        return $this->respond($this->model->findAll());
    }

    // Get a single course
    public function show($id = null)
    {
        $data = $this->model->find($id);
        if (!$data) {
            return $this->failNotFound('Course not found.');
        }
        return $this->respond($data);
    }

    // Create a new course
    public function create()
    {
        $input = $this->request->getPost();
        if ($this->model->insert($input)) {
            return $this->respondCreated(['message' => 'Course created successfully.']);
        }
        return $this->failValidationErrors($this->model->errors());
    }

    // Update a course
    public function update($id = null)
    {
        $input = $this->request->getRawInput();
        if (!$this->model->find($id)) {
            return $this->failNotFound('Course not found.');
        }
        if ($this->model->update($id, $input)) {
            return $this->respond(['message' => 'Course updated successfully.']);
        }
        return $this->failValidationErrors($this->model->errors());
    }

    // Delete a course
    public function delete($id = null)
    {
        if (!$this->model->find($id)) {
            return $this->failNotFound('Course not found.');
        }
        $this->model->delete($id);
        return $this->respondDeleted(['message' => 'Course deleted successfully.']);
    }
    public function fetchFewRelatedData()
    {
        $db = \Config\Database::connect();
    
        // Fetch all courses data
        $courses = $db->table('Courses')->get()->getResultArray();
    
        if (!$courses) {
            return $this->failNotFound('No courses found.');
        }
    
        $relatedTables = [
            'Topics'                => 'topicId'
        ];
    
        $response = [];
        
        // Loop through each course to fetch its related data
        foreach ($courses as $course) {
            $courseData = $course;
    
            // Fetch related data for each course
            foreach ($relatedTables as $table => $foreignKey) {
                $courseData[$table] = $db->table($table)
                    ->where('courseId', $course['id'])
                    ->get()
                    ->getResultArray();
            }
    
            $response[] = $courseData;
        }
    
        return $this->respond($response);
    }
    public function fetchAllRelatedData()
    {
        $db = \Config\Database::connect();
    
        // Fetch all courses data
        $courses = $db->table('Courses')->get()->getResultArray();
    
        if (!$courses) {
            return $this->failNotFound('No courses found.');
        }
    
        $relatedTables = [
            'CourseAuthors'         => 'authorId',
            'CourseCertificates'    => 'certificateId',
            'CourseCoupons'         => 'couponId',
            'Faqs'                  => 'faqId',
            'CourseFor'             => 'courseForId',
            'CourseLearnings'       => 'learningId',
            'CoursePerksBenefits'   => 'perkBenefitId',
            'Prerequisites'         => 'prerequisiteId',
            'CourseProjects'        => 'projectId',
            'Resources'             => 'resourceId',
            'Tests'                 => 'testId',
            'Topics'                => 'topicId'
        ];
    
        $response = [];
        
        // Loop through each course to fetch its related data
        foreach ($courses as $course) {
            $courseData = $course;
    
            // Fetch related data for each course
            foreach ($relatedTables as $table => $foreignKey) {
                $courseData[$table] = $db->table($table)
                    ->where('courseId', $course['id'])
                    ->get()
                    ->getResultArray();
            }
    
            $response[] = $courseData;
        }
    
        return $this->respond($response);
    }
    
     // Fetch data from all related tables for a given courseId
     public function fetchAllRelatedDataById($id)
     {
         if (!$id) {
             return $this->fail('Course ID is required.');
         }
 
         $db = \Config\Database::connect();
 
         // Fetch the course data
         $course = $db->table('Courses')->where('id', $id)->get()->getRowArray();
 
         if (!$course) {
             return $this->failNotFound('Course not found.');
         }
 
         // Fetch related data
         $relatedTables = [
             'CourseAuthors'         => 'authorId',
             'CourseCertificates'    => 'certificateId',
             'CourseCoupons'         => 'couponId',
             'Faqs'            => 'faqId',
             'CourseFor'      => 'courseForId',
             'CourseLearnings'       => 'learningId',
             'CoursePerksBenefits'    => 'perkBenefitId',
             'Prerequisites'   => 'prerequisiteId',
             'CourseProjects'        => 'projectId',
             'Resources'       => 'resourceId',
             'Tests'           => 'testId',
             'Topics'          => 'topicId'
         ];
 
         $response = $course;
         foreach ($relatedTables as $table => $foreignKey) {
             $response[$table] = $db->table($table)
                 ->where('courseId', $id)
                 ->get()
                 ->getResultArray();
         }

         // Fetch Learnings Topics for each learningId
        //  $learnings = $response['Learnings'];
        //  foreach ($learnings as &$learning) {
        //      $learning['topics'] = $db->table('CourseLearningsTopics')
        //          ->where('learningId', $learning['learningId'])
        //          ->get()
        //          ->getResultArray();
        //  }
        //  $projectFeatures = $response['Projects'];
        //  foreach ($projectFeatures as &$item) {
        //      $item['learningTopics'] = $db->table('CourseLearningsTopics')
        //          ->where('projectId', $item['projectId'])
        //          ->get()
        //          ->getResultArray();
        //  }
 
        //  $response['Learnings'] = $learnings;
        //  $response['Projects'] = $projectFeatures;

         return $this->respond($response);
     }
}
