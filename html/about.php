<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Udhës | About Us</title>
    <link rel="stylesheet" href="../css/general.css">
    <link rel="stylesheet" href="../css/about.css">

</head>
<body>
    <div class="header">
        <div class="left-section">
            <a href="home.php" style="text-decoration: none;"><img src="../images/udhes.png" id="logo" ></a>
        </div>

        <div class="middle-section">
            <a href="home.php" style="text-decoration: none;">
            <button class="middle-button" id="stays-button">
                <img src="../images/bed.svg" id="stays-icon">
                <label>Stays</label>
            </button></a>
            <a href="flights.php" style="text-decoration: none;">
            <button class="middle-button" id="flights-button">
                <img src="../images/plane.svg" id="flights-icon"> Flights
            </button></a>
            <a href="deals.php" style="text-decoration: none;">
            <button class="middle-button" id="deals-button">
                <img src="../images/tag.svg" id="deals-icon"> Deals
            </button></a>
        </div>

        <div class="right-section">
            <?php if (isset($_SESSION['user_id'])): ?>
                <span style="margin-right: 15px; color: #d8582a; ">
                    Hi, <?php echo htmlspecialchars($_SESSION['email']); ?>
                </span>
                <a href="logout.php" class="login-button" style="background-color: #ff4757;">Log Out</a>
            <?php else: ?>
                <a href="login.php" class="login-button">Log In</a>
            <?php endif; ?>
        </div>
    </div>

    <section class="hero-section">
        <div class="hero-content">
            <h1>Our Journey, Your Adventures</h1>
            <p>Udhës was born from a simple idea: travel should be accessible, authentic, and unforgettable for everyone.</p>
            <a href="deals.php" class="login-button" style="background-color: #ff7f50; padding: 15px 40px; font-size: 1.2rem;">Explore Our Deals</a>
        </div>
    </section>

    <section class="our-story">
    <h2>Our Story</h2>
    <div class="timeline-container">
        <div class="timeline-grid">
            <div class="timeline-card">
                <div class="timeline-image">
                    <img src="../images/colosseum.jpg" alt="Colosseum - Our Beginning">
                </div>
                <div class="timeline-year">2018</div>
                <div class="timeline-text">
                    <p>Founded by travel enthusiasts in Prishtina with a vision to transform how people discover and book travel experiences.</p>
                </div>
            </div>
            
            <div class="timeline-card">
                <div class="timeline-image">
                    <img src="../images/acropolis.jpg" alt="Acropolis - Our Growth">
                </div>
                <div class="timeline-year">2020</div>
                <div class="timeline-text">
                    <p>Expanded to serve travelers across Europe, forming partnerships with over 500 trusted accommodation providers.</p>
                </div>
            </div>
            
            <div class="timeline-card">
                <div class="timeline-image">
                    <img src="../images/eiffeltower.jpg" alt="Eiffel Tower - Today">
                </div>
                <div class="timeline-year">Today</div>
                <div class="timeline-text">
                    <p>Helping over 10,000 travelers monthly discover amazing destinations with exclusive deals and personalized service.</p>
                </div>
            </div>
        </div>
    </div>
</section>

    <section class="mission-values">
        <h2 style="text-align: center; font-size: 45px; margin-bottom: 20px;">Our Mission & Values</h2>
        <p style="text-align: center; max-width: 700px; margin: 20px auto; color: #555;">
            We're committed to making travel more accessible while maintaining the highest standards of quality and service.
        </p>
        
        <div class="values-grid">
            <div class="value-card">
                <strong>01</strong>
                <h3>Authentic Experiences</h3>
                <p>We carefully select partners who share our passion for genuine hospitality and unique travel experiences.</p>
            </div>
            <div class="value-card">
                <strong>02</strong>
                <h3>Transparent Pricing</h3>
                <p>No hidden fees, no surprises. What you see is what you pay, with honest value for your money.</p>
            </div>
            <div class="value-card">
                <strong>03</strong>
                <h3>Sustainable Travel</h3>
                <p>We promote eco-friendly accommodations and responsible tourism practices to protect our planet.</p>
            </div>
            <div class="value-card">
                <strong>04</strong>
                <h3>Customer First</h3>
                <p>Your journey matters to us. Our dedicated support team is available 24/7 to ensure your travel dreams become reality.</p>
            </div>
        </div>
    </section>

    <section class="stats-highlight">
        <h2>By The Numbers</h2>
        <div class="stats-container">
            <div class="stat-item">
                <h1>10,000+</h1>
                <p>Happy travelers</p>
            </div>
            <div class="stat-item">
                <h1>500+</h1>
                <p>Verified partners</p>
            </div>
            <div class="stat-item">
                <h1>30+</h1>
                <p>Countries covered</p>
            </div>
            <div class="stat-item">
                <h1>24/7</h1>
                <p>Customer support</p>
            </div>
        </div>
    </section>

    <section class="team-section">
        <h2 style="text-align: center; font-size: 45px; margin-bottom: 20px;">Meet Our Team</h2>
        <p style="text-align: center; max-width: 700px; margin: 20px auto; color: #555;">
            Passionate travelers dedicated to crafting exceptional experiences for you
        </p>
        
        <div class="team-grid">
            <div class="team-member">
                <img src="../images/person1.jpg" alt="Team Member">
                <div class="team-info">
                    <h3>Arber Krasniqi</h3>
                    <p>CEO & Founder</p>
                    <p>Former travel journalist with a passion for discovering hidden gems across the Balkans and beyond.</p>
                </div>
            </div>
            <div class="team-member">
                <img src="../images/person2.jpg" alt="Team Member">
                <div class="team-info">
                    <h3>Elira Berisha</h3>
                    <p>Head of Partnerships</p>
                    <p>Builds relationships with exceptional properties to bring you the best deals and unique stays.</p>
                </div>
            </div>
            <div class="team-member">
                <img src="../images/person3.jpg" alt="Team Member">
                <div class="team-info">
                    <h3>Daniel Rexhepi</h3>
                    <p>Lead Experience Designer</p>
                    <p>Ensures every interaction with Udhës is intuitive, enjoyable, and makes travel planning effortless.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="featured-section" style="background:#fff; padding: 60px 20px; margin-top: 40px;">
        <h2 style="text-align: center;">What Travelers Say</h2>
        <div class="featured-grid">
            <div class="featured-card">
                <div class="featured-info">
                    <img src="../images/person3.jpg" alt="">
                    <p>"Udhës helped me discover a beautiful family-run guesthouse in the Albanian Alps that I would have never found on my own. The personal touch makes all the difference!"</p>
                    <strong>- Arber K.</strong>
                </div>
            </div>

            <div class="featured-card">
                <div class="featured-info">
                    <img src="../images/person2.jpg" alt="">
                    <p>"As a frequent traveler, I appreciate Udhës' commitment to transparent pricing. No hidden fees, no surprises - just great deals on amazing places to stay."</p>
                    <strong>- Elira M.</strong>
                </div>
            </div>

            <div class="featured-card">
                <div class="featured-info">
                    <img src="../images/person1.jpg" alt="">
                    <p>"The customer support team went above and beyond when my flight was canceled. They helped me find a new place to stay at midnight. Truly exceptional service!"</p>
                    <strong>- Daniel R.</strong>
                </div>
            </div>
        </div>
    </section>

    <section class="cta-section">
        <h2>Ready to Create Your Travel Story?</h2>
        <p>Join thousands of satisfied travelers who have discovered the joy of seamless travel planning with Udhës.</p>
        <a href="deals.php" class="login-button">Find Your Perfect Deal</a>
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
    </footer>
</body>
</html>