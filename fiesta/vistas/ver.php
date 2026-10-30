<?php require_once '../../modelo/fiesta.php'; 
$id = $_GET['id'] ?? null;
$fiesta = $id ? Fiesta::obtenerPorId($id) : null;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Persona</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h1>Detalle de Fiesta</h1>

                <?php if ($fiesta): ?>
                <div class="card">
                    <div class="card-body">
                        <p><strong>ID:</strong> <?php echo $fiesta->Id; ?></p>
                        <p><strong>Nombre:</strong> <?php echo $fiesta->Nombre; ?></p>
                        <p><strong>Lugar:</strong> <?php echo $fiesta->Lugar; ?></p>
                        <p><strong>Fecha:</strong> <?php echo $fiesta->Fecha; ?></p>
                        <p><strong>Hora:</strong> <?php echo $fiesta->Hora; ?></p>
                        <p><strong>Capacidad:</strong> <?php echo $fiesta->Capacidad; ?></p>
                        <p><strong>Precio de Entrada:</strong> <?php echo $fiesta->PrecioEntrada; ?></p>
                    </div>
                </div>

                <div class="mt-3">
                    <a href="listar.php" class="btn btn-secondary">Volver</a>
                    <a href="editar.php?id=<?php echo $fiesta->Id; ?>" class="btn btn-warning">Editar</a>
                </div>
                <?php else: ?>
                <div class="alert alert-danger">Fiesta no encontrada</div>
                <a href="listar.php" class="btn btn-secondary">Volver</a>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
