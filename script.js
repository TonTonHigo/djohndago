// le carousel pour la page index
const slides = document.querySelectorAll('.slide');

let currentSlide = 0;

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






















// js pour le modale

// Fonction pour ouvrir un modal
// function openModal(modalId) {
//     const modal = document.getElementById(`modal-${modalId}`);
//     modal.style.display = 'block';
// }

// Fonction pour fermer un modal
// function closeModal(modalId) {
//     const modal = document.getElementById(`modal-${modalId}`);
//     modal.style.display = 'none';
// }
