<?php
    $dbhost="localhost";
    $dbname="Rahul";
    $dbusername="all_user";
    $dbpass="#123all@"; 
    $conn = mysqli_connect($dbhost, $dbusername, $dbpass, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } 
    session_start();
    
    $name=$_POST['name'];
	$phone=$_POST['phone'];
    $email=$_POST['email'];
	$password=$_POST['password'];

	if (isset($_POST['submit'])) {
		$fetch = "SELECT email ,phone from user_details WHERE email = '$email' AND phone = '$phone'";
		$check = $conn->query($fetch);
		$result = $check->fetch_assoc();
		if ($result) {
			echo "<script type='text/javascript'>alert('data already exists!')
	            window.location.replace('newuser.php');
	            </script>";
			 	
		} else {
			$sql = "INSERT into user_details (name, phone, email, password) VALUES ('$name','$phone', '$email', '$password' )";
			$req = $conn->query($sql);
			if ($req) {
				echo"<script> alert('Data added Successfully! Please Login!')
	                          window.location.replace('userlogin.php');  
	                    </script>";
			}else {
				echo "<script type='text/javascript'>alert('Form Not Submit!')</script>";
			}
		}
	} elseif (isset($_POST['update'])){
		$id = $_POST['update_id'];
		$up_sql ="UPDATE user_details SET name='$name',phone='$phone',email='$email',password='$password' WHERE id=$id";
		$update = $conn->query($up_sql);
		if ($update) {
			header('location: display.php?id='.$id);
		} else {

			echo"<script> alert('Data Not Update!')
	                    window.location.replace('newuser.php?userId'.$id);  
	            </script>";
		}
	}
  
?>