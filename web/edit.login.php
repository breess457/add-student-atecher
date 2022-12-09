
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page</title>
</head>
<body>
<?php
session_start();
include('../config/connect.php');
include('../include/link.php');
  if($_SERVER['REQUEST_METHOD'] == "POST"){
      $email = $_POST['email'];
      $password = $_POST['password'];

      $getSQL = "SELECT * FROM remamber WHERE email='$email' AND passwd='$password'";
       $setQuery = mysqli_query($dbConfig,$getSQL)or die(mysqli_error());
       $fetchUser = mysqli_fetch_assoc($setQuery);
        if(!$fetchUser){
            echo "
              <script> 
                 Swal.fire({
                     icon:\"error\",
                     title:\"ไม่มี Username นี้ในแผนกนี้\",
                     confirmButtonText:\"OK\"
                 }).then((result)=>{
                      window.location ='../index.php'
                
                 })
              </script>
            ";
        }else{
            $_SESSION['remamber'] = $fetchUser;
            $nameSessioon = $_SESSION['remamber']['user_name'];
            echo "
              <script> 
                 Swal.fire({
                     icon:\"success\",
                     title:\"ยินดี ต้อนรับ คุณ $nameSessioon\",
                     confirmButtonText:\"OK\"
                 }).then((result)=>{
                      window.location ='index.php'
                
                 })
              </script>
            ";
        }
  }

?>
</body>
</html>