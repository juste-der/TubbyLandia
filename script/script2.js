//feature addin of booking funkar

// document.addEventListener("DOMContentLoaded", function () {
//   const galleryPopups = document.querySelectorAll(".gallery-popup");
//   const galleryButtons = document.querySelectorAll(".image-button");

//   const bookingPopups = document.querySelectorAll(".booking-popup");
//   const bookingButtons = document.querySelectorAll(".availability-button");

//   function setupPopups(buttons, popups) {
//     buttons.forEach((button, index) => {
//       const popup = popups[index];
//       button.addEventListener("click", function () {
//         if (popup) {
//           popup.style.display = "block";
//         }
//       });

//       const closeBtn = popup.querySelector(".close");
//       closeBtn.addEventListener("click", function () {
//         popup.style.display = "none";
//       });

//       window.addEventListener("click", function (event) {
//         if (event.target === popup) {
//           popup.style.display = "none";
//         }
//       });
//     });
//   }

//   setupPopups(galleryButtons, galleryPopups);
//   setupPopups(bookingButtons, bookingPopups);

//   flatpickr(".arrival-date", {
//     minDate: "2025-01-01",
//     maxDate: "2025-01-31",
//     dateFormat: "Y-m-d",
//   });

//   flatpickr(".departure-date", {
//     minDate: "2025-01-01",
//     maxDate: "2025-01-31",
//     dateFormat: "Y-m-d",
//   });

//   document.querySelectorAll(".feature-checkbox").forEach((checkbox) => {
//     checkbox.addEventListener("change", function () {
//       const parent = this.closest(".booking-popup");
//       const costValueElement = parent.querySelector(".cost-value");

//       let totalFeatureCost = 0;
//       parent
//         .querySelectorAll(".feature-checkbox:checked")
//         .forEach((checked) => {
//           totalFeatureCost += parseFloat(checked.getAttribute("data-cost"));
//         });

//       costValueElement.textContent = totalFeatureCost.toFixed(2);
//     });
//   });

//   document.querySelectorAll(".book-button").forEach((button) => {
//     button.addEventListener("click", function () {
//       const parent = button.closest(".booking-popup");
//       const roomId = parent.getAttribute("data-room-id");
//       const roomPrice = parseFloat(parent.getAttribute("data-room-price"));
//       const arrivalDate = parent.querySelector(".arrival-date").value;
//       const departureDate = parent.querySelector(".departure-date").value;
//       const transferCode = parent.querySelector(".transfer-code").value;

//       if (!arrivalDate || !departureDate || !transferCode) {
//         alert("Please fill in all required fields.");
//         return;
//       }

//       let totalFeatureCost = 0;
//       parent
//         .querySelectorAll(".feature-checkbox:checked")
//         .forEach((checked) => {
//           totalFeatureCost += parseFloat(checked.getAttribute("data-cost"));
//         });

//       const startDate = new Date(arrivalDate);
//       const endDate = new Date(departureDate);
//       const numberOfDays =
//         Math.ceil((endDate - startDate) / (1000 * 60 * 60 * 24)) + 1;
//       const roomCost = numberOfDays * roomPrice;

//       const totalCost = roomCost + totalFeatureCost;

//       fetch("../includes/book.php", {
//         method: "POST",
//         headers: { "Content-Type": "application/json" },
//         body: JSON.stringify({
//           room_id: roomId,
//           arrival_date: arrivalDate,
//           departure_date: departureDate,
//           transfer_code: transferCode,
//           total_cost: totalCost,
//           features: Array.from(
//             parent.querySelectorAll(".feature-checkbox:checked")
//           ).map((checkbox) => ({
//             name: checkbox.getAttribute("data-name"),
//             cost: parseFloat(checkbox.getAttribute("data-cost")),
//           })),
//           number_of_days: numberOfDays,
//         }),
//       })
//         .then((response) => response.json())
//         .then((data) => {
//           if (data.success) {
//             alert("Booking successful!");
//             location.reload();
//           } else {
//             alert("Booking failed: " + data.message);
//           }
//         })
//         .catch((error) => {
//           console.error("Error making booking:", error);
//           alert("An error occurred. Please try again.");
//         });
//     });
//   });
// });

// availability funkar

// document.addEventListener("DOMContentLoaded", function () {
//     const galleryPopups = document.querySelectorAll(".gallery-popup");
//     const galleryButtons = document.querySelectorAll(".image-button");

