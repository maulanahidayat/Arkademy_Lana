<?php
spl_autoload_register(function ($class) {
    $file = "./{$class}.php";
    if (is_readable($file)) {
        require_once $file;
    }
});
$DB = new config();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>NO. 6</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="#">
        <strong class="text-danger">Maulana Hidayat</strong> <strong>Coffee Shop</strong>
    </a>
    <ul class="nav justify-content-end">
        <li class="nav-item">
            <a data-toggle="modal" href="#modal_create" class="btn btn-outline-success">Add</a>
        </li>
    </ul>
</nav>
<div class="container mt-2">
    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <thead class="thead-light">
                <tr>
                    <th>No</th>
                    <th>Cashier</th>
                    <th>Product</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($DB->getAllTransaksi() as $array_key_transaksi => $transaksi) {
                    ?>
                    <tr>
                        <td><?= $array_key_transaksi + 1 ?></td>
                        <td><?= $transaksi['cashier'] ?></td>
                        <td><?= $transaksi['name'] ?></td>
                        <td><?= $transaksi['category'] ?></td>
                        <td><?= $transaksi['price'] ?></td>
                        <td>
                            <div class="btn-group">
                                <a
                                        data-toggle="modal"
                                        data-u_id="<?= $transaksi['id'] ?>"
                                        data-u_id_cashier="<?= $transaksi['id_cashier'] ?>"
                                        data-u_id_product="<?= $transaksi['id_product'] ?>"
                                        data-u_price="<?= $transaksi['price'] ?>"
                                        data-u_category="<?= $transaksi['category'] ?>"
                                        class="btn btn-outline-primary"
                                        href="#modal_update">Update</a>
                                <a
                                        data-toggle="modal"
                                        data-d_id="<?= $transaksi['id'] ?>"
                                        class="btn btn-outline-danger"
                                        href="#modal_delete">Delete</a>
                            </div>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_create">
    <div class="modal-dialog">
        <form action="crud/tambah_transaksi.php" method="post" autocomplete="off">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="kasir">Cashier</label>
                        <select class="form-control" id="kasir" name="id_cashier" required>
                            <option disabled>Pilih Kasir</option>
                            <?php
                            $fetch_cashier = $DB->get('SELECT id, name FROM cashier ORDER BY id DESC');
                            foreach ($fetch_cashier as $cashier) {
                                ?>
                                <option value="<?= $cashier['id'] ?>"><?= $cashier['name'] ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="produk">Product</label>
                        <select class="form-control" id="produk" name="id_product" required>
                            <option disabled>Pilih Produk</option>
                            <?php
                            $fetch_product = $DB->get('SELECT id, name FROM product ORDER BY id DESC');
                            foreach ($fetch_product as $product) {
                                ?>
                                <option value="<?= $product['id'] ?>"><?= $product['name'] ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="val_kategori">Kategori</label>
                        <input class="form-control" id="val_kategori">
                    </div>
                    <div class="form-group">
                        <label for="val_harga">Harga</label>
                        <input class="form-control" id="val_harga">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="modal_delete">
    <div class="modal-dialog">
        <form action="crud/hapus_transaksi.php" method="post" autocomplete="off">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="d_id" name="id">
                    <h6>Hapus Transaksi ?</h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-outline-primary">Ya</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="modal_update">
    <div class="modal-dialog">
        <form action="crud/edit_transaksi.php" method="post" autocomplete="off">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Update</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="u_id" name="id">
                    <div class="form-group">
                        <label for="u_kasir">Cashier</label>
                        <select class="form-control" id="u_kasir" name="id_cashier" required>
                            <option disabled>Pilih Kasir</option>
                            <?php
                            $fetch_cashier = $DB->get('SELECT id, name FROM cashier ORDER BY id DESC');
                            foreach ($fetch_cashier as $cashier) {
                                ?>
                                <option value="<?= $cashier['id'] ?>"><?= $cashier['name'] ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="u_produk">Product</label>
                        <select class="form-control" id="u_produk" name="id_product" required>
                            <option disabled>Pilih Produk</option>
                            <?php
                            $fetch_product = $DB->get('SELECT id, name FROM product ORDER BY id DESC');
                            foreach ($fetch_product as $product) {
                                ?>
                                <option value="<?= $product['id'] ?>"><?= $product['name'] ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="u_val_kategori">Kategori</label>
                        <input class="form-control" id="u_val_kategori">
                    </div>
                    <div class="form-group">
                        <label for="u_val_harga">Harga</label>
                        <input class="form-control" id="u_val_harga">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        'use strict'

        $('#produk').change(function () {
            $.ajax({
                url: "ajax/OtomatisKategoriDanHarga.php",
                data: {
                    'id_product': $(this).val()
                },
                method: 'POST',
                success: function (parsing_data) {
                    let data = JSON.parse(parsing_data);
                    $('#val_kategori').val(data.category);
                    $('#val_harga').val(data.price);
                }
            })
        });

        $('#u_produk').change(function () {
            $.ajax({
                url: "ajax/OtomatisKategoriDanHarga.php",
                data: {
                    'id_product': $(this).val()
                },
                method: 'POST',
                success: function (parsing_data) {
                    let data = JSON.parse(parsing_data);
                    $('#u_val_kategori').val(data.category);
                    $('#u_val_harga').val(data.price);
                }
            })
        });

        $(document).on("click", ".modal_delete", function () {
            let id = $(this).data('d_id');
            $('.modal-body #d_id').val(id);
        });

        $(document).on("click", ".modal_update", function () {
            let id = $(this).data('u_id');
            let category = $(this).data('u_category');
            let price = $(this).data('u_price');
            let id_cashier = $(this).data('u_id_cashier');
            let id_product = $(this).data('u_id_product');
            $('.modal-body #u_id').val(id);
            $('.modal-body #u_val_kategori').val(category);
            $('.modal-body #u_val_harga').val(price);
            $('.modal-body #u_kasir').val(id_cashier);
            $('.modal-body #u_produk').val(id_product);
        });

    });
</script>

</body>
</html>

