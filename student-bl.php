<?php
    require_once 'bl.php';
    require_once './student-model.php';
    class BusinessLogicStudent extends BusinessLogic{
        public function get()
        {
            $q = 'SELECT * FROM `student`';
            $results = $this->dal->select($q);
            $resultsArray = [];
            while ($row = $results->fetch()) {
                array_push($resultsArray, new StudentModel($row));
            }
            return $resultsArray;   
        }


        public function set($f)
        {   
            $query = "INSERT INTO `student`(`student_name`, `student_phone`, `student_email`, `student_image`) VALUES (:sn, :sp, :se, :si)";
            $params = array(
                "sn" => $f->getStudentName(),
                "sp" => $f->getStudentPhone(),
                "se" => $f->getStudentEmail(),
                "si" => $f->getStudentImage(),
            );
            return $this->dal->insert($query, $params); 
        }


        public function getOne($id)
        {
            $q = 'SELECT * FROM `student` WHERE student_id= :si';  
            $results = $this->dal->select($q, [
                'si' => $id
            ]);
            $row = $results->fetch();
            $cbl = new BusinessLogicCourse;
            
            return new StudentModel($row, $cbl->getCourseByStudent($id));
        }

        
        public function getOneEmail($id)
        {
            $q = 'SELECT * FROM `student` WHERE student_email= :se';  
            $results = $this->dal->select($q, [
                'se' => $id
            ]);
            $row = $results->fetch();
            return new StudentModel($row);
        }
     
        public function delete($id) {
            $query = "DELETE FROM `student` WHERE student_id = :si";
            $params = array(
                "si" => $id
            );
            return $this->dal->delete($query, $params);
        }

        
        public function update($f) {
            $query = "UPDATE `student` SET `student_name`=?,`student_phone`=?,`student_email`=?,`student_image`=? WHERE `student_id`=?";
            $params = array(
                $f->getStudentName(),
                $f->getStudentPhone(),
                $f->getStudentEmail(),
                $f->getStudentImage(),
                $f->getStudentId()

            );
            return $this->dal->update($query, $params);
        }
        public function getStudentByCourse($cid)
        {
            $student_query = 'SELECT student_id FROM course_student WHERE course_id=?';
            $studentResults = $this->dal->select($student_query, [
                $cid
            ]);
            $studentObjectsArray = [];
            while ($studentRow = $studentResults->fetch()) {
                array_push($studentObjectsArray, $this->getOne($studentRow['student_id']));
            }
            return $studentObjectsArray;
        }

        public function setStudentByCourse($sId,$cId) {
            $query = "INSERT INTO course_student (`student_id`, `course_id`) VALUES (:a, :b)";
            $params = array(
                "a" =>$sId,
                "b" =>$cId             
            );

           return $this->dal->insert($query, $params);
        }

        public function deleteStudentByCourse($id) {
            $query = "DELETE FROM `course_student` WHERE student_id = :si";
            $params = array(
                "si" => $id
            );
            return $this->dal->delete($query, $params);
        }

        public function updateStudentByCourse($ci, $si) {
            $query = "UPDATE `course_student` SET `course_id`=:ci WHERE student_id=:si";
            $params = array(
                "ci"=> $ci,
                "si"=> $si

            );
            return $this->dal->update($query, $params);
        }

       
        
        
    }

    ?>
   