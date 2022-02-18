<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <title>demo-registation form</title>
</head>

<body>

    <?php
    if ($_GET['userId']) {
      $dbhost='localhost';
      $dbname='Rahul';
      $dbusername='all_user';
      $dbpass='#123all@';
  
      $id = $_GET['userId'];
      $conn = mysqli_connect($dbhost,$dbusername,$dbpass,$dbname);

      $sql = "SELECT * FROM user_details WHERE id='$id'";
      $res = $conn->query($sql);
      $data = $res->fetch_assoc();
    } else {
      session_start(); 
      $ferror = null;
      if (isset($_SESSION['error'])) {
        $ferror = $_SESSION['error'] ? $_SESSION['error'] : null;
      }
      session_destroy();  
    }
    ?>

  <div class="container">
    <div class="form-row">
      <div class="col-md-12 ">
        <h1 class="text-center">Registation page!</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-md-5 m-auto">
      <p class=" alert <?php if (isset($ferror)) { echo "alert-danger"; }; ?>" role="alert"><?php echo $ferror; ?></p>
        <div class="card bg-info">
          <form method="post" action="user.php" id="myform">
            <div class="form-group ">
              <div class="col-md-12 mb-3">
                <label> Name:</label>
                <input type="text"id="name" value="<?php echo $data['name'] ? $data['name'] : ''; ?>"  required name="name" onkeypress="return (event.charCode > 64 && 
                  event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) ||(event.charCode == 32)" placeholder="Name" class="form-control"> 
                  <label id="lblError" style="color: red"></label>             
              </div>
              <div class="col-md-12 mb-3">
                <label>Phone:</label> 
                <input type="text" value="<?php echo $data['phone'] ? $data['phone'] : ''; ?>" required name="phone" id="phone" pattern="[6789][0-9]{9}"  maxlength="10" placeholder="Phone" title="Phone number start with 6,7,8,9 " class="form-control">
              </div>
            </div>
              <div class="form-group ">
                <div class="col-md-12 mb-3">
                  <label>Email:</label>
                  <input type="email" value="<?php echo $data['email'] ? $data['email'] : ''; ?>" onpaste="return false;" ondrop="return false;" autocomplete="off"id="email"  required name="email" placeholder="Email" class="form-control" >
                  <label id="error_email" style="color: red;"></label>
                </div>
              </div>
              <input type="hidden" name="update_id" value="<?php echo $id ? $id : null; ?>">
              <div class="form-group">
                <div class="col-md-12 mb-3">
                    <label>Password:</label>
                    <input type="password" value="<?php echo $data['password'] ? $data['password'] : ''; ?>" onpaste="return false;" ondrop="return false;" autocomplete="off" id="password" required name="password" placeholder="Password"
                      class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-12 mb-3">
                    <label>confirm password:</label>
                    <input type="password" value="<?php echo $data['password'] ? $data['password'] : ''; ?>" onpaste="return false;" ondrop="return false;" autocomplete="off" id="confirm_password"
               required name="pass2" placeholder="Confirm  Password" class="form-control">
              <span id="confirm_password_msg"></span>

                  </div>
                  <div class="py-3" <?php if($id) { ?> hidden="true" <?php } ?> >
                    Already a member? <a href="userlogin.php" class="text-primary" > Login</a>
                  </div>
                  <div class="col-md-12 justify-content-between d-flex">
                    <button class="btn btn-danger" <?php if($id) { ?> hidden="false" <?php } ?> onClick="window.location.reload();"> RESET</button>
                    <button class="btn btn-danger" <?php if(!$id) { ?> hidden="true" <?php } ?> onClick=window.location.replace("display.php");> CANCEL</button>
                  
                    <button type="submit" id="submit" class="btn btn-success text-uppercase " disabled name="<?php echo $id ? 'update':'submit'; ?>"><?php echo $id ? 'update':'submit'; ?></button>


                  </div>

          </form>
        </div>
      </div>
    </div>
  </div>


  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

 

 <script>
 //<----------password validation---------->

  $(document).ready(function () {
    $("#confirm_password").bind("keyup change", function () {
      check_Password($("#password").val(), $("#confirm_password").val());
    });

    $("#submit").click(function () {
      check_Password($("#password").val(), $("#confirm_password").val());
    });


  });

function check_Password(Pass, Con_Pass) {
  if (Pass === "") {
  } else if (Pass === Con_Pass) {
    $("#submit").removeAttr("onclick");
    $("#confirm_password_msg").show();
    $("#confirm_password_msg").html(
      '<div class="text-warning">Password matched</div>'
    );document.getElementById('submit').disabled = false;
    // 


  } else {
    $("#confirm_password").focus();
    $("#confirm_password_msg").show();
    $("#confirm_password_msg").html(
      '<div class="text-danger">Password didnot matched</div>'
    ); document.getElementById('submit').disabled = true;
  
  }
};

//<--------phone number validation---------> //
  $('input[name="phone"]').keypress(function (event) {
      if (event.keyCode == 46 || event.keyCode == 8) {
        //do nothing
      } else {
        if (event.keyCode < 48 || event.keyCode > 57) {
          event.preventDefault();

        }
      }
    });

  $("#phone").keyup(function(){

  var phone = $("#phone").val().length;
  if (phone <= 9) {
    document.getElementById('submit').disabled = true;
  }else{
    document.getElementById('submit').disabled = false;
  }
});

 


//<------email validation--------->//


$("#email").keyup(function(){

     var email = $("#email").val();
     var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

     if (!filter.test(email)) {
       $("#error_email").text(email+" is not a valid email");
       email.focus;
       document.getElementById('submit').disabled = true;
    } else {
        $("#error_email").text("");
        document.getElementById('submit').disabled = false;
    }

 });

$("#name").keyup(function(){

     var name = $("#name").val();
     var fillter = /^[a-zA-Z_ ]*$/;

     if (!fillter.test(name)) {
       $("#lblError").text(name+" is not a valid name");
       name.focus;
       document.getElementById('submit').disabled = true;
    } else {
        $("#lblError").text("");
        document.getElementById('submit').disabled = false;
    }

 });





</script>


</body>

</html>