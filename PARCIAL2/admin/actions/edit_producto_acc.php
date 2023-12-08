<?PHP 
require_once "../../functions/autoload.php";

$postData = $_POST;
$id = $_GET['id'] ?? FALSE;


try {

    $producto = (new Producto())->producto_x_id($id);

    $producto->edit(
        $postData['nombre'],
        $postData['descripcion'],
        $postData['categoria_id'],
        $postData['talles'],
        $postData['color'],
        $postData['genero_id'],
        $postData['disciplinas_id'],
        $postData['precio'],
        $postData['fecha_lanzamiento'],
        $postData['envio'],
        $postData['imagen'],
    );
    (new Alerta())->add_alerta('primary', "Se edito exitosamente el producto");
    header('Location: ../index.php?sec=admin_producto');
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . " Data: " . print_r($postData, true);
    (new Alerta())->add_alerta('danger', "No se pudo editar el producto");
    //header('Location: ../index.php?sec=admin_producto');
}