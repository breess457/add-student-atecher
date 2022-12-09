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
    <link rel="stylesheet" href="../assets/style/student.scss">
    <title>Home Page</title>
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

        $setSQL = "SELECT * FROM student_history AS S LEFT JOIN remamber AS R ON S.id_teacher = R.member_id WHERE id_teacher='$id_session'";
        $getStudentHistory = mysqli_query($dbConfig,$setSQL)or die(mysqli_error());

        Navigationbars($image_sesstion,$fullname_sesstion,$status_sesstion);
        echo "
        <div class=\"main-content \">
            <div class='container-fluid mt-2'>
        ";
          echo "<div class=\"d-flex mt-4\">";
            echo "<button class=\"btn btn-outline-warning\" data-toggle=\"modal\" data-target=\"#formAddStudentHistory\" data-id=\"$id_session\" id=\"addHistoryStudent\">
                    <i class=\"fas fa-user-plus\"></i> add student history
                 </button>";
            echo "<div id=\"custom-search-input\" class=\"ml-auto\">
                      <div class=\"input-group\">
                          <input type=\"text\" class=\"form-control input-lg\" id=\"MySearchData\" onkeyup=\"myFunctionSearchDate()\" placeholder=\"Buscar\" />
                          <span class=\"input-group-btn\">
                              <button class=\"btn btn-info btn-lg\" type=\"button\">
                                  <i class=\"fas fa-search\"></i>
                              </button>
                          </span>
                      </div>
                  </div>";
          echo "</div> <hr />";
            $setnumber = mysqli_num_rows($getStudentHistory);
            echo"<h3 class=\"text-purper-x mb-3 mt-2\">จำนวนข้อมูลนักศึกษาที่เราเพิ่มทั้งหมด <span class=\"text-ggren\">$setnumber</span> คน</h3>";

          echo"<div id=\"ListAllData\">";
             foreach($getStudentHistory as $nums => $result){
                ListStudentHistory($result['std_id'],$result['fullname_std'],$result['nick_name'],$result['code_std'],$result['year_of_study'],$result['department'],$result['class_level'],
                    $result['address'],$result['phone'],$result['img_std'],$result['fater_name'],$result['mater_name'],$result['img_home'],$result['user_name'],$result['profile_img'],$result['member_id'],$id_session);
             }
        echo "   
               </div>    
            </div>
        </div>
        ";
        echo "<main-modal-history id=\"$id_session\"></main-modal-history>";
        echo "<main-view-student></main-view-student>";
        echo "<modal-update-userhistory id=\"$id_session\"></modal-update-userhistory>";
    }
 ?>
 <script src="../assets/script/set.student.js"></script>
</body>
</html>