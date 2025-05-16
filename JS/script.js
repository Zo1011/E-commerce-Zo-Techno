document.addEventListener('DOMContentLoaded', function () {
    const desc = document.getElementById('desc');
    const wrapper = document.getElementById('descWrapper');
    const toggleBtn = document.getElementById('toggleBtn');

    const fullText = desc.innerHTML;
    const words = fullText.split(' ');
    const limit = 30;

    if (words.length > limit) {
        const shortText = words.slice(0, limit).join(' ') + '...';
        desc.innerHTML = shortText;
        let expanded = false;

        toggleBtn.addEventListener('click', () => {
            expanded = !expanded;
            if (expanded) {
                desc.innerHTML = fullText;
                wrapper.classList.add('expanded');
                toggleBtn.textContent = 'Voir moins';
            } else {
                desc.innerHTML = shortText;
                wrapper.classList.remove('expanded');
                toggleBtn.textContent = 'Voir plus';
            }
        });
    } else {
        toggleBtn.style.display = 'none';
    }
});
function showCartModal(event) {
    event.preventDefault(); // Empêche le rechargement de la page
    const form = event.target;

    // Envoyer les données du formulaire via fetch
    fetch(form.action, {
        method: form.method,
        body: new FormData(form)
    })
    .then(response => response.json())
    .then(data => {
        if (data.totalQuantity !== undefined) {
            // Mettre à jour la badge de quantité
            const badge = document.querySelector('.badge.bg-danger');
            badge.textContent = data.totalQuantity;

            // Afficher le modal après la mise à jour de la badge
            const cartModal = new bootstrap.Modal(document.getElementById('cartModal'));
            cartModal.show();
        } else {
            alert("Une erreur s'est produite lors de l'ajout au panier.");
        }
    })
    .catch(error => {
        console.error("Erreur :", error);
    });
}
// function updateCartBadge() {
//     fetch('../config/get_cart_info.php') // Appel à un script PHP pour récupérer la quantité totale
//         .then(response => response.json())
//         .then(data => {
//             const badge = document.querySelector('.badge.bg-danger');
//             badge.textContent = data.totalQuantity; // Met à jour la quantité totale dans la badge
//         })
//         .catch(error => {
//             console.error("Erreur lors de la mise à jour de la badge :", error);
//         });
// }