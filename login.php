<?php
	if ($_POST["user"] && $_POST["passwd"] && $_POST["submit"] === "submit")
	{
		if (!file_exists("./data/users"))
			mkdir("./data");
		$acc = unserialize(file_get_contents("./data/users"));
		foreach ($acc as $item)
		{
			if ($item["user"] == $_POST["user"] && $item["passwd"] == hash("md5", $_POST["passwd"]))
			{
				session_start();
				$_SESSION["logged_on_user"] = $item["user"];
				header("Location: /");
                die();
			}
		}
        header("Location: /login.html");
        die();
	}
	else
	{
        header("Location: /login.html");
        die();
	}
?>
