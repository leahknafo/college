<?php
    require_once 'bl.php';
    require_once './model-admin.php';
    class BusinessLogicAdmin extends BusinessLogic{
        public function get()
        {
            $q = 'SELECT * FROM `admin`';
            $results = $this->dal->select($q);
            $resultsArray = [];
            while ($row = $results->fetch()) {
                array_push($resultsArray, new AdminModel($row));
            }
            return $resultsArray;   
        }


        public function set($f)
        {   
            $query = "INSERT INTO `admin`(`admin_name`, `admin_phone`, `admin_email`, `admin_role`, `admin_password`, `admin_image`) VALUES (:an, :aph, :ae, :ar, :apa, :ai)";
            $params = array(
                "an" => $f->getAdminName(),
                "aph" => $f->getAdminPhone(),
                "ae" => $f->getAdminEmail(),
                "ar" => $f->getAdminRole(),
                "apa" => $f->getAdminPassword(),
                "ai" => $f->getAdminImage()
                
            );
            return $this->dal->insert($query, $params); 
        }


        public function getOne($id)
        {
            $q = 'SELECT * FROM `admin` WHERE admin_email= :ai';  
            $results = $this->dal->select($q, [
                'ai' => $id
            ]);
            $row = $results->fetch();
            return new AdminModel($row);
        }


        public function delete($email) {
            $query = "DELETE FROM `admin` WHERE admin_email = :a";
            $params = array(
                "a" => $email
            );
            return $this->dal->delete($query, $params);
        }

        
        public function update($f) {
            $query = "UPDATE `admin` SET `admin_name`=?, `admin_phone`=?, `admin_email`=?, `admin_role`=?, `admin_image`=?, `admin_password`=? WHERE `admin_id`=?";
            $params = array(
                $f->getAdminName(),
                $f->getAdminPhone(),
                $f->getAdminEmail(),
                $f->getAdminRole(),
                $f->getAdminImage(),
                $f->getAdminPassword(),
                $f->getAdminId()

            );
            return $this->dal->update($query, $params);
        }
     
       
    }

    ?>
   