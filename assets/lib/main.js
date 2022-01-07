// Toggle button
var toggle=document.querySelector('.toggle-btn');
var sidenav=document.querySelector('.side-nav');
var container=document.querySelector('.container');
toggle.addEventListener('click',function(){
    sidenav.classList.toggle('active');
    container.classList.toggle('active');
});

// User Dropdown button
var notification=document.querySelector('.notification');
var notificationdropdown=document.querySelector('.notification .dropdown');
var userbtn=document.querySelector('.user');
var userdropdown=document.querySelector('.user .dropdown');
userbtn.addEventListener('click',function(){
  userdropdown.classList.toggle('active');
  notificationdropdown.classList.remove('active');
});
notification.addEventListener('click',function(){
  notificationdropdown.classList.toggle('active');
  userdropdown.classList.remove('active');
});




// Item 1
var btndropdown=document.querySelector('.btn-dropdown-nav');
var dropdownitems=document.querySelector('.dropdown-items');
btndropdown.addEventListener('click',function(){
  dropdownitems.classList.toggle('active');
});



var btnBody=document.querySelector('#btnBody');
btnBody.addEventListener('dblclick',function(){
  userdropdown.classList.remove('active');
  notificationdropdown.classList.remove('active');
  dropdownitems.classList.remove('active');
});


function btnOpenModel(){
  // Models open Button
  var btnModel=document.querySelector('.btn-model');
  var models=document.querySelector('.model');
  var backmodels=document.querySelector('.back-model');
  btnModel.addEventListener('click',function(){
    models.classList.add('active');
    backmodels.classList.add('active');
  });
}
function btnCloseModel(){
  // Models close Button
  var models=document.querySelector('.model');
  var backmodels=document.querySelector('.back-model');
  var close=document.querySelector('.close');
  close.addEventListener('click',function(){
    models.classList.remove('active');
    backmodels.classList.remove('active');
  });
}


// Theme Coockies
const themeCookieName = "theme";
const themeDark = "dark";
const themeLight = "light";
const body = document.getElementsByTagName("body")[0];

//Change Theme
function setCookie(cname, cvalue, exdays) {
  var d = new Date();
  d.setTime(d.getTime() + exdays * 24 * 60 * 60 * 1000);
  var expires = "expires=" + d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
  var name = cname + "=";
  var ca = document.cookie.split(";");
  for (var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == " ") {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}
loadTheme();
function loadTheme() {
  var theme = getCookie(themeCookieName);
  body.classList.add(theme === "" ? themeLight : theme);
}


function switchTheme() {
  if (body.classList.contains(themeLight)) {
    body.classList.remove(themeLight);
    body.classList.add(themeDark);
    setCookie(themeCookieName, themeDark);
  } else {
    body.classList.add(themeLight);
    body.classList.remove(themeDark);
    setCookie(themeCookieName, themeLight);
  }
}
