
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




///fonction verification//////
//getElementById() de Document renvoie un objet Element représentant l'élément dont la propriété id correspond à la chaîne de caractères spécifiée.
document.getElementById("email").addEventListener ('input',function(){
    var email = document.getElementById("email").value;
    var text = document.getElementById("text");
    var pattern = '/^[a-zA-Z0-9_]+$/'; // C'est dans la description, et permet de determiné quelle type de pattern n'est pas pris en compte ou autoriser

    if (email.match(pattern)) {
        text.innerHTML ="Votre addresse Mail est valide";
        text.style.color ="green"
    }else {
        text.innerHTML ="Votre addresse Mail est invalide";
        text.style.color ="red"
    }
    if (email == "") {
        text.innerHTML ="";
        text.style.color ="red"
    }

 })




















































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

