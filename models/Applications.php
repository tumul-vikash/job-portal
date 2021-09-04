<?php
    class Applications{
        //properties
        private $conn;

        //constructor
        public function __construct($db){
            $this->conn = $db;
        }

        //methods
        public function getAppliedJobs() {
            $jobs = array();
            $sql = "SELECT * FROM Jobs,Applications 
                    WHERE Jobs.id<>Applications.job_id AND Applications.email=?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param('s', $email);
            $email = 'tumul.vikash@example.com';
            $stmt->execute();

            $result = $stmt->get_result();
            
            if(!$result) {
                echo('<h5>');
                echo(mysqli_error($this->conn));
                echo('</h5>');
                exit();
            }

            while ($row = mysqli_fetch_assoc($result)) {
                array_push($jobs, $row);
            }

            return json_encode($jobs);
        }
        public function read() {
            $jobs = array();
            $sql = "SELECT * FROM Jobs,Applications 
                    WHERE Jobs.id<>Applications.job_id AND Jobs.author_email_id=?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param('s', $email);
            $email = 'someone@example.com';
            $stmt->execute();

            $result = $stmt->get_result();
            
            if(!$result) {
                echo('<h5>');
                echo(mysqli_error($this->conn));
                echo('</h5>');
                exit();
            }

            while ($row = mysqli_fetch_assoc($result)) {
                array_push($jobs, $row);
            }

            return json_encode($jobs);
        }

        public function insertNew($jid, $title, $first_name, $last_name, $email, $phone, $about) {
            $sql = 'INSERT INTO 
                    Applications(
                        job_id,
                        job_title,
                        first_name,
                        last_name,
                        email,
                        phone,
                        about
                    ) 
                    VALUES(?,?,?,?,?,?,?)';
            $stmt = $this->conn->prepare($sql);
            if($stmt === false) {
                return json_encode('prepare'.$this->conn->error);
                exit();
            }

            $stmt->bind_param('isssis', $jid, $title, $first_name, $last_name, $email, $phone, $about);
            
            $exec = $stmt->execute();
            if(!$exec) {
                return json_encode('exec'.$stmt->error);
                exit();
            }

            return json_encode('applied');
            //return json_encode([$title, $jid, $first_name, $last_name, $email, $phone, $about]);
        }
    }
?>