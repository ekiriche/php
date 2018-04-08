<?php
	if($_POST["name"] && $_POST["submit"] == "submit")
	{
		if (!file_exists("./data/users"))
			mkdir("./data/");
		$acc = unserialize(file_get_contents("./data/users"));
		$i = 0;
		while ($i < count($acc))
		{
			if ($acc[$i]["user"] == $_POST["name"])
			{
				unset($acc[$i]);
				$acc = array_values($acc);
				file_put_contents("./data/users", serialize($acc));
				header("Location: /admin.html");
				die();
			}
			$i++;
		}
		header("Location: /del_user.html");
	}
	else
		header("Location: /del_user.html");
?>