# Sunshine Dome Hotel Booking System

# Overview

The Sunshine Dome Hotel Booking System is a dynamic web application designed for users to book rooms in the TubbyLandia Sunshine Dome Hotel. The application allows users to:
• Check room availability.• Customize bookings with additional features.
• Calculate total costs for selected dates and features.
• Confirm bookings with a central bank integration for secure transactions.
• View a JSON-based confirmation page upon successful booking.

# Features

Room Availability Check:
• Users can select arrival and departure dates.
• The system verifies room availability for the selected dates.
Dynamic Cost Calculation:
• Total costs are calculated based on the number of nights and additional selected features (e.g., minibar, spa, yatzy).
Central Bank Integration:
• Secure booking and payment validation using a transfer code.
JSON-Based Booking Confirmation:
• A JSON response displays the booking details after successful payment and booking confirmation.
Interactive Design:
• Modern UI with features like image galleries and pop-ups for booking.

Technology Stack 1. Frontend: HTML, CSS, JavaScript.Flatpickr for date selection. 2. Backend: PHP for server-side logic. SQLite for the database. Guzzle for Central Bank API integration. 3. APIs: Central Bank API for payment validation and deposits.

# Installation

    1.	Clone the repository: https://github.com/juste-der/TubbyLandia.git

# How It Works

    1.	Checking Availability:
    •	Users select arrival and departure dates.
    •	The system sends a request to availability.php to check room availability.
    2.	Booking Process:
    •	Users select room and additional features.
    •	A booking request is sent to book.php.
    •	The server validates the transfer code with the Central Bank API.
    •	The booking details are stored in the database.
    3.	Confirmation Page:
    •	Upon successful booking, the user is redirected to confirmation.php.
    •	The page displays a JSON response with booking details.

# License

This project is licensed under the MIT License. See the LICENSE file for details.

# Code Review

## ## Feedback by [maxjvjohansson]

1. **Root Directory**  
   The `.DS_Store` file is not ignored by `.gitignore`, which could potentially expose sensitive directory information and be exploited in attacks. Make sure to add it to `.gitignore`.

2. **Includes Directory/Config Directory**  
   Consider storing sensitive data, such as database credentials, in a `.env` file. Additionally, ensure `.env` is listed in your `.gitignore` to prevent it from being committed to version control.

3. **index.html**  
   The file has good readability and structure. However, for better accessibility, you should replace some `<div>` elements with semantic HTML elements like `<section>` or `<article>` where appropriate.

4. **Includes Directory**  
   The `test_api.php` file appears to be a test file that doesn’t serve any purpose in the live environment. It can likely be removed to avoid unnecessary clutter.

5. **api.php**  
   The use of `'base_uri' => 'https://www.yrgopelago.se/centralbank/'` is clean and organized. However, some endpoints, such as `islands` and `withdraw`, are unused throughout the codebase, (the only used endpoints are transferCode and deposit). These could probably be removed without causing issues. On a positive note, organizing these endpoints in functions is a good practice.

6. **CSS**  
   The structure of the stylesheets is commendable, as they are divided into multiple files. However, consider being more consistent by using only one unit type (e.g., `rem` or `px`) for font sizes to maintain a DRY (Don’t Repeat Yourself) approach.

7. **script.js:180-194**  
   While displaying an alert for the receipt is a good start, it would be better UX to print the JSON in a new window instead of using `console.log` on the live server.

8. **book.php**  
   The user input you are receiving should be sanitized before further processing to prevent potential exploits. On the positive side, using placeholders in your queries is a good practice.

9. **Side note**  
   Adding more comments to your code could improve its readability and maintainability.

## Conclusion  
Overall, the project has a good and clean structure. With these suggested improvements, it could be even better.


