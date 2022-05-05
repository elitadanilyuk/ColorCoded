<!DOCTYPE html>
<html lang="en">
    <head>
    <link rel="icon" href="../../../m1/assets/img/company_small_icon.png">
    </head>

    <body id="print">
        <main class="main">
            <header>
                <?php
                    $logo = "<img src='../../../m1/assets/img/company_logo.jpg' alt='color coded company logo' style='max-height:50px;'>";
                    echo "<div id='logo' >$logo</div>";
                ?>
            </header>

                <script>
                    document.getElementById("logo").style.display = "none";
                </script>
            <div class="contents-color-gen">
                <form class="form-inputs" action="colorGenerator" target="" method="GET">
                    <p>
                        <label for="colors"><b>Number of Colors:</b></label>
                        <input type="number" id="colors" name="colors" placeholder="Input" min="1" max="10" title="Must be between 1 and 10" required>
                    </p>
                    <p>
                        <label for="num"><b>Number of Rows/Columns:</b></label>
                        <input type="number" id="num" name ="num" placeholder="Input" min="1" max="26" title="Must be between 1 and 26" required>
                    </p>
                    <input type="submit" id="enter" name="enter"> 
                </form>

                <?php
	                $crtable = '';
                    $color_choices = array('red', 'orange', 'yellow', 'green', 'blue', 'purple', 'grey', 'brown', 'black', 'teal');
	                $colors = '';
                    if (isset($_GET['colors'])){
                        $colors = $_GET['colors'];
                        $crtable .= '<table class="table-1" border="2">';
                        for ($i = 0; $i < $_GET['colors']; $i++) {
                            $crtable .= '<tr>';
                            for ($j = 0; $j < 2; $j++) {
                                if($j % 2 == 0){
                                    $crtable .= '<td width="20%"><select class="color_picker drop-down" name="color_picker" id="color_picker">
                                    <option value="blank"> </option>
                                    <option value="red" style="background-color: red; color:white;">Red</option>
                                    <option value="orange" style="background-color: orange;">Orange</option>
                                    <option value="yellow" style="background-color: yellow;">Yellow</option>
                                    <option value="green" style="background-color: green; color:white;">Green</option>
                                    <option value="teal" style="background-color: teal; color:white;">Teal</option>
                                    <option value="blue" style="background-color: blue; color:white">Blue</option>
                                    <option value="purple" style="background-color: purple; color:white;">Purple</option>
                                    <option value="brown" style="background-color: brown; color:white;">Brown</option>
                                    <option value="grey" style="background-color: grey; color:white;">Grey</option>
                                    <option value="black" style="background-color: black; color:white; color:white;">Black</option>
                                    </select></td>';
                                }
                                else{
                                    $crtable .= '<td width="80%">&nbsp;</td>';
                                }
                                
                            }
                            $crtable .= '</tr>';
                        }
                        $crtable .= '</table>';
	                }
                ?>
                <br/>
                <br/>

                <?php
	               echo "<div id='colorTable'>$crtable</div>";
                ?>
                
                <?php
                    $alphabet = range('A', 'Z');
                    $numbers = range(1,26);
                    $num_table = '';
	                $num = '';
	                if (isset($_GET['num'])){ 
                        $num = $_GET['num'];
		                $num_table .= '<table class="table-2" border="2">';
		                for ($i = 0; $i < $_GET['num']+1; $i++) {
			                $num_table .= '<tr>';
			                for ($j = 0; $j < $_GET['num']+1; $j++) {
                                if($i ==0 and $j == 0){
                                    $num_table .= '<td width="50">&nbsp;</td>';
                                }
                                else if($i == 0){
                                    $num_table .= '<td>'.$alphabet[$j - 1].'</td>';
                                }
                                else if($j==0){
                                    $num_table .= '<td>'.$numbers[$i-1].'</td>';
                                }
                                else{
                                    $num_table .= '<td width="50">&nbsp;</td>';
                                }
                            }
                            $num_table .= '</tr>';
                        }
	                }
                ?>
                <br/>
                <br/>

                <?php
	               echo "<div id='alphTable'>$num_table</div>";
                ?>

                <?php 
                    $color_map = '';
                ?>

                <script>
                    let color = document.querySelectorAll(".color_picker");
                    let color_map = new Map();
                    for (let i = 0; i < color.length; i++) {
                        color_map.set(i, 'blank');
                    }
                    for (let i = 0; i < color.length; i++) {
                        color[i].addEventListener("change", () => {
                            let can_set_new_color = true;
                            for (let j = 0; j < color_map.size; j++) {
                                if (color_map.get(j) == color[i].value) {
                                    can_set_new_color = false;
                                }
                            }
                            if (can_set_new_color) {
                                color_map.set(i, color[i].value);
                                document.querySelectorAll(".color_picker")[i].style.background = document.querySelectorAll(".drop-down")[i].value;
                            }
                            else {
                                color[i].value = color_map.get(i);
                                snackbar();
                            }
                        });
                    }

                    function snackbar() {
                        var x = document.getElementById("snackbar");
                        x.className = "show";
                        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                    }
                </script>

                <div id="snackbar" class="no-print">All colors must be different.</div>
                
            </div>

            <div id="print-button">
                <form action="https://cs.colostate.edu:4444/~absarah/ColorCoded/m1/index.php/cc/print" target="" method="GET">
                    <input type="submit" value="Print" class="printable">
                    <input type='hidden' id="colors" name='colors' value='<?php echo $colors;?>'/> 
                    <input type='hidden' id="num" name='num' value='<?php echo $num;?>'/> 
                    <input type='hidden' id="color_map" name='color_map' value='<?php echo $color_map;?>'/> 
                </form>
            </div>   

        </main>
    </body>

    <!-- <form class="form-inputs" action="https://cs.colostate.edu:4444/~absarah/ColorCoded/m1/index.php/cc/print" target="" method="GET">
        <p>
            <label for="colors"><b>Number of Colors:</b></label>
            <input type="number" id="colors" name="colors" placeholder="Input" min="1" max="10" title="Must be between 1 and 10" required>
        </p>
        <p>
            <label for="num"><b>Number of Rows/Columns:</b></label>
            <input type="number" id="num" name ="num" placeholder="Input" min="1" max="26" title="Must be between 1 and 26" required>
        </p>
        <input type="submit" id="enter" name="enter"> 
    </form> -->

    </script>
                   



</html>

