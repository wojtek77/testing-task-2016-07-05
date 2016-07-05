<!DOCTYPE html>
<html lang="pl">

    <head>
        <title>Test</title>
        <meta charset="UTF-8" />
        <style>
            ins {
                background-color: #FFFF99;
                text-decoration: none;
            }
        </style>
        <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    </head>
    <body>
        <p>
            <a href="">show full html</a>
            <br />
            <button class="button-added-deleted" type="button">show added and deleted</button>
            <button class="button-added" type="button">only added</button>
            <button class="button-deleted" type="button">only deleted</button>
        </p>

<?php

require './Autoloader.php';
Autoloader::startAutoload();

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

$db = new DB();
$query = "SELECT * FROM websites WHERE id = $id";
$result = $db->query($query);
$row = $result->fetch_assoc();

if ($row) {
    
    /* http://code.stephenmorley.org/php/diff-implementation/ */
    include 'class.Diff.php';
    
    $oldContent = $row['content'];
    $originalContent = file_get_contents($row['url']);
    $newContent = Utils::contentFromWebsite($originalContent);

    // compare two strings character by character
    $diff = Diff::compare($oldContent, $newContent, true);
    echo Diff::toHTML($diff, '');
}

?>
<script type="text/javascript">
    $(document).ready(function() {
        $('.button-added-deleted').click(function() {
            $('span').hide();
            $('ins').show();
            $('del').show();
        });
        $('.button-added').click(function() {
            $('span').hide();
            $('ins').show();
            $('del').hide();
        });
        $('.button-deleted').click(function() {
            $('span').hide();
            $('ins').hide();
            $('del').show();
        });
    });
</script>

    </body>
</html>