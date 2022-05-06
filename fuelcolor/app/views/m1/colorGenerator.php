<!DOCTYPE html>
<html lang="en">
    <head>
    <link rel="icon" href="../../../m1/assets/img/company_small_icon.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <?php echo ASSET::js("colorPicker.js");?>
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
                <!-- <form class="form-inputs" action="colorGenerator" target="" method="GET"> -->
				<form class="form-inputs" action="colorGenerator" target="" method="POST">
                    <p>
                        <label for="colors"><b>Number of Colors:</b></label>
                        <input type="number" id="colors" name="colors" placeholder="Input" min="1" max="10" title="Must be between 1 and 10" required>
                    </p>
                    <p>
                        <label for="num"><b>Number of Rows/Columns:</b></label>
                        <input type="number" id="num" name ="num" placeholder="Input" min="1" max="26" title="Must be between 1 and 26" required>
                    </p>
                    <input type="submit">
                </form>

                <?php
	                $table = '';
                    $color_choices = array('red', 'orange', 'yellow', 'green', 'blue', 'purple', 'gray', 'brown', 'black', 'teal');
	                //if (isset($_GET['colors'])){
					if (isset($_POST['colors'])){
                            $table .= '<table class="table-1" border="2">';
                            //for ($i = 0; $i < $_GET['colors']; $i++) {
							for ($i = 0; $i < $_POST['colors']; $i++) {
                                $table .= '<tr>';
                                for ($j = 0; $j < 2; $j++) {
                                    if($j % 2 == 0){
                                        $table .= '<td id="cell';
                                        $table .= $i; #id is zero-based
                                        $table .= '" class=colorPicker><select class="color_picker" id="color_picker';
                                        $table .= $i;
                                        $table .= '" name="color_picker">
                                        <option value="blank"> </option>
                                        <option value="red" id="red" style="background-color: red; color:white;">Red</option>
                                        <option value="orange" id="orange" style="background-color: orange;">Orange</option>
                                        <option value="yellow" id="yellow" style="background-color: yellow;">Yellow</option>
                                        <option value="green" id="green" style="background-color: green; color:white;">Green</option>
                                        <option value="teal" id="teal" style="background-color: teal; color:white;">Teal</option>
                                        <option value="blue" id="blue" style="background-color: blue; color:white">Blue</option>
                                        <option value="purple" id="purple" style="background-color: purple; color:white;">Purple</option>
                                        <option value="brown" id="brown" style="background-color: brown; color:white;">Brown</option>
                                        <option value="grey" id="gray" style="background-color: gray; color:white;">Gray</option>
                                        <option value="black" id="black" style="background-color: black; color:white; color:white;">Black</option>
                                        </select><input type="radio" class="radioButton inact" id="radioButton';
                                        $table .= $i;
                                        $table .= '" name="radio" value="currentColor"><label for="radioButton">Select</label></td>';
                                    }
                                    else{
                                        $table .= '<td class="" id="activeList';
                                        $table .= $i;
                                        $table .= '"></td>';
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
	               echo "<div id='colorTable'>$table</div>";
                ?>
                
                <?php
                    $alphabet = range('A', 'Z');
                    $numbers = range(1,26);
	                $table = '';
	                //if (isset($_GET['num'])){ 
					if (isset($_POST['num'])){ 
		                $table .= '<table id="table-2" class="table-2" border="2">';
		                //for ($i = 0; $i < $_GET['num']+1; $i++) {
						for ($i = 0; $i < $_POST['num']+1; $i++) {
			                $table .= '<tr>';
			                //for ($j = 0; $j < $_GET['num']+1; $j++) {
							for ($j = 0; $j < $_POST['num']+1; $j++) {
                                if($i ==0 and $j == 0){
                                    $table .= '<td>&nbsp;</td>';
                                }
                                else if($i == 0){
                                    $table .= '<td>'.$alphabet[$j - 1].'</td>';
                                }
                                else if($j==0){
                                    $table .= '<td>'.$numbers[$i-1].'</td>';
                                }
                                else{
                                    $table .= '<td class="colorCell" id="cell';
                                    $table .= $numbers[$i-1]; #id is not zero-based
                                    $table .= $alphabet[$j-1];
                                    $table .= '">&nbsp;</td>';

                                }
                            }
                            $table .= '</tr>';
                        }
	                }
                ?>
                <br/>
                <br/>

                <?php
	               echo "<div id='alphTable'>$table</div>";
                ?>

                <script>
                    $(document).ready(function(){
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
                                    //remove class old color
                                    //"."+color[i].color_map.get(i)
                                    color_map.set(i, color[i].value);
                                    //set new class to new value
                                    //color[i] = color[i].value;
                                    document.querySelectorAll(".color_picker")[i].style.background = document.querySelectorAll(".color_picker")[i].value;
                                    
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
                    });
                </script>

                <div id="snackbar" class="no-print">All colors must be different.</div>
                
            </div>

            <div id="print-button">
                <form>
                    <input type="button" onClick="printDiv()" value="Print" class="printable">
                </form>
            </div>   

        </main>
    </body>
                   
</html>