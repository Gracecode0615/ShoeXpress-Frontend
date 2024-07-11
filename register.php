<?php
include 'config.php';
if (isset($_POST['reg'])) {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $confirm = mysqli_real_escape_string($con, $_POST['confirm']);
    $passwordh = password_hash($password, PASSWORD_DEFAULT);

    // Error message variable
    $error_message = '';

    // Check if email already exists
    $email_check_query = "SELECT * FROM `user` WHERE `email` = '$email' LIMIT 1";
    $result = mysqli_query($con, $email_check_query);
    $email_exists = mysqli_num_rows($result) > 0;

    if ($email_exists) {
        $error_message = "<div class='alert alert-danger'>Email is already registered!</div>";
    } elseif ($password !== $confirm) {
        $error_message = "<div class='alert alert-danger'>Passwords do not match!</div>";
    } else {
        $sql = "INSERT INTO `user` (`username`, `phone`, `email`, `password`) VALUES ('$username', '$phone', '$email', '$passwordh')";
        $query = mysqli_query($con, $sql);

        if ($query) {
            echo "<div class='alert alert-success'>Registration successful</div>";
            header('Location: login.html');
            exit();
        } else {
            $error_message = "<div class='alert alert-danger'>Registration Failed!</div>" . mysqli_error($con);
        }
    }
}
?>