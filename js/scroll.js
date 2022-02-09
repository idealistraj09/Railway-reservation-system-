if (window.history.replaceState) {
  window.history.replaceState(null, null, window.location.href);
}
function updateClock() {
  var now = new Date();
  var dname = now.getDay(),
    mo = now.getMonth(),
    dnum = now.getDate(),
    yr = now.getFullYear(),
    hou = now.getHours(),
    min = now.getMinutes(),
    sec = now.getSeconds(),
    pe = "AM";

  if (hou >= 12) {
    pe = "PM";
  }
  if (hou == 0) {
    hou = 12;
  }
  if (hou > 12) {
    hou = hou - 12;
  }

  Number.prototype.pad = function (digits) {
    for (var n = this.toString(); n.length < digits; n = 0 + n);
    return n;
  };

  var months = [
    "January",
    "February",
    "March",
    "April",
    "May",
    "June",
    "July",
    "Augest",
    "September",
    "October",
    "November",
    "December",
  ];
  var week = [
    "Sunday",
    "Monday",
    "Tuesday",
    "Wednesday",
    "Thursday",
    "Friday",
    "Saturday",
  ];
  var ids = [
    "dayname",
    "month",
    "daynum",
    "year",
    "hour",
    "minutes",
    "seconds",
    "period",
  ];
  var values = [
    week[dname],
    months[mo],
    dnum.pad(2),
    yr,
    hou.pad(2),
    min.pad(2),
    sec.pad(2),
    pe,
  ];
  for (var i = 0; i < ids.length; i++)
    document.getElementById(ids[i]).firstChild.nodeValue = values[i];
}
function date() {
  var today = new Date();
  var dd = today.getDate();
  var mm = today.getMonth() + 1; //January is 0!
  var yyyy = today.getFullYear();

  if (dd < 10) {
    dd = "0" + dd;
  }

  if (mm < 10) {
    mm = "0" + mm;
  }

  today = yyyy + "-" + mm + "-" + dd;
  document.getElementById("dateid").setAttribute("max", today);
}
function initClock() {
  updateClock();
  // load();
  window.setInterval("updateClock()", 1);
}

function swap() {
  var tmp = document.getElementById("c").value;
  document.getElementById("c").value = document.getElementById("d").value;
  document.getElementById("d").value = tmp;
}
function upperCaseF(a) {
  setTimeout(function () {
    a.value = a.value.toUpperCase();
  }, 1);
}
var c = 0;
var cd = 0;

// function show() {
//   c = c + 1;
//   var p1 = document.getElementById("part1");
//   var p2 = document.getElementById("part2");
//     var p3 = document.getElementById("part3");
//     var b1 = document.getElementById("signUp1");
//     var b2 = document.getElementById("signUp12");
//   if (c == 1) {
//     p2.style.display = "block";
//     p1.style.left = "10%";
//     p2.style.left = "10%";

//     b1.style.display = "inline";
//   }
//   if (c == 2) {
//     p3.style.display = "block";
//     p1.style.left = "0%";
//     p2.style.left = "0%";
//     p3.style.left = "0%";
//     b1.style.display = "none";
//     b2.style.display = "inline";
//     var flag1=1;
//   }
//   if(c>2){
//     alert("You can book only three ticket at a time");
//     c=0;
//   }

// }

function hide2() {
  var p1 = document.getElementById("part1");
  var p3 = document.getElementById("part3");
  var b1 = document.getElementById("signUp1");
  var b2 = document.getElementById("signUp12");
  var p2 = document.getElementById("part2");
  var add1 = document.getElementById("add1");
  p2.style.display = "none";
  p1.style.left = "30%";
  p2.style.left = "0%";
  p3.style.left = "0%";
  add1.style.display = "inline";
  removepart2();
}
function hide3() {
  var p1 = document.getElementById("part1");
  var p3 = document.getElementById("part3");
  var b1 = document.getElementById("signUp1");
  var b2 = document.getElementById("signUp12");
  var p2 = document.getElementById("part2");
  var add1 = document.getElementById("add1");
  var add2 = document.getElementById("add2");
  var add3 = document.getElementById("add3");
  b1.style.display = "inline";
  p3.style.display = "none";
  p1.style.left = "10%";
  p2.style.left = "10%";
  p3.style.left = "0%";
  add2.style.display = "inline";
  removepart3();
}
function addfirst() {
  var p1 = document.getElementById("part1");
  var p3 = document.getElementById("part3");
  var add1 = document.getElementById("add1");
  var add2 = document.getElementById("add2");
  var add3 = document.getElementById("add3");
  var p2 = document.getElementById("part2");
  var b1 = document.getElementById("signUp1");
  p2.style.display = "block";
  add1.style.display = "none";
  add2.style.display = "inline";
  p1.style.left = "10%";
  p2.style.left = "10%";
  p3.style.left = "0%";
  b1.style.display = "inline";
  addpart2();
  
}
function addsecond() {
  var p1 = document.getElementById("part1");
  var p3 = document.getElementById("part3");
  var b1 = document.getElementById("signUp1");
  var b2 = document.getElementById("signUp12");
  var p2 = document.getElementById("part2");
  var add1 = document.getElementById("add1");
  var add2 = document.getElementById("add2");
  var add3 = document.getElementById("add3");
  b1.style.display = "none";
  b2.style.display = "inline";
  p3.style.display = "block";
  add2.style.display = "none";
  add3.style.display = "inline";
  p1.style.left = "0%";
  p2.style.left = "0%";
  p3.style.left = "0%";
  addpart3();
  
}
function addth(){
  alert("You can Book only three ticket at once"); 
}
function addpart2(){
  document.getElementById("fname2").setAttribute("required","");
  document.getElementById("lname2").setAttribute("required","");
  document.getElementById("email2").setAttribute("required","");
  document.getElementById("radio2").setAttribute("required","");
  document.getElementById("mobile2").setAttribute("required","");
  document.getElementById("dateid2").setAttribute("required","");
  document.getElementById("city2").setAttribute("required","");
  
}
function addpart3(){
  document.getElementById("fname3").setAttribute("required","");
  document.getElementById("lname3").setAttribute("required","");
  document.getElementById("email3").setAttribute("required","");
  document.getElementById("radio3").setAttribute("required","");
  document.getElementById("mobile3").setAttribute("required","");
  document.getElementById("dateid3").setAttribute("required","");
  document.getElementById("city3").setAttribute("required","");
}
function removepart2(){
  document.getElementById("fname2").removeAttribute("required","");
  document.getElementById("lname2").removeAttribute("required","");
  document.getElementById("email2").removeAttribute("required","");
  document.getElementById("radio2").removeAttribute("required","");
  document.getElementById("mobile2").removeAttribute("required","");
  document.getElementById("dateid2").removeAttribute("required","");
  document.getElementById("city2").removeAttribute("required","");
  
}
function removepart3(){
  document.getElementById("fname3").removeAttribute("required","");
  document.getElementById("lname3").removeAttribute("required","");
  document.getElementById("email3").removeAttribute("required","");
  document.getElementById("radio3").removeAttribute("required","");
  document.getElementById("mobile3").removeAttribute("required","");
  document.getElementById("dateid3").removeAttribute("required","");
  document.getElementById("city3").removeAttribute("required","");
}

  // var t = document.getElementsByClassName("tname")[0];
  
  // // alert(t);
  // var s = document.getElementsByClassName("acbutton1")[0];
  
  // s.onclick = function hi(){t.style.color = "red";}