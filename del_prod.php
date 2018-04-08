<?php
	if($_POST["name"] && $_POST["submit"] == "submit")
	{
		if (!file_exists("./data/products"))
			mkdir("./data/");
		$acc = unserialize(file_get_contents("./data/products"));
		$i = 0;
		while ($i < count($acc))
		{
			if ($acc[$i]["name"] == $_POST["name"])
			{
				unset($acc[$i]);
				$acc = array_values($acc);
				break ;
			}
			$i++;
			if ($acc[$i] == NULL)
			{
				header("Location: /del_prod1.html");
				die();
			}
		}
		file_put_contents("./data/products", serialize($acc));
		header("Location: /admin.html");
	}
	else
		header("Location: /del_prod2.html");
?>