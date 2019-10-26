<?php
class Empat
{

    public static function tesArray($array)
    {
        $result = array();
        foreach ($array as $data) {
            array_push($result, array(
                'name' => $data['name'],
                'info' => $data['info']
            ));
            foreach ($data['data'] as $dimensi_key_data) {
                array_push($result, array(
                    'name' => $dimensi_key_data['name'],
                    'info' => $dimensi_key_data['info']
                ));
            }
        }
        return $result;
    }

}
?>
<marquee><h2>No. Empat</h2></marquee>
<pre>
        <?php
        $array_input = array(
            array(
                'name' => "Movies",
                'info' => "category_name",
                'data' => array(
                    array(
                        'name' => "Interstellar",
                        'info' => "category_data"
                    ),
                    array(
                        'name' => "Dark Knight",
                        'info' => "category_data"
                    )
                )
            ),
            array(
                'name' => "Music",
                'info' => "category_name",
                'data' => array(
                    array(
                        'name' => "Adams",
                        'info' => "category_data"
                    ),
                    array(
                        'name' => "Nirvana",
                        'info' => "category_data"
                    )
                )
            )
        );
        echo print_r(Empat::tesArray($array_input));
        ?>
    </pre>
