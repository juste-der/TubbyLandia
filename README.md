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
