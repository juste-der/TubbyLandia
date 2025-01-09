<?php
require __DIR__ . '/includes/db.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Aclonica&family=Bebas+Neue&family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=IBM+Plex+Sans+JP&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Lexend+Deca:wght@100..900&family=Noto+Sans:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <title>Sunshine Dome Hotel - TubbyLandia</title>
</head>

<body>
    <header class="header">
        <img src="images/logo.svg" alt="">
        <h1>SUNSHINE DOME HOTEL &#11088;&#11088;&#11088;&#11088;</h1>
        <h3>TubbyLandia</h3>
    </header>
    <section class="hero-container">
        <div class="slider-wrapper">
            <div class="slider">
                <img id="slide-1" src="images/hero1.avif" alt="Hero slider image 1">
                <img id="slide-2" src="images/hero2.avif" alt="Hero slider image 2">
                <img id="slide-3" src="images/hero3.avif" alt="Hero slider image 3">
                <img id="slide-4" src="images/hero4.avif" alt="Hero slider image 4">
                <img id="slide-5" src="images/hero5.avif" alt="Hero slider image 5">
            </div>
            <div class="slider-nav">
                <a href="#slide-1"></a>
                <a href="#slide-2"></a>
                <a href="#slide-3"></a>
                <a href="#slide-4"></a>
                <a href="#slide-5"></a>
            </div>
        </div>
    </section>
    <div class="booking-heading">
        <h1>Feel the Tubby Magic – Your Perfect Escape Awaits!</h1>
    </div>
    <div class="welcome-heading">
        <p>Nestled in the heart of TubbyLandia, the magical island rumored to be the land of the Teletubbies, the Sunshine Dome Hotel is the premier destination for comfort and nostalgia-filled luxury.</p>
        <p>4-Star Experience: Indulge in a stay so delightful, you’ll think you’re in Teletubbyland itself! Enjoy world-class amenities, cheerful vibes, and service that’ll make you feel like royalty.</p>
    </div>
    <div class="booking-page">
        <div class="room-container">
            <div class="left-container">
                <p class="room-title">Luxury Room</p>
                <div class="gallery-container">
                    <img src="images/luxury_room1.webp" alt="Luxury room image 1">
                    <button class="image-button">
                        <img src="images/img-button.png" alt="Image container button">
                    </button>
                    <div class="gallery-popup">
                        <div class="gallery-content">
                            <span class="close">&times;</span>
                            <div class="gallery-slider">
                                <img id="luxury-room1" src="images/luxury_room1.webp" alt="Luxury room image 1">
                                <img id="luxury-room2" src="images/luxury_room2.webp" alt="Luxury room image 2">
                                <img id="luxury-room3" src="images/luxury_room3.webp" alt="Luxury room image 3">
                                <img id="luxury-room4" src="images/luxury_room4.webp" alt="Luxury room image 4">
                            </div>
                            <div class="gallery-slider-nav">
                                <a href="#luxury-room1"></a>
                                <a href="#luxury-room2"></a>
                                <a href="#luxury-room3"></a>
                                <a href="#luxury-room4"></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="room-details">
                    <div class="room-detail">
                        <img src="images/size.svg" alt="room size icon">
                        <p>72 m²</p>
                    </div>
                    <div class="room-detail">
                        <img src="images/person.svg" alt="room person icon">
                        <p>1</p>
                    </div>
                    <div class="room-detail">
                        <img src="images/bed.svg" alt="room bed icon">
                        <p>King Size</p>
                    </div>
                </div>
                <div class="amenities-container">
                    <div class="amenity">
                        <img src="images/pool.svg" alt="pool icon">
                        <p>Spa Area <br> with Pool</p>
                    </div>
                    <div class="amenity">
                        <img src="images/yatzy.svg" alt="yatzy icon">
                        <p>Yatzy</p>
                    </div>
                    <div class="amenity">
                        <img src="images/minibar.svg" alt="minibar icon">
                        <p>Minibar</p>
                    </div>
                </div>
            </div>
            <div class="right-container">
                <div class="details-container">
                    <div class="details-left">
                        <p class="pay-online">Pay Online <img src="images/card.svg" alt="card icon"></p>
                        <p class="price-info">Price per night</p>
                        <svg xmlns="http://www.w3.org/2000/svg" width="68" height="2" viewBox="0 0 68 2" fill="none">
                            <path d="M0 1.5L67.5 1" stroke="#53350B" stroke-opacity="0.2" />
                        </svg>
                        <p class="cancellation">Free cancellation policy</p>
                    </div>
                    <div class="details-right">
                        <span class="price">$8</span>
                        <button class="availability-button">CHECK AVAILABILITY</button>
                        <div class="booking-popup" data-room-id="3" data-room-price="8">
                            <div class="booking-content">
                                <span class="close">&times;</span>
                                <div class="upper-content">
                                    <p class="date-container">Arrival Date <input type="text" class="arrival-date" placeholder="Select Arrival Date" /></p>
                                    <p class="date-container">Departure Date <input type="text" class="departure-date" placeholder="Select Departure Date" /></p>

                                    <button class="select-button">SELECT</button>
                                    <p class="availability-text">AVAILABLE</p>
                                    <img class="availability-img" src="images/correct.svg" alt="Correct icon">
                                </div>
                                <div class="line-1"></div>
                                <div class="lower-content">
                                    <p>FEATURES</p>
                                    <div class="line-2"></div>
                                    <p class="feature"><input type="checkbox" class="feature-checkbox" data-cost="1" data-name="yatzy"> YATZY &nbsp; 1$</p>
                                    <p class="feature"><input type="checkbox" class="feature-checkbox" data-cost="2" data-name="spa"> SPA AND POOL AREA &nbsp; 2$</p>
                                    <p class="feature"><input type="checkbox" class="feature-checkbox" data-cost="2" data-name="minibar"> FILLED MINIBAR &nbsp; 2$</p>

                                    <div class="total-cost-display">
                                        <p>Total cost: $ <span class="cost-value">0</span></p>
                                    </div>

                                    <div class="transfercode">
                                        <p>TRANSFERCODE</p>
                                        <input type="text" class="transfer-code">
                                        <button class="book-button">BOOK</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="discount-info">Get 30% discount when booking 4 days or more</p>
            </div>

        </div>
        <div class="room-container">
            <div class="left-container">
                <p class="room-title">Standard Room</p>
                <div class="gallery-container">
                    <img src="images/standard_room3.webp" alt="Standard room image">
                    <button class="image-button">
                        <img src="images/img-button.png" alt="Image container button">
                    </button>
                    <div class="gallery-popup">
                        <div class="gallery-content">
                            <span class="close">&times;</span>
                            <div class="gallery-slider">
                                <img id="standard-room1" src="images/standard_room1.webp" alt="Standard room image 1">
                                <img id="standard-room2" src="images/standard_room2.avif" alt="Standard room image 2">
                                <img id="standard-room3" src="images/standard_room3.webp" alt="Standard room image 3">
                                <img id="standard-room4" src="images/standard_room4.webp" alt="Standard room image 4">
                            </div>
                            <div class="gallery-slider-nav">
                                <a href="#standard-room1"></a>
                                <a href="#standard-room2"></a>
                                <a href="#standard-room3"></a>
                                <a href="#standard-room4"></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="room-details">
                    <div class="room-detail">
                        <img src="images/size.svg" alt="room size icon">
                        <p>52 m²</p>
                    </div>
                    <div class="room-detail">
                        <img src="images/person.svg" alt="room person icon">
                        <p>1</p>
                    </div>
                    <div class="room-detail">
                        <img src="images/bed.svg" alt="room bed icon">
                        <p>King Size</p>
                    </div>
                </div>
                <div class="amenities-container">
                    <div class="amenity">
                        <img src="images/pool.svg" alt="pool icon">
                        <p>Spa Area <br> with Pool</p>
                    </div>
                    <div class="amenity">
                        <img src="images/yatzy.svg" alt="yatzy icon">
                        <p>Yatzy</p>
                    </div>
                    <div class="amenity">
                        <img src="images/minibar.svg" alt="minibar icon">
                        <p>Minibar</p>
                    </div>
                </div>
            </div>
            <div class="right-container">
                <div class="details-container">
                    <div class="details-left">
                        <p class="pay-online">Pay Online <img src="images/card.svg" alt="card icon"></p>
                        <p class="price-info">Price per night</p>
                        <svg xmlns="http://www.w3.org/2000/svg" width="68" height="2" viewBox="0 0 68 2" fill="none">
                            <path d="M0 1.5L67.5 1" stroke="#53350B" stroke-opacity="0.2" />
                        </svg>
                        <p class="cancellation">Free cancellation policy</p>
                    </div>
                    <div class="details-right">
                        <span class="price">$4</span>
                        <button class="availability-button">CHECK AVAILABILITY</button>
                        <div class="booking-popup" data-room-id="2" data-room-price="4">
                            <div class="booking-content">
                                <span class="close">&times;</span>
                                <div class="upper-content">
                                    <p class="date-container">Arrival Date <input type="text" class="arrival-date" placeholder="Select Arrival Date" /></p>
                                    <p class="date-container">Departure Date <input type="text" class="departure-date" placeholder="Select Departure Date" /></p>

                                    <button class="select-button">SELECT</button>
                                    <p class="availability-text">AVAILABLE</p>
                                    <img class="availability-img" src="images/correct.svg" alt="Correct icon">
                                </div>
                                <div class="line-1"></div>
                                <div class="lower-content">
                                    <p>FEATURES</p>
                                    <div class="line-2"></div>
                                    <p class="feature"><input type="checkbox" class="feature-checkbox" data-cost="1" data-name="yatzy"> YATZY &nbsp; 1$</p>
                                    <p class="feature"><input type="checkbox" class="feature-checkbox" data-cost="2" data-name="spa"> SPA AND POOL AREA &nbsp; 2$</p>
                                    <p class="feature"><input type="checkbox" class="feature-checkbox" data-cost="2" data-name="minibar"> FILLED MINIBAR &nbsp; 2$</p>

                                    <div class="total-cost-display">
                                        <p>Total cost: $ <span class="cost-value">0</span></p>
                                    </div>

                                    <div class="transfercode">
                                        <p>TRANSFERCODE</p>
                                        <input type="text" class="transfer-code">
                                        <button class="book-button">BOOK</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="discount-info">Get 30% discount when booking 4 days or more</p>
            </div>

        </div>
        <div class="room-container">
            <div class="left-container">
                <p class="room-title">Budget Room</p>
                <div class="gallery-container">
                    <img src="images/budget_room1.webp" alt="Budget room image">
                    <button class="image-button">
                        <img src="images/img-button.png" alt="Image container button">
                    </button>
                    <div class="gallery-popup">
                        <div class="gallery-content">
                            <span class="close">&times;</span>
                            <div class="gallery-slider">
                                <img id="budget-room1" src="images/budget_room1.webp" alt="budget room image 1">
                                <img id="budget-room2" src="images/budget_room2.avif" alt="budget room image 2">
                                <img id="budget-room3" src="images/budget_room3.webp" alt="budget room image 3">
                                <img id="budget-room4" src="images/budget_room4.webp" alt="budget room image 4">
                            </div>
                            <div class="gallery-slider-nav">
                                <a href="#budget-room1"></a>
                                <a href="#budget-room2"></a>
                                <a href="#budget-room3"></a>
                                <a href="#budget-room4"></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="room-details">
                    <div class="room-detail">
                        <img src="images/size.svg" alt="room size icon">
                        <p>32 m²</p>
                    </div>
                    <div class="room-detail">
                        <img src="images/person.svg" alt="room person icon">
                        <p>1</p>
                    </div>
                    <div class="room-detail">
                        <img src="images/bed.svg" alt="room bed icon">
                        <p> &nbsp; &nbsp; 1 Twin &nbsp;</p>
                    </div>
                </div>
                <div class="amenities-container">
                    <div class="amenity">
                        <img src="images/pool.svg" alt="pool icon">
                        <p>Spa Area <br> with Pool</p>
                    </div>
                    <div class="amenity">
                        <img src="images/yatzy.svg" alt="yatzy icon">
                        <p>Yatzy</p>
                    </div>
                    <div class="amenity">
                        <img src="images/minibar.svg" alt="minibar icon">
                        <p>Minibar</p>
                    </div>
                </div>
            </div>
            <div class="right-container">
                <div class="details-container">
                    <div class="details-left">
                        <p class="pay-online">Pay Online <img src="images/card.svg" alt="card icon"></p>
                        <p class="price-info">Price per night</p>
                        <svg xmlns="http://www.w3.org/2000/svg" width="68" height="2" viewBox="0 0 68 2" fill="none">
                            <path d="M0 1.5L67.5 1" stroke="#53350B" stroke-opacity="0.2" />
                        </svg>
                        <p class="cancellation">Free cancellation policy</p>
                    </div>
                    <div class="details-right">
                        <span class="price">$2</span>
                        <button class="availability-button">CHECK AVAILABILITY</button>
                        <div class="booking-popup" data-room-id="1" data-room-price="2">
                            <div class="booking-content">
                                <span class="close">&times;</span>
                                <div class="upper-content">
                                    <p class="date-container">Arrival Date <input type="text" class="arrival-date" placeholder="Select Arrival Date" /></p>
                                    <p class="date-container">Departure Date <input type="text" class="departure-date" placeholder="Select Departure Date" /></p>

                                    <button class="select-button">SELECT</button>
                                    <p class="availability-text">AVAILABLE</p>
                                    <img class="availability-img" src="images/correct.svg" alt="Correct icon">
                                </div>
                                <div class="line-1"></div>
                                <div class="lower-content">
                                    <p>FEATURES</p>
                                    <div class="line-2"></div>
                                    <p class="feature"><input type="checkbox" class="feature-checkbox" data-cost="1" data-name="yatzy"> YATZY &nbsp; 1$</p>
                                    <p class="feature"><input type="checkbox" class="feature-checkbox" data-cost="2" data-name="spa"> SPA AND POOL AREA &nbsp; 2$</p>
                                    <p class="feature"><input type="checkbox" class="feature-checkbox" data-cost="2" data-name="minibar"> FILLED MINIBAR &nbsp; 2$</p>

                                    <div class="total-cost-display">
                                        <p>Total cost: $ <span class="cost-value">0</span></p>
                                    </div>

                                    <div class="transfercode">
                                        <p>TRANSFERCODE</p>
                                        <input type="text" class="transfer-code">
                                        <button class="book-button">BOOK</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="discount-info">Get 30% discount when booking 4 days or more</p>
            </div>

        </div>
    </div>
    <script src="script/script.js"></script>
</body>

</html>