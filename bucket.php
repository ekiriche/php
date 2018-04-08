<html>
    <head>
    <title>Title</title>
    <link href="./css/admin.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div id="hello">
            <h2>Your bucket</h2>
            <br>
            <div id="orders">
            <?php 
                session_start();
                if ($_SESSION["logged_on_user"] && file_get_contents("./data/bucket"))
                {
                    $acc = unserialize(file_get_contents("./data/bucket"));
                    foreach ($acc as $item)
                    {
                        echo $item["name"], ";  Price: ", $item["price"], "\n";
                    }
                }
            ?>
            <form type="post" action="confirm_buy.php">
                <input type="submit" name="Buy" value="Buy"/>
            </form>
            </div>
        </div>
    </body>
</html>