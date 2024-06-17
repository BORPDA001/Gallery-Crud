<?php
require_once ("DB.php");
class Auth {
    protected  $conn;
    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }
    public function register($data) {
        $email = $data['user_email'];
        $unique_email = $this->conn->query("SELECT * FROM users WHERE user_email = '$email'");
        if($unique_email->num_rows > 0) {
            $_SESSION['msg'] = [
                "status" => "warning",
                "text" => "Account exists!"
            ];
            header("location:http://localhost/blog/view/auth/login.php");
        }
        $name = $data['user_name'];
        $password = $data['user_password'];
        $sql = "INSERT INTO users (user_name,user_email,password,role) VALUES ( '$name','$email', '$password', 1)";
        $register = $this->conn->query($sql);
        if($register) {
            $_SESSION['msg'] = [
                "status" => "success",
                "text" => "Account successfully created!"
            ];
            header("location:http://localhost/blog/view/auth/login.php");
        } else {
            $_SESSION['msg'] = [
                "status" => "fail",
                "text" => "Account was not created!"
            ];
            header("location:http://localhost/blog/view/auth/register.php");
        }
    }
    public function login($data) {
        $email = $data['user_email'];
        $password = $data['user_password'];

        $SQL = "SELECT * FROM users WHERE user_email = '$email' AND password = '$password'";
        $res = $this->conn->query($SQL);
        if($res->num_rows > 0) {
            $user = $res->fetch_assoc();
            $_SESSION['user'] = $user;
            header("location:http://localhost/blog/view/dashboard/home.php");
        } else {
            $_SESSION['msg'] = [
                "status" => "fail",
                "text" => "Incorrect login or password!!"
            ];
            header("location:http://localhost/blog/view/auth/login.php");
        }
    }

    public function logout($user_id) {
        session_destroy();
        header("location:http://localhost/blog/view/auth/login.php");
    }
}
