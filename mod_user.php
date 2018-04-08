<?php
if ($_POST["old_user"] && $_POST["submit"] == "OK")
{
	if(!file_exists("./data/users"))
		mkdir("./data");
	$acc = unserialize(file_get_contents("./data/users"));
	$i = 0;
	while($i < count($acc))
	{
		if ($acc[$i]["user"] == $_POST["old_user"])
		{
			if ($_POST["new_user"])
				$acc[$i]["user"] = $_POST["new_user"];
			if ($_POST["new_pass"])
				$acc[$i]["passwd"] = hash("md5", $_POST["new_pass"]);
			file_put_contents("./data/users", serialize($acc));
			header("Location: /admin.html");
			die();
		}
		$i++;
	}
	header("Location: /mod_user.html");
}
else
	header("Location: /mod_user.html");
?>