// nav
function toggleNav(){
    var sidenav = document.getElementById("mySidenav");
    var main = document.getElementById("main");
    
    if (sidenav.style.width === "250px") {
      sidenav.style.width = "0";
      main.style.marginLeft = "0";
    } else {
      sidenav.style.width = "250px";
      main.style.marginLeft = "250px";
    }
  }
  
  
  // bouton modal
  function openModal() {
    var modal = document.getElementById("modal");
    modal.style.display = "block";
  }
  
  function closeModal() {
    var modal = document.getElementById("modal");
    modal.style.display = "none";
  }
  
  window.onclick = function (event) {
    var modal = document.getElementById("modal");
    if (event.target == modal) {
      modal.style.display = "none";
    }
  };