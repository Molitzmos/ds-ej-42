<?php
require_once '../modelo/fiesta.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $accion = $_POST['accion'] ?? '';
    $nombre = $_POST['nombre'] ?? '';
    $lugar = $_POST['lugar'] ?? '';
    $fecha = $_POST['fecha'] ?? '';
    $hora = $_POST['hora'] ?? '';
    $capacidad = $_POST['capacidad'] ?? '';
    $precioEntrada = $_POST['precioEntrada'] ?? '';
    $id = $_POST['id'] ?? '';

    if ($accion === 'agregar') {
        Fiesta::agregar($nombre, $lugar, $fecha, $hora, $capacidad, $precioEntrada);
        header('Location: vistas/listar.php');
        exit;
    }

    if ($accion === 'editar') {
        Fiesta::editar($id, $nombre, $lugar, $fecha, $hora, $capacidad, $precioEntrada);
        header('Location: vistas/listar.php');
        exit;
    }

    if ($accion === 'eliminar') {
        Fiesta::eliminar($id);
        header('Location: vistas/listar.php');
        exit;
    }
}
?>
