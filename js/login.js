document.addEventListener("DOMContentLoaded", function () {
    const passwordInput = document.getElementById("password");
    const togglePasswordIcon = document.getElementById("togglePassword");
    const loginForm = document.getElementById("loginForm");
    const btnLogin = document.getElementById("btnLogin");

    // 1. Fitur Lihat / Sembunyikan Password
    if (togglePasswordIcon && passwordInput) {
        togglePasswordIcon.addEventListener("click", function () {
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                togglePasswordIcon.classList.remove("fa-eye");
                togglePasswordIcon.classList.add("fa-eye-slash");
            } else {
                passwordInput.type = "password";
                togglePasswordIcon.classList.remove("fa-eye-slash");
                togglePasswordIcon.classList.add("fa-eye");
            }
        });
    }

    // 2. Efek Animasi Loading saat Form di-Submit
    if (loginForm && btnLogin) {
        loginForm.addEventListener("submit", function () {
            btnLogin.disabled = true;
            btnLogin.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memproses...';
        });
    }
});