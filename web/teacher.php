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
    <link rel="stylesheet" href="../assets/style/teacher.scss">
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

        Navigationbars($image_sesstion,$fullname_sesstion,$status_sesstion);
        echo "
        <div class=\"main-content \">
            <div class='container-fluid mt-2'>
        ";
          echo "<div class=\"d-flex mt-4\">";
            echo "<button class=\"btn btn-outline-primary\" data-toggle=\"modal\" data-target=\"#formAddTeacher\" id=\"AddTeacher\">
                    <i class=\"fas fa-user-plus\"></i> Add Teacher
                 </button>";
            echo "<div id=\"custom-search-input\" class=\"ml-auto\">
                      <div class=\"input-group\">
                          <input type=\"text\" class=\"form-control input-lg\" id=\"MySearchDataTrue\" onkeyup=\"myFunctionSearchDataTrue()\" placeholder=\"Buscar\" />
                          <span class=\"input-group-btn\">
                              <button class=\"btn btn-info btn-lg\" type=\"button\">
                                  <i class=\"fas fa-search\"></i>
                              </button>
                          </span>
                      </div>
                  </div>";
          echo "</div> <hr />";
            echo"<h2 class=\"mb-5\">List Teacher</h2>";
            echo "<div id=\"listdataTeacher\">";
            $getDataTeacher = mysqli_query($dbConfig,"SELECT * FROM remamber WHERE status='teacher'");
            foreach($getDataTeacher as $key => $result){
                ListDataTeacher($result['member_id'],$result['user_name'],$result['email'],$result['passwd'],$result['department_teacher'],$result['position'],$result['profile_img']);
            }
        echo "      
                </div>
            </div>
        </div>
        ";
        echo "<modal-add-teacher></modal-add-teacher>";
        echo "<update-data-teacher></update-data-teacher>";
    }
 ?>
 <script src="../assets/script/set.teacher.js"></script>
</body>
</html>