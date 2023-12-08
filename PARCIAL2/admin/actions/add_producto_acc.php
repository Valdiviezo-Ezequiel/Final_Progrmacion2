<?PHP
require_once "../../functions/autoload.php";

$postData = $_POST;

try {

    (new Producto())->insert(
        $postData['nombre'],
        $postData['descripcion'],
        $postData['categorias_id'],
        $postData['talles'],
        $postData['color'],
        $postData['genero_id'],
        $postData['disciplinas_id'],
        $postData['precio'],
        $postData['fecha_lanzamiento'],
        $postData['envio'],
        $postData['imagen'],
    );
    (new Alerta())->add_alerta('primary', "Se cargo exitosamente el producto");
    header('Location: ../index.php?sec=admin_producto');
} catch (Exception $e) {
    (new Alerta())->add_alerta('danger', "No se pudo cargar el producto");
    header('Location: ../index.php?sec=admin_producto');
}

?>

<!-- <?PHP
require_once "../../functions/autoload.php";

$postData = $_POST;

try {
    // Validar y obtener el valor de 'genero_id'
    $genero_id = filter_input(INPUT_POST, 'genero_id', FILTER_VALIDATE_INT);

    // Verificar si 'genero_id' es un valor válido
    if ($genero_id === false) {
        // Manejar el error, redirigir o mostrar un mensaje al usuario
        echo "Error: El valor de genero_id no es válido.";
        exit;
    }

    (new Producto())->insert(
        $postData['nombre'],
        $postData['descripcion'],
        $postData['categoria_id'],
        $postData['talles'],
        $postData['color'],
        $genero_id,
        $postData['disciplinas_id'],
        $postData['precio'],
        $postData['fecha_lanzamiento'],
        $postData['envio'],
        $postData['imagen'],
    );
    (new Alerta())->add_alerta('primary', "Se cargo exitosamente el producto");
    header('Location: ../index.php?sec=admin_producto');
} catch (Exception $e) {
    // echo "Error: " . $e->getMessage() . "Data" . $postData;
    echo "Error: " . $e->getMessage() . " Data: " . print_r($postData, true);
    (new Alerta())->add_alerta('danger', "No se pudo cargar el producto");
    //header('Location: ../index.php?sec=admin_producto');
}  
?>-->
