//Get the button
var mybutton = document.getElementById("gotoTop");
    
// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}

function openSidebar() {
  var t = document.getElementById("shop_sidebar");
  var o = document.getElementById("sidebar_overlay");
  var b = document.body;
  t.classList.toggle("show");
  o.classList.toggle("show");
  b.classList.toggle("hiddenOverflow");
}
function handleMousePos(event) {
  var mouseClickWidth = event.clientX;
  if(mouseClickWidth>=270){
      var t = document.getElementById("shop_sidebar");
      var o = document.getElementById("sidebar_overlay");
      var b = document.body;
      t.classList.remove("show");
      o.classList.remove("show");
      b.classList.remove("hiddenOverflow");
  }
}
document.addEventListener("click", handleMousePos);


$(document).ready(function() {
  $(".add-link-readmore").click(function() {
      var href = $(this).data("href"), target = $(this).data("link_target");
      $(target).attr("href", href);
  });
})