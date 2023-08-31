<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Yaruno Forum</title>

    <script>
function toggleMode() {
    var body = document.body;
    var button = document.querySelector(".toggle");

    if (body.classList.contains("light-mode")) {
        body.classList.remove("light-mode");
        body.classList.add("dark-mode");
        button.textContent = "🌑";
    } else {
        body.classList.remove("dark-mode");
        body.classList.add("light-mode");
        button.textContent = "☀️";
    }
}
</script>

</head>
<body>

        <button class="toggle" onclick="toggleMode()">🌑</button>

        <div class="chat">
            <h1>Post a message</h1>
            <hr class="seperator">
            <form action="postmessage.php" method="post">
                <input type="text" name="name" maxlength="20" placeholder="Enter your name..." required>
                <br>
                <textarea name="text" cols="56" placeholder="Enter your message..." rows="10" class="textbox"></textarea>
                <br>
                <button type="submit">Post Message</button>
            </form>
        </div>

        <div class="container">
            <h1>Yaruno Forum</h1>
            <hr>
            
            <ul>
                <?php
                $messagesfile = "messages.txt";
                
                if (file_exists($messagesfile)) {
                    $messages = fopen($messagesfile, "r");

                    while (!feof($messages)) { 
                        $line = fgets($messages);
                        $jsondata = json_decode($line, true);
                        
                        if ($jsondata != null) {
                            if ($jsondata["name"] && $jsondata["text"] && $jsondata["date"]) {
                                $name = htmlspecialchars($jsondata["name"]);
                                $text = htmlspecialchars($jsondata["text"]);
                                $date = htmlspecialchars($jsondata["date"]);
                                ?> 
                                <h3><?php echo("$name - $date"); ?></h3>   
                                <li><?php echo($text); ?></li>
                                <?php
                            }
                        }
                    }
                    fclose($messages);
                }
                ?>     
            </ul>
        </div>

</body>
</html>