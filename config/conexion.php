<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<!-- * * Autor: Ashanty Lizeth Ceballos Pech                                     * *-->
<!-- * * Descripción: Código donde se establece la conexión de la BD usando      * *-->
<!-- * *              fPDO.                                                      * *-->
<!-- * * Fecha: 04/07/2022                                                       * *-->
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<?php
    //Clase para establecer la conexión de la BD usando PDO
    class Conectar{
        protected $dbhost; //Es una variable protegida reconocida en su clase
        
        //Función para conectar la BD
        protected function conexion(){
            try{
                //$conectar = $this -> dbhost = new PDO("mysql:host=localhost; dbname=ferreteria_apirest", "root", "");
                $conectar = $this -> dbhost = new PDO("mysql:host=us-cdbr-east-06.cleardb.net; dbname=heroku_752fa3627c8c3b0", "b35c25be0740b0", "5e42d77d");
                return $conectar;
            } catch(Exception $e){
                print "!!!Error: ".$e -> getMessage()." <br> ";
                die();
            }
        }

        //Función para la codificación de caracteres UTF
        public function set_names(){
            return $this -> dbhost -> query("SET NAMES 'utf8'");
        }
    }
?>