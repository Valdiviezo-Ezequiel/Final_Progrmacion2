<!-- <?PHP

// $catalogoProductos = $_GET['dis'] ?? FALSE;
// $productosTodos = (new Producto())->catalogo_completo($catalogoProductos);
$catalogoProductos = new Producto();
$productosTodos = $catalogoProductos->catalogo_completo();

$productosPrecioAsc = $catalogoProductos->catalogo_completoPrecioAsc();



// $productosMascu = $catalogoProductos->catalogo_x_genero("2");
// echo $productosMascu
// Ahora $productosMasculinos contiene todos los productos del género masculino con ID 2

?>

<div>
        <h2 class=" m-5">Nuestros productos de Nike</h2>
        
        <button type="button" onclick="catalogo_completoPrecioAsc()">
            Cambiar orden
        </button>

        <div class="container d-flex">
            <div class="row justify-content-around">
    
                        <?PHP foreach ($productosTodos as $producto) { ?>

                            <div class="card col-12 col-sm-4  col-md-3 col-lg-3 mt-2 me-2">
                                <img src="img/webp_productos/<?= $producto->getImagen() ?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h3 class="card-title"><?= $producto->getNombre() ?></h3>
                                    <p class="card-text"><?= $producto->descripcion_reducida(20) ?></p>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Lanzamiento: <?= $producto->getLanzamiento() ?></li>
                                    <li class="list-group-item">Precio: <?=$producto->getPrecio() ?> </li>
                                    <li class="list-group-item">Envio: <?= $producto->getEnvio() ?></li>
                                </ul>
                                <div class="card-body m-auto">
                                <a href="index.php?sec=producto&id=<?= $producto->getId() ?>" type="button" class="btn btn-outline-danger anularE">Ver más</a>
                                </div>
                            </div> 

                        <?PHP } ?>



                        <?PHP foreach ($productosPrecioAsc as $producto) { ?>

                            <div class="card col-12 col-sm-4  col-md-3 col-lg-3 mt-2 me-2">
                                <img src="img/webp_productos/<?= $producto->getImagen() ?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h3 class="card-title"><?= $producto->getNombre() ?></h3>
                                    <p class="card-text"><?= $producto->descripcion_reducida(20) ?></p>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Lanzamiento: <?= $producto->getLanzamiento() ?></li>
                                    <li class="list-group-item">Precio: <?=$producto->getPrecio() ?> </li>
                                    <li class="list-group-item">Envio: <?= $producto->getEnvio() ?></li>
                                </ul>
                                <div class="card-body m-auto">
                                <a href="index.php?sec=producto&id=<?= $producto->getId() ?>" type="button" class="btn btn-outline-danger anularE">Ver más</a>
                                </div>
                            </div> 

                            <?PHP } ?>


            </div>

        </div>
    </div>

     -->

     <?php
$catalogoProductos = new Producto();
$productosCompleto = $catalogoProductos->catalogo_completo();
$productosPrecioAsc = $catalogoProductos->catalogo_completoPrecioAsc();

// Verificar si se envió un formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['mostrarCatalogoCompleto'])) {
        $productos = $productosCompleto;
    } elseif (isset($_POST['mostrarCatalogoPrecioAsc'])) {
        $productos = $productosPrecioAsc;
    }
} else {
    // Establecer el catálogo predeterminado
    $productos = $productosCompleto;
}
?>

<div>
    <h2 class="m-5">Nuestros productos de Nike</h2>

    <form method="post">
        <button type="submit" name="mostrarCatalogoCompleto">Todos</button>
        <button type="submit" name="mostrarCatalogoPrecioAsc">Más baratos</button>
    </form>

    <div class="container d-flex">
        <div class="row justify-content-around">
            <?php foreach ($productos as $producto) { ?>
                <div class="card col-12 col-sm-4  col-md-3 col-lg-3 mt-2 me-2">
                                <img src="img/webp_productos/<?= $producto->getImagen() ?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h3 class="card-title"><?= $producto->getNombre() ?></h3>
                                    <p class="card-text"><?= $producto->descripcion_reducida(20) ?></p>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Lanzamiento: <?= $producto->getLanzamiento() ?></li>
                                    <li class="list-group-item">Precio: <?=$producto->getPrecio() ?> </li>
                                    <li class="list-group-item">Envio: <?= $producto->getEnvio() ?></li>
                                </ul>
                                <div class="card-body m-auto">
                                <a href="index.php?sec=producto&id=<?= $producto->getId() ?>" type="button" class="btn btn-outline-danger anularE">Ver más</a>
                                </div>
                            </div> 
            <?php } ?>
        </div>
    </div>
</div>
