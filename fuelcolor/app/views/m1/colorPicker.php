<!DOCTYPE html>
<html lang="en">
    <head></head>

    <body>
        <form class="form-inputs colors-form" action="colorPicker" target="" method="GET">
            <p>
                <label for="color-name"><b>Color Name: </b></label>
                <input type="text" id="colors" name="colors" placeholder="Unique color name..." minlength="1" maxlength="10" title="Must be between 1 and 10" required>
            </p>
            <p>
                <label for="hexval"><b>Hex Value: </b></label>
                <input type="text" id="num" name ="num" placeholder="#..." minlength="1" maxlength="6" title="Must be between 1 and 26" required>
            </p>
            <input type="submit" id="enter" name="enter"> 
        </form>
        <br>
        <h3>Current Available Colors:</h3>
        <!-- ADD DATABASE OF COLORS HERE -->
    </body>

    <footer></footer>

</html>
