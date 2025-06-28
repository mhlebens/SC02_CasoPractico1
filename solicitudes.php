<?php
// Se definen órdenes de servicio de ejemplo en un arreglo
$ordenes = [
    [
        "cliente" => "Juan Pérez",
        "placa" => "ABC123",
        "fecha_ingreso" => "2024-06-15",
        "tipo_servicio" => "Mantenimiento",
        "observaciones" => "Cambio de aceite",
        "estado_pago" => "pendiente",
        "fecha_finalizacion" => "2024-06-20"
    ],
    [
        "cliente" => "María López",
        "placa" => "XYZ789",
        "fecha_ingreso" => "2024-06-10",
        "tipo_servicio" => "Reparación",
        "observaciones" => "Frenos",
        "estado_pago" => "pagado",
        "fecha_finalizacion" => "2024-06-18"
    ]
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title>Solicitudes de Servicio</title>
  <!-- Bootstrap CSS -->
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css"
    rel="stylesheet"
  />
  <!-- Incorporan estilos.css -->
  <link rel="stylesheet" href="css/estilos.css" />
</head>
<body>
  <!-- Cabecera con color corporativo -->
  <header class="custom-header text-white p-3 text-center">


  <div class="container my-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h3>Órdenes registradas</h3>
      <!-- Botón personalizado para abrir el modal -->
      <button class="btn btn-custom" data-bs-toggle="modal" data-bs-target="#modalOrden">Agregar Orden</button>
    </div>

    <!-- Tabla de órdenes -->
    <table class="table table-bordered table-striped">
      <thead class="table-dark">
        <tr>
          <th>Cliente</th>
          <th>Placa</th>
          <th>Fecha Ingreso</th>
          <th>Tipo Servicio</th>
          <th>Observaciones</th>
          <th>Estado Pago</th>
          <th>Fecha Finalización</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // Muestra cada orden
        date_default_timezone_set("America/Costa_Rica");// Se utiliza la zona horaria de Costa Rica
        foreach ($ordenes as $orden) {
            $fechaIngreso = new DateTime($orden["fecha_ingreso"]);
            $hoy = new DateTime();
            $diasTranscurridos = $hoy->diff($fechaIngreso)->days;

            $colorFila = ""; 
            if ($diasTranscurridos > 7) {// Se realiza la comparación de días transcurridos
                $colorFila = "table-warning"; // fila amarilla si tiene más de 7 días
            }
            if ($orden["estado_pago"] === "pendiente") {
                $colorFila = "table-danger"; // fila roja si no está pagada
            }
            echo "<tr class='$colorFila'>
                <td>{$orden['cliente']}</td>
                <td>{$orden['placa']}</td>
                <td>{$orden['fecha_ingreso']}</td>
                <td>{$orden['tipo_servicio']}</td>
                <td>{$orden['observaciones']}</td>
                <td>{$orden['estado_pago']}</td>
                <td>{$orden['fecha_finalizacion']}</td>
              </tr>";
        }
        ?>
      </tbody>
    </table>
  </div>

  <!-- Modal para agregar una nueva orden -->
  <div class="modal fade" id="modalOrden" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content rounded-4">
        <form id="formNuevaOrden">
          <div class="modal-header custom-header">
            <h5 class="modal-title">Agregar Nueva Orden</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <!-- Campos del formulario -->
            <div class="mb-3">
              <label for="cliente">Cliente</label>
              <input type="text" id="cliente" class="form-control"  required />
            </div>
            <div class="mb-3">
              <label for="placa">Placa</label>
              <input type="text" class="form-control" id="placa" required />
            </div>
            <div class="mb-3">
              <label for="fechaIngreso">Fecha Ingreso</label>
              <input type="date" class="form-control" id="fechaIngreso" required />
            </div>
            <div class="mb-3">
              <label for="tipoServicio">Tipo Servicio</label>
              <select class="form-select" id="tipoServicio" required>
                <option value="">Seleccione</option>
                <option value="Mantenimiento">Mantenimiento</option>
                <option value="Reparación">Reparación</option>
                <option value="Diagnóstico">Diagnóstico</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="observaciones">Observaciones</label>
              <textarea class="form-control" id="observaciones"></textarea>
            </div>
            <div class="mb-3">
              <label for="estadoPago">Estado Pago</label>
              <select class="form-select" id="estadoPago" required>
                <option value="pagado">Pagado</option>
                <option value="pendiente">Pendiente</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="fechaFinalizacion">Fecha Finalización</label>
              <input type="date" class="form-control" id="fechaFinalizacion" required />
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-custom">Guardar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Bootstrap Bundle JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/funciones.js"></script>
</body>
</html>

