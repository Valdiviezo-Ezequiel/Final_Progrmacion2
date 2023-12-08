<?PHP

class Carrito
{

    /**
     * Agrega un item al carrito de compras
     * @param int $productoID El ID del producto que se va a agregar.
     * @param int $cantidad La cantidad de unidades del producto que se van a agregar
     */
    public function add_item(int $productoID, int $cantidad)
    {
        $itemData = (new Producto)->producto_x_id($productoID);
        if ($itemData) {
            $_SESSION['carrito'][$productoID] = [
                'producto' => $itemData->getNombre(),
                'categoria' => $itemData->getCategoria(),
                'portada' => $itemData->getImagen(),
                'precio' => $itemData->getPrecio(),
                'cantidad' => $cantidad
            ];
        }
    }

    /**
     * Elimina un item del carrito de compras
     * @param int $productoID El id del producto a elminar
     */
    public function remove_item(int $productoID)
    {
        if (isset($_SESSION['carrito'][$productoID])) {
            unset($_SESSION['carrito'][$productoID]);
        }
    }

    /**
     * Vacia el carrito de compras
     */
    public function clear_items()
    {
        $_SESSION['carrito'] = [];
    }


    /**
     * devuelve el contenido del carrito de compras actual
     */
    public function get_carrito(): array
    {
        if (!empty($_SESSION['carrito'])) {
            return $_SESSION['carrito'];
        } else {
            return [];
        }
    }


    /**
     * Actualiza las cantidades de los ids provistos
     * @param array $cantidades Array asociativo con las cantidades de cada ID
     */
    public function update_quantities(array $cantidades)
    {
        foreach ($cantidades as $key => $value) {
            if (isset($_SESSION['carrito'][$key])) {
                $_SESSION['carrito'][$key]['cantidad'] = $value;
            }
        }
    }

        /**
     * Devuelve el precio total actual del carrito de compras
     */
    public function precio_total()
    {
        $total = 0;
        if (!empty($_SESSION['carrito'])) {
            foreach ($_SESSION['carrito'] as $item) {
                $total += $item['precio'] * $item['cantidad'];
            }
        }
        return $total;
    }
}
