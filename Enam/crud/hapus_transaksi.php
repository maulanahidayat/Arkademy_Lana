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
    $data = array(
        'id' => $id
    );
    $DB->delete("DELETE FROM transaksi WHERE id = :id", $data);
    header('location: ../index.php');
}
