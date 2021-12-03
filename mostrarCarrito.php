<?php
include 'global/config.php';
include 'carrito.php';
include 'templates/cabecera.php';

?>

<br>
<h3>Lista del carrito</h3>

<table class="table table-light">
    <tbody>
        <tr>
            <th width="40%">Descripción</th>
            <th width="15%" class="text-center">Cantidad</th>
            <th width="20%" class="text-center">Precio</th>
            <th width="20%" class="text-center">Total</th>
            <th width="5%">--</th>
        </tr>
        <tr>
            <td width="40%"></th>
            <td width="15%" class="text-center">1</th>
            <td width="20%" class="text-center">S/. 300</th>
            <td width="20%" class="text-center">Total</th>
            <td width="5%"><button class="btn btn-danger" type="button">Eliminar</button></th>
        </tr>
        <tr>
            <td width="40%"></th>
            <td width="15%" class="text-center">1</th>
            <td width="20%" class="text-center">Precio</th>
            <td width="20%" class="text-center">Total</th>
            <td width="5%"><button class="btn btn-danger" type="button">Eliminar</button></th>
        </tr>
        <tr>
            <td colspan="3" align="right"><h3>Total</h3></td>
            <td align="right"><h3>S/. <?php echo number_format(300,2); ?> </h3></td>
            <td></td>
        </tr>
    </tbody>
</table>

<?php
include 'templates/pie.php';
?>