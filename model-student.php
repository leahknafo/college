<?php 
require_once './model.php';
require_once 'bl-course.php';
    class StudentModel implements IModel{
        private $student_id;
        private $student_name;
        private $student_phone;
        private $student_email;
        private $student_image;
        private $courses_array;

        function __construct($arr, $courses=null) {
            if (!empty($arr['student_id'])){
            $this->student_id = $arr['student_id'];
            }
            $this->student_name = $arr['student_name'];
            $this->student_phone = $arr['student_phone'];
            $this->student_email = $arr['student_email'];
            $this->student_image = $arr['student_image'];
            if(isset($courses)){
                $this->courses_array = $courses;
            }
            
        }
        function getStudentId() {
            return $this->student_id;
        }
        function getStudentName() {
            return $this->student_name;
        }
        function setStudentName($sn) {
            $this->student_name = $sn;
        }
        function getStudentPhone() {
            return $this->student_phone;
        } 
        function setStudentPhone($sp) {
            $this->student_phone = $sp;
        }
        function getStudentEmail() {
            return $this->student_email;
        } 
        function setStudentEmail($se) {
            $this->student_email = $se;
        }
        function getStudentImage() {
            return $this->student_image;
        } 
        function setStudentImage($si) {
            $this->student_image = $si;
        } 
        function getCourses() {
            
            return $this->courses_array;
        }
      
  

     
      
      
       

        
    }
?>