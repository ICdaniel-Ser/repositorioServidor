<?php
class App
{

    public function run()   {  // Determina qué método ejecutar a través de la URL
    if (isset($_GET['method'])) {
        $method = $_GET['method'];
    } else {
        $method = 'login';
    }
    
    // Verifica si el método existe en la clase antes de ejecutarlo
    if (method_exists($this, $method)) {
        $this->$method();
    } else {
        echo "Método no encontrado.";
    }
}
    public function home()
    {
      
      include('views/home.php');
    }
    public function login()
    {
    
      include('views/login.php');
    }
    public function auth()
    {
        if(isset($_POST["name"]) && isset($_POST["password"])){
            $name = $_POST["name"];
            $password =$_POST["password"];
            setcookie("name",$name,time()+3600*24);
            setcookie("password",$password,time()+3600*24);
            header("Location: ?method=home"); //derigir a la pagina home 

        }
      
     
    }
    public function logout(){
        //eliminar cookies  name y password
        setcookie("name", "", time() - 3600);
        setcookie("password", "", time() - 3600);
        header("Location: ?method=login"); //derigir al login
        exit();
    }
}
