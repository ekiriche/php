<?php
if ($_POST["user"] && $_POST["passwd"] && $_POST["pass_confirm"] && $_POST["submit"] == "OK" && $_POST["passwd"] == $_POST["pass_confirm"])
{
	if (!file_exists("./data/users"))
		mkdir("./data");
	$acc = unserialize(file_get_contents("./data/users"));
	foreach ($acc as $item)
	{
		if ($item["user"] == $_POST["user"])
		{
			echo "Try another name :)";
            header("Location: /add_user.html");
            die();
		}
	}
	$acc[] = array("user" => $_POST["user"], "passwd" => hash("md5", $_POST["passwd"]));
	file_put_contents("./data/users", serialize($acc));
	header("Location: /admin.html");
}
else
{
	header("Location: /add_user.html");
}
?>