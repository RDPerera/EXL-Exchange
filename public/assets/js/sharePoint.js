function showrate() {
  // Get the checkbox
  var checkBox = document.getElementById("final");
  // Get the output text
  var rateSec = document.getElementById("rateSec");

  // If the checkbox is checked, display the output text
  if (checkBox.checked == true) {
    rateSec.style.display = "block";
  } else {
    rateSec.style.display = "none";
  }
}
