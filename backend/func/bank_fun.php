<?php
include "../../db/db.php";
session_start();

$log=htmlspecialchars(trim($_SESSION['user']), ENT_QUOTES, 'UTF-8');

if (empty($log)) {

	$redirectUrl = "../login.php";

	echo "<script type=\"text/javascript\">";

	echo "window.location.href = '$redirectUrl'";

	echo "</script>";

}

else{

	/****************************** Insert *************************************/		
	
	if(isset($_POST['bank'])) {
		$bank = htmlspecialchars(trim($_POST['bank']), ENT_QUOTES, 'UTF-8');

		$stmt = mysqli_query( $conn, "SELECT bank FROM bank WHERE bank='$bank'" );
		$row_count = mysqli_num_rows( $stmt );
		
		if($row_count == 0) {
	
			$sql = "INSERT INTO bank (bank) VALUES ('$bank')";
			
			$stmt_log = mysqli_query( $conn, $sql);
			
			if( $stmt_log === false ) {
				echo '<script> alert("Some error occured while entering number! Try again later!"); </script>';
			} else {
				echo '<script> alert("Successfully added bank!"); </script>';
			}
			 
		}else {
			echo '<script> alert("Bank already exists!"); </script>';
		}



		$redirectUrl = "../add-bank.php";

		echo "<script type=\"text/javascript\">";

		echo "window.location.href = '$redirectUrl'";

		echo "</script>";

	}	

	/****************************** Delete *************************************/		
	
	if(isset($_GET['id'])) {

		$id = htmlspecialchars(trim($_GET['id']), ENT_QUOTES, 'UTF-8');

		$sql = mysqli_query($conn,"DELETE FROM bank WHERE id='$id'");

		$redirectUrl = "../add-bank.php";

		echo "<script type=\"text/javascript\">";

		echo "window.location.href = '$redirectUrl'";

		echo "</script>";
	
	}

	/****************************** Load Form Data *************************************/
    
	if (array_key_exists('get_dataset', $_POST)) {
      $order_id = htmlspecialchars(strip_tags(trim($_POST['odr_id'])), ENT_QUOTES, 'UTF-8');

      $sql = mysqli_query($conn, "SELECT * FROM bank_details WHERE order_id='$order_id'"); 
      $row = mysqli_fetch_array($sql);
      
      echo json_encode($row);
    }

	/****************************** Add Bank Details for Order *************************************/		
	
	if(isset($_POST['dep_date'])) {
		$flag = htmlspecialchars(trim($_POST['flag']), ENT_QUOTES, 'UTF-8');
		$odr_id = htmlspecialchars(trim($_POST['odr_id']), ENT_QUOTES, 'UTF-8');
		$bank = htmlspecialchars(trim($_POST['banks']), ENT_QUOTES, 'UTF-8');
		$amount = htmlspecialchars(trim($_POST['amount']), ENT_QUOTES, 'UTF-8');
		$dep_date = htmlspecialchars(trim($_POST['dep_date']), ENT_QUOTES, 'UTF-8');

		$stmt = mysqli_query( $conn, "SELECT order_id FROM bank_details WHERE order_id='$odr_id'" );
		$row_count = mysqli_num_rows( $stmt );
		
		if($row_count == 0) {
	
			$sql = "INSERT INTO bank_details (order_id, bank, amount, dep_date) VALUES ('$odr_id', '$bank', '$amount', '$dep_date')";
			
			$stmt_log = mysqli_query( $conn, $sql);
			
			if( $stmt_log === false ) {
				echo '<script> alert("Some error occured while entering details! Try again later!"); </script>';
			} else {
				echo '<script> alert("Successfully added bank details!"); </script>';
			}
			 
		}else {
			$sql = "UPDATE bank_details SET bank = '$bank', amount = '$amount', dep_date='$dep_date' WHERE order_id='$odr_id' ";
			
			$stmt_log = mysqli_query( $conn, $sql);
			
			if( $stmt_log === false ) {
				echo '<script> alert("Some error occured while entering number! Try again later!"); </script>';
			} else {
				echo '<script> alert("Successfully updated bank details!"); </script>';
			}
		}
		$redirectUrl = "../view-order.php?id=".$odr_id.'&flag='.$flag;

		echo "<script type=\"text/javascript\">";

		echo "window.location.href = '$redirectUrl'";

		echo "</script>";

	}

	


	




}

?>