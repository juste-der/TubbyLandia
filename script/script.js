document.addEventListener("DOMContentLoaded", function () {
  const galleryPopups = document.querySelectorAll(".gallery-popup");
  const galleryButtons = document.querySelectorAll(".image-button");

  const bookingPopups = document.querySelectorAll(".booking-popup");
  const bookingButtons = document.querySelectorAll(".availability-button");

  function setupPopups(buttons, popups) {
    buttons.forEach((button, index) => {
      const popup = popups[index];
      button.addEventListener("click", function () {
        if (popup) {
          popup.style.display = "block";
        }
      });

      const closeBtn = popup.querySelector(".close");
      closeBtn.addEventListener("click", function () {
        popup.style.display = "none";
      });

      window.addEventListener("click", function (event) {
        if (event.target === popup) {
          popup.style.display = "none";
        }
      });
    });
  }

  setupPopups(galleryButtons, galleryPopups);
  setupPopups(bookingButtons, bookingPopups);

  flatpickr("#arrival-date", {
    minDate: "2025-01-01",
    maxDate: "2025-01-31",
    dateFormat: "Y-m-d",
  });

  flatpickr("#departure-date", {
    minDate: "2025-01-01",
    maxDate: "2025-01-31",
    dateFormat: "Y-m-d",
  });
});

// document.addEventListener("DOMContentLoaded", function () {
//   const galleryButtons = document.querySelectorAll(".image-button");
//   const galleryPopups = document.querySelectorAll(".gallery-popup");

//   const bookingButtons = document.querySelectorAll(".availability-button");
//   const bookingPopups = document.querySelectorAll(".booking-popup");

//   // Function to handle popups
//   function setupPopups(buttons, popups) {
//     buttons.forEach((button, index) => {
//       const popup = popups[index];

//       // Ensure popup exists
//       if (!popup) {
//         console.error(`Popup not found for button at index ${index}`);
//         return;
//       }

//       // Open popup on button click
//       button.addEventListener("click", function () {
//         popup.style.display = "block";
//       });

//       // Close popup on clicking the close button
//       const closeBtn = popup.querySelector(".close");
//       if (closeBtn) {
//         closeBtn.addEventListener("click", function () {
//           popup.style.display = "none";
//         });
//       }

//       // Close popup when clicking outside
//       window.addEventListener("click", function (event) {
//         if (event.target === popup) {
//           popup.style.display = "none";
//         }
//       });
//     });
//   }

//   // Initialize popups
//   setupPopups(galleryButtons, galleryPopups);
//   setupPopups(bookingButtons, bookingPopups);

//   // Initialize Flatpickr for booking popup date fields
//   flatpickr("#arrival-date", {
//     minDate: "2025-01-01", // Start of January 2025
//     maxDate: "2025-01-31", // End of January 2025
//     dateFormat: "Y-m-d", // Format as Year-Month-Day
//   });

//   flatpickr("#departure-date", {
//     minDate: "2025-01-01", // Start of January 2025
//     maxDate: "2025-01-31", // End of January 2025
//     dateFormat: "Y-m-d", // Format as Year-Month-Day
//   });
// });
