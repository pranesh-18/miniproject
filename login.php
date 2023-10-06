<?php require "header.php";
?>
<link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/carousel/">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css
 " rel="stylesheet">
 
<?php require "config.php";?> 
<?php
if(isset($_SESSION['username']))
{
  header("location:index.php");
}
if(isset($_POST['submit']))
{
  if($_POST['email']=='' OR $_POST['password']=='') {
    echo "some inputs are empty";
  }
  else{
    $email=$_POST['email'];
    $password=$_POST['password'];
    $login=$conn->query("SELECT * FROM users WHERE email='$email'");
    $login->execute();
    $data=$login->fetch(PDO::FETCH_ASSOC);
    if ($login->rowcount()>0) 
    {
      if(password_verify($password,$data['mypassword']))
      {
        $_SESSION['username']=$data['username'];
        $_SESSION['email']=$data['email'];
        header("location:index.php");
      }
      else
      {
        echo "password wrong";
      }
    }
    else
      {
        echo "email id wrong";  
      }
  }
}
?>
<html>
  <div>
<main class="form-signin w-50 m-auto">
  <form method="POST" action="login.php">
    <h1 class="h3 mt-5 fw-normal text-center">Please sign in</h1></br>

    <div class="form-floating">
      <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
      <label for="floatingInput">Email address</label></br>
    </div>
    <div class="form-floating">
      <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password" required>
      <label for="floatingPassword">Password</label><br>
    </div>

    <button name="submit" class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
  </form>
</main>
</div>
</html>
<?php require "footer.php"; ?>
  