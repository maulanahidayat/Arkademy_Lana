<?php

class Lima {

    public static function findHighestProfit($array) {
        $beli_saham = array();
        $jual_saham = $array[0];
        foreach ($array as $array_key => $data) {
            if ($array_key > 0) {
                if ($beli_saham < $array[$array_key]) {
                    $jual_saham = (int)$jual_saham + (int)$array[$array_key];
                } 
            }
        }
        return "Tidak bisa mendapatkan profit pada hari-hari
ini karena ini saya kurang mengerti :(";
    }

}

?>
<h2>Lima</h2>
<p>
    <?php
    $input = [10, 2, 11, 20, 3, 5];
    echo Lima::findHighestProfit($input);
    ?>
</p>
<hr>
