<?php
    class MyDBContext
    {
        $mysqli;
        function __construct()
        {
            $this->mysqli = new mysqli("127.0.0.1", "root", "", "mydb");
            
        }
        
        
        public function doQuery($query)
        {
            
            $result = $this->mysqli->query($link, $query);
            
            return $result;
        }
        
        public function CheckLogin($login)
        {
            $res = doQuery("SELECT `UserName` FROM `User` WHERE `UserName`= '$login';");

            $count = $res->num_rows();
            if($count > 0)
            {
                return true;
            }
            else
                return false;
        }
        
        public function CheckUser($login, $password)
        {
            $link = mysqli_connect("127.0.0.1","root", "", "mydb");

            echo " login : " . $login . "<br>";
            echo " password : " . $password . "<br>";
            
            $result = $this->doQuery("SELECT * FROM `User` WHERE `UserName` = '$login' AND `Password` = '$password';");

            echo "Numbers of column : " $res->num_rows();
            if(mysqli_num_rows($res) > 0)
            {
                return true;
            }
            else 
                return false;
        }

    }
?>