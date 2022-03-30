<head>
    <title> <?php echo $title; ?> </title>
    <meta charset="UTF-8"></meta>
    <meta name="author" content="Grace Fuller, Abby Williams, Maya Vitrano, Elita Danilyuk"></meta>
    <meta name="description" content="Milestone 1 Webpage"></meta>
    <link rel="icon" href="../../../m1/assets/img/company_small_icon.png">
    <?php echo Asset::css("M1.css"); ?>
</head>
<body>
    <header>
        <div class="navbar container">
            <img class="left-container" src="../../../m1/assets/img/company_logo.jpg" alt="color coded company logo" style="max-height:100px;">
            <ul class="navbar nav-right">
                <div class="right-container">
                    <li><?php echo "<a href='https://cs.colostate.edu:4444/~elita/ColorCoded/m1/index.php/cc/index'>Home</a>" ?></li>
                    <li><?php echo "<a href='https://cs.colostate.edu:4444/~elita/ColorCoded/m1/index.php/cc/about'>About Us</a>" ?></li>
                    <li><?php echo "<a href='https://cs.colostate.edu:4444/~elita/ColorCoded/m1/index.php/cc/colorGenerator'>Color Coordinate Generator</a>" ?></li>
                </div>
            </ul>
        </div>
        <h1 class="page-header"> <?php echo $title; ?> </h1>
    </header>
    <main>
        <div id="content">
            <?php echo $content; ?>
        </div>
    </main>
    <footer>
        <meta http-equiv=”last-modified” content=<span id='date-time'></sp``an>
        <p><img src="../../../m1/assets/img/company_large_icon.png" alt="color coded icon" style="max-height:20px"> &copy; 2022 - Grace Fuller, Abby Williams, Maya Vitrano, Elita Danilyuk</p>
    </footer>
</body>
