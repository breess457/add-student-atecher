
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
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
           window.location = '../student.php'
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
            $path = "../../config/image-history/";
            $uploadPath = $path.$new_img_name;
            move_uploaded_file($_FILES[$nameImg]["tmp_name"],$uploadPath);
            $newImage = $new_img_name;
        }else{
            $newImage = $new_img_name;
        }
        return $newImage;
    }
    if(isset($_POST['status'])== "PUTUPDATE"){

        function editDataStudentHistory($edit_config,$file_image_tmp_std,$file_image_tmp_home){
            $memberId = $_POST['memberId'];
            $edit_id = $_POST['edit_id'];
            $editfullname = $_POST['editfullname'];
            $editnickname = $_POST['editnickname'];
            $editstudycode = $_POST['studentCode'];
            $editphone = $_POST['phone'];
            $edityearofstudy = $_POST['yearstudy'];
            $editdepartment = $_POST['Department'];
            $editclasslevel = $_POST['classlevel'];
            $editlocation = $_POST['address'];
            $editfater = $_POST['father'];
            $editmoter = $_POST['mother'];
            $edit_img_std_name = $_POST['edit_img_std'];
            $edit_img_home_name = $_POST['edit_img_home'];

            if(!$file_image_tmp_std && !$file_image_tmp_home){
                $editSQL_history ="UPDATE student_history SET fullname_std='$editfullname',nick_name='$editnickname',code_std='$editstudycode',
                year_of_study='$edityearofstudy',department='$editdepartment',class_level='$editclasslevel',address='$editlocation',phone='$editphone',
                fater_name='$editfater',mater_name='$editmoter' WHERE std_id='$edit_id'";

            }else if(!$file_image_tmp_std){
                $editSQL_history ="UPDATE student_history SET fullname_std='$editfullname',nick_name='$editnickname',code_std='$editstudycode',
                year_of_study='$edityearofstudy',department='$editdepartment',class_level='$editclasslevel',address='$editlocation',phone='$editphone',
                fater_name='$editfater',mater_name='$editmoter',img_home='".setImgpath("editimageShowRoom")."' WHERE std_id='$edit_id'";

                if($edit_img_home_name){
                    $unImageHome = "../../config/image-history/".$edit_img_home_name;
                    unlink($unImageHome);
                }

            }else if(!$file_image_tmp_home){
                $editSQL_history ="UPDATE student_history SET fullname_std='$editfullname',nick_name='$editnickname',code_std='$editstudycode',
                year_of_study='$edityearofstudy',department='$editdepartment',class_level='$editclasslevel',address='$editlocation',phone='$editphone',
                img_std='".setImgpath("editimageStudent")."',fater_name='$editfater',mater_name='$editmoter' WHERE std_id='$edit_id'";
                
                if($edit_img_std_name){
                    $unImageStd = "../../config/image-history/".$edit_img_std_name;
                    unlink($unImageStd);
                }

            }else{
                $editSQL_history ="UPDATE student_history SET fullname_std='$editfullname',nick_name='$editnickname',code_std='$editstudycode',
                year_of_study='$edityearofstudy',department='$editdepartment',class_level='$editclasslevel',address='$editlocation',phone='$editphone',
                img_std='".setImgpath("editimageStudent")."',fater_name='$editfater',mater_name='$editmoter',
                img_home='".setImgpath("editimageShowRoom")."' WHERE std_id='$edit_id'";
                
                if($edit_img_std_name && $file_image_tmp_home){
                    $unImageStd = "../../config/image-history/".$edit_img_std_name;
                    unlink($unImageStd);
                    $unImageHome = "../../config/image-history/".$file_image_tmp_home;
                    unlink($unImageHome);
                }

            }
            $editQueryData = mysqli_query($edit_config,$editSQL_history)or die(mysqli_error());
             if($editQueryData){
                 echo "
                    <script type=\"text/javascript\">
                        MySetSweetAlert(\"success\",\"แกไข นศ เรียบร้อย\",\"แก้ไข นศ ชื่อ:$editfullname เรียบร้อยแล้ว\")
                    </script>
                  ";
             }else{
                 echo "
                    <script type=\"text/javascript\">
                        MySetSweetAlert(\"error\",\"แกไข นศ ล้ทเหลว\",\"ไม่สามาถแก้ไข นศ ชื่อ:$editfullname ได้ โปรดติดต่อเจ้าหน้าที่\")
                    </script>
                  ";
             }
        }

        editDataStudentHistory($dbConfig,$_FILES['editimageStudent']['tmp_name'],$_FILES['editimageShowRoom']['tmp_name']);

    }else if($_SERVER['REQUEST_METHOD'] == "POST"){

        function insertHistoryStudent($dbCnnected){
            $memberIdTeacher = $_POST['memberId'];
            $Fullname = $_POST['Fullname'];
            $studentCode = $_POST['studentCode'];
            $nickname = $_POST['nickname'];
            $phone = $_POST['phone'];
            $yearstudy = $_POST['yearstudy'];
            $Department = $_POST['Department'];
            $classlevel = $_POST['classlevel'];
            $address = $_POST['address'];
            $father = $_POST['father'];
            $mother = $_POST['mother'];

             $getSQL = mysqli_query($dbCnnected,"SELECT * FROM student_history WHERE code_std='$studentCode'")or die(mysqli_error());
              $setNums = mysqli_num_rows($getSQL);
                if($setNums > 0){
                    echo "<script type=\"text/javascript\">
                        MySetSweetAlert(\"error\",\"มีรหัส นศ นี้อยู่แล้ว\",\"มีรหัส นศ นี้อยู่แล้ว หรือ มี นศ นี้อยู่แล้ว\")
                    </script>";
                }else{
                    $setInsert = "INSERT INTO student_history(fullname_std,nick_name,code_std,year_of_study,department,class_level,address,phone,img_std,fater_name,mater_name,img_home,id_teacher)
                        VALUES('$Fullname','$nickname','$studentCode','$yearstudy','$Department','$classlevel','$address','$phone','".setImgpath("imageStudent")."','$father','$mother','".setImgpath("imageShowRoom")."','$memberIdTeacher')";
                     $QueryInsert = mysqli_query($dbCnnected,$setInsert)or die(mysqli_error());
                        if($QueryInsert){
                            echo "<script type=\"text/javascript\">
                                MySetSweetAlert(\"success\",\"เพิ่ม นศ เรียบร้อย\",\"เพิ่ม นศ ชื่อ:$Fullname เรียบร้อยแล้ว\")
                            </script>";
                        }else{
                            echo "<script type=\"text/javascript\">
                                MySetSweetAlert(\"error\",\"insert error\",\"เพิ่ม นศ ชื่อ:$Fullname ล้มเหลว ติดต่อเจ้าหน้าที่\")
                            </script>";
                        }
                }

        }
        insertHistoryStudent($dbConfig);
    }else if($_SERVER['REQUEST_METHOD'] == "GET"){
        $idStudent = $_GET['idStudent'];
        $teacherId = $_GET['teacherId'];
        $fullnames = $_GET['fullname'];
        $id_session = $_SESSION['remamber']['member_id'];
        $imgStd = $_GET['imageStd'];
        $imgHome = $_GET['imageHome'];

         if($teacherId == $id_session || $id_session == 2){
          $setTrash = "DELETE FROM student_history WHERE std_id='$idStudent' LIMIT 1";
            $setQueryTrash = mysqli_query($dbConfig,$setTrash)or die(mysqli_error());
            if($setQueryTrash){
                $unFileStd="../../config/image-history/".$imgStd;
                $unFileHome ="../../config/image-history/".$imgHome;
                unlink($unFileStd);
                unlink($unFileHome);
                echo "<script type=\"text/javascript\">
                        MySetSweetAlert(\"success\",\"ลบ นศ เรียบร้อย\",\"ลบ นศ ชื่อ:$fullnames เรียบร้อยแล้ว\")
                    </script>";
            }else{
                echo "<script type=\"text/javascript\">
                    MySetSweetAlert(\"error\",\"Delere error\",\"delete นศ ชื่อ:$fullnames ล้มเหลว ติดต่อเจ้าหน้าที่\")
                </script>";
            }
        }else{
            echo "<script type=\"text/javascript\">
                MySetSweetAlert(\"error\",\"คุณไม่สามารถลบได้\",\"ต้องเป็นadminหรื่อคนเพิ่มนักศึกษาที่ชื่อ:$fullnames นี้เท่านั้นที่สามารถลบได้\")
            </script>";
        } 
    }
 ?>
</body>
</html>

<?php

/* 
            echo "id",$memberId,"<br> idstd:",$edit_id,"<br> name:",$editfullname,"<br>nick:",$editnickname;
            echo "<br> editstudycode:",$editstudycode,"<br> editphone",$editphone,"<br> edityearofstudy:",$edityearofstudy;
            echo "<br> editdepartment:",$editdepartment,"<br> editclasslevel:",$editclasslevel,"<br>editlocation:",$editlocation;
            echo "<br>editfater: ",$editfater,"<br>editmoter:",$editmoter,"<br>edit_img_std_name:",$edit_img_std_name,"<br>edit_img_home_name: ",$edit_img_home_name;
            echo "tmp_std:",$file_image_tmp_std,"  tmp_home:",$file_image_tmp_home;
*/

?>