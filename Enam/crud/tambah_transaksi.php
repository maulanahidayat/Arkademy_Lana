<?php
spl_autoload_register(function ($class) {
    $file = "../{$class}.php";
    if (is_readable($file)) {
        require_once $file;
    }
});

if (isset($_POST['id_product']) AND isset($_POST['id_cashier'])) {
    $DB = new config();
    $id_product = htmlspecialchars($_POST['id_product']);
    $id_cashier = htmlspecialchars($_POST['id_cashier']);
    $data = array(
        'id_product' => $id_product,
        'id_cashier' => $id_cashier
    );
    $DB->create("INSERT INTO transaksi (id_product, id_cashier) VALUES (:id_product, :id_cashier)", $data);
    header('location: ../index.php');
}


