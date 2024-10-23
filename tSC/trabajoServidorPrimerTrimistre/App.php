<?php
class App {
    private $productos = []; // Aquí almacenamos los productos

    // Constructor que inicializa el inventario
    public function __construct() {
        if (isset($_COOKIE['productos'])) {
            $this->productos = unserialize($_COOKIE['productos']);
        }
    }

    // Método para añadir un producto
    public function registrarProducto($nombre, $stock, $precio, $usuario) {
        $nuevoProducto = [
            'nombre' => $nombre,
            'stock' => $stock,
            'precio' => $precio,
            'usuario' => $usuario
        ];
        array_push($this->productos, $nuevoProducto);
        $this->guardarProductos();
    }

    // Método para buscar un producto
    public function buscarProducto($nombre) {
        foreach ($this->productos as $producto) {
            if ($producto['nombre'] === $nombre) {
                return $producto;
            }
        }
        return null;
    }

    // Método para calcular el valor total
    public function calcularValorTotal() {
        $total = 0;
        foreach ($this->productos as $producto) {
            $total += $producto['stock'] * $producto['precio'];
        }
        return $total;
    }

    // Guardar productos en cookies
    private function guardarProductos() {
        setcookie('productos', serialize($this->productos), time() + (86400 * 30), "/");
    }

    // Mostrar todos los productos
    public function mostrarProductos() {
        return $this->productos;
    }
}
?>
