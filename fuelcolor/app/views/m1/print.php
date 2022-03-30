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
                <form action="https://cs.colostate.edu:4444/~absarah/ColorCoded/m1/index.php/cc/print" target="" method="GET">
                    <p>
                        <label for="num"><b>Number of Rows/Columns:</b></label>
                        <input type="number" id="num" name ="num" placeholder="Input" min="1" max="26" title="Must be between 1 and 26" required>
                    </p>
                    <p>
                        <label for="colors"><b>Number of Colors:</b></label>
                        <input type="number" id="colors" name="colors" placeholder="Input" min="1" max="10" title="Must be between 1 and 10" required>
                    </p>
                    <input type="submit" id="enter" name="enter">
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
	               echo "<div id='colorTable'>$crtable</div>";
                ?>

                <?php
                    $alphabet = range('A', 'Z');
	                $crtable = '';
	                if (isset($_GET['num'])){ 
		                $crtable .= '<table border="1">';
		                for ($i = 0; $i < $_GET['num']+1; $i++) {
			                $crtable .= '<tr>';
			                for ($j = 0; $j < $_GET['num']+1; $j++) {
                                $crtable .= '<td width="50">&nbsp;</td>';
                            }
                            $crtable .= '</tr>';
                        }
	                }
                ?>
                <br/>
                <br/>

                <?php
	               echo "<div id='alphTable'>$crtable</div>";
                ?>

            </div>
            
        </main>
    </body>

    <footer>
        
        
        <div id="print-button">
            <form>
                <input type="button" onClick="printDiv('colorTable', 'alphTable', 'logo', 'print-button')" value="Print" class="printable">
            </form>
        </div>            

        <!-- <div id="print-button">
            <form>
                <input type="button" onClick="printDiv('colorTable', 'alphTable')" value="Print">
            </form>
        <div>             -->
    </footer>

</html>
