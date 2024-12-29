// Add click effect for buttons
document.querySelectorAll(".buttons button").forEach(button => {
  button.addEventListener("click", () => {
    button.style.filter = "brightness(1.4)";
    setTimeout(() => {
      button.style.filter = "brightness(1.2)";
    }, 200); // Reset hover style after click effect
  });
});