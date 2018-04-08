<?php
	if ($_POST["old_name"] && $_POST["submit"] == "submit")
	{
		if(!file_exists("./data/products"))
			mkdir("./data");
		$acc = unserialize(file_get_contents("./data/products"));
		$cats = unserialize(file_get_contents("./data/categories"));
		$i = 0;
		while ($i < count($acc))
		{
			if ($acc[$i]["name"] == $_POST["old_name"])
				break ;
			$i++;
		}
		if ($acc[$i] == NULL)
		{
			header("Location: /mod_prod.html");
			die();
		}
		foreach ($cats as $item)
		{
			if ($_POST["category1"] == $item && $_POST["category1"])
				$acc[$i]["category1"] = $_POST["category1"];
			if ($_POST["category2"] == $item && $_POST["category2"])
				$acc[$i]["category2"] = $_POST["category2"];
			if ($_POST["category3"] == $item && $_POST["category3"])
				$acc[$i]["category3"] = $_POST["category3"];
		}
		if ($_POST["new_name"])
			$acc[$i]["name"] = $_POST["new_name"];
		if ($_POST["price"])
			$acc[$i]["price"] = $_POST["price"];
		if ($_POST["img"])
			$acc[$i]["img"] = $_POST["img"];
		file_put_contents("./data/products", serialize($acc));
		header("Location: /admin.html");
	}
	else
		header("Location: /mod_prod.html");
?>