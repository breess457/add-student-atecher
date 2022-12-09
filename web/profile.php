 <?php
    session_start();
    include_once('../config/connect.php');
    include_once('../include/link.php');
    include_once('../include/function.php');
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style/navigation.page.scss">
    <link rel="stylesheet" href="../assets/style/profile.scss">
    <title>Profile Page</title>
</head>
<body>
<script type="text/javascript">
  const MySweetAlert =(Icons,Titles,Texts)=>{
      Swal.fire({
          icon: Icons,
          title: Titles,
          text:Texts,
          confirmButtonText:"OK"
      }).then((result)=>{
           window.location = '../index.php'
      })
  }
</script>
 <?php
    if(!isset($_SESSION['remamber'])){
        echo "<script> MySweetAlert('error','ไม่อนุญาติ','กรุณาลงชื่อ เข้าสู่ระบบ ด้วย') </script>";
    }else{
        $fullname_sesstion = $_SESSION['remamber']['user_name'];
        $image_sesstion = $_SESSION['remamber']['profile_img'];
        $status_sesstion = $_SESSION['remamber']['status'];
        $id_session = $_SESSION['remamber']['member_id'];
         $setDataProfile = mysqli_query($dbConfig,"SELECT * FROM remamber WHERE member_id='$id_session'")or die(mysqli_error());

        Navigationbars($image_sesstion,$fullname_sesstion,$status_sesstion);
        echo "
        <div class=\"main-content \">
            <div class='container-fluid mt-2'>
        ";
          foreach($setDataProfile as $main){
            ProfielCard($main['profile_img'],$main['user_name'],$main['email'],$main['passwd'],$main['status'],$main['department_teacher'],$main['member_id'],$main['position']);
          }
        echo "       
            </div>
        </div>
        ";
        echo "<main-edit-profile></main-edit-profile>";
    }
 ?>
 <script src="../assets/script/set.profile.js"></script>
</body>
</html>