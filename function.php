<?php

    define('DB_SERVER', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'booking');

    class DB_con {
        function __construct(){
            $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
            $this->dbcon = $conn;

            if (mysqli_connect_errno()) {
                echo "Fail" . mysqli_connect_error();
            }
        }

        public function usernameavailable($uname) {
            $checkuser = mysqli_query($this->dbcon,"SELECT username From user WHERE username = '$uname' LIMIT 1");
            return $checkuser;
        }

        public function regis($fname, $uname, $email, $password) {
            $reg = mysqli_query($this->dbcon,"INSERT INTO user(name,username,email,password,role) 
            VALUE('$fname','$uname','$email','$password','0')");
            return $reg;
        }

        public function signin($uname,$password) {
            $query = mysqli_query($this->dbcon,"SELECT * FROM user WHERE username = '$uname' AND password = '$password'");
            return $query;
        }
        public function fecth($id) {
            $query = mysqli_query($this->dbcon,"SELECT * FROM user WHERE u_id = '$id' ");
            return $query;
        }
    }

?>