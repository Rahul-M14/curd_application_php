 <!-- <script>
   <script type="text/javascript">
       function registration()
    {

        var name= document.getElementById("name").value;
        var phone= document.getElementById("phone").value;
        var email= document.getElementById("email").value;
        var pwd= document.getElementById("password").value;           
        var cpwd= document.getElementById("confirm_password").value;
        
        //email id expression code
        var pwd_expression = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-])/;
        var letters = /^[A-Za-z]+$/;
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

        if(name=='')
        {
            alert('Please enter your name');
        }
        else if(!letters.test(name))
        {
            alert('Name field required only alphabet characters');
        }
        else if(email=='')
        {
            alert('Please enter your user email id');
        }
        else if (!filter.test(email))
        {
            alert('Invalid email');
        }
        else if(pwd=='')
        {
            alert('Please enter Password');
        }
        else if(cpwd=='')
        {
            alert('Enter Confirm Password');
        }
        else if(!pwd_expression.test(pwd))
        {
            alert ('Upper case, Lower case, Special character and Numeric letter are required in Password filed');
        }
        else if(pwd != cpwd)
        {
            alert ('Password not Matched');
        }
        else if(document.getElementById("confirm_password").value.length < 6)
        {
            alert ('Password minimum length is 6');
        }
        else if(document.getElementById("confirm_password").value.length > 12)
        {
            alert ('Password max length is 12');
        }
        else
        {                                           
               alert('Thank You for Registration & You are Redirecting to Website'); 
               window.location= 'http://rahul.mimansatech.com/userlogin.html'; 
        }
    }
  </script>
 -->
<!-- 
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {  
      
        
          if (!$_POST["name"]) {  
               $nameErr = "Name is required";  
          } else {  
              $name = input_data($_POST["name"]);  
                  
                  if (!preg_match("/^[a-zA-Z ]*$/",$name)) {  
                      echo "Only alphabets and white space are allowed";  
                  }  
          }  
        } 



   
        $email = $_POST["email"];  
        $pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";  
        if (!preg_match($pattern, $email) ){  
          echo "Email is not valid";    
        } else {  
            echo "Your valid email address is: " .$email;  
        }  




  
if (isset ($_POST['submit'])) {  
    echo "Submit button is clicked.";  
    if ($_SERVER["REQUEST_METHOD"] == "POST") {  
        echo "<script type='text/javascript'>alert('Your data submitted!')
        window.location.replace('newuser.php');
        </script>";
    }   else {  
    echo "<script type='text/javascript'>alert('data not submitted!')
    window.location.replace('newuser.php');
    </script>";  

  }

}

 ?> -->