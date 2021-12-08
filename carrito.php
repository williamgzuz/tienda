<?php

session_start();



$mensaje="";
if (isset($_POST['btnAccion'])) {
    switch ($_POST['btnAccion']) {
        case 'Agregar':
            if (is_numeric($_POST['id'])) {
               $ID=$_POST['id'];
                $mensaje.="OK Id correcto".$ID."<br>"; 
            }else {
                $mensaje.="Upss .... ID incorrecto:"."<br>";
            }

            if (is_string($_POST['nombre'])) {
                $NOMBRE=$_POST['nombre'];
                $mensaje.="Ok nombre".$NOMBRE."<br>";

            } else {
                $mensaje.="Upss .... nombre incorrecto:"."<br>";
                break;
            }
            if (is_numeric($_POST['cantidad'])) {
                $CANTIDAD=$_POST['cantidad'];
                $mensaje.="Ok cantidad".$CANTIDAD."<br>";
            } else {
                $mensaje.="Upss .... cantidad incorrecto:"."<br>";
                break;
            }
            if (is_numeric($_POST['precio'])) {
                $PRECIO=$_POST['precio'];
                $mensaje.="Ok precio".$PRECIO."<br>";
            } else {
                $mensaje.="Upss algo pasa con elprecio"."<br>";
                break;
            }
            
            if (!isset($_SESSION['CARRITO'])) {
                $producto=array(
                    'ID'=>$ID,
                    'NOMBRE'=>$NOMBRE,
                    'CANTIDAD'=>$CANTIDAD,
                    'PRECIO'=>$PRECIO
                );
                $_SESSION['CARRITO'][0]=$producto;
                $mensaje="Producto agregado al carrito";

            }else {
            $idProductos=array_column($_SESSION['CARRITO'],"ID");


                if (in_array($ID,$idProductos)) {
                    foreach ($_SESSION['CARRITO'] as $indice => $producto) {
                        if ($producto['ID']==$ID) {
                            $_SESSION['CARRITO'][$indice]['CANTIDAD'] += 1;
                        }
                    }
                   //echo "<script>alert('El producto ya ha sido seleccionado');</script>";

                   
                   // $mensaje="";
                }else {
                    $NumeroProductos=count($_SESSION['CARRITO']);
                    $producto=array(
                        'ID'=>$ID,
                        'NOMBRE'=>$NOMBRE,
                        'CANTIDAD'=>$CANTIDAD,
                        'PRECIO'=>$PRECIO
                    );
                    $_SESSION['CARRITO'][$NumeroProductos]=$producto;
                    $mensaje="Producto agregado al carrito";
                }
             
            }
           // $mensaje=print_r($_SESSION,true);
           
            break;
            case "Eliminar":
                if (is_numeric($_POST['id'])) {
                    $ID=$_POST['id'];
                    
                    foreach ($_SESSION['CARRITO'] as $indice => $producto) {
                        if ($producto['ID']==$ID) {
                            unset($_SESSION['CARRITO'][$indice]);
                            echo "<script>
                        alert('Elemento borrado........');                           
                            </script>";
                        }
                    }
                }
            break;
       
    }
}

