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

  document.querySelectorAll(".select-button").forEach((button) => {
    button.addEventListener("click", function () {
      const parent = button.closest(".booking-popup");
      const arrivalDate = parent.querySelector("#arrival-date").value;
      const departureDate = parent.querySelector("#departure-date").value;
      const roomId = parent.getAttribute("data-room-id");

      if (!arrivalDate || !departureDate) {
        alert("Please select both arrival and departure dates.");
        return;
      }

      fetch("../includes/availability.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
          room_id: roomId,
          arrival_date: arrivalDate,
          departure_date: departureDate,
        }),
      })
        .then((response) => response.text()) // Use .text() to capture the raw response
        .then((data) => {
          console.log("Raw response:", data);
        })
        .catch((error) => {
          console.error("Error checking availability:", error);
        });

      //   fetch("../includes/availability.php", {
      //     method: "POST",
      //     headers: { "Content-Type": "application/json" },
      //     body: JSON.stringify({
      //       room_id: roomId,
      //       arrival_date: arrivalDate,
      //       departure_date: departureDate,
      //     }),
      //   })
      //     .then((response) => response.json())
      //     .then((data) => {
      //       const availabilityText = parent.querySelector("#availability-text");
      //       const availabilityImg = parent.querySelector("#availability-img");

      //       if (data.available) {
      //         availabilityText.textContent = "AVAILABLE";
      //         availabilityImg.src = "/images/correct.svg";
      //       } else {
      //         availabilityText.textContent = "NOT AVAILABLE";
      //         availabilityImg.src = "/images/wrong.svg";
      //       }
      //     })
      //     .catch((error) => {
      //       console.error("Error checking availability:", error);
      //       alert(
      //         "An error occurred while checking availability. Please try again."
      //       );
      //     });
    });
  });
});
