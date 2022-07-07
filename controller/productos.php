<?php
    //Encabezado para que PHP reconozca que se van a intercambiar archivos JSON
    header('Content-Type: application/json');
    
    //Este archivo será el controlador del API REST, aquí se van a hacer las operaciones del CRUD
    //CREATE, READ, UPDATE, DELETE
    require_once "../config/conexion.php";
    require_once "../models/Productos.php";

    //Para recibir solicitudes de la URI
    $body = json_decode(file_get_contents("php://input"),true);

    //Instanciar el objeto producto se usará para realizarlas acciones del API
    $producto = new Producto(); 

    //Crear el Web service que realice las acciones del CRUD por medio de la API REST, el switch será el encargado de atender las peticiones
    switch($_GET["opcion"]){
        //Este caso, recupera todos los datos de la tabla productos, la información recuperada de lo que indica el archivo models->Productos.php -> método get_producto()
        case "getAll":
            $datos = $producto -> get_producto();
            //Una vez recuperados los datos, se les da formato json
            echo json_encode($datos);
            break;
        //Para recuperar un registro se ocupa get, que tiene el id del producto
        case "get":
            $datos = $producto -> get_producto_id($body["id"]); //Este id es el de la tabla a consultar
            echo json_encode($datos);
            break;
        //Para insertar un registro se deben mandar los campos en el json
        case "insert":
            //Datos a insertar en la tabla
            $datos = $producto -> insert_producto($body["nombre"],$body["marca"],$body["descripcion"],$body["precio"]);
            echo json_encode("Producto Insertado");
            break;
        //Para actualizar un registro se deben mandar los campos en el json
        case "update":
            //Datos a actualizar en la tabla
            $datos = $producto -> update_producto($body["id"],$body["nombre"],$body["marca"],$body["descripcion"],$body["precio"]);
            echo json_encode("Producto Actualizado");
            break;
        //Para hacer un borrado lógico de un  un registro
        case "delete":
            //Solo el id
            $datos = $producto -> delete_producto($body["id"]);
            echo json_encode("Producto eliminado");
            break;
        //Para hacer un borrado físico de un  un registro
        case "kill":
            //Solo el id
            $datos = $producto -> kill_producto($body["id"]);
            echo json_encode("Producto eliminado completamente");
            break;
        case "getSucursales":
            $datos = $producto -> get_sucursales();
            //Una vez recuperados los datos, se les da formato json
            echo json_encode($datos); //
            break;
            case "getProductos":
                $datos = $producto -> get_productos();
                //Una vez recuperados los datos, se les da formato json
                echo json_encode($datos); //
                break;
    }
?>