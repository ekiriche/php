<?php
session_start();
if ($_GET["Buy"] == "Buy" && $_SESSION["logged_on_user"] && file_exists("./data/bucket"))
{
	echo $_SESSION["logged_on_user"];
	$acc = unserialize(file_get_contents("./data/bucket"));
	foreach ($acc as $item)
		$item["user"] = $_SESSION["logged_on_user"];
	file_put_contents("./data/orders", serialize($acc));
	system("rm ./data/bucket");
	header("Location: ./index.php")
}
else
	header("Location: /index.php");
?>