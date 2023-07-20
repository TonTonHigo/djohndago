
// le carousel pour la page index
const slides = document.querySelectorAll('.slide');

let currentSlide = 0;
// conné pas
function showSlide() {
    slides.forEach((slide, index) => {
        if (index === currentSlide) {
            slide.classList.add('active');
        } else {
            slide.classList.remove('active');
        }
    });

    currentSlide = (currentSlide + 1) % slides.length;
}

setInterval(showSlide, 4000);





// Pour le boutton stylé
var animateButton = function(e) {

    e.preventDefault;
    //reset animation
    e.target.classList.remove('animate');
    
    e.target.classList.add('animate');
    setTimeout(function(){
      e.target.classList.remove('animate');
    },700);
};
var bubblyButtons = document.getElementsByClassName("bubbly-button");

for (var i = 0; i < bubblyButtons.length; i++) {
  bubblyButtons[i].addEventListener('click', animateButton, false);
}
























































// code de js pour la page articles de damien

// Sélection des éléments nécessaires
const commentForm = document.querySelector('.comment-form');
const commentsContainer = document.querySelector('.comments');
const likeIcons = document.querySelectorAll('.icon');

// Ajouter un événement "submit" au formulaire de commentaire
commentForm.addEventListener('submit', function (event) {
    event.preventDefault();

    // Récupérer les valeurs des champs du formulaire
    const nameInput = commentForm.querySelector('input[type="text"]');
    const commentTextarea = commentForm.querySelector('textarea');

    // Créer un nouvel élément "div" pour afficher le commentaire
    const commentDiv = document.createElement('div');
    commentDiv.innerHTML = `<strong>${nameInput.value}</strong>: ${commentTextarea.value}`;
    commentsContainer.appendChild(commentDiv);

    // Réinitialiser le formulaire après avoir soumis le commentaire
    commentForm.reset();
});

// Ajouter un événement "click" pour les icônes d'appréciation
likeIcons.forEach(icon => {
    icon.addEventListener('click', function () {
        // Ajouter la classe "active" à l'icône cliquée pour la mise en évidence
        this.classList.toggle('active');
    });
});

