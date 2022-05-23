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