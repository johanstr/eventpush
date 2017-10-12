<?php
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');

try {
    $db = new PDO('mysql:dbname=eventpush;host=localhost', 'root', 'root');
    $db_handler = $db->prepare('SELECT * FROM test');
    $db_handler->execute();
    $db_result = $db_handler->fetchAll();
    $data = json_encode($db_result);
} catch(PDOException $e) {
    $data = 'ERROR - ' . $e->getMessage();
}
echo "data: {$data}\n\n";
flush();
