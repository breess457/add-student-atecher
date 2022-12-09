<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Teacher</title>
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
           window.location = '../teacher.php'
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

    if(isset($_POST['setstatus'])== "PUTUPDATE"){

        function editDataAdmin($editConfig,$editImageTmp){
            $admin_id = $_POST['admin_id'];
            $edit_username = $_POST['edit_username'];
            $edit_email = $_POST['edit_email']; 
            $edit_passwd = $_POST['edit_password'];
            $edit_department = $_POST['edit_department'];
            $edit_position = $_POST['edit_position'];
            $imageteachername =$_POST['imageteachername'];
            if($editImageTmp ==""){
               $editSQL = "UPDATE remamber SET user_name='$edit_username',email='$edit_email',passwd='$edit_passwd',
                   department_teacher='$edit_department',position='$edit_position' WHERE member_id='$admin_id'";
            }else{
                $editSQL = "UPDATE remamber SET user_name='$edit_username',email='$edit_email',passwd='$edit_passwd',
                   profile_img='".setImgpath("editimageTeacher")."',department_teacher='$edit_department',
                   position='$edit_position' WHERE member_id='$admin_id'";
               if($imageteachername){
                   $unFileEdit = "../../config/admin-profile".$imageteachername;
                   unlink($unFileEdit);
               }
            }
            $editQuerySQL = mysqli_query($editConfig,$editSQL)or die(mysqli_error());
             if($editQuerySQL){
                 echo "
                     <script type=\"text/javascript\">
                         MySetSweetAlert(\"success\",\"แก้ไขข้อมูลเรียบร้อยแล้ว\",\"แก้ไขข้อมูลผู้ใช้งานที่ชื่อ: $edit_username เรียบร้อยแล้ว\")
                     </script>
                  ";  
             }else{
                 echo "
                     <script type=\"text/javascript\">
                         MySetSweetAlert(\"error\",\"แก้ไขข้อมูลล้มเหลว\",\"ไม่สามารถแก้ไขข้อมูลผู้ใช้งานที่ชื่อ: $fullname ได้ โปรดติดต่อเจ้าหน้าที่\")
                     </script>
                  ";
             }
        }
        editDataAdmin($dbConfig,$_FILES['editimageTeacher']['tmp_name']);
            
    }else if($_SERVER['REQUEST_METHOD'] == "POST"){

        function insertDataTeacher($dataConfig){
            $fullname = $_POST['username'];
            $email = $_POST['email'];
            $passwd = $_POST['password'];
            $department = $_POST['department'];
            $position = $_POST['position'];
            $status = "teacher";

             $checkEmail = mysqli_query($dataConfig,"SELECT email FROM remamber WHERE email='$email'")or die(mysqli_error());
             $setRows = mysqli_num_rows($checkEmail);
              if($setRows > 0){
                    echo "
                        <script type=\"text/javascript\">
                            MySetSweetAlert(\"error\",\"email มีซ้ำกัน\",\"ไม่อนุญาติให้ อีเมล มีซ้ำกัน โปรดใช้ อีเมลอื่น เถอะ\")
                        </script>
                    ";
              }else{
                  $insertDataTeacher = "INSERT INTO remamber(user_name,email,passwd,profile_img,status,department_teacher,position)
                        VALUES('$fullname','$email','$passwd','".setImgpath("imageTeacher")."','$status','$department','$position')";
                    $setQuery = mysqli_query($dataConfig,$insertDataTeacher)or die(mysqli_error());
                     if($setQuery){
                       echo "
                          <script type=\"text/javascript\">
                              MySetSweetAlert(\"success\",\"เพิ่มข้อมูลเรียบร้อยแล้ว\",\"เพิ่มผู้ใช้งานที่ชื่อ: $fullname เรียบร้อยแล้ว\")
                          </script>
                       ";  
                     }else{
                       echo "
                          <script type=\"text/javascript\">
                              MySetSweetAlert(\"error\",\"เพิ่มข้อมูลล้มเหลว\",\"ไม่สามารถเพิ่มผู้ใช้งานที่ชื่อ: $fullname ได้ โปรดติดต่อเจ้าหน้าที่\")
                          </script>
                       ";
                     }
              }
        }
        insertDataTeacher($dbConfig);

    }else if($_SERVER['REQUEST_METHOD'] == "GET"){
        $admin_id = $_GET['adminId'];
        $image_admin = $_GET['img_admin'];
        $teacher_name = $_GET['admin_name'];

        function setUpdateData($zero_session,$id_admin_trash,$config_db){
           
            $loop_data = mysqli_query($config_db,"SELECT id_teacher,std_id FROM student_history WHERE id_teacher='$id_admin_trash'")or die(mysqli_error());
             foreach($loop_data as $key_data){
                $id_std = $key_data['std_id'];
                $update_data_admin = "UPDATE student_history SET id_teacher='$zero_session' WHERE std_id='$id_std'";
                 $query_update = mysqli_query($config_db,$update_data_admin)or die(mysqli_error());
                  if(!$query_update){
                      echo "! not update";
                  }
             }
        }

         $setTrashData = mysqli_query($dbConfig,"DELETE FROM remamber WHERE member_id='$admin_id' LIMIT 1")or die(mysqli_error());
          if($setTrashData){
            $unImage = "../../config/admin-profile/".$image_admin;
             unlink($unImage);
              setUpdateData($_SESSION['remamber']['member_id'],$admin_id,$dbConfig);
               echo "
                   <script type=\"text/javascript\">
                       MySetSweetAlert(\"success\",\"delete data teacher success\",\"ลบข้อมูลผู้ใช้งานที่ชื่อ: $teacher_name เรียบร้อยแล้ว\")
                   </script>
                ";
          }else{
              echo "
                   <script type=\"text/javascript\">
                       MySetSweetAlert(\"error\",\"delete data error\",\"ไม่สามารถลบข้อมูลผู้ใช้งานที่ชื่อ: $teacher_name ได้โปรดติดต่อเจ้าหน้าที่\")
                   </script>
                ";
          }
    }

?>
</body>
</html>