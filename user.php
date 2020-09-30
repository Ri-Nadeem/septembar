<?php
include "database.php";
include "session.php";
    class user{
        private $db;
        public function __construct(){
            $this->db = new database();

        }

        public function regcreat($data){
            $name = $data['name'];
            $email = $data['email'];
            $echeck = $this->checkemail($email);
            $password = $data['pswd'];
            $confirm = $data['cpswd'];

            if($name=="" || $email=="" || $password=="" || $confirm==""){
                $msg="<div>please full fill your form</div>";
                return $msg;
            }

            if(strlen($password)<3){
                $msg="<div>your password too short</div>";
                return $msg;
            }

            if($echeck==true){
                $msg="<div>your email already exists</div>";
                return $msg;
            }

            $sql = "INSERT INTO student2( name, email, password, confirm) VALUES (:name,:email,:password,:confirm)";
            $query = $this->db->pdo->prepare($sql);
            $query->bindValue(':name',$name);
            $query->bindValue(':email',$email);
            $query->bindValue(':password',$password);
            $query->bindValue(':confirm',$confirm);
            $res = $query->execute();
            if($res){
                $msg="<div>insert successfull</div>";
                return $msg;
            }
            else{
                $msg="<div>insert problem</div>";
                return $msg;
            }
        }

        public function checkemail($email){
            $sql = "SELECT * FROM student2 WHERE email = :email";
            $query = $this->db->pdo->prepare($sql);
            $query->bindValue(':email',$email);
            $query->execute();
            if($query->rowCount()>0){
                return true;
            }
            else{
                return false;
            }
        }

        public function userlog($email,$password){
            $sql = "SELECT * FROM student2 WHERE email = :email AND password = :password LIMIT 1";
            $query = $this->db->pdo->prepare($sql);
            $query->bindValue(':email',$email);
            $query->bindValue(':password',$password);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_OBJ);
            return $result;
        }

        public function logcreat($data){
            $email = $data['email'];
            $password = $data['pswd'];

            if($email=="" || $password==""){
                $msg="<div>please full fill your form</div>";
                return $msg;
            }

            if(strlen($password)<3){
                $msg="<div>your password too short</div>";
                return $msg;
            }
            if(filter_var($email,FILTER_VALIDATE_EMAIL)==false){
                $msg="<div>your email is not valid</div>";
                return $msg;
            }

            $res = $this->userlog($email,$password);
            if($res){
                session::init();
            session::set("login",true);
            session::set("id",$res->id);
            session::set("name",$res->name);
            session::set("email",$res->email);
            session::set("password",$res->password);
            session::set("mes","<div>yes buddy..you are log in</div>");
            header("Location: home.php");
            }
            else{
                $msg="<div>data not found</div>";
                return $msg;
            }

        }

        public function udata(){
            $sql = "SELECT * FROM student2";
            $query = $this->db->pdo->prepare($sql);
            $query->execute();
            $result = $query->fetchAll();
            return $result;
        }

        public function userdata($id){
            $sql = "SELECT * FROM student2 WHERE id = :id LIMIT 1";
            $query = $this->db->pdo->prepare($sql);
            $query->bindValue(':id',$id);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_OBJ);
            return $result;
        }
    }


?>
