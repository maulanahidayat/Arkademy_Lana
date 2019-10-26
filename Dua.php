<?php
class Dua {
    public static function is_name_valid($nama = null) {
        if (empty($nama)) {
            return 'Isi nama lengkap';
        } elseif (!empty($nama)) {
            $cek_nama = preg_match("/^[A-Z ]{3,}$/", $nama);
            if (!$cek_nama) {
                return "Format Nama: minimal 3 huruf dan harus huruf kapital semuanya";
            } else {
                return true;
            }
        }
    }
    public static function is_age_valid($umur = null) {
        if (empty($umur)) {
            return 'Tolong isi umur anda';
        } elseif (!empty($umur)) {
            $cek_umur = preg_match('/^[0-9]{0,2}$/', $umur);
            if (!$cek_umur) {
                return "Format Umur: 2 digit angka";
            } else {
                return true;
            }
        }
    }
    public static function is_username_valid($username = null) {
        if (empty($username)) {
            return 'Isi username Lengkap';
        } elseif (!empty($username)) {
            $cek_username = preg_match('/^[a-z]{4}+([_]|[.])+[0-9]{3}$/', $username);
            if (!$cek_username) {
                return "Format Username: merupakan kombinasi dari 4 huruf kecil lalu
diikuti underscore/garis bawah “_” atau titik “.” dan 3 digit angka";
            } else {
                return true;
            }
        }
    }
}
?>
<hr>
<h1>nomor dua</h1>
<p>
    Nama : <?= Dua::is_name_valid('MAULANA HIDAYAT') ?><br>
    Umur : <?= Dua::is_age_valid(22) ?><br>
    Username : <?= Dua::is_username_valid('lana_777') ?>
</p>
<hr>