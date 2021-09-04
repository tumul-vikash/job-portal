<?php
    class Jobs {
        //properties
        private $conn;

        //constructor
        public function __construct($db){
            $this->conn = $db;
        }
        
        //methods
        public function read() {
            $jobs = array();
            
            $sql = 'SELECT * FROM Jobs ORDER BY created_at DESC';
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param();
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

        public function insert($title, $cname, $jd, $auid, $author, $aemail, $aphone, $aposition, $status) {
            $sql = 'INSERT INTO 
                    Jobs(
                        title, 
                        company_name, 
                        job_description,
                        auid, 
                        author, 
                        author_email_id, 
                        author_phone_no, 
                        author_position, 
                        status
                    ) 
                    VALUES(?,?,?,?,?,?,?,?,?)';
            $stmt = $this->conn->prepare($sql);
            if($stmt === false) {
                echo(json_encode('prepare'.$this->conn->error));
                exit();
            }

            $stmt->bind_param('sssissisi', $title, $cname, $jd, $auid, $author, $aemail, $aphone, $aposition, $status);
            
            $exec = $stmt->execute();
            if(!$exec) {
                echo(json_encode('exec'.$stmt->error));
                exit();
            }

            return json_encode('added');
        }
    }
?>