function togglePassword() {
    const passwordInput = document.getElementById("password-input");
    const eyeIcon = document.getElementById("eye-icon");
    
    if (passwordInput && eyeIcon) {
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            eyeIcon.classList.remove("fa-eye-slash");
            eyeIcon.classList.add("fa-eye");
        } else {
            passwordInput.type = "password";
            eyeIcon.classList.remove("fa-eye");
            eyeIcon.classList.add("fa-eye-slash");
        }
    }
}

// // Código para la animación y redirección al perfil
// document.getElementById("loginButton").addEventListener("click", function(event) {
//     event.preventDefault(); // Evita que el formulario se envíe inmediatamente

//     // Mostrar la pantalla de carga
//     document.getElementById('loadingScreen').style.display = 'flex';
//         setTimeout(() => {
//             window.location.href = 'usuario.html';
//         }, 10000); // 10 segundos
// });

