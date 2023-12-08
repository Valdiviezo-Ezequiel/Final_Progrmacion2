<?PHP
$miCarrito = new Carrito();
$items = $miCarrito->get_carrito();
?>
<h1 class="text-center my-5"> Carrito de Compras</h1>
<div class="container my-4">
    <?PHP if (count($items)) { ?>
        <form action="admin/actions/update_items_acc.php" method="POST">
            <table class="table">

                <thead>
                    <tr>
                        <th scope="col" width="15%">Producto</th>
                        <th scope="col">Datos del producto</th>
                        <th scope="col" width="15%">Cantidad</th>
                        <th class="text-end" scope=" col" width="15%">Precio Unitario</th>
                        <th class="text-end" scope="col" width="15%">Subtotal</th>
                        <th class="text-end" scope="col" width="10%"></th>
                    </tr>
                </thead>
                <tbody>
                    <?PHP foreach ($items as $key => $item) { ?>
                        <tr>
                            <td><img src="img/webp_productos/<?= $item['portada'] ?>" alt="Imágen Illustrativa de <?= $item['categoria'] ?>" class="img-fluid rounded shadow-sm"></td>

                            <td class="align-middle">
                                <h2 class="h5"><?= $item['producto'] ?></h2>
                            </td>
                            <td class="align-middle">
                                <label for="q_<?= $key ?>" class="visually-hidden">Cantidad</label>
                                <input type="number" class="form-control" value="<?= $item['cantidad'] ?>" id="q_<?= $key ?>" name="q[<?= $key ?>]">
                            </td>
                            <td class="text-end align-middle">
                                <p class="h5 py-3">$<?= number_format($item['precio'], 2, ",", ".") ?></p>
                            </td>
                            <td class="text-end align-middle">
                                <p class="h5 py-3"> $<?= number_format($item['cantidad'] * $item['precio'], 2, ",", ".") ?></p>
                            </td>
                            <td class="text-end align-middle">
                                <a href="admin/actions/remove_item_acc.php?id=<?= $key ?>" class="btn btn-sm btn-danger">Eliminar</a>
                            </td>
                        </tr>
                    <?PHP } ?>

                    <tr>
                        <td colspan="4" class="text-end">
                            <h2 class="h5 py-3">Total:</h2>
                        </td>
                        <td class="text-end">
                            <p class="h5 py-3">$<?= number_format($miCarrito->precio_total(), 2, ",", ".") ?></p>
                        </td>
                        <td></td>
                    </tr>
                </tbody>



            </table>



            <div class="d-flex justify-content-end gap-2">
                <input type="submit" value="Actualizar Cantidades" class="btn btn-warning">
                <a href="index.php?sec=catalogo_completo" role="button" class=" btn btn-danger">Seguir comprando</a>
                <a href="admin/actions/clear_items_acc.php" role="button" class="btn btn-danger">Vaciar Carrito</a>
                <a href="#" role="button" class="btn btn-primary">Finalizar Compra</a>
            </div>

        </form>
    <?PHP } else { ?>
        <div class="m-auto text center">
            <h2 class="text-center mb-5 text-black">Su carrito esta vacio</h2>
            <img src="img/extras/carritoVacio.png" alt="Carrito vacio">
        </div>
    <?PHP } ?>


</div>