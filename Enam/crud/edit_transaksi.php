<?php
spl_autoload_register(function ($class) {
    $file = "../{$class}.php";
    if (is_readable($file)) {
        require_once $file;
    }
});

if (isset($_POST['id'])) {
    $DB = new config();
    $id = htmlspecialchars($_POST['id']);
    $id_cashier = htmlspecialchars($_POST['id_cashier']);
    $id_product = htmlspecialchars($_POST['id_product']);

    $data = array(
        'id' => $id,
        'id_cashier' => $id_cashier,
        'id_product' => $id_product
    );
    $DB->update("UPDATE transaksi SET id_cashier=:id_cashier, id_product=:id_product WHERE id = :id", $data);
    header('location: ../index.php');
}
