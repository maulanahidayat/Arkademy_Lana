<?php
spl_autoload_register(function ($class) {
    $file = "../{$class}.php";
    if (is_readable($file)) {
        require_once $file;
    }
});

if (isset($_POST['id_product'])) {
    $DB = new config();
    $id_product = htmlspecialchars($_POST['id_product']);
    $fetch = $DB->first("SELECT price, category FROM product_view WHERE id = $id_product");
    print json_encode($fetch);