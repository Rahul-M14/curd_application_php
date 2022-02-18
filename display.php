<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
</head>
<body>
    <?php 
     session_start();
     if (!$_SESSION['userlogout']) {
         header("location:userlogin.php");       
     }
 
        $dbhost='localhost';
        $dbname='Rahul';
        $dbusername='all_user';
        $dbpass='#123all@';



        $id = $_GET['id'];
        $conn = mysqli_connect($dbhost,$dbusername,$dbpass,$dbname);

        $sql = "SELECT * FROM user_details WHERE id='$id'";
        $res = $conn->query($sql);
        $data = $res->fetch_assoc();
    ?>
        <div class="container">
            <div class="row">
                <div class="col-md-6 m-auto">
                    <div class="card p-4 mt-5 bg-info text-white">
                        <h2>Users Details</h2> <hr>
                        User Name : <?php echo $data["name"]; ?> </br></br>
                        User Phone : <?php echo $data["phone"]; ?></br></br>
                        User Email : <?php echo $data["email"]; ?></br></br>
                        User Password : <?php echo $data["password"]; ?>
                         <div>
                         	 <a href="newuser.php?userId=<?php echo $id; ?>" class="btn btn-warning btn-sm float-right">Edit</a>
                        <a href="logout.php" class="btn btn-danger btn-sm float-right">Logout</a>
                         </div>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>
