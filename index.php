<html>
    <head>
        <title>UNITShop</title>
        <meta charset="UTF-8" />
        <link href="css/main.css" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="https://unit.ua/img/vi.jpg"/>
        <script>
            function bucket() {
                var shops = document.getElementById("num_shops");

            }
            function show_bucket() {
                var num = document.getElementById("num_shops");
                var str = document.getElementById("num_shops");
                var int_num = parseInt(num) + 1;
                str.innerHTML = String.fromCharCode(int_num);
            }
        </script>
        <style>
            .printed_div {
                border: 2px solid green;
                height: auto;
                width: auto;
            }
            #printed_div_img {
                height: 200px;
                width: 200px;
            }
            .description {
                margin-left: 50%;
            }
        </style>
    </head>
    <body>

        <div id="top">
            <a href="index.php"><H1 id="kek">UnitShop</H1></a>
            <form id="search_form">
                <input class="search" />
                <input id="search_button" name="submit" type='submit' value="OK">
            </form>
            <div onclick="show_bucket()" id="bucket">
                <img id="bucket_img" src="sources/bucket.png">
                <div id="num_">
                    <p id="num_shops">0</p>
                </div>
            </div>
        </div>

        <div id="center">
            <form method="post" action="./php/sort_category.php" class="center_item" id="kategory">
                <div class="dropdown">
                    <p id="list_header">Выберите категорию товара</p>
                    <div class="dropdown_menu">
                        <!--<button id="list_elem">lol</button>
                        <button id="list_elem">shmot</button>
                        <button id="list_elem">telefon</button>
                        <button id="list_elem">komp</button>
                        <button id="list_elem">dom</button>-->
                        <?php
                            $acc = unserialize(file_get_contents("./data/categories"));
                            foreach ($acc as $key => $value)
                            {
                                echo "<input type='submit' name='$key' value='".$value["category"]."' id='list_elem'/>";
                            }
                        ?>
                    </div>
                </div>
            </form>
            <div class="center_item" id="user">
                <p id="authorise">Здравствуйте,
                        <?php
                            session_start();
                            if (!$_SESSION["logged_on_user"])
                                echo "<a href=\"./html/login.html\"> to buy some войдите в личный кабинет</a>";
                            else
                                echo $_SESSION["logged_on_user"];
                        ?>
                </p>

                <?php
                    if ($_SESSION["logged_on_user"])
                        echo "<a href='./php/exit.php'><p id='exit'>exit</p></a>";
                ?>
            </div>
            <div id="korzina">

            </div>
        </div>

        <div id="tovary">
            <!-- List of stuff here-->
            <?php
            session_start();
            //echo "<p>".$_SESSION["category"]."</p>";

            if ($_SESSION["category"] !== null) {
                $i = 0;
                $uns = unserialize(file_get_contents("./data/products"));
                $acc = array();
                foreach ($uns as $el) {
                    if ($el["category1"] === $_SESSION["category"] ||
                        $el["category2"] === $_SESSION["category"] ||
                        $el["category3"] === $_SESSION["category"]) {
                        $acc[] = $el;
                        $i++;
                    }
                }
                if ($i === 0)
                    echo "<h1>No such tovary for category: ".$_SESSION["category"]."</h1>";
            }
            else
                $acc = unserialize(file_get_contents("./data/products"));
            $i = 0;
            echo "<table style='display: flex;justify-content: center;' >";
            foreach ($acc as $key=>$value)
            {
                if ($i % 4 === 0)
                    echo "<tr>";
                echo "<td><form method='post' action='./php/add_to_bucket.php' class='printed_div'>
                    <input type='hidden' name='name' value='".$acc[$key]["name"]."'/>
                    <input type='hidden' name='price' value='".$acc[$key]["price"]."'/>
                    Name:<span class='description'>".$acc[$key]["name"]."</span><br/>Price<span class='description'>"
                    .$acc[$key]["price"]."</span><br/>"
                    ."<img id='printed_div_img' src='".$acc[$key]["img"]."'/><br/>
                        <input type='submit' name='buy' value='buy'/></form></td>";
                if ($i % 4 === 3)
                    echo "</tr>";
                $i++;
            }
            echo "</table>";
            ?>
        </div>


        <div id="bottom">
            <p id="authors">Authors:<br/>ekiriche<br/>mstorcha</p>
        </div>

    </body>
</html>