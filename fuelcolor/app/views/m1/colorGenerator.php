<!DOCTYPE html>
<html lang="en">
    <head>
    </head>

    <body>
        <main class="main">
            <div class="contents">
                <form action="colorGenerator" target="" method="GET">
                    <p>
                        <label for="num"><b>Number of Rows/Columns:</b></label>
                        <input type="number" id="num" name ="num" placeholder="Input" min="1" max="26" title="Must be between 1 and 26" required>
                    </p>
                    <p>
                        <label for="colors"><b>Number of Colors:</b></label>
                        <input type="number" id="colors" name="colors" placeholder="Input" min="1" max="10" title="Must be between 1 and 10" required>
                    </p>
                    <input type="submit">
                </form>

                <?php
	                $table = '';
                    $color_choices = array('red', 'orange', 'yellow', 'green', 'blue', 'purple', 'grey', 'brown', 'black', 'teal');
	                if (isset($_GET['colors'])){
                            $table .= '<table border="2">';
                            for ($i = 0; $i < $_GET['colors']; $i++) {
                                $table .= '<tr>';
                                for ($j = 0; $j < 2; $j++) {
                                    if($j % 2 == 0){
                                        $table .= '<td width="20%"><select class="color_picker" name="color_picker" id="color_picker">
                                        <option value="blank"> </option>
                                        <option value="red" style="background-color: red;">Red</option>
                                        <option value="orange" style="background-color: orange;">Orange</option>
                                        <option value="yellow" style="background-color: yellow;">Yellow</option>
                                        <option value="green" style="background-color: green;">Green</option>
                                        <option value="blue" style="background-color: blue;">Blue</option>
                                        <option value="purple" style="background-color: purple;">Purple</option>
                                        <option value="grey" style="background-color: grey;">Grey</option>
                                        <option value="brown" style="background-color: brown;">Brown</option>
                                        <option value="black" style="background-color: black;">Black</option>
                                        <option value="teal" style="background-color: teal;">Teal</option>
                                        </select></td>';
                                    }
                                    else{
                                        $table .= '<td width="80%">&nbsp;</td>';
                                    }
                                    
                                }
                                $table .= '</tr>';
                            }
                            $table .= '</table>';
	                }
                ?>
                <br/>
                <br/>

                <?php
	               echo $table;
                ?>
                
                <?php
                    $alphabet = range('A', 'Z');
                    $numbers = range(1,26);
	                $table = '';
	                if (isset($_GET['num'])){ 
		                $table .= '<table border="2">';
		                for ($i = 0; $i < $_GET['num']+1; $i++) {
			                $table .= '<tr>';
			                for ($j = 0; $j < $_GET['num']+1; $j++) {
                                if($i ==0 and $j == 0){
                                    $table .= '<td width="50">&nbsp;</td>';
                                }
                                else if($i == 0){
                                    $table .= '<td>'.$alphabet[$j - 1].'</td>';
                                }
                                else if($j==0){
                                    $table .= '<td>'.$numbers[$i-1].'</td>';
                                }
                                else{
                                    $table .= '<td width="50">&nbsp;</td>';
                                }
                            }
                            $table .= '</tr>';
                        }
	                }
                ?>
                <br/>
                <br/>

                <?php
	               echo $table;
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
                            }
                            else {
                                color[i].value = color_map.get(i);
                                
                            }
                        });
                    }
                </script>
                
            </div>
        </main>
    </body>

</html>

