<?php

session_start();
require_once 'config.php';

if (isset($_POST['register'])) {

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];

    $checkEmail = $conn->query("SELECT email FROM users WHERE email = '$email'");

    if ($checkEmail->num_rows > 0) {

        $_SESSION['register_error'] = 'Email is already registered!';
        $_SESSION['active_form'] = 'register';

    } else {

        $conn->query("INSERT INTO users (first_name, last_name, password, email) 
        VALUES ('$fname', '$lname', '$password', '$email')");

    }

    header("Location: index.php");
    exit();

}


if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM users WHERE email = '$email'");

    if ($result->num_rows > 0) {

        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {

            $_SESSION['first_name'] = $user['first_name'];
            $_SESSION['last_name'] = $user['last_name'];
            $_SESSION['email'] = $user['email'];

            header("Location: home_page.php");
            exit();

        }

    }

    $_SESSION['login_error'] = 'Incorrect email or password';
    $_SESSION['active_form'] = 'login';

    header("Location: index.php");
    exit();

}

?>