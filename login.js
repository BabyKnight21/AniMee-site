var logincontainer = document.getElementById("popuplogin");

// Get the button that opens the logincontainer
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the logincontainer
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the logincontainer 
btn.onclick = function() {
  logincontainer.style.display = "block";
}

// When the user clicks on <span> (x), close the logincontainer
span.onclick = function() {
  logincontainer.style.display = "none";
}

// When the user clicks anywhere outside of the logincontainer, close it
window.onclick = function(event) {
  if (event.target == logincontainer) {
    logincontainer.style.display = "none";
  }
}