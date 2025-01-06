document.addEventListener("DOMContentLoaded", function () {
  const popups = document.querySelectorAll(".gallery-popup");
  const buttons = document.querySelectorAll(".image-button");
  //   var span = document.getElementsByClassName("close")[0];

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
});
