<?php
class app
{
    public function run()   {  // Determina qué método ejecutar a través de la URL
        if (isset($_GET['method'])) {
            $method = $_GET['method'];
        } else {
            $method = 'login';
        }
            $this->$method();

    }

    public function login(){
        if(isset($_COOKIE['name'])&& isset($_COOKIE['PASSWORD'])){
            if($_COOKIE['name']!= "" && $_COOKIE['PASSWORD'] != ""){
                header('Location:?method=home');
            }
        }else{
            include("views/login.php");
        }
    }
    public function home()
    {
      
      include('views/home.php');
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

     public function new(){
        //Primero comprobar si tenemos una coockie que sea una lista de deseos
        if(isset ($_COOKIE['listaDeseo'])){
            //Si existe la lista deserializamos  la cookie
            $listaDeseo = unserialize($_COOKIE['listaDeseo']);
        }else{
            //Si no existe la lista creamos una nueva lista vacia
            $listaDeseo = [];
        }
        //Mostramos la vista 
        if(isset($_POST['deseo'])){
            $nuevoDeseo = $_POST['deseo'];
        }
        $listaDeseo[] = $nuevoDeseo;
        //Serializamos la lista de deseos
        setcookie("listaDeseo",serialize($listaDeseo),time()+3600*24);
        header("Location: ?method=home");
        
     }
     public function delete(){
       
     }
     public function empty(){
        if(isset ($_COOKIE['listaDeseo'])){
            //setcookie("listaDeseo",serialize($listaDeseo),time()-1);
        }
     }
     public function close(){

     }
}
