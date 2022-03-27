<head>    
    <title><?php echo $title; ?></title>
    <meta charset="UTF-16">
    <meta name="author" content="Abby Williams">
    <meta name="description" content="Fuel Template">
    <meta name="keywords" content="Abby Williams, Homepage, Website, CSU, Colorado State University, student, Page">
    <?php echo Asset::css(strtolower($dir) . '.css');?>
    <?php echo Asset::img($img, array("alt='Gsilly and I' width=$width height=$height style='float:right; padding:10px'")); ?>
</head>
<body>
    <header> 
        <?php echo "<h1>$title</h1>"; ?>  
    </header>    
        <div>
            <nav class="navbar">  
                <?php echo "<a href='https://cs.colostate.edu:4444/~absarah/cs312/fuelviews/index.php/eastwest/index?direction=$dir'>Homepage</a>"?>  
                <?php echo "<a href='https://cs.colostate.edu:4444/~absarah/cs312/fuelviews/index.php/eastwest/one?direction=$dir'>About Me</a>" ?>  
                <?php echo "<a href='https://cs.colostate.edu:4444/~absarah/cs312/fuelviews/index.php/eastwest/two?direction=$dir' >Contact Me</a>" ?>  
                <?php echo "<a href='https://cs.colostate.edu:4444/~absarah/cs312/fuelviews/index.php/eastwest/index?direction=$switch' >$switch</a>" ?>                
            </nav>
        </div> 
    <main>
        <?php echo $content; ?>
    </main>

    <footer>
        <?php echo "<div style='position: fixed; bottom: 0px;'>
        <hr>
        <p>FYI: You can link back to this page from both the recipe page (see highlighted link) and from my LinkedIn Page (see Contact Info for link).<p>
        </div> "; ?>
    </footer>    

</body>