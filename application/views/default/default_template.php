<?php echo $_doctype; ?>
<html>
    <head>
        <meta charset="utf-8">
        <?php echo $_meta; ?>
        <?php echo $_styles; ?>
        <?php echo $_scripts; ?>
        <?php echo $_title; ?>
    </head>
    <body>
        <?php echo $top; ?>
        <?php echo $menu; ?>
        <div id=main>
            <?php echo $left; ?>
            <?php echo $content; ?>
            <?php echo $right; ?>
        </div>
        <?php echo $bottom; ?>
    </body>
</html>
