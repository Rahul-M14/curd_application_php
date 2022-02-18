<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>User login</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-5 m-auto">
                <div class="card p-4 mt-5 bg-info text-white">
                    <h2 class="text-center">
                        LOG IN  
                    </h2>
                    <form action="login.php" method="POST">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email:</label>
                            <input type="email" onpaste="return false;" ondrop="return false;" autocomplete="off"name="email"class="form-control" id="Email"
                                aria-describedby="emailHelp" placeholder="Enter email">
                            <small id="emailHelp" class="form-text text-warning">We'll never share your email with anyone
                                else.</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password:</label>
                            <input type="password"onpaste="return false;" ondrop="return false;" autocomplete="off" name="password" class="form-control" id="password"
                                placeholder="Password">
                        </div>
                         <div class="py-3">
                    Don't have an account yet?<a href="newuser.php" class="text-warning"> <b>Register now</b></a>
                  </div>
                        <div class="w-100 text-center">
                            <button type="submit" name="submit" class="btn btn-success ">Log In</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>