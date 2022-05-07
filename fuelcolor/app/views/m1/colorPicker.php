<!DOCTYPE html>
<html lang="en">
    <head></head>

    <body>
        <form class="form-inputs colors-form" action="colorPicker" target="" method="GET">
            <h3>Edit or Add a New Color</h3>
            <p>
                <label for="color-name"><b>To edit enter an existing color name: </b></label>
                <input type="text" id="curr-color-name" name="curr-color-name" placeholder="Unique color name..." pattern="[a-zA-Z]*" title="Input must be text." required>
            </P>
            <p>
                <label for="color-name"><b>Updated or new color name: </b></label>
                <input type="text" id="color-name" name="color-name" placeholder="Unique color name..." pattern="[a-zA-Z]*" title="Input must be text." required>
            </p>
            <p>
                <label for="hexval"><b>Updated or new hex value: </b></label>
                <input type="text" id="hexval" name ="hexval" placeholder="#..." pattern="^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$" title="Must be a hexidecimal value with a leading '#'." required>
            </p>
            <input type="submit" id="enter" name="enter"> 
        </form>
        <br>
        <p class="center-colors"><h3>Current Available Colors:</h3></p>
        <div class="center-colors">
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
                        echo "<input type='checkbox' class='selectColor inact' id='selectColor'>";
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
            <br>
            <input type="submit" id="delete" name="delete" value="Delete">
        </div>
    </body>

    <footer></footer>

</html>
