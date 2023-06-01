<!doctype html>
<html lang="en">
  <head>
  	<title>CV. Grand Sehat</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="login/css/style.css">
    <link rel="icon" href="icon.ico">

	</head>

  <?php
    require_once ('config/connect.php');
    error_reporting(0);
     
    if (isset($_SESSION['username'])) {
        header("Location: pages/dashboard.php");
    }
     
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
     
        $sql = "SELECT * FROM Users WHERE username='$username' AND password='$password'";
        $result = mysqli_query($connect, $sql);
        if ($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $row['username'];
            $_SESSION['name'] = $row['name'];
            header("Location: pages/dashboard.php");
        } else {
            echo "<script>alert('Username atau password Anda salah. Silahkan coba lagi!')</script>";
        }
    }
?>


	<body class="img js-fullheight" style="background-image: url(login/images/bg.jpg);">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Otentikasi</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	<h3 class="mb-4 text-center">Login</h3>
		      	<form action="" class="signin-form" method="POST">
		      		<div class="form-group">
		      			<input type="text" class="form-control" name="username" placeholder="Username" required>
		      		</div>
	            <div class="form-group">
	              <input id="password-field" name="password" type="password" class="form-control" placeholder="Password" required>
	              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	            </div>
	            <div class="form-group">
	            	<button name="submit" type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
	            </div>
	          </form>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="login/js/jquery.min.js"></script>
  <script src="login/js/popper.js"></script>
  <script src="login/js/bootstrap.min.js"></script>
  <script src="login/js/main.js"></script>

	</body>
</html>

