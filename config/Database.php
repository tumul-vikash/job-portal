<?php
    class Database {
        //db params
        private $host = 'localhost';
        private $dbname = 'job-portal-demo';
        private $user = 'root';
        private $password = '';

        //db connect
        public function connect() {
            $conn = null;
            try {
                $conn = mysqli_connect($host,'root',$password,'job-portal-demo');
                if(mysqli_connect_errno($conn)) {
                    echo('<h5>');
                    echo(mysqli_connect_error($conn));
                    echo('</h5>');
                }
            } catch (Exception $e) {
                echo('<h5>');
                echo('Connection error'.$e->getMessage().'\n');
                echo('</h5>');
            }
            return $conn;
        }
    }
?>