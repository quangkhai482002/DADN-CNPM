/*

Visit My Website to see creative design
				www.HUSAMUI.com


*/
"use strict";
const menus = document.querySelectorAll('.menu');
menus.forEach(menu => {
    const menuItems = menu.querySelectorAll('.menu-item');
    menuItems.forEach((item) => {
        item.addEventListener('click', e => {
            menuItems.forEach(item => item.classList.remove('active'));
            const target = e.target;
            target.classList.add('active');
        });
    });
});

$(document).ready(function(){
  
    $(".drop-down").click(function(){
      $(".menubox").toggleClass("showMenu");
        $(".menubox > li").click(function(){
          $(".drop-down > p").html($(this).html());
            $(".menubox").removeClass("showMenu");
        });
    });
    
  });



// ---------------------control-item--------------------------

  var elem = document.querySelector('input[type="range"]');

var rangeValue = function(){
  var newValue = elem.value;
  var target = document.querySelector('.value');
  target.innerHTML = newValue;
}

elem.addEventListener("input", rangeValue); 

// ---------------------schedule-item--------------------------


function toggleEditSchedule() {
  var editSchedule = document.getElementById("editSchedule");
  editSchedule.style.display = (editSchedule.style.display === "none") ? "block" : "none";
}

// ---------------------manage device--------------------------


$(function(){
  $('#keywords').tablesorter(); 
});