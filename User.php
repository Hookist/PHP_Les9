<?php
include("DBContext.php");
    class User
    {
        public $username;
        private $isLogged = false;
        private $connector;

        public function User()
        {
            $this->connector = new Connector();
        }

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

        private function CheckLoginForMistakes($username)
        {
            echo "Login count = " . strlen($username);
            if(strlen(isset($username)? $username:null) < 4)
            {
                echo "Username must has more then 4 symbols";
                return false;
            }
            else
            {
                return true;
            }
        }

        private function CheckPasswordForMistakes($password, $repassword)
        {
            if(strcmp(isset($password)?$password:null,
                    isset($repassword)?$repassword:null) == 0)
            {
                echo "Passwords are the same";
                if(strlen(isset($password)?$password:null) > 4)
                {
                    return true;
                }
                else
                {
                    echo "Password must has more then 4 symbols";
                    return false;
                }
            }
            else
            {
                echo "Passwords are not the same";
                return false;
            }

        }

        private function ValidateUser($login, $password, $repassword)
        {

            $res = $this->connector->doQuery("SELECT `UserName` FROM `User` WHERE `UserName`= '$login';");

            $count = $res->num_rows;
            if($count > 0)
            {
                echo "We already have that username, please write another";
            }
            else
            {
                $isRightLogin = $this->CheckLoginForMistakes($login);
                $isRightPassword = $this->CheckPasswordForMistakes($password, $repassword);
                if($isRightLogin == true && $isRightPassword == true)
                {
                    return true;
                }
                else
                    return false;
            }
        }

        public function AddNewUser($username, $password, $repassword)
        {
            if($this->ValidateUser($username, $password, $repassword)) {


                $res = $this->connector->doQuery("INSERT INTO `user` (`UserName`, `Password`)
            VALUES ('$username', '$password');");
                if ($res == true) {
                    echo "Dobavilosia " . "<br>";
                } else
                    echo "Ne dobavilosia" . "<br>";
            }
        }


        public function CheckUser($login, $password)
        {
            $login = isset($login)?$login:null;
            $password = isset($password)?$password:null;

            echo " login : " . $login . "<br>";
            echo " password : " . $password . "<br>";

            $res = $this->connector->doQuery("SELECT * FROM `User` WHERE `UserName` = '$login' AND `Password` = '$password';");

            echo "Numbers of column : " . $res->num_rows;
            if($res->num_rows > 0)
            {
                return true;
            }
            else
            {
                echo "Wrong username or password";
                return false;
            }
        }



        function CheckString($someString)
        {
            if(strripos($someString, " ") != false)
            {
                return true;
            }
            else
                return false;
        }

    }

    class A
    {
        public static function Gde()
        {
            echo __CLASS__;
        }
        public static function Uznat()
        {
            static::Gde();
        }

    }

    class B extends A
    {
        public static function Gde()
        {
            echo __CLASS__;
        }
    }

?>