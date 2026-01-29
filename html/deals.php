<?php
session_start();
include_once '../includes/Database.php';
include_once '../classes/Deal.php';

$db = new Database();
$dealObj = new Deal($db->getConnection());

$allDeals = $dealObj->readAll(); 
$deals = $allDeals->fetchAll(PDO::FETCH_ASSOC);

$sort = $_GET['sort'] ?? 'default';
$allDeals = $dealObj->readAll($sort); 
$deals = $allDeals->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Udhës | Best Deals</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/general.css">
    <link rel="stylesheet" href="../css/deals.css">
</head>
<body>

<div class="header">
    <div class="left-section">
        <a href="home.php"><img src="../images/udhes.png" id="logo"></a>
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
            <button class="middle-button" id="deals-button" style="box-shadow:0 0 0 2px #ff7f50;">
                <img src="../images/tag.svg" id="deals-icon">
                Deals
            </button>
        </a>
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

<section class="slideshow-container">
    <img src="../images/switzerland.jpg" id="slideshow" alt="Travel deals banner">
    <div class="featured-title">
       <h1 class="title">Exclusive Travel Deals</h1>
        <p class="deals-intro">
            Limited-time offers on hand-picked destinations.
            Updated daily. Book early for the best prices.
        </p> 
    </div>   
</section>

<section class="stats">
    <div style="display:flex; gap:40px; flex-wrap:wrap; text-align:center;">
        <div>
            <h1>10,000+</h1>
            <p>Happy travelers</p>
        </div>
        <div>
            <h1>500+</h1>
            <p>Verified deals</p>
        </div>
        <div>
            <h1>30+</h1>
            <p>Countries covered</p>
        </div>
        <div>
            <h1>24/7</h1>
            <p>Customer support</p>
        </div>
    </div>
</section>

<section class="featured-section">
    <h2>Find the Best Deal for You</h2>

    <div class="controls">
        <select id="filterCategory">
            <option value="all">All categories</option>
            <option value="city">City Break</option>
            <option value="beach">Beach</option>
        </select>

        <select id="sortPrice" onchange="location = this.value;">
            <option value="deals.php?sort=default" <?php echo $sort == 'default' ? 'selected' : ''; ?>>Sort by</option>
            <option value="deals.php?sort=low" <?php echo $sort == 'low' ? 'selected' : ''; ?>>Price: Low → High</option>
            <option value="deals.php?sort=high" <?php echo $sort == 'high' ? 'selected' : ''; ?>>Price: High → Low</option>
        </select>
    </div>
    
    <div id="dealsGrid" class="deals-grid">
        <?php if (count($deals) > 0): ?>
            <?php foreach ($deals as $deal): ?>
                <div class="featured-card">
                    <img src="../images/<?php echo htmlspecialchars($deal['image_url']); ?>" class="featured-image">
                    <div class="featured-info">
                        <h3><?php echo htmlspecialchars($deal['title']); ?></h3>
                        <p><?php echo htmlspecialchars($deal['description']); ?></p>
                        <h4 class="price">€<?php echo number_format($deal['price'], 2); ?>/night</h4>
                        
                        <p style="font-size: 11px; color: #999; margin-top: 10px; border-top: 1px solid #eee; padding-top: 5px;">
                            Postuar nga: <?php echo htmlspecialchars($deal['admin_name']); ?>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p style="grid-column: 1 / -1; text-align: center; padding: 50px;">Nuk ka oferta në databazë për momentin.</p>
        <?php endif; ?>
    </div>
    <section class="featured-section" style="background:#fff3ee; border-radius:16px;">
        <h2 style="text-align: center;">⏳ Last-Minute Deals</h2>
        <p style="color:#666;">
            These deals expire soon. Prices may increase at any time.
        </p>
        <p style="font-weight:bold; color:#ff7f50;">
            Average savings: 20-40%
        </p>
    </section>
</section>

<section class="featured-section seasonal-bars">
    <h2 class="seasonal-title">Seasonal Offers</h2>
    <p class="seasonal-subtitle">
        Carefully curated deals for the best time to travel.
    </p>

    <div class="seasonal-row">
        <div class="season-bar">
            <div class="season-text">
                <h3>Summer Escapes</h3>
                <p>Beach resorts and islands with up to 35% off.</p>
            </div>
            <button class="season-btn">Learn more</button>
        </div>

        <div class="season-bar">
            <div class="season-text">
                <h3>Spring City Breaks</h3>
                <p>Flexible bookings with free cancellation.</p>
            </div>
            <button class="season-btn">Learn more</button>
        </div>

        <div class="season-bar">
            <div class="season-text">
                <h3>Winter Wellness</h3>
                <p>Spa hotels, mountain retreats, and cozy stays.</p>
            </div>
            <button class="season-btn">Learn more</button>
        </div>
    </div>
</section>

<section class="featured-section how-it-works">
    <h2>How Udhës Deals Work</h2>

    <div class="steps">
        <div>
            <strong>01</strong>
            <p>We negotiate exclusive prices with trusted partners.</p>
        </div>

        <div>
            <strong>02</strong>
            <p>Each deal is verified using ratings and reviews.</p>
        </div>

        <div>
            <strong>03</strong>
            <p>You book securely with transparent pricing.</p>
        </div>

        <div>
            <strong>04</strong>
            <p>You save money without sacrificing comfort.</p>
        </div>
    </div>
</section>



<section class="featured-section">
    <h2>What Travelers Say</h2>

    <div class="featured-grid">
        <div class="featured-card">
            <div class="featured-info">
                <img src="../images/person3.jpg" alt="">
                <p>“Saved over €200 on a Rome trip. Smooth and simple booking.”</p>
                <strong>- Arber K.</strong>
            </div>
        </div>

        <div class="featured-card">
            <div class="featured-info">
                <img src="../images/person2.jpg" alt="">
                <p>“Perfect for spontaneous travel. Found a deal in minutes.”</p>
                <strong>- Elira M.</strong>
            </div>
        </div>

        <div class="featured-card">
            <div class="featured-info">
                <img src="../images/person1.jpg" alt="">
                <p>“Clean UI, honest prices, no surprises.”</p>
                <strong>- Daniel R.</strong>
            </div>
        </div>
    </div>
</section>


<section class="newsletter">
    <h2>📩 Deal Alerts</h2>
    <p>Get notified when new discounts drop.</p>
    <div class="newsletter-box">
        <input type="email" placeholder="Email address">
        <button class="login-button" style="border: 0;"> Subscribe</button>
    </div>
</section>

<section class="featured-section" style="text-align:center;">
    <h2>Ready to book your next trip?</h2>
    <p style="color:#666;">Explore exclusive deals before they're gone.</p>
    <a href="login.php" class="login-button">Start With Us</a>
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

<!-- <script src="../js/deals.js"></script> -->
</body>
</html>