<?php
session_start();
include_once '../includes/Database.php';
include_once '../classes/User.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $db = new Database();
    $connection = $db->getConnection();
    $user = new User($connection);

    $email    = $_POST['email']         ?? '';
    $password = $_POST['loginPassword'] ?? ''; 


    if ($user->login($email, $password)) {
        // Successful login!
        if ($_SESSION['role'] === 'admin') {
            header("Location: dashboard.php");
        } else {
            header("Location: home.php");
        }
        exit;
    } else {
        echo "<p style='color:red; text-align:center;'>Invalid login credentials!</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Log In</title>  
  <link rel="stylesheet" href="../css/login.css">
</head>
<body>  
<div class="container">
  <div class="auth-container">
    <img src="../images/udhes.png" id="logo" >
    <h2>Log in to your account</h2>
    <form id="login-form" method="POST" action="">
        <div class="field">
            <input type="email" name="email" id="email" placeholder=" " required>
            <label for="email">Email or phone</label>
        </div>
        <div class="field">
            <input type="password" name="loginPassword" id="loginPassword" placeholder=" " required>
            <label for="loginPassword">Password</label>
        </div>
        <button class="login-button" type="submit">
          Log in
        </button>
        <p class="form-warning" id="formWarning"></p>
        <p class="signup-link">Don't have an account? <a href="../html/signup.php">Sign up here</a></p>
          <div class="social-login">
              <div class="social-label">Or continue with</div>
              <div class="social-row">
                  <button type="button" class="social-btn google" aria-label="Continue with Google"><img src="../images/google.png" alt="Google"></button>
                  <button type="button" class="social-btn apple" aria-label="Continue with Apple"><img src="../images/apple.jpg" alt="Apple"></button>
                  <button type="button" class="social-btn x" aria-label="Continue with X"><img src="../images/x.png" alt="X"></button>
              </div>
          </div>
    </form>
  </div>
</div>

  <script src="../js/auth.js"></script>

  </body>
  </html>
