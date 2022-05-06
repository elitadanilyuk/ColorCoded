<!DOCTYPE html>
<html lang="en">
    <head></head>

    <body>
        <form class="color-inputs" action="colorPicker" target="" method="GET">
            <p>
                <label for="color-name"><b>Color Name: </b></label>
                <input type="text" id="color-name" name="color-name" placeholder="Unique color name..." pattern="[a-zA-Z]*" title="Input must be text." required>
            </p>
            <p>
                <label for="hexval"><b>Hex Value: </b></label>
                <input type="text" id="hexval" name ="hexval" placeholder="#..." pattern="^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$" title="Must be a hexidecimal value with a leading '#'." required>
            </p>
            <input type="submit" id="enter" name="enter"> 
        </form>

        <p>Current Colors:</p>


    </body>

    <footer></footer>

</html>

<?php
    $input_color_name = "";
    $input_hexval = "";
    if (isset($_GET['color-name']) && isset($_GET['hexval'])){
        $input_color_name = $_GET['color-name'];
        $input_hexval = $_GET['hexval'];

        $insert = DB::insert('colors', array('color', 'hexval'));
        $insert->values(array($input_color_name, $input_hexval));

        try {
            $insert->execute();
        } catch (Exception $e) {
            $lasterror = DB::error_info();
            // print_r($lasterror);
        }
    }

    try {
        $query = DB::select()->from("colors")->execute()->as_array();
        // print_r($query);
        // $color_array = array();

        for ($i = 0; $i <= 10; $i++) {
            echo $query[$i]['color'];
            echo " - ";
            echo $query[$i]['hexval'];
            echo "<br>";
        }

        // foreach ($query as $color) {
        //     array_push($color_array, $query[0]['color']);
        // }

    } catch (Exception $e) {
        $lasterror = DB::error_info();
        // print_r($lasterror);
    }
?>
