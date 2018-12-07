$(document).ready(function() {
  $('#myCarousel').on('slide.bs.carousel', function(e) {
    var $e = $(e.relatedTarget);
    var idx = $e.index();
    var itemsPerSlide = 4;
    var totalItems = $('.carousel-item').length;

    if (idx >= totalItems - (itemsPerSlide - 1)) {
      var it = itemsPerSlide - (totalItems - idx);
      for (var i = 0; i < it; i++) {
        // append slides to end
        if (e.direction === 'left') {
          $('.carousel-item')
            .eq(i)
            .appendTo('.carousel-inner');
        } else {
          $('.carousel-item')
            .eq(0)
            .appendTo($(this).find('.carousel-inner'));
        }
      }
    }
  });
});

// Ferme la modal quand l'utilisateur clique en dehors
window.onclick = function(event) {
    if (event.target === modal) {
        modal.style.display = 'none';
    }
}

// Quand l'utilisateur scrolls down 20px du début de la page, montrer le bouton
window.onscroll = function() {scrollFunction()};
function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("topBtn").style.display = "block";
    } else {
        document.getElementById("topBtn").style.display = "none";
    }
}
// Fonction quand l'utilisateur clique sue le bouton, scroll jusqu'au début de la page
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
// fonction d'affichage du mot de passe par checkbox
function PasswordShowFunction() {
    // déclaration de la variable showPswd 
    var showPswd = document.getElementById('password');
    // condition d'affichage ou non du password en texte ou pas
    if (showPswd.type === 'password') {
        showPswd.type = 'text';
    } else {
        showPswd.type = 'password';
    }
} 
//
//
//$('#myCarousel').carousel({
//  interval: 4000
//})
//
//$('.carousel .item').each(function(){
//  var next = $(this).next();
//  if (!next.length) {
//    next = $(this).siblings(':first');
//  }
//  next.children(':first-child').clone().appendTo($(this));
//  
//  for (var i=0;i<2;i++) {
//    next=next.next();
//    if (!next.length) {
//    	next = $(this).siblings(':first');
//  	}
//    
//    next.children(':first-child').clone().appendTo($(this));
//  }
//});