<?php 
    class AdminModel{
        private $admin_id;
        private $admin_name;
        private $admin_role;
        private $admin_phone;
        private $admin_email;
        private $admin_image;
        private $admin_password;

        function __construct($arr) {
            if (!empty($arr['admin_id'])){
            $this->admin_id = $arr['admin_id'];
            }
            $this->admin_name = $arr['admin_name'];
            $this->admin_role = $arr['admin_role'];
            $this->admin_phone = $arr['admin_phone'];
            $this->admin_email = $arr['admin_email'];
            $this->admin_image = $arr['admin_image'];
            $this->admin_password = $arr['admin_password'];
           
            
        }
        function getAdminId() {
            return $this->admin_id;
        }
        function getAdminName() {
            return $this->admin_name;
        }
        function setAdminName($an) {
            $this->admin_name = $an;
        }
        function getAdminRole() {
            return $this->admin_role;
        } 
        function setAdminRole($ar) {
            $this->admin_role = $ar;
        }
        function getAdminPhone() {
            return $this->admin_phone;
        } 
        function setAdminPhone($ap) {
            $this->admin_phone = $ap;
        }
        function getAdminEmail() {
            return $this->admin_email;
        } 
        function setAdminEmail($ae) {
            $this->admin_email = $ae;
        }
        function getAdminImage() {
            return $this->admin_image;
        } 
        function setAdminimage($ai) {
            $this->admin_image = $ai;
        }
        function getAdminPassword() {
            return $this->admin_password;
        } 
        function setAdminPassword($apa) {
            $this->admin_password = $apa;
        } 
    
      
      
       

        
    }
?>