<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Yaruno Forms</title>
</head>
<body>
    <div class="container">
        <h1>Yaruno Forms</h1>
        <form action="postmessage.php" method="post">

            <input type="text" name="name" maxlength="20" placeholder="Vul je naam in..." required>
            <br>
            <input type="text" name="text" maxlength="500" placeholder="Vul een nieuwe bericht in..." required>

            <button type="submit">Plaats Bericht</button>
        </form>
        
        <ul>
            <?php
            $messagesfile = "messages.txt";
            
            if(file_exists($messagesfile)) {
                $messages = fopen($messagesfile, "r");

                while(!feof($messages)) { 
                    
                    $line = fgets($messages);
                    $jsondata = json_decode($line, true);
                    
                    if($jsondata != null) {

                  
                        if($jsondata["name"] && $jsondata["text"] && $jsondata["date"]) {
                            $name = htmlspecialchars($jsondata["name"]);
                            $text = htmlspecialchars($jsondata["text"]);
                            $date = htmlspecialchars($jsondata["date"])
                        ?> 

                        <h3> <?php echo("$name - $date"); ?> </h3>   
                        <li> <?php echo($text); ?> </li>
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

   