<?php
class app
{

    public function run()
    {  // Determina qué método ejecutar a través de la URL
        if (isset($_GET['method'])) {
            $method = $_GET['method'];
        } else {
            $method = 'login';
        }
        $this->$method();
    }

    public function login()
    {
        include("views/login.php");
    }


    public function home()
    {

        include("views/home.php");
    }

    public function auth()
    {
        session_start();
        if (isset($_POST["correo"]) && isset($_POST["password"])) {
            if ($_POST['correo'] = "@" && $_POST['password'] == "") {
                $_SESSION['correo'] = $_POST['correo'];
                $_SESSION['password'] = $_POST['password'];
                header("Location: ?method=home"); //derigir a la pagina home 
            }
            else{
                header("Location: ?method=login");
            }
            
        } 
    }
}
