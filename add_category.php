<?php
	if ($_POST["category1"] && $_POST["submit"] == "submit")
	{
		if (!file_exists("./data/categories"))
			mkdir("./data");
		$acc = unserialize(file_get_contents("./data/categories"));
		foreach ($acc as $item)
		{
			if ($item["category"] == $_POST["category1"])
			{
				header("Location: http://localhost:8100/add_product.html");
				die();
			}
		}
		$acc[] = array("category" => $_POST["category1"]);
		file_put_contents("./data/categories", serialize($acc));
		header("Location: /admin.html");

	}
	else
		header("Location: /add_category.html");
?>