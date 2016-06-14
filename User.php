<?php
    class User
    {
        public $username;
        private $isLogged = false;
        
        public function login()
        {
            
        }
        
        public function logout()
        {
        }
        
        public function isAdmin()
        {
            return $this->isLogged;
        }
    }
?>