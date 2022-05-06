<!DOCTYPE html>
<html lang="en">
    <head>
    </head>

    <body>
        <main class="main">
            <header>
            </header>
            <div class="home-content">
                <h2>Our website is here to help you have some fun!</h2>
                <p>Now the question is how do you do it, have fun?</p>
                <p>You will be creating a 'Color by Coordinate' coloring activity!</p>
                <br>
                <div class="main-content">
                    <p>Go to our 'Color Picker' tab. Here you can edit, add, and delete existing colors to 'color' with.</P>
                    <p>Next, go to our 'Generator' tab.<br>This is where the <i>real</i> fun starts!</p>
                    <p>
                        <ul>In the 'Generator' page you will:
                            <li>select the number of colors you want to color with</li>
                            <li>select the grid size (up to 26)</li>
                            <li>click 'Submit'</li>
                            <p>Once the tables are viewable, select your desired colors in the upper table.</p>
                            <li>click the button next to the desired color to activate it and color in the cells of the lower table
                                <ul><li>as you color in the lower table, the coordinates will be added to the selected color in the upper table</li></ul>
                            </li>
                            <li>Once you're happy with your colorful image, click the 'Print' button.</li>
                            <p>This will bring you to a printable 'color by coordinate' page so others can color it in by your created coordinates!</p>
                        </ul>
                    </p>
                </div> 
            </div>
        </main>
    </body>

</html>

<?php

    $db = DB::instance();
    // $query = DB::query('select * from `colors`');
    $color = DB::select()->from('colors')->execute();
    echo DB::last_query();

?>
