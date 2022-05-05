<!DOCTYPE html>
<html lang="en">
    <head>
    </head>

    <body>
        <main class="main">
            <header>
            </header>
            <div class="home-content">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin at sagittis dui. Mauris risus felis, elementum vitae efficitur vitae, consectetur at augue. Suspendisse potenti. Cras pharetra et ipsum eget aliquet. Duis in lobortis velit. Aliquam maximus luctus urna. Vestibulum eget nibh id diam congue porttitor eget ut leo. Maecenas metus enim, ullamcorper sed orci quis, ullamcorper tristique purus. Curabitur volutpat, turpis vitae suscipit interdum, nisi lectus euismod quam, at vestibulum magna quam id lacus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Proin in gravida turpis, ut feugiat urna. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc tristique semper rutrum.</p>
                <p>Nam mattis dui at ante sodales laoreet. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce euismod neque urna, eu bibendum tellus porttitor vel. Cras id tortor pharetra ante congue pulvinar nec quis magna. Fusce blandit sodales tristique. Duis semper a augue vitae volutpat. Phasellus vehicula, ante quis eleifend rhoncus, augue massa sodales nisl, gravida iaculis enim lacus lobortis urna. Mauris tempor vel felis vitae elementum. Sed eu libero rhoncus, eleifend turpis ut, vestibulum risus. Aenean blandit arcu ligula, vitae molestie orci sodales at. Nam libero lacus, malesuada vel malesuada sit amet, vehicula ac ex.</p>
            </div>
        </main>
    </body>

</html>

<?php

    $db = DB::instance();
    // $query = DB::query('select * from `colors`');
    $color = DB::select()->from('colors')->execute();
    echo DB::last_query();

?>
