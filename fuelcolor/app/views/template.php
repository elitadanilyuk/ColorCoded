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
                    <li><?php echo "<a href='index'>Home</a>" ?></li>
                    <li><?php echo "<a href='about'>About Us</a>" ?></li>
                    <li><?php echo "<a href='colorGenerator'>Color Coordinate Generator</a>" ?></li>
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
        <p><img src="../../../m1/assets/img/company_large_icon.png" alt="color coded icon" style="max-height:20px"> Grace Fuller, Abby Williams, Maya Vitrano, Elita Danilyuk &copy; 2022 ColorCoded</p>
    </footer>
</body>
