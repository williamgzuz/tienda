<?php
 include 'global/config.php';
 include 'global/conexion.php';
 include 'carrito.php';
include 'templates/cabecera.php';
 
?>

        <br>

        <?php if ($mensaje!="") {?>
           
        
        <div class="alert alert-success" role="alert">
        <?php
         echo $mensaje; ?>
            <?php echo $mensaje; ?>
            <a href="mostrarCarrito.php" class="badge badge-success">Ver carrito</a>
        </div>

    <?php } ?>
        <div class="row">

        <?php
            $sql="SELECT ID, Nombre,Precio, Descripcion, concat('http://localhost:90/tienda/img/',Imagen ) as Imagen 
                FROM tblproductos";

            $sentencia=$pdo->prepare($sql);

            $sentencia->execute();
            $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
            //print_r($listaProductos);

        ?>
        <?php
        foreach ($listaProductos as $producto ) {?>
             <div class="col-3">
                <div class="card">
                    <img height="317px" 
                    data-toggle="popover" 
                    data-trigger="hover"
                    data-content="<?php echo $producto['Descripcion'];?>" title="<?php echo $producto['Nombre']; ?>" alt="<?php echo $producto['Nombre']; ?>" class="card-img-top" src="<?php echo $producto['Imagen'];?>" alt="">
                    <div class="card-body">
                        <span><?php echo $producto['Nombre']; ?></span>
                        <h5 class="card-title"><?php echo $producto['Precio']?></h5>
                        <p class="card-tex  t"><?php echo $producto['Descripcion']?></p>
                    <form action="" method="POST">
                        <input type="hidden" name="id"  id="id" value="<?php echo $producto['ID']; ?>">
                        <input type="hidden" name="nombre" id="nombre" value="<?php echo $producto['Nombre']; ?>">
                        <input type="hidden" name="precio"  id="precio" value="<?php echo $producto['Precio']; ?>">
                        <input  type="hidden" name="cantidad" id="cantidad" class="text" value="<?php echo 1 ?>"> 
                        <button class="btn btn-primary" name="btnAccion" value="Agregar" type="submit">Agregar al carrito</button>
                    </form>
                       
                    </div>
                </div>
            </div>
        <?php }
        ?>
            
           
            
        </div>
    </div>
    <script>
       $(function () {
            $('[data-toggle="popover"]').popover()
        })
    </script>

<?php
include 'templates/pie.php';
?>