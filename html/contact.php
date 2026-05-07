<?php
session_start();
include_once '../includes/Database.php';
include_once '../classes/Message.php';

$db = new Database();
$conn = $db->getConnection();
$messageObj = new Message($conn);

$statusMsg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['send_msg'])) {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $msg = trim($_POST['message'] ?? '');

    if (!empty($name) && !empty($email) && !empty($msg)) {
        if ($messageObj->send($name, $email, $msg)) {
            $statusMsg = "<p style='color:green;'>Mesazhi u dërgua me sukses!</p>";
        } else {
            $statusMsg = "<p style='color:red;'>Gabim gjatë dërgimit.</p>";
        }
    } else {
        $statusMsg = "<p style='color:red;'>Ju lutem plotësoni të gjitha fushat.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Udhës | Contact</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/general.css">
    <link rel="stylesheet" href="../css/deals.css">
    <link rel="stylesheet" href="../css/contact.css">
</head>
<body>

<div class="header">
    <div class="left-section">
        <a href="../html/home.php"><img src="../images/udhes.png" id="logo"></a>
    </div>

    <div class="middle-section">
        <a href="home.php">
            <button class="middle-button" id="stys-button">
                <img src="../images/bed.svg" id="stays-icon">
                Stays
            </button>
        </a>
        <a href="flights.php">
            <button class="middle-button" id="flights-button">
                <img src="../images/plane.svg" id="flights-icon">
                Flights
            </button>
        </a>
        <a href="deals.php">
            <button class="middle-button" id="deas-button">
                <img src="../images/tag.svg" id="deals-icon">
                Deals
            </button>
        </a>
    </div>

    <div class="right-section">
            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="logout.php" class="login-button" style="background-color: #ff7f50;">Log Out</a>
            <?php else: ?>
                <a href="login.php" class="login-button">Log In</a>
            <?php endif; ?>
        </div>
</div>

<section class="contact-hero">
    <h1 class="featured-title">Contact Udhës</h1>
    <p class="deals-intro">Questions, feedback or need help? Send us a message and we'll reply as soon as possible.</p>
</section>

<section class="contact-grid">
    <div class="contact-form">
        <h2>Send a message</h2>
        <?php echo $statusMsg; ?> <form method="POST" action="">
            <div class="contact-field">
                <label">Name</label>
                <input name= "name" id="c_name" type="text" placeholder="Your full name" required>
            </div>

            <div class="contact-field">
                <label>Email</label>
                <input name="email" id="c_email" type="email" placeholder="you@example.com" required>
            </div>

            <div class="contact-field">
                <label>Topic</label>
                <input name="topic" id="c_topic" type="text" placeholder="Tips, billing, app idea">
            </div>

            <div class="contact-field">
                <label>Message</label>
                <textarea name="message" id="c_message" placeholder="Write your message here..." required></textarea>
            </div>

            <div class="contact-actions">
                <button name="send_msg" type="submit" class="login-button" style="border: 0;">Send</button>
            </div>
        </form>
    </div>

    <aside class="contact-side">
        <div class="card">
            <h3><b>Contact info</b></h3>
            <p><b>Email:</b> support@udhes.com</p>
            <p><b>Hours:</b> Mon-Fri, 9-18</p>
            <p><b>Location:</b> Icon Tower, Tirana, Prishtina 10000</p>
        </div>

        <div class="card map-card">
            <img src="../images/map.png" alt="our location map" class="map-image">
        </div>

        <div class="card">
            <h3>Help topics</h3>
            <ul class="help-list">
                <li>Changing or canceling a trip</li>
                <li>Adding baggage and seats</li>
                <li>Traveling with friends</li>
                <li>Managing alerts</li>
                <li>Refund timelines</li>
            </ul>
        </div>
    </aside>
</section>
<section class="contact-faq">
    <h2 class="featured-title" style="color: #ff7f50;">Answers before you email</h2>

    <div class="faq-item">
        <button class="faq-question">
            Can I save trips without an account?
            <span>+</span>
        </button>
        <div class="faq-answer">
            Yes! But saving trips across devices requires an account.
        </div>
    </div>

    <div class="faq-item">
        <button class="faq-question">
            How do price alerts work?
            <span>+</span>
        </button>
        <div class="faq-answer">
            Create an alert and we’ll notify you by email when prices change.
        </div>
    </div>

    <div class="faq-item">
        <button class="faq-question">
            Do you include baggage fees?
            <span>+</span>
        </button>
        <div class="faq-answer">
            Some deals include baggage; always check the deal details.
        </div>
    </div>

    <div class="faq-item">
        <button class="faq-question">
            Can I change travel dates?
            <span>+</span>
        </button>
        <div class="faq-answer">
            Date changes depend on the provider and deal rules.
        </div>
    </div>
</section>


<footer class="site-footer">
        <div class="footer-content">
            <div class="footer-brand">
                <img src="../images/udhes.png" alt="Udhës logo" class="footer-logo">
                <p class="footer-motto">Accommodations and stays tailored to your next journey!</p>
            </div>

            <div class="footer-section">
                <a href="../html/about.php" style="text-decoration: none;"><h2>About Us</h2></a>
                <p>Help Center</p>
                <p>Safety information</p>
            </div>

            <div class="footer-section">
                <a href="../html/contact.php"  class="contact-btn" style="text-decoration: none;"><h2>Contact Us Here</h2></a>
                <p>Email: support@udhes.com</p>
                <p>Phone: +383 45 000 000</p>
            </div>
        </div>
        <hr class="footer-divider">

        <div class="footer-bottom">
            <p>© 2025 Udhës. All rights reserved.</p>
        </div>
    </footer>>

<script src="../js/contact.js"></script>

</body>
</html>
