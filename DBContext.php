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

       

    }
?>