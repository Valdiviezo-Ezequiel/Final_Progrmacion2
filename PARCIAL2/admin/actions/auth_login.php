<?PHP
require_once "../../functions/autoload.php";

$postData = $_POST;

$login = (new Autenticacion())->log_in($postData['username'], $postData['pass']);


if ($login) {

    header('location: ../index.php?sec=dashboard');
} else {
    header('location: ../index.php?sec=login');
}
