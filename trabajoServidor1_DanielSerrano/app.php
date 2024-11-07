<?php
session_start();

class App {
    public function run() {
        $method = isset($_GET['method']) ? $_GET['method'] : 'login';
        
        if (method_exists($this, $method)) {
            $this->$method();
        } else {
            echo "Método no encontrado.";
        }
    }

    private function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            if ($this->verificarUsuario($email, $password)) {
                header("Location: main.php?method=home");
                exit();
            } else {
                $error = "Correo o contraseña inválidos.";
                include 'views/login.php';
            }
        } else {
            include 'views/login.php';
        }
    }

    private function home() {
        if (!isset($_SESSION['usuario'])) {
            header("Location: main.php?method=login");
            exit();
        }

        $inventario = $this->obtenerInventario();
        include 'views/home.php';
    }

    private function cerrarSesion() {
        session_unset();
        session_destroy();
        header("Location: main.php?method=login");
        exit();
    }

    private function agregarProducto() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $stock = $_POST['stock'];
            $precio = $_POST['precio'];
            $this->guardarProducto($nombre, $stock, $precio);
            header("Location: main.php?method=home");
            exit();
        }
    }

    private function eliminarProducto() {
        if (isset($_GET['index'])) {
            $index = $_GET['index'];
            unset($_SESSION['inventario'][$index]);
            header("Location: main.php?method=home");
            exit();
        }
    }

    // NUEVOS MÉTODOS

    private function buscarProducto() {
        $resultado = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $resultado = array_filter($this->obtenerInventario(), function ($producto) use ($nombre) {
                return stripos($producto['nombre'], $nombre) !== false;
            });
        }
        include 'views/buscarProducto.php';
    }

    private function registrarProducto() {
        include 'views/registrarProducto.php';
    }

    private function valorTotal() {
        $total = $this->calcularValorTotal();
        include 'views/valorTotal.php';
    }

    // Funciones auxiliares
    private function verificarUsuario($email, $password) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL) && strlen($password) >= 8) {
            $_SESSION['usuario'] = $email;
            return true;
        }
        return false;
    }

    private function guardarProducto($nombre, $stock, $precio) {
        $_SESSION['inventario'][] = [
            'nombre' => $nombre,
            'stock' => $stock,
            'precio' => $precio
        ];
    }

    private function obtenerInventario() {
        return $_SESSION['inventario'] ?? [];
    }

    private function calcularValorTotal() {
        $total = 0;
        foreach ($this->obtenerInventario() as $producto) {
            $total += $producto['stock'] * $producto['precio'];
        }
        return $total;
    }
}
?>
