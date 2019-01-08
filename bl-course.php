<?php
    require_once 'bl.php';
    require_once './model-course.php';
    class BusinessLogicCourse extends BusinessLogic{
        public function get()
        {
            $q = 'SELECT * FROM `course`';
            $results = $this->dal->select($q);
            $resultsArray = [];
            while ($row = $results->fetch()) {
                array_push($resultsArray, new CourseModel($row));
            }
            return $resultsArray;   
        }


        public function set($f)
        {   
            $query = "INSERT INTO `course`(`course_name`, `course_desc`, `course_image`) VALUES (:cn, :cd, :ci)";
            $params = array(
                "cd" => $f->getCourseName(),
                "cn" => $f->getCourseDesc(),
                "ci" => $f->getCourseImage()
            );
            return $this->dal->insert($query, $params); 
        }


        public function getOne($id)
        {
            $q = 'SELECT * FROM `course` WHERE course_id= :ci';  
            $results = $this->dal->select($q, [
                'ci' => $id
            ]);
            $row = $results->fetch();
            return new CourseModel($row);
        }

        public function getOneName($id)
        {
            $q = 'SELECT * FROM `course` WHERE course_name= :ci';  
            $results = $this->dal->select($q, [
                'ci' => $id
            ]);
            $row = $results->fetch();
            return new CourseModel($row);
        }



        public function delete($id) {
            $query = "DELETE FROM `course` WHERE course_id = :ci";
            $params = array(
                "ci" => $id
            );
            $this->dal->delete($query, $params);
        }

        
        public function update($f) {
            $query = "UPDATE `course` SET `course_name`=?,`course_desc`=?,`course_image`=? WHERE `course_id`=?";
            $params = array(
                $f->getCourseName(),
                $f->getCourseDesc(),
                $f->getCourseImage(),
                $f->getCourseId()
            );
            $this->dal->update($query, $params);
        }

        public function getCourseByStudent($sid)
        {
            $course_query = 'SELECT course_id FROM course_student WHERE student_id=?';
            $courseResults = $this->dal->select($course_query, [
                $sid
            ]);
            $courseObjectsArray = [];
            while ($courseRow = $courseResults->fetch()) {
                array_push($courseObjectsArray, $this->getOne($courseRow['course_id']));
            }
            return $courseObjectsArray;
        }



     
       
    }

    ?>
   