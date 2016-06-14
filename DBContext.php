<?php
    class Connector
    {

        function __construct()
        {
            $this->mysqli = new mysqli("127.0.0.1", "root", "", "mydb");
            
        }


        public function doQuery($query)
        {
            $link = mysqli_connect("127.0.0.1","root", "", "mydb");
            $result = $this->mysqli->query($query);

            return $result;
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

        public function RegisterNewUser($login, $password, $repassword)
        {

            $res = $this->doQuery("SELECT `UserName` FROM `User` WHERE `UserName`= '$login';");

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
                    $this->AddNewUser($login, $password);
                }
            }
        }

        private function AddNewUser($username, $password)
        {
            $res = $this->doQuery("INSERT INTO `user` (`UserName`, `Password`)
            VALUES ('$username', '$password');");
            if($res == true)
            {
                echo "Dobavilosia " . "<br>";
            }
            else
                echo "Ne dobavilosia" . "<br>";
        }


        public function CheckUser($login, $password)
        {


            echo " login : " . $login . "<br>";
            echo " password : " . $password . "<br>";
            
            $res = $this->doQuery("SELECT * FROM `User` WHERE `UserName` = '$login' AND `Password` = '$password';");

            echo "Numbers of column : " . $res->num_rows();
            if($res->num_rows() > 0)
            {
                return true;
            }
            else 
                return false;
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
?>