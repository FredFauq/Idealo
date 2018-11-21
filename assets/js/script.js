
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
        if (e.direction == 'left') {
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
// Ajax affichage login ou register
$(function () {
    $('#login').blur(function () {
        $.post('controllers/loginCtrl.php', { loginVerify:$(this).val() } , function (data) {
            if(data == 1){
                $('#login').addClass('bg-danger');
                $('#register').hide();
            }else{
               $('#login').removeClass('bg-danger'); 
                $('#register').show();
            }
        },
        'JSON');
    });
});

// Ferme la modal quand l'utilisateur clique en dehors
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = 'none';
    }
}

// Quand l'utilisateur scrolls down 20px du début de la page, montrer le bouton
window.onscroll = function() {scrollFunction()};
function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById('topBtn').style.display = 'block';
    } else {
        document.getElementById('topBtn').style.display = 'none';
    }
}

 // Fonction pour la snackbar
                function snackbarFunction() {
                    // Récupération de la snackbar DIV
                    $snackbar = document.getElementById('snackbar');
                    // Ajoute le "show" class à la DIV
                    $snackbar.className = 'show';
                    // Après 3 secondes, enlève le show class de la DIV
                    setTimeout(function(){ $snackbar.className = $snackbar.className.replace('show', ''); }, 3000);
                    
// Fonction quand l'utilisateur clique sue le bouton, scroll jusqu'au début de la page
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}

// fonction d'affichage du mot de passe par checkbox
function PasswordShowFunction() {
    var x = document.getElementById('password');
    if (x.type === 'password') {
        x.type = 'text';
    } else {
        x.type = 'password';
    }
} 