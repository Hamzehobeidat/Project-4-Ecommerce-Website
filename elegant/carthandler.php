<?php
session_start();



if (isset($_SESSION['cart'])) {

	//The array_column() function returns the values from a single column in the input array.
	$checker=array_column($_SESSION['cart'], 'item_name');
	if(in_array($_GET['cart_name'], $checker)){
		echo "<script>alert('Product Is Already In The Cart');
			window.location.href='product.php';
		</script>";
	}else{
/*
//ياخذ اخر مكان في المصفوفه لتتم اضافه العنصر الجديد في اخر مكان في المصفوفه count المتغير
*/
	$count=count($_SESSION['cart']);
	$_SESSION['cart'][$count]=array('item_id' => $_GET['cart_id'], 'item_name'=>$_GET['cart_name'], 'item_price'=>$_GET['cart_price'],'image'=>$_GET['products_image'], 'quantity'=>1 );
	echo "<script>alert('Product Added');
	window.location.href='product.php';
	</script>";
	}
} else {
/*
	//هنا تتم عمليه اضافه عنصر الى السبه اول مره
	*/
	$_SESSION['cart'][0]=array('item_id'=>$_GET['cart_id'], 'item_name'=>$_GET['cart_name'], 'item_price'=>$_GET['cart_price'], 'image'=>$_GET['products_image'], 'quantity'=>1);
	echo "<script>alert('Product Added');
	window.location.href='product.php';
	</script>";
}


	// if(isset($_POST["Add to Cart"]))  
	// {  
	// 	 if(isset($_SESSION["cart"]))  
	// 	 {  
	// 		  $item_array_id = array_column($_SESSION["cart"], "cart_id");  
	// 		  if(!in_array($_GET["id"], $item_array_id))  
	// 		  {  
	// 			   $count = count($_SESSION["cart"]);  
	// 			   $item_array = array(  
	// 					'item_id'               =>     $_GET["cart_id"],  
	// 					'item_name'               =>     $_POST["cart_name"],  
	// 					'item_price'          =>     $_POST["cart_price"],  
	// 					'item_quantity'          =>     $_POST["quantity"]  
	// 			   );  
	// 			   $_SESSION["cart"][$count] = $item_array;  
	// 		  }  
	// 		  else  
	// 		  {  
	// 			   echo '<script>alert("Item Already Added")</script>';  
	// 			   echo '<script>window.location="product.php"</script>';  
	// 		  }  
	// 	 }  
	// 	 else  
	// 	 {  
	// 		  $item_array = array(  
	// 			   'item_id'               =>     $_GET["cart_id"],  
	// 			   'item_name'               =>     $_POST["cart_name"],  
	// 			   'item_price'          =>     $_POST["cart_price"],  
	// 			   'item_quantity'          =>     $_POST["quantity"]  
	// 		  );  
	// 		  $_SESSION["cart"][0] = $item_array;  
	// 	 }  
	// } 
?>
