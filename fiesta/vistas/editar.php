<?php require_once '../../modelo/fiesta.php'; 
$id = $_GET['id'] ?? null;
$fiesta = $id ? Fiesta::obtenerPorId($id) : null;
$titulo = $fiesta ? 'Editar Fiesta' : 'Agregar Fiesta';
$accion = $fiesta ? 'editar' : 'agregar';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titulo; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h1><?php echo $titulo; ?></h1>

                <form method="POST" action="../acciones.php">
                    <input type="hidden" name="accion" value="<?php echo $accion; ?>">
                    <?php if ($fiesta): ?>
                    <input type="hidden" name="id" value="<?php echo $fiesta->Id; ?>">
                    <?php endif; ?>

                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" value="<?php echo $fiesta ? $fiesta->Nombre : ''; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Lugar</label>
                        <input type="text" class="form-control" name="lugar" value="<?php echo $fiesta ? $fiesta->Lugar : ''; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Fecha</label>
                        <input type="date" class="form-control" name="fecha" value="<?php echo $fiesta ? $fiesta->Fecha : ''; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Hora</label>
                        <input type="time" class="form-control" name="hora" value="<?php echo $fiesta ? $fiesta->Hora : ''; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Capacidad</label>
                        <input type="number" class="form-control" name="capacidad" value="<?php echo $fiesta ? $fiesta->Capacidad : ''; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Precio de Entrada</label>
                        <input type="number" class="form-control" name="precioEntrada" step="0.01" value="<?php echo $fiesta ? $fiesta->PrecioEntrada : ''; ?>" required>
                    </div>

                    <div class="d-grid gap-2 d-sm-flex">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="listar.php" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
