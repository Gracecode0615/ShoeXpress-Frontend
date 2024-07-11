<?php
        include 'config.php';
        session_start(); // Start the session at the beginning

        if (isset($_POST['reg'])) {

            $email = mysqli_real_escape_string($con, $_POST['email']);
            $password = mysqli_real_escape_string($con, $_POST['password']);
            // $password = mysqli_real_escape_string($con, $_POST['password']);

            $error_message = '';
            // Ensure SQL query is properly formatted
            $sql = "SELECT * FROM `user` WHERE `email` = '$email'";
            $query = mysqli_query($con, $sql);

            if (!$query) {
                // Handle query error
                $error_message = "<div class='alert alert-danger'>Query failed: " . mysqli_error($con) . "</div>";
            } else {
                $count = mysqli_num_rows($query);

                if ($count == 1) {
                    $row = mysqli_fetch_assoc($query);
                    $pass = $row['password'];
                    $check = password_verify($password, $pass);

                    if ($check) {
                        $_SESSION['user_name'] = $email;
                        header('Location: index.html'); // Use proper capitalization and ensure no output before this
                        exit(); // Ensure script stops execution after redirect
                    } else {
                        $error_message= "<div class='alert alert-danger'>Login failed</div>";
                    }
                    } else {
                    $error_message= "<div class='alert alert-danger'>User not found</div>";
                }
            }
        }
        ?>
