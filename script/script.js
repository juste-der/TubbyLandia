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

  flatpickr(".arrival-date", {
    minDate: "2025-01-01",
    maxDate: "2025-01-31",
    dateFormat: "Y-m-d",
  });

  flatpickr(".departure-date", {
    minDate: "2025-01-01",
    maxDate: "2025-01-31",
    dateFormat: "Y-m-d",
  });

  function calculateTotalCost(parent) {
    const roomPrice = parseFloat(parent.getAttribute("data-room-price"));
    const arrivalDate = parent.querySelector(".arrival-date").value;
    const departureDate = parent.querySelector(".departure-date").value;

    if (!arrivalDate || !departureDate) {
      return 0;
    }

    const startDate = new Date(arrivalDate);
    const endDate = new Date(departureDate);
    const numberOfDays = Math.ceil(
      (endDate - startDate) / (1000 * 60 * 60 * 24)
    );

    if (numberOfDays <= 0) {
      return 0;
    }

    let roomCost = numberOfDays * roomPrice;

    if (numberOfDays >= 4) {
      roomCost *= 0.7; // Apply 30% discount
    }

    let featureCost = 0;
    parent.querySelectorAll(".feature-checkbox:checked").forEach((checkbox) => {
      featureCost += parseFloat(checkbox.getAttribute("data-cost"));
    });

    const totalCost = roomCost + featureCost;

    const costValueElement = parent.querySelector(".cost-value");
    if (costValueElement) {
      costValueElement.textContent = totalCost.toFixed(2);
    }

    return totalCost;
  }

  document.querySelectorAll(".select-button").forEach((button) => {
    button.addEventListener("click", function () {
      const parent = button.closest(".booking-popup");
      const arrivalDate = parent.querySelector(".arrival-date").value;
      const departureDate = parent.querySelector(".departure-date").value;
      const roomId = parent.getAttribute("data-room-id");

      if (!arrivalDate || !departureDate) {
        alert("Please select both arrival and departure dates.");
        return;
      }

      fetch("includes/availability.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
          room_id: roomId,
          arrival_date: arrivalDate,
          departure_date: departureDate,
        }),
      })
        .then((response) => response.json())
        .then((data) => {
          const availabilityText = parent.querySelector(".availability-text");
          const availabilityImg = parent.querySelector(".availability-img");

          if (data.available) {
            availabilityText.textContent = "AVAILABLE";
            availabilityImg.src = "images/correct.svg";

            calculateTotalCost(parent);
          } else {
            availabilityText.textContent = "NOT AVAILABLE";
            availabilityImg.src = "images/wrong.svg";

            const costValueElement = parent.querySelector(".cost-value");
            if (costValueElement) {
              costValueElement.textContent = "0.00";
            }
          }
        })
        .catch((error) => {
          console.error("Error checking availability:", error);
          alert(
            "An error occurred while checking availability. Please try again."
          );
        });
    });
  });

  document.querySelectorAll(".feature-checkbox").forEach((checkbox) => {
    checkbox.addEventListener("change", function () {
      const parent = this.closest(".booking-popup");
      calculateTotalCost(parent);
    });
  });

  document.querySelectorAll(".book-button").forEach((button) => {
    button.addEventListener("click", function () {
      const parent = button.closest(".booking-popup");
      const roomId = parent.getAttribute("data-room-id");
      const arrivalDate = parent.querySelector(".arrival-date").value;
      const departureDate = parent.querySelector(".departure-date").value;
      const transferCode = parent.querySelector(".transfer-code").value;

      if (!arrivalDate || !departureDate || !transferCode) {
        alert("Please fill in all required fields.");
        return;
      }

      const totalCost = calculateTotalCost(parent);

      const features = Array.from(
        parent.querySelectorAll(".feature-checkbox:checked")
      ).map((checkbox) => ({
        name: checkbox.getAttribute("data-name"),
        cost: parseFloat(checkbox.getAttribute("data-cost")),
      }));

      fetch("includes/book.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
          room_id: roomId,
          arrival_date: arrivalDate,
          departure_date: departureDate,
          transfer_code: transferCode,
          total_cost: totalCost,
          features,
          number_of_days: Math.ceil(
            (new Date(departureDate) - new Date(arrivalDate)) /
              (1000 * 60 * 60 * 24)
          ),
        }),
      })
        .then((response) => response.json())
        .then((data) => {
          if (data.success) {
            alert("Booking successful!");
            location.reload();
          } else {
            alert("Booking failed: " + data.message);
          }
        })
        .catch((error) => {
          console.error("Error making booking:", error);
          alert("An error occurred. Please try again.");
        });
    });
  });
});
