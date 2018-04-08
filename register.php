<?php
if ($_POST["user"] && $_POST["passwd"] && $_POST["pass_confirm"] && $_POST["submit"] == "OK" && $_POST["passwd"] == $_POST["pass_confirm"])
{
	echo "dads";
	if (!file_exists("./data/users"))
		mkdir("./data");
	$acc = unserialize(file_get_contents("./data/users"));
	foreach ($acc as $item)
	{
		if ($item["user"] == $_POST["user"])
		{
			echo "Try another name :)";
            header("Location:register.html");
            die();
		}
	}
	$acc[] = array("user" => $_POST["user"], "passwd" => hash("md5", $_POST["passwd"]));
	file_put_contents("./data/users", serialize($acc));
	session_start();
	$_SESSION["logged_on_user"] = $_POST["user"];
	header("Location: /");
}
else
{
	echo "Something isn't right!";
	header("Location: /register.html");
}
?>
