<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

include_once '../includes/Database.php';
include_once '../classes/Accommodation.php';
include_once '../classes/Flight.php';
include_once '../classes/Deal.php';

$db = new Database();
$conn = $db->getConnection();

$accomObj = new Accommodation($conn);
$flightObj = new Flight($conn);
$dealObj = new Deal($conn);

$accomResult = $accomObj->getAllActive();
$accommodations = $accomResult->fetchAll(PDO::FETCH_ASSOC);

$flightResult = $flightObj->getAllActive();
$flights = $flightResult->fetchAll(PDO::FETCH_ASSOC);

$allDeals = $dealObj->readAll(); 
$deals = $allDeals->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Udhës | Accomodations for you</title>
    <link rel="stylesheet" href="../css/general.css">
    <link rel="stylesheet" href="../css/flights.css">
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
                <span class="user-greeting" style="margin-right: 15px; color: #ff7f50; ">
                    Hi, <?php echo htmlspecialchars($_SESSION['email']); ?>
                </span>
                <a href="logout.php" class="login-button" style="background-color: #ff7f50;">Log Out</a>
            <?php else: ?>
                <a href="login.php" class="login-button">Log In</a>
            <?php endif; ?>
        </div>
    </div>

   <div class="photo-container">
        <div class="inner-container">
            <div class="intro-text">
                <h1>Start your adventure with us!</h1>
                <p>Where are you headed this time?</p>
            </div>
            <div class="radio-buttons-group">
                <div class="radio-buttons">
                <input type="radio" id="one-way">
                <label>One-way</label>
            </div>
            <div class="radio-buttons">
                <input type="radio" id="round-trip"> 
                <label>Round-trip</label>
            </div>
            </div>
            <div class="search-box">
                <div id="from-to">
                    <div class="search-field" id="from">
                        <label>From</label>
                        <input type="text" id="locationInput" placeholder="Enter Departure">
                    </div>
                    <div class="two-way">
                        <img src="../images/two-way.png">
                    </div>
                    <div class="search-field" id="to">
                        <label>To</label>
                        <input type="text" id="locationInput" placeholder="Enter Destination">
                    </div>
                </div>
                <div class="search-field">
                    <label>Departure Date</label>
                    <input type="date" id="checkinInput">
                </div>
                <div class="search-field">
                    <label>Return Date</label>
                    <input type="date" id="checkoutInput">
                </div>
                <div class="search-group-bottom">
                    <div class="search-field" id="travelers">
                        <label>Travelers</label>
                        <input type="number" id="guestsInput" min="1" value="2" size="5">
                    </div>
                    <button class="search-button" onclick="searchProperties()">Search</button>
                </div>
            </div>
        </div>
    </div>

    <section class="page-body">
        <section class="featured-cards">
            <h2>Accommodations For You</h2>
            <div class="featured-grid">
                <?php if (count($accommodations) > 0): ?>
                    <?php foreach ($accommodations as $acc): ?>
                        <div class="featured-card">
                            <img src="../images/<?= htmlspecialchars($acc['image']) ?>" 
                                class="featured-image" 
                                alt="<?= htmlspecialchars($acc['name']) ?>">
                            <div class="featured-info">
                                <h3><?= htmlspecialchars($acc['name']) ?></h3>
                                <p class="location"><?= htmlspecialchars($acc['location']) ?></p>
                                <p class="price">€<?= number_format($acc['price'], 0) ?>/night</p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p style="text-align:center; padding:40px; color:#777;">
                        No accommodations available right now.
                    </p>
                <?php endif; ?>
            </div>
        </section>

        <section class="featured-cards">
            <div class="flights-title">
                <h2>Featured Flights</h2>
            </div>
            <div class="featured-grid">
                <?php if (count($flights) > 0): ?>
                    <?php foreach ($flights as $flight): ?>
                        <div class="featured-card">
                            <img src="../images/<?= htmlspecialchars($flight['image']) ?>" 
                                class="featured-image" 
                                alt="<?= htmlspecialchars($flight['name']) ?>">
                            
                            <div class="featured-info">
                                <h3><?= htmlspecialchars($flight['name']) ?></h3>
                                <p class="location"><?= htmlspecialchars($flight['airline']) ?></p>
                                <p class="ticket-type">
                                    <?= $flight['ticket_type'] === 'round-trip' ? 'Round-trip' : 'One-way' ?>
                                </p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p style="text-align:center; padding:40px; color:#777;">
                        No featured flights at the moment.
                    </p>
                <?php endif; ?>
            </div>
        </section>

        <section class="featured-deals">
            <div class="deals-container">
                <div class="deals-title">
                    <h2>Hot Deals for You</h2>
                </div>
                
                <div class="deals-grid">
                    <?php if (count($deals) > 0): ?>
                        <?php foreach ($deals as $deal): ?>
                            <div class="featured-card">
                                <img src="../images/<?php echo htmlspecialchars($deal['image_url']); ?>" class="featured-image">
                                <div class="featured-info">
                                    <h3><?php echo htmlspecialchars($deal['title']); ?></h3>
                                    <p class="description"><?php echo htmlspecialchars($deal['description']); ?></p>
                                    <h4 class="price">€<?php echo number_format($deal['price'], 2); ?>/night</h4>
                                    
                                    <p style="font-size: 11px; color: #999; margin-top: 10px; border-top: 1px solid #eee; padding-top: 5px;">
                                        Posted by: <?php echo htmlspecialchars($deal['admin_name']); ?>
                                    </p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p style="text-align: center; padding: 50px;">No featured deals at the moment.</p>
                    <?php endif; ?>
                </div>
            </div>
        </section>
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

    <script src="../js/script.js"></script>

</body>
</html>