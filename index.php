<!DOCTYPE html>
<html lang="pl">

    <head>
        <title>Test</title>
        <meta charset="UTF-8" />
    </head>
    <body>
        <form action="./save_website.php" method="post">
            <fieldset>
                <legend>Add website</legend>
                URL: <input type="text" name="url" size="80" />
                <input type="submit" value="save" />
            </fieldset>
        </form>

<?php

require './Autoloader.php';
Autoloader::startAutoload();

$db = new DB();
$query = "SELECT * FROM websites";
$result = $db->query($query);

?>
        
<?php if ($result->num_rows > 0): ?>
        
    <?php while ($row = $result->fetch_assoc()): ?>
        <p>
            <a href="./show_diff.php?id=<?= $row['id'] ?>"><?= $row['url'] ?></a>
        </p>
    <?php endwhile ?>
        
<?php endif ?>

    </body>
</html>