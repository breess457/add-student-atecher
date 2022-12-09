<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Document</title>
</head>
<body>
<script type="text/javascript">
  const MySetSweetAlert =(Icons,Titles,Texts)=>{
      Swal.fire({
          icon: Icons,
          title: Titles,
          text:Texts,
          confirmButtonText:"OK"
      }).then((result)=>{
           window.location = '../profile.php'
      })
  }
</script>
 <?php
    session_start();
     require('../../config/connect.php');
      require_once('../../include/link.php');
        function setImgpath($nameImg){
          $ext = pathinfo(basename($_FILES[$nameImg]["name"]), PATHINFO_EXTENSION);
            if($ext !=""){
                $new_img_name = "img_".uniqid().".".$ext;
                $path = "../../config/admin-profile/";
                $uploadPath = $path.$new_img_name;
                move_uploaded_file($_FILES[$nameImg]["tmp_name"],$uploadPath);
                $newImage = $new_img_name;
            }else{
                $newImage = $new_img_name;
            }
            return $newImage;
        }

        if($_SERVER['REQUEST_METHOD'] == "POST"){
            function editDataProfile($config_db,$set_img_tmp){
                $me_id = $_POST['admin_id'];
                $edit_username = $_POST['edit_username'];
                $edit_email = $_POST['edit_email'];
                $edit_password = $_POST['edit_password'];
                $edit_department = $_POST['edit_department'];
                $edit_position = $_POST['edit_position'];
                $imageteachername = $_POST['imageteachername'];
                 if(!$set_img_tmp){
                    $editDataSQL = "UPDATE remamber SET user_name='$edit_username',email='$edit_email',passwd='$edit_password',
                        department_teacher='$edit_department',position='$edit_position' WHERE member_id='$me_id'";
                 }else{
                    $editDataSQL = "UPDATE remamber SET user_name='$edit_username',email='$edit_email',passwd='$edit_password',
                        profile_img='".setImgpath("editimageTeacher")."',department_teacher='$edit_department',position='$edit_position' WHERE member_id='$me_id'";
                     if($imageteachername){
                         $unPhoto = "../../config/admin-profile/".$imageteachername;
                         unlink($unPhoto);
                     }
                 }
                 $editQueryProfile = mysqli_query($config_db,$editDataSQL)or die(mysqli_error());
                  if($editQueryProfile){
                    echo "
                     <script type=\"text/javascript\">
                         MySetSweetAlert(\"success\",\"เรียบร้อย\",\"แก้ไขโปรไฟล์เรียบร้อยแล้ว โปรดออกจากระบบแล้วเข้าระบบใหม่อีกที\");
                     </script>
                    "; 
                  }else{
                      echo "error";
                  }
            }
            editDataProfile($dbConfig,$_FILES['editimageTeacher']['tmp_name']);
        
        }else{
            $data_arr = array();
            echo json_encode($data_arr);
        }
 ?>
</body>
</html>
<!-- 
  echo "id: ",$me_id,"<br> name:",$edit_username,"<br> pass:",$edit_password,"<br> department:",$edit_department;
  echo "<br> position:",$edit_position,"<br> img:",$imageteachername;
 -->