<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['username'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    try {
        $db = new PDO('mysql:dbname=eventpush;host=localhost', 'root', 'root');
        $db_handler = $db->prepare('INSERT INTO test(user, title, content)
                                    VALUES(:user, :title, :content)');
        $db_handler->execute( array(
            ':user' => $user,
            ':title' => $title,
            ':content' => $content
        ) );

    } catch(PDOException $e) {
        echo 'ERROR - ' . $e->getMessage();
        exit(1);
    }

    echo "Toegevoegd: {$user} - {$title}<br /><br />";
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Form - Event Push</title>
</head>
<body>
    <h1>Form - Event Push</h1>
    <form method="POST">
        User: <input type="text" name="username" /><br /><br />
        Titel: <input type="text" name="title" /><br /><br />
        Text: <textarea name="content"></textarea><br /><br />
        <input type="submit" value="Toevoegen" />
    </form>
</body>
</html>
