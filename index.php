<?php
	$mysqli=new mysqli('localhost','root','','petshop');
	if ($mysqli->connect_errno) {
		echo "Не удалось подключиться к MySQL: " . mysqli_connect_error();
		return false;
	};
	$mysqli->set_charset("utf8");
	$method = $_SERVER['REQUEST_METHOD'];
	if ($method == 'GET'){
		$a=array();
		
		if ($_GET['id']==1){
			
			$text="select * from shop where Name like '%".$_GET['Name']."%'";
			$result=$mysqli->query($text);
			while ($row = mysqli_fetch_assoc($result))
			{
				$b=array("Name"=>$row['Name'],"Address"=>$row['Address']);
				$a[]=$b;
       
			}
			echo json_encode($a);
		}
    if ($_GET['id']==2){
      $text="select * from product where Name like '%".$_GET['Name']."%'";
    $result=$mysqli->query($text);
    while ($row = mysqli_fetch_assoc($result))
	{
      $b=array("Name"=>$row['Name']);
      $a[]=$b;
    }
    echo json_encode($a);
     
    }		
		if ($_GET['id']==3)
		{
			
			$text="select * from shop";
		
			$result=$mysqli->query($text);
			while ($row = mysqli_fetch_assoc($result))
			{
				$b=array("Name"=>$row['Name'],"id"=>$row['ID']);
				$a[]=$b;
			}
		}

		echo json_encode($a);
	};
	if ($method == 'POST'){
		
		if ($_POST['id']==1){
			$text="INSERT INTO `shop`(`Name`, `Address`) VALUES ('".$_POST['Name']."','".$_POST['Address']."')";
			$result=$mysqli->query($text);
			echo $result;
		}
		if ($_POST['id']==2){
			$text="INSERT INTO `product`(`Name`) VALUES ('".$_POST['Name']."')";
			$result=$mysqli->query($text);
			echo $result;
		}
		if ($_POST['id']==3)
		{
			$text="INSERT INTO `shop_product`(`ID_Shop`, `ID_Product`) VALUES (".$_POST['ID_Shop'].",".$_POST['ID_Product'].")";
			$result=$mysqli->query($text);
			echo $result;
		}
		
	};
?>