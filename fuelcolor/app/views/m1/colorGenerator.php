<!DOCTYPE html>
<html lang="en">
    <head>
    </head>

    <body>
        <main class="main">
            <header>
            </header>
            <div class="contents">
                <form action="https://cs.colostate.edu:4444/~grfuller/m1/index.php/cc/two" target="" method="GET">
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
	                $crtable = '';
	                if (isset($_GET['colors'])){
		                $crtable .= '<table border="1">';
		                for ($i = 0; $i < $_GET['colors']; $i++) {
			                $crtable .= '<tr>';
			                for ($j = 0; $j < 2; $j++) {
				                $crtable .= '<td width="50">&nbsp;</td>';
			                }
			                $crtable .= '</tr>';
		                }
		                $crtable .= '</table>';
	                }
                ?>
                <br/>
                <br/>

                <?php
	               echo $crtable;
                ?>

                <?php
                    $alphabet = range('A', 'Z');
	                $crtable = '';
	                if (isset($_GET['num'])){ 
		                $crtable .= '<table border="1">';
		                for ($i = 0; $i < $_GET['num']+1; $i++) {
			                $crtable .= '<tr>';
                            //$crtable .= $alphabet[$i];
			                for ($j = 0; $j < $_GET['num']+1; $j++) {
                                $crtable .= '<td width="50">&nbsp;</td>';
                                // if($i == 0){
                                //     $crtable[$j]= '<td>'.$alphabet[$j].'</td>';
                                // }
                            }
                            $crtable .= '</tr>';
                        }
	                }
                ?>
                <br/>
                <br/>

                <?php
	               echo $crtable;
                ?>
                
            </div>
        </main>
    </body>

    <footer>
    </footer>

</html>
