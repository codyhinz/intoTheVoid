function closeCookies() {
    var x = document.getElementById("cookies");
    if (x.style.display === "none") {
      x.style.display = "block";
    } else {
      x.style.display = "none";
    }
  }

// function to set a given theme/color-scheme
function setTheme(themeName) {
  localStorage.setItem('theme', themeName);
  document.documentElement.className = themeName;
}
// function to toggle between light and dark theme
function toggleTheme() {
  if (localStorage.getItem('theme') === 'theme-dark'){
      setTheme('theme-light');
  } else {
      setTheme('theme-dark');
  }
}
// Immediately invoked function to set the theme on initial load
(function () {
  if (localStorage.getItem('theme') === 'theme-dark') {
      setTheme('theme-light');
  } else {
      setTheme('theme-dark');
  }
})();

function nav() {
  var y = document.getElementById("navmenu");
  var z = document.getElementById("hamburgericon");

  if (y.style.display === "none") {
    y.style.display = "block";
    z.style.transform = "rotate(90deg)";
  } else {
      if (z.style.transform === "rotate(90deg)") {
        z.style.transform = "rotate(180deg)";
        y.style.display = "none";
    }
  }
}