<?php

require './Autoloader.php';
Autoloader::startAutoload();

if (!empty($_POST['url'])) {
    $url = $_POST['url'];
    
    $originalContent = file_get_contents($url);
    $content = Utils::contentFromWebsite($originalContent);

    $db = new DB();
    $stmt = $db->prepare("INSERT INTO websites VALUES (NULL, ?, ?)");
    $stmt->bind_param('ss', $url, $content);
    $stmt->execute();
}

header('Location: .');
exit;
