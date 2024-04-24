<?php
session_start();
include("db_connect.php");


if(isset($_POST["register"])){
    $fname = trim($_POST['fname']);
    $mname = trim($_POST['mname']);
    $lname = trim($_POST['lname']);
    $email = trim($_POST['email']);
    $password = $_POST['pswd'];
    $password2 = $_POST['cpswd'];




    $username = $fname. ', ' .$mname. ' ' . $lname;
    $status = "user";
   


    $verify_token = md5(rand());




    if(empty($fname) ) {
        $_SESSION['status'] = "First Name is required!";
        header("Location: register.php");
        exit(0);
    } else if(empty($mname)) {
        $_SESSION['status'] = "Middle Name is required!";
        header("Location: register.php");
        exit(0);
    }
    else if(empty($lname)) {
        $_SESSION['status'] = "Last Name is required!";
        header("Location: register.php");
        exit(0);
    }
    else if(empty($email)) {
        $_SESSION['status'] = "Email is required!";
        header("Location: register.php");
        exit(0);
    }
    else if(empty($password)) {
        $_SESSION['status'] = "Password is required!";
        header("Location: register.php");
        exit(0);
    }
    else if(empty($password2)) {
        $_SESSION['status'] = "Password2 is required!";
        header("Location: register.php");
        exit(0);
    }
     else {
        if($password != $password2){
            $_SESSION['status'] = "Password do not match!";
            header("Location: register.php");
            exit(0);
        }
        else {
            $check_email_query = "SELECT email FROM user WHERE email=? LIMIT 1";
            $stmt = $conn->prepare($check_email_query);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();




            if($result->num_rows > 0) {
                $_SESSION['status'] = "Email already exists!";
                header("Location: register.php");
                exit(0);
            } else {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $insert_query = "INSERT INTO user (username, status, email, password, verify_token) VALUES (?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($insert_query);
                $stmt->bind_param("sssss", $username, $status, $email, $hashed_password, $verify_token);




                if($stmt->execute()) {
                   
                        $_SESSION['status'] = "Registration successful!";
                   
                    header("Location: register.php");
                    exit(0);
                } else {
                    $_SESSION['status'] = "Registration failed";
                    header("Location: register.php");
                    exit(0);
                }
            }
        }
    }




}
