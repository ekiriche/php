<?php
	if ($_POST["buy"] == "buy")
	{
		session_start();
		if (!file_exists("./data/bucket"))
			mkdir ("./data");
		$acc = unserialize(file_get_contents("./data/bucket"));
		$acc[] = array("user" => $_SESSION["logged_on_user"], "name" => $_POST["name"], "price" => $_POST["price"]);
		file_put_contents("./data/bucket", serialize($acc));
		header("Location: /index.php");
	}
?>