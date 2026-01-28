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
        <a href="../html/login.php" class="login-button">Log In</a>
    </div>
</div>

<section class="contact-hero">
    <h1 class="featured-title">Contact Udhës</h1>
    <p class="deals-intro">Questions, feedback or need help? Send us a message and we'll reply as soon as possible.</p>
</section>

<section class="contact-grid">
    <div class="contact-form">
        <h2>Send a message</h2>
        <form id="contact-form">
            <div class="contact-field">
                <label for="c_name">Name</label>
                <input id="c_name" type="text" placeholder="Your full name">
            </div>

            <div class="contact-field">
                <label for="c_email">Email</label>
                <input id="c_email" type="email" placeholder="you@example.com">
            </div>

            <div class="contact-field">
                <label for="c_topic">Topic</label>
                <input id="c_topic" type="text" placeholder="Tips, billing, app idea">
            </div>

            <div class="contact-field">
                <label for="c_message">Message</label>
                <textarea id="c_message" placeholder="Write your message here..."></textarea>
            </div>

            <div class="contact-actions">
                <button type="submit" class="login-button" style="border: 0;">Send</button>
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
            <p class="footer-motto">Accommodations and stays tailored to your next journey.</p>
        </div>

        <div class="footer-section">
            <a href="../html/contact.php"><h2>Support</h2></a>
            <p>Help Center</p>
            <p>Safety information</p>
        </div>

        <div class="footer-section">
            <a href="../html/contact.php"  class="contact-btn"><h2>Contact Us Here</h2></a>
            <p>Email: support@udhes.com</p>
            <p>Phone: +383 45 000 000</p>
            
        </div>
    </div>
    <hr class="footer-divider">

    <div class="footer-bottom">
        <p>© 2025 Udhës. All rights reserved.</p>
    </div>
</footer>

<script src="../js/contact.js"></script>

</body>
</html>
