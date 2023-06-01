// Get the popup elements
const popupButton = document.getElementById("popup-button");
const popupOverlay = document.getElementById("popup-overlay");
const closeButton = document.getElementById("close-button");

// Show the popup when the button is clicked
popupButton.addEventListener("click", function() {
  popupOverlay.style.display = "block";
});

// Close the popup when the close button is clicked
closeButton.addEventListener("click", function() {
  popupOverlay.style.display = "none";
});