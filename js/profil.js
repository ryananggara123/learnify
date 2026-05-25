// Fungsi untuk membuka modal pemilihan avatar
function openModal() {
    const modal = document.getElementById('avatarModal');
    if (modal) {
        modal.style.display = 'flex';
    }
}

// Fungsi untuk menutup modal pemilihan avatar
function closeModal() {
    const modal = document.getElementById('avatarModal');
    if (modal) {
        modal.style.display = 'none';
    }
}

// Event Listener untuk menutup modal ketika user klik di luar area box modal (pada overlay gelap)
window.addEventListener('click', function(event) {
    const modal = document.getElementById('avatarModal');
    if (event.target === modal) {
        closeModal();
    }
});