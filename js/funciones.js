document.addEventListener('DOMContentLoaded', function () {
  const loginForm = document.getElementById('loginForm');

  loginForm.addEventListener('submit', function (e) {
    e.preventDefault();

    const usuario = document.getElementById('usuario').value.trim();
    const clave = document.getElementById('clave').value.trim();

    if (usuario === "" || clave === "") {
      alert("Por favor complete todos los campos.");
      return;
    }

    // Simulación de credenciales
    if (usuario === "admin" && clave === "1234") {
      window.location.href = "solicitudes.php";
    } else {
      alert("Usuario o contraseña incorrectos. Inténtelo nuevamente.");
    }
  });
});