//     const bookingPopups = document.querySelectorAll(".booking-popup");
//     const bookingButtons = document.querySelectorAll(".availability-button");

//     function setupPopups(buttons, popups) {
//       buttons.forEach((button, index) => {
//         const popup = popups[index];
//         button.addEventListener("click", function () {
//           if (popup) {
//             popup.style.display = "block";
//           }
//         });

//         const closeBtn = popup.querySelector(".close");
//         closeBtn.addEventListener("click", function () {
//           popup.style.display = "none";
//         });

//         window.addEventListener("click", function (event) {
//           if (event.target === popup) {
//             popup.style.display = "none";
//           }
//         });
//       });
//     }

//     setupPopups(galleryButtons, galleryPopups);
//     setupPopups(bookingButtons, bookingPopups);

//     flatpickr(".arrival-date", {
//       minDate: "2025-01-01",
//       maxDate: "2025-01-31",
//       dateFormat: "Y-m-d",
//     });

//     flatpickr(".departure-date", {
//       minDate: "2025-01-01",
//       maxDate: "2025-01-31",
//       dateFormat: "Y-m-d",
//     });

//     document.querySelectorAll(".select-button").forEach((button) => {
//       button.addEventListener("click", function () {
//         const parent = button.closest(".booking-popup");
//         const arrivalDate = parent.querySelector(".arrival-date").value;
//         const departureDate = parent.querySelector(".departure-date").value;
//         const roomId = parent.getAttribute("data-room-id");

//         if (!arrivalDate || !departureDate) {
//           alert("Please select both arrival and departure dates.");
//           return;
//         }

//         fetch("../includes/availability.php", {
//           method: "POST",
//           headers: { "Content-Type": "application/json" },
//           body: JSON.stringify({
//             room_id: roomId,
//             arrival_date: arrivalDate,
//             departure_date: departureDate,
//           }),
//         })
//           .then((response) => response.json())
//           .then((data) => {
//             const availabilityText = parent.querySelector(".availability-text");
//             const availabilityImg = parent.querySelector(".availability-img");

//             if (data.available) {
//               availabilityText.textContent = "AVAILABLE";
//               availabilityImg.src = "/images/correct.svg";
//             } else {
//               availabilityText.textContent = "NOT AVAILABLE";
//               availabilityImg.src = "/images/wrong.svg";
//             }
//           })
//           .catch((error) => {
//             console.error("Error checking availability:", error);
//             alert(
//               "An error occurred while checking availability. Please try again."
//             );
//           });
//       });
//     });

//     document.querySelectorAll(".feature-checbox").forEach((checkbox) => {
//       checkbox.addEventListener("change", function () {
//         const parent = this.closest(".booking-popup");
//         const costValueElement = parent.querySelector(".cost-value");

//         let totalCost = 0;
//         parent
//           .querySelectorAll(".feature-checkbox:checked")
//           .forEach((checked) => {
//             totalCost += parseFloat(checked.getAttribute("data-cost"));
//           });
//         costValueElement.textContent = totalCost.toFixed(2);
//       });
//     });

//     document.querySelectorAll(".book-button").forEach((button) => {
//       button.addEventListener("click", function () {
//         const parent = button.closest(".booking-popup");
//         const roomId = parent.getAttribute("data-room-id");
//         const arrivalDate = parent.querySelector(".arrival-date").value;
//         const departureDate = parent.querySelector(".departure-date").value;
//         const transferCode = parent.querySelector(".transfer-code").value;

//         if (!arrivalDate || !departureDate || !transferCode) {
//           alert("Please fill in all required fields.");
//           return;
//         }

//         const features = Array.from(
//           parent.querySelectorAll(".feature-checkbox:checked")
//         ).map((checkbox) => ({
//           name: checkbox.getAttribute("data-name"),
//           cost: parseFloat(checkbox.getAttribute("data-cost")),
//         }));

//         const totalFeatureCost = features.reduce(
//           (sum, feature) => sum + feature.cost,
//           0
//         );

//         const startDate = new Date(arrivalDate);
//         const endDate = new Date(departureDate);
//         const numberOfDays = Math.ceil(
//           (endDate - startDate) / (1000 * 60 * 60 * 24)
//         );
//         const roomCost =
//           numberOfDays *
//           parseFloat(parent.querySelector(".cost-value").textContent);

//         const totalCost = roomCost + totalFeatureCost;
//       });
//     });
//   });
