var bidangSelect = document.getElementById("bidang");

bidangSelect.addEventListener("change", function() {
  if (bidangSelect.value === "Pranata Laboratorium") {
    document.querySelector(".pranata").style.display = "block";
  } else {
    document.querySelector(".pranata").style.display = "none";
  }
});
