<?php 
    class CourseModel{
        private $course_id;
        private $course_name;
        private $course_desc;
        private $course_image;
        private $students_array;

        function __construct($arr, $students=null) {
            if (!empty($arr['course_id'])){
            $this->course_id = $arr['course_id'];
            }
            $this->course_name = $arr['course_name'];
            $this->course_desc = $arr['course_desc'];
            $this->course_image = $arr['course_image'];
            if (isset($students)) {
                $this->students_array = $students;
            }
            
        }
        
        function getCourseId() {
            return $this->course_id;
        }
        function getCourseName() {
            return $this->course_name;
        }
        function setCourseName($cn) {
            $this->course_name = $cn;
        }
        function getCourseDesc() {
            return $this->course_desc;
        } 
        function setCourseDesc($cd) {
            $this->course_desc = $cd;
        }
        function getCourseImage() {
            return $this->course_image;
        } 
        function setCourseImage($ci) {
            $this->course_image = $ci;
        } 
    
      
      
       

        
    }
?>