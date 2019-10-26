<h3>method/function yang menerima parameter hanya deret angka dan
menghasilkan output secara berurutan</h3>
<?php
class Tiga {
    public static function divideAndSort($angka = null) {
        if (empty($angka)) {
            return 'Tolong isi inputan angka';
        } elseif (!empty($angka)) {
            $explode_angka = explode('0', $angka);
            return (int)self::Sort($explode_angka[0]).self::Sort($explode_angka[1]).self::Sort($explode_angka[2]);
        }
    }
    private static function Sort($raw_sort) {
        $raw_split = str_split($raw_sort);
        sort($raw_split);
        $result = implode('', $raw_split);
        return $result;
    }
}
?>
<br>
Input: divideAndSort(5956560159466056)<br>
    Output : <?= Tiga::divideAndSort(5956560159466056) ?>
