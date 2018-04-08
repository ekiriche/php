<?php
if($_POST["name"] && $_POST["img"] && $_POST["category1"] && $_POST["price"] && $_POST["price"] > 0 && $_POST["submit"] == "submit")
{
	if (!file_exists("./data/products"))
		mkdir ("./data/");
	$acc = unserialize(file_get_contents("./data/products"));
	$cats = unserialize(file_get_contents("./data/categories"));
	$flag1 = false;
	$flag2 = false;
	$flag3 = false;
	foreach ($acc as $item)
	{
		if ($item["name"] == $_POST["name"])
		{
			header("Location: /add_prod.html");
			die();
		}
	}
	foreach ($cats as $item)
	{
		if ($_POST["category1"] == $item["category"])
			$flag1 = true;
		if ($_POST["category2"] == $item["category"] && $_POST["category2"])
			$flag2 = true;
		if ($_POST["category3"] == $item["category"] && $_POST["category3"])
			$flag3 = true;
	}
	if (!$flag1)
	{
		header("Location: /add_prod.html");
		die();
	}
	else
		$cat1 = $_POST["category1"];
	if ($flag2)
		$cat2 = $_POST["category2"];
	else
		$cat2 = "";
	if ($flag3)
		$cat3 = $_POST["category3"];
	else
		$cat3 = "";
	$acc[] = array("name" => $_POST["name"], "category1" => $cat1, "category2" => $cat2, "category3" => $cat3, "price" => $_POST["price"], "img" => $_POST["img"]);
	file_put_contents("./data/products", serialize($acc));
	header("Location: /admin.html");
}
else
{
	header("Location: /add_prod.html");
	die();
}
?>
