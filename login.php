<?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        session_start();
        $dbhost='localhost';
        $dbname='Rahul';
        $dbusername='all_user';
        $dbpass='#123all@';
        $connect = mysqli_connect($dbhost,$dbusername,$dbpass,$dbname);
        $email = $_POST['email'];
        $password = $_POST['password'];
        
    
        $sql = "SELECT email, password ,id FROM user_details WHERE email='$email'";
        $res = $connect->query($sql);
        $data = $res->fetch_assoc();
        if ($data && $data["password"] == $password) {
            $_SESSION['userlogout'] = $email;
            header('location: display.php?id='.$data["id"]);
        } else {
            echo "<script type='text/javascript'>alert('Invalid Credentials!')
            window.location.replace('userlogin.php');
            </script>";
        }
    }
    
?>