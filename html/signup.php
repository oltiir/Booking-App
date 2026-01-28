<?php
error_reporting(E_ALL);
ini_set('display_errors', 1); 

include_once __DIR__ . '/../includes/Database.php';
include_once __DIR__ . '/../classes/User.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $db = new Database();
    $connection = $db->getConnection();
    $user = new User($connection);

    $name     = trim($_POST['firstName'] ?? '');
    $surname  = trim($_POST['lastName'] ?? '');
    $email    = trim($_POST['contact'] ?? '');        
    $password = $_POST['signupPassword'] ?? '';     

    if (empty($name) || empty($surname) || empty($email) || empty($password)) {
        echo "<p style='color:red; text-align:center;'>Plotëso të gjitha fushat!</p>";
    } elseif ($user->register($name, $surname, $email, $password)) {
        header("Location: login.php");
        exit;
    } else {
        echo "<p style='color:red; text-align:center;'>Gabim gjatë regjistrimit!</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <div class="container">
    <div class="auth-container compact">
        <img src="../images/udhes.png" id="logo" >
        <h2>Create a new account</h2>
        <form id= "signup-form" method="POST" action="" novalidate>
            <div class="field">
                <input type="text" placeholder=" " id="firstName" name="firstName" required>
                <label for="firstName">First Name</label>
            </div>
            <div class="field">
                <input type="text" placeholder=" " id="lastName" name="lastName" required>
                <label for="lastName">Last Name</label>
            </div>
            <div class="field">
                <input type="email" placeholder=" " id="contact" name="contact" required>
                <label for="contact">Email or phone</label>
            </div>
            <div class="field">
                <input type="email" placeholder=" " id="contactConfirm" name="contactConfirm" required>
                <label for="contactConfirm">Confirm Email or phone</label>
            </div>
            <div class="field">
                <input type="password" placeholder=" " id="signupPassword" name="signupPassword" required>
                <label for="signupPassword">Password</label>
            </div>
            <div class="field">
                <input type="password" placeholder=" " id="signupPasswordConfirm" name="signupPasswordConfirm" required>
                <label for="signupPasswordConfirm">Confirm Password</label>
            </div>
            <button class="login-button" type="submit">
                Continue
            </button>
            <p class="form-warning" id="formWarning"></p>
            <p class="signup-link">Already have an account? <a href="../html/login.php">Log in</a></p>
          <div class="social-login">
              <div class="social-label">Or continue with</div>
              <div class="social-row">
                  <button type="button" class="social-btn google" aria-label="Continue with Google"><img src="../images/google.png" alt="Google"></button>
                  <button type="button" class="social-btn apple" aria-label="Continue with Apple"><img src="../images/apple.jpg" alt="Apple"></button>
                  <button type="button" class="social-btn x" aria-label="Continue with X"><img src="../images/x.png" alt="X"></button>
              </div>
          </div>
        </form>
        <script src="../js/auth.js"></script>
    </div>
    </div>
</body>
</html>