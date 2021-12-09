<?php

// Class Conexion{

//     private $host = null;
//     private $user = null;
//     private $pass = null;
//     private $db = null;
//     private $conect = null;

//     public function __construct(){
//         $this->host ="localhost";
//         $this->user = "root";
//         $this->pass = "";
//         $this->db = "izipay_incrustado";
//         $this->conect = "";

//     }


//     public function conectar(){
        // $conection = "mysql:hos=".$this->host.";dbname=".$this->db.";charset=utf8";
//         try{
//             $this->conect = new PDO($conection, $this->user, $this->pass);
//             $conection= $this->conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//             echo "Conexion exitosa";
//         }catch(Exception $e){
//             $this->conect="Error de conexión";
//             echo "ERROR:".$e->getMessage(); 
//         }
//         return $conection;
//     }
//     public function desconectar(){
//         $this->conect=null;
//         $this->conection = null;
//         echo "Conexión finalizada";
//     }
// }
// $pdo = new PDO('mysql:host=localhost;dbname=izipay_incrustado','root','');
// header("location:index.php");

// $cn = new Conexion();
// $cn->conectar();
// $cn->desconectar();