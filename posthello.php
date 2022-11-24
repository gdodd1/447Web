<!DOCTYPE html>
<html lang="en">
<head>
    <title>POST HELLO</title>
    <meta charset="UTF-8">
</head>
<body>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        Name: <input type ="text" name="fname">
        <input type="submit">
    </form>

    <?php
        // if ($_SERVER["REQUEST_METHOD"] == )
    ?>
</body>
</html>