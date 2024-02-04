let music = document.getElementById("Background-music")
music.volume = 0.5;

let viewButtons = document.querySelectorAll(".viewButton");

viewButtons.forEach(function (viewButton) {
  viewButton.addEventListener("click", function (e) {
    e.preventDefault();

    // Find the associated pop-up based on data-popup-id attribute
    let popUpId = viewButton.getAttribute("data-popup-id");
    let popUp = document.getElementById(popUpId);

    if (popUp) {
      console.log("Button pressed for pop-up: " + popUpId);
      popUp.style.display = (popUp.style.display === "none" || popUp.style.display === "") ? "block" : "none";

      if (popUp.style.display == "block") {
        // Stop the click event from propagating to the body
        e.stopPropagation();
      }
    }
  });
});

// Add click event listener to the document to close pop-ups when clicking outside
document.addEventListener("click", function () {
  let popUps = document.querySelectorAll(".popUp-container");
  popUps.forEach(function (popUp) {
    if (popUp.style.display === "block") {
      popUp.style.display = "none";
    }
  });
});
