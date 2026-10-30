<?php
require_once __DIR__ . '/../core/Database.php';

class Fiesta {
    private const NOMBRE_CLASE = 'Fiesta';
    
    public $Id;
    public $Nombre;
    public $Lugar;
    public $Fecha;
    public $Hora;
    public $Capacidad;
    public $PrecioEntrada;

    public function __construct() {
        // Constructor vacío para que FETCH_CLASS funcione correctamente
    }

    /**
     * id, nombre, lugar, fecha, hora, capacidad, precioEntrada
     * Obtener todas las fiestas desde la BD
     * Usando FETCH_CLASS para mapear automáticamente a objetos Fiesta (ORM)
     */
    public static function obtenerTodas() {
        try {
            $db = Database::getInstance()->getConnection();
            $stmt = $db->prepare('SELECT Id, Nombre, Lugar, Fecha, Hora, Capacidad, PrecioEntrada FROM Fiestas ORDER BY Id DESC');
            $stmt->execute();
            
            // PDO mapea automáticamente las columnas a las propiedades de la clase
            return $stmt->fetchAll(PDO::FETCH_CLASS, self::NOMBRE_CLASE);
        } catch (PDOException $e) {
            error_log("Error al obtener fiestas: " . $e->getMessage());
            return [];
        }
    }

    /**
     * Obtener una fiesta por ID
     * Usando FETCH_CLASS para mapear automáticamente a objeto Fiesta (ORM)
     */
    public static function obtenerPorId($id) {
        try {
            $db = Database::getInstance()->getConnection();
            $stmt = $db->prepare('SELECT Id, Nombre, Lugar, Fecha, Hora, Capacidad, PrecioEntrada FROM Fiestas WHERE Id = :id');
            $stmt->execute([':id' => $id]);
            
            // PDO mapea automáticamente las columnas a las propiedades de la clase
            $stmt->setFetchMode(PDO::FETCH_CLASS, self::NOMBRE_CLASE);
            return $stmt->fetch();
        } catch (PDOException $e) {
            error_log("Error al obtener fiesta: " . $e->getMessage());
            return null;
        }
    }

    /**
     * Agregar una nueva fiesta
     */
    public static function agregar($nombre, $lugar, $fecha, $hora, $capacidad, $precioEntrada) {
        try {
            $db = Database::getInstance()->getConnection();
            $stmt = $db->prepare('INSERT INTO Fiestas (Nombre, Lugar, Fecha, Hora, Capacidad, PrecioEntrada) VALUES (:nombre, :lugar, :fecha, :hora, :capacidad, :precioEntrada)');
            
            return $stmt->execute([
                ':nombre' => $nombre,
                ':lugar' => $lugar,
                ':fecha' => $fecha,
                ':hora' => $hora,
                ':capacidad' => $capacidad,
                ':precioEntrada' => $precioEntrada
            ]);
        } catch (PDOException $e) {
            error_log("Error al agregar fiesta: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Editar una fiesta existente
     */
    public static function editar($id, $nombre, $lugar, $fecha, $hora, $capacidad, $precioEntrada) {
        try {
            $db = Database::getInstance()->getConnection();
            $stmt = $db->prepare('UPDATE Fiestas SET Nombre = :nombre, Lugar = :lugar, Fecha = :fecha, Hora = :hora, Capacidad = :capacidad, PrecioEntrada = :precioEntrada WHERE Id = :id');
            
            return $stmt->execute([
                ':id' => $id,
                ':nombre' => $nombre,
                ':lugar' => $lugar,
                ':fecha' => $fecha,
                ':hora' => $hora,
                ':capacidad' => $capacidad,
                ':precioEntrada' => $precioEntrada
            ]);
        } catch (PDOException $e) {
            error_log("Error al editar fiesta: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Eliminar una fiesta
     */
    public static function eliminar($id) {
        try {
            $db = Database::getInstance()->getConnection();
            $stmt = $db->prepare('DELETE FROM Fiestas WHERE Id = :id');
            
            return $stmt->execute([':id' => $id]);
        } catch (PDOException $e) {
            error_log("Error al eliminar fiesta: " . $e->getMessage());
            return false;
        }
    }
}
?>
