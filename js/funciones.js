// Funcionalidad para el formulario de login
document.addEventListener("DOMContentLoaded", function () {
  const loginForm = document.getElementById("loginForm");

  if (loginForm) {
    loginForm.addEventListener("submit", function (e) {
      e.preventDefault();

      const usuario = document.getElementById("usuario").value.trim();
      const clave = document.getElementById("clave").value.trim();

      if (usuario === "" || clave === "") {
        alert("Por favor complete todos los campos.");
        return;
      }

      if (usuario === "admin" && clave === "1234") {
        window.location.href = "solicitudes.php";
      } else {
        alert("Usuario o contraseña incorrectos.");
      }
    });
  }
});


// Funcionalidad para agregar datos
document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("formNuevaOrden"); // correcto
  const tabla = document.querySelector("table tbody"); // correcto

  // Verifica que el formulario y la tabla existan
  if (form && tabla) {
    form.addEventListener("submit", function (e) {
      e.preventDefault();

      // Obtiene los valores de los campos del formulario
      const cliente = document.getElementById("cliente").value.trim();
      const placa = document.getElementById("placa").value.trim();
      const fechaIngreso = document.getElementById("fechaIngreso").value;
      const tipoServicio = document.getElementById("tipoServicio").value;
      const observaciones = document.getElementById("observaciones").value;
      const estadoPago = document.getElementById("estadoPago").value;
      const fechaFinalizacion =
        document.getElementById("fechaFinalizacion").value;

      // Validación de campos obligatorios
      if (
        !cliente ||
        !placa ||
        !fechaIngreso ||
        !tipoServicio ||
        !estadoPago ||
        !fechaFinalizacion
      ) {
        alert("Por favor complete todos los campos obligatorios.");
        return;
      }
      // Validación de fecha de ingreso
      const hoy = new Date();
      const fechaIng = new Date(fechaIngreso);
      const diffTime = hoy - fechaIng;
      const diffDays = diffTime / (1000 * 60 * 60 * 24);


      let claseFila = "";
      if (diffDays > 7) {
        claseFila = "table-warning";
      }
      if (estadoPago === "pendiente") {
        claseFila = "table-danger";
      }
      // Crea una nueva fila en la tabla
      const nuevaFila = tabla.insertRow();
      nuevaFila.className = claseFila;

      nuevaFila.innerHTML = `
        <td>${cliente}</td>
        <td>${placa}</td>
        <td>${fechaIngreso}</td>
        <td>${tipoServicio}</td>
        <td>${observaciones}</td>
        <td>${estadoPago}</td>
        <td>${fechaFinalizacion}</td>
      `;

      form.reset();

      // Cierra el modal
      const modal = bootstrap.Modal.getInstance(
        document.getElementById("modalOrden")
      );
      modal.hide();
    });
  }
});
