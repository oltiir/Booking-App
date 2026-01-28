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
            <a href="/html/login.php" class="login-button" >Log In</a>
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
                <div class="search-field" id="from">
                    <label>From</label>
                    <input type="text" id="locationInput" placeholder="Enter Departure">
                </div>
                <div class="two-way">
                    <img src="../images/two-way.png">
                </div>
                <div class="search-field">
                    <label>To</label>
                    <input type="text" id="locationInput" placeholder="Enter Destination">
                </div>
                <div class="search-field">
                    <label>Departure Date</label>
                    <input type="date" id="checkinInput">
                </div>
                <div class="search-field">
                    <label>Return Date</label>
                    <input type="date" id="checkoutInput">
                </div>
                <div class="search-field">
                    <label>Travelers</label>
                    <input type="number" id="guestsInput" min="1" value="2" size="5">
                </div>
                <button class="search-button" onclick="searchProperties()">Search</button>
            </div>
        </div>
    </div>

    <section class="featured-section">
        <h2>Popular Landmarks to Visit</h2>

        <div class="featured-grid">
            <div class="featured-card">
                <img src="../images/eiffeltower.jpg" class="featured-image">
                <div class="featured-info">
                    <h3>The Eiffel Tower</h3>
                    <p>Paris, France</p>
                </div>
            </div>

            <div class="featured-card">
                <img src="../images/colosseum.jpg" class="featured-image">
                <div class="featured-info">
                    <h3>Colosseum</h3>
                    <p class="location">Rome, Italy</p>
                </div>
            </div>

            <div class="featured-card">
                <img src="../images/acropolis.jpg" class="featured-image">
                <div class="featured-info">
                    <h3>Acropolis</h3>
                    <p>Athens, Greece</p>
                </div>
            </div>
        </div>
    </section>

    <section class="featured-section">
        <h2>Accomodations For You</h2>

        <div class="featured-grid">
            <div class="featured-card">
                <img src="../images/hotel1.jpg" class="featured-image">
                <div class="featured-info">
                    <h3>Hotel Santa Maria</h3>
                    <p class="location">#6 of 1,150 hotels in Rome, Italy</p>
                </div>
            </div>

            <div class="featured-card">
                <img src="../images/hotel2.jpg" class="featured-image">
                <div class="featured-info">
                    <h3>Apanemo Hotel & Suites</h3>
                    <p class="location">#1 of 21 hotels in Akrotiri, Greece</p>
                </div>
            </div>

            <div class="featured-card">
                <img src="../images/hotel3.jpg" class="featured-image">
                <div class="featured-info">
                    <h3>Hotel de Londres Eiffel</h3>
                    <p class="location">#6 of 1,873 hotels in Paris, France</p>
                </div>
            </div>
        </div>
    </section>

    <section class="featured-section">
        <div class="deals-title">
            <h2 class="deals-title">Hot Deals for You</h2>
            <a href="/html/deals.php">See more...</a>
        </div>

        <div class="featured-grid">
            <div class="featured-card">
                <img src="../images/paris2.jpg" class="featured-image">
                <div class="featured-info">
                    <h3>Paris</h3>
                    <h4 class="price">€129/night</h4>
                </div>
            </div>

            <div class="featured-card">
                <img src="../images/vienna.jpg" class="featured-image">
                <div class="featured-info">
                    <h3>Vienna</h3>
                    <h4 class="price">€199/night</h4>
                </div>
            </div>

            <div class="featured-card">
                <img src="../images/istanbul.jpg" class="featured-image">
                <div class="featured-info">
                    <h3>Istanbul</h3>
                    <h4 class="price">€115/night</h4>
                </div>
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
                <h2>Support</h2>
                <p>Help Center</p>
                <p>Safety information</p>
            </div>

            <div class="footer-section">
                <h2>Contact</h2>
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