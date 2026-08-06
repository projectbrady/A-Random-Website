<?php
session_start();

$errors = [
  'login' => $_SESSION['login_error'] ?? '',
  'register' => $_SESSION['register_error'] ?? ''
];

$activeForm = $_SESSION['active_form'] ?? 'login';

unset($_SESSION['login_error']);
unset($_SESSION['register_error']);
unset($_SESSION['active_form']);

function showError($error) {
  return !empty($error) ? "<p class='error-message'>$error</p>" : '';
}

function isActiveForm($formName, $activeForm) {
  return $formName === $activeForm ? '' : 'hidden';
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <title>Login</title>
</head>

<body>

    <div class="main-container">

        <div class="form-wrapper">

            <form action="login_register.php" class="form <?= isActiveForm('login', $activeForm) ?>" id="login"
                method="post">

                <h1>Log In</h1>

                <?= showError($errors['login']); ?>

                <label>Email</label>
                <input type="email" name="email" placeholder="John.Doe@email.com" required>

                <label>Password</label>

                <div class="password-container">
                    <input class="password-input" type="password" name="password" placeholder="********" required>
                    <i class="fa-solid fa-eye toggle-password"></i>
                </div>

                <input type="submit" name="login" value="Log In">

                <span class="switch-text">
                    Don't have an account?
                    <a href="#" class="form-toggle">Create One!</a>
                </span>

            </form>


            <form action="login_register.php" class="form <?= isActiveForm('register', $activeForm) ?>" id="signup"
                method="post">

                <h1>Create Account</h1>

                <?= showError($errors['register']); ?>

                <label>First Name</label>
                <input type="text" name="fname" placeholder="First Name..." required>

                <label>Last Name</label>
                <input type="text" name="lname" placeholder="Last Name..." required>

                <label>Email</label>
                <input type="email" name="email" placeholder="John.Doe@email.com" required>

                <label>Password</label>

                <div class="password-container">
                    <input class="password-input" type="password" name="password" placeholder="********" required>
                    <i class="fa-solid fa-eye toggle-password"></i>
                </div>

                <input type="submit" name="register" value="Sign Up">

                <span class="switch-text">
                    Already have an account?
                    <a href="#" class="form-toggle">Log In!</a>
                </span>

            </form>

        </div>

    </div>

    <script src="script.js"></script>

</body>

</html>