<?php
$content = file_get_contents('php://input');
$arrayJson = json_decode($content, true);

?>
