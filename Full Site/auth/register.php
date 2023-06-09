<?php
require_once "config.php";

$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Username cannot be blank";
    }
    else{
        $sql = "SELECT user_id FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if($stmt)
        {
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set the value of param phone_no
            $param_username = trim($_POST['username']);

            // Try to execute this statement
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    $username_err = "This Username is already registered"; 
                }
                else{
                    $username = trim($_POST['username']);
                }
            }
            else{
                echo "Something went wrong";
            }
        }
    }

    mysqli_stmt_close($stmt);


// Check for password
if(empty(trim($_POST['password']))){
    $password_err = "Password cannot be blank";
}
elseif(strlen(trim($_POST['password'])) < 5){
    $password_err = "Password cannot be less than 5 characters";
}
else{
    $password = trim($_POST['password']);
}

// Check for confirm password field
if(trim($_POST['password']) !=  trim($_POST['confirm_password'])){
    $password_err = "Passwords should match";
}

  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $phone_no = $_POST['phone_no'];
  $email = $_POST['email'];
  $institute = $_POST['institute'];
  // $branch = $_POST['branch'];
  // $semester = $_POST['semester'];
  // $hostel = $_POST['hostel'];
  // $batch = $_POST['batch'];
  // $sql = "INSERT INTO users (username, password, fullname, phone_no , email, branch, semester, hostel, batch) VALUES (?, ?, '$fullname','$phone_no', '$email', '$branch', '$semester', '$hostel', '$batch')";
  

// If there were no errors, go ahead and insert into the database
if(empty($username_err) && empty($password_err) && empty($confirm_password_err))
{
    $sql = "INSERT INTO users (username, password, fname, lname, phone_no , email) VALUES (?, ?, '$fname', '$lname' , '$phone_no', '$email')";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt)
    {
        mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

        // Set these parameters
        $param_username = $username;
        $param_password = password_hash($password, PASSWORD_DEFAULT);

        // Try to execute the query
        if (mysqli_stmt_execute($stmt))
        {
            header("location: login.php");
        }
        else{
            echo "Something went wrong... cannot redirect!";
        }
    }
    mysqli_stmt_close($stmt);
}
mysqli_close($conn);
}

?>




<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Renbarsell - Register</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">
            <h3>Renbarsell</h3>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register.php">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>



            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <h3>Register For Renbarsell</h3>
        <hr>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="form-row">

                <div class="form-group col-md-6">
                    <label for="inputEmail4">Username</label>
                    <input type="text" class="form-control" name="username" id="inputEmail4" placeholder="Full Name"
                        required>
                </div>

                <div class="form-group col-md-6">
                    <label for="inputEmail4">First Name</label>
                    <input type="text" class="form-control" name="fname" id="inputEmail4" placeholder="Full Name"
                        required>
                </div>

                <div class="form-group col-md-6">
                    <label for="inputEmail4">Last Name</label>
                    <input type="text" class="form-control" name="lname" id="inputEmail4" placeholder="Full Name"
                        required>
                </div>

                <div class="form-group col-md-6">
                    <label for="inputEmail4">Email</label>
                    <input type="email" class="form-control" name="email" id="inputEmail4" placeholder="Email" required>
                </div>

                <div class="form-group col-md-6">
                    <label for="inputEmail4">Mobile Number</label>
                    <input type="number" class="form-control" name="phone_no" id="inputEmail4"
                        placeholder="Mobile Number" required>
                </div>

                <div class="form-group col-md-5">
                    <label for="inputEmail4">Institute</label>
                    <select name="institute" class="form-select" aria-label="Default select example">
                        <option value="Assam Engineering College">Assam Engineering College</option>
                        <option value="Guwahati Unviersity">Guwahati Unviersity</option>
                        <option value="Jorhat Engineering College">Jorhat Engineering College</option>
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="inputPassword4">Password</label>
                    <input type="password" class="form-control" name="password" id="inputPassword4"
                        placeholder="Password" required>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword4">Confirm Password</label>
                <input type="password" class="form-control" name="confirm_password" id="inputPassword"
                    placeholder="Confirm Password" required>
            </div>

            <button type="submit" class="btn btn-primary">Sign in</button>

            <div class="d-block mt-5">
                Already have a account?
                <a href="login.php">Login</a>
            </div>
    </div>






    </form>



    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>