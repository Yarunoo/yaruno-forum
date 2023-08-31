<html lang="en">
<head>
    <title>Submit Task</title>
</head>
<body>

<?php
$messagesfile = "messages.txt";

$name = $_POST["name"];
$text = $_POST["text"];
$date = gmdate("dS M Y | h:i");

$data = array (
    "name" => $name,
    "text" => $text,
    "date" => $date
);

$messages = fopen("$messagesfile", "a"); 

fwrite($messages, json_encode($data) . "\n"); 

fclose($messages);

header("Location: index.php"); # Redirect back to old page
?>
</body>
</html>
