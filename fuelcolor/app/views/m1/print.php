<!DOCTYPE html>
<html lang="en">
    <head>
    <?php echo Asset::css("M1.css");?>
    <link rel="icon" href="../../../m1/assets/img/company_small_icon.png">
    </head>

    <script>
        function printDiv(colorTable, alphTable, companyLogo, button) {
            var printContents = document.getElementById(companyLogo).innerHTML;
            printContents += document.getElementById(colorTable).innerHTML;
            //window.print(document.getElementById(alphTable).innerHTML);
            printContents += document.getElementById(alphTable).innerHTML;           

            w = window.open();
            w.document.write(printContents);
            w.print();
            w.close();
        }
    </script>

    <body>
        <main class="main">
            <header>
                <?php
                    $logo = "<img src='../../../m1/assets/img/company_logo.jpg' alt='color coded company logo' style='max-height:100px;'>";
                    echo "<div id='logo'>$logo</div>";
                ?>
                <h1> <?php echo $title; ?> </h1>
                <hr>
            </header>
            <div class="contents">
               
                <?php
	                $crtable = '';
                    $color_choices = array('red', 'orange', 'yellow', 'green', 'blue', 'purple', 'grey', 'brown', 'black', 'teal');
                    if (isset($_GET['colors'])){
                        $crtable .= '<table border="2">';
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
	                $num_table = '';
	                if (isset($_GET['num'])){ 
		                $num_table .= '<table border="1">';
		                for ($i = 0; $i < $_GET['num']+1; $i++) {
			                $num_table .= '<tr>';
			                for ($j = 0; $j < $_GET['num']+1; $j++) {
                                $num_table .= '<td width="50">&nbsp;</td>';
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
            
        </main>
    </body>

    <footer>
       
        <!-- <div id="print-button">
            <form>
                <input type="button" onClick="printDiv('colorTable', 'alphTable')" value="Print">
            </form>
        <div>             -->
    </footer>

</html>
