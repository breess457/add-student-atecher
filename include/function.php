<?php

function setPhoto($setImg){
    $resImg ="<img src=\"../config/admin-profile/$setImg\" class=\"\">";
    return $resImg;
}
function setStatus($method){
    if($method == "admin"){
        $resStatus = "
            <li class=\"nav-item \">
                <a class=\"nav-link text-center\" href=\"teacher.php\">
                    <i class=\"fas fa-chalkboard-teacher text-primary\"></i> Teacher
                </a>
            </li>";
    }else{
       $resStatus =""; 
    }
    return $resStatus;
}
function Navigationbars($photo,$fullname,$status){
    $EventNav = "
    <nav class=\"navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-x\" id=\"sidenav-main\">
        <div class=\"container-fluid\">
            <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#sidenav-collapse-main\" aria-controls=\"sidenav-main\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
                <span class=\"navbar-toggler-icon\"></span>
            </button>
            <a class=\"navbar-brand text-dark pt-0\" target=\"_blank\">
                Admin Page
            </a>
            <div class=\"collapse navbar-collapse\" id=\"sidenav-collapse-main\">
                <div class=\"avartar\">
                    ".setPhoto($photo)."
                    <h3 class=\"txt text-center mt-2\">$fullname</h3>
                </div>
                <hr>
                <ul class=\"navbar-nav justify-content-center\">
                    <li class=\"nav-item\">
                        <a class=\"nav-link text-center\" href=\"index.php\">
                            <i class=\"ni ni-tv-2 text-primary\"></i> Dashboard(index)
                        </a>
                    </li>
                    <li class=\"nav-item\">
                        <a class=\"nav-link text-center\" href=\"student.php\">
                            <i class=\"fas fa-user-graduate text-primary\"></i> Student History
                        </a>
                    </li>
                    ".setStatus($status)."
                    <li class=\"nav-item \">
                        <a class=\"nav-link text-center\" href=\"profile.php\">
                            <i class=\"far fa-user-circle text-primary\"></i> Profile
                        </a>
                    </li>
                </ul>
                <div class=\"container mt-2\">
                    <a class=\"btn btn-outline-info btn-block btn-logout\" href=\"logout.php\">
                        <i class=\"fas fa-sign-out-alt text-primary\"></i> logout
                    </a>
                </div>
            </div>
        </div>
    </nav>
    ";
    echo $EventNav;
}

function ProfielCard($photos,$usernames,$emails,$passwords,$statusx,$departments,$memberids,$postions){
    $eventProfile = "
        <div class=\"card card-profile shadow\">
            <div class=\"row justify-content-cente\">
                <div class=\"col-lg-3 order-lg-2\">
                    <div class=\"card-profile-image\">
                        
                    </div>
                </div>
            </div>
            <div class=\"card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4\">
                <div class=\"d-flex justify-content-between\">
                    <a class=\"btn btn-sm mr-4\">Prfile Me</a>
                </div>
            </div>
            <div class=\"card-body pt-0\">
                <div class=\"row col-md-12 set-data\">
                    <div class=\"col-md-4\">
                        <div class=\"avartars\">
                            ".setPhoto($photos)."
                        </div>
                    </div>
                    <div class=\"col-md-8 justify-content-between\">
                        <div class=\"d-block ml-4 data-me\">
                            <h3>FullName : $usernames</h3>
                            <p class=\"text-purper ml-2\">Email : $emails</p>
                            <p class=\"text-purper ml-2\">Department : $departments</p>
                            <p class=\"text-info ml-2\">Position : $postions</p>
                            <a href=\"#editModalProfle\" data-toggle=\"modal\" id=\"editdataprofle\" class=\"btn btn-outline-warning mt-2 float-left\"
                                data-id=\"$memberids\" data-username=\"$usernames\" data-email=\"$emails\" data-password=\"$passwords\"
                                data-department=\"$departments\" data-position=\"$postions\" data-photo=\"$photos\"
                            >update profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    ";
    echo $eventProfile;
}

function setPointButtonStatus(
    $studentIdPoint,$fullnameStdPoint,$nicknameStdPoint,$codeStudentPoint,$yearOfStudyPoint,$departmentStdPoint,$classLevelPoint,
    $addressPoint,$phonePoint,$imageStdPoint,$faterNamePoint,$moterNamePoint,$imageHomePoint,$teacherNamePoint,$imageTeacherPoint,$teacherIdPoint,$session_id_member_Point
){
    if($session_id_member_Point == $teacherIdPoint || $session_id_member_Point == 2){
      $pointBtn = "
          <button data-toggle=\"modal\" data-target=\"#formUpdateUserStd\" class=\"btn btn-warning text-sm mr-4\" id=\"setUpdateStudent\"
            data-id=\"$studentIdPoint\" data-name=\"$fullnameStdPoint\" data-code=\"$codeStudentPoint\" data-nickname=\"$nicknameStdPoint\"
            data-yofstd=\"$yearOfStudyPoint\" data-department=\"$departmentStdPoint\" data-classlevel=\"$classLevelPoint\"
            data-address=\"$addressPoint\" data-phone=\"$phonePoint\" data-imgstd=\"$imageStdPoint\" data-fater=\"$faterNamePoint\" data-moter=\"$moterNamePoint\"
            data-imghome=\"$imageHomePoint\" data-teacherid=\"$teacherIdPoint\" data-sessionmemberId=\"$session_id_member_Point\">
            <i class=\"fas fa-user-edit\"></i> update
          </button>
          <a href=\"controllers/edit.student.php?idStudent=$studentIdPoint&teacherId=$teacherIdPoint&fullname=$fullnameStdPoint&imageStd=$imageStdPoint&imageHome=$imageHomePoint\" class=\"btn btn-danger text-sm\">
            <i class=\"fas fa-trash-alt\"></i> Trash
          </a>
      ";
    }else{
      $pointBtn ="
        <button type=\"button\" class=\"btn btn-warning text-sm mr-4 disabled\" tabindex=\"0\" data-trigger=\"hover\"
         data-toggle=\"popover\" title=\"ไม่สามารถ แก้ไขได้\" data-content=\"$teacherNamePoint กับ admin เท่านั้นที่สามารถแก้ไข ข้อมูลนี้ได้ คนอื่นที่นอกจาก2คนนี้ไม่สามารถแก้ไขได้\">
          <i class=\"fas fa-user-edit\"></i> update
        </button>
        <button type=\"button\" class=\"btn btn-danger text-sm disabled\" tabindex=\"0\" data-trigger=\"hover\"
         data-toggle=\"popover\" title=\"ไม่สามารถ ลบได้\" data-content=\"$teacherNamePoint กับ admin เท่านั้นที่สามารถลบ ข้อมูลนี้ได้ คนอื่นที่นอกจาก2คนนี้ไม่สามารถลบได้\">
          <i class=\"fas fa-trash-alt\"></i> Trash
        </button>
      ";
    }
  return $pointBtn;
}
function ListStudentHistory(
    $studentId,$fullnameStd,$nicknameStd,$codeStudent,$yearOfStudy,$departmentStd,$classLevel,
    $address,$phone,$imageStd,$faterName,$moterName,$imageHome,$teacherName,$imageTeacher,$teacherId,$session_id_member
){
    $elStd = "
      <div class=\"classDataList\">
        <div class=\"list-item set-data\" data-id=\"19\">
            <div>
              <img src=\"../config/image-history/$imageStd\" class=\"imgstd-avatar\" height=\"50\" width=\"50\" />
            </div>
            <div class=\"\"> 
              <a href=\"#\" class=\"item-author h-1x text-color\" data-abc=\"true\">
                name: $fullnameStd
              </a>
              <div class=\"item-except text-muted text-sm h-1x\">
               รหัสนักศึกษา: $codeStudent
              </div>
            </div>
            <div class=\"\">
              <a href=\"#\" class=\"item-author h-1x text-color\" data-abc=\"true\">
                ชื่อเล่น: $nicknameStd
              </a>
              <div class=\"item-except text-muted text-sm h-1x\">
                แผนก: $departmentStd
              </div>
            </div>
            <div class=\"\">
              <a href=\"#\" class=\"item-author h-1x text-color\" data-abc=\"true\">
                เบอร์โทร: $phone
              </a>
              <div class=\"item-except text-muted text-sm h-1x\">
                ปีการศึกษา: $classLevel
              </div>
            </div>
            <div class=\"no-wrap ml-auto d-flex\">
                <div class=\"item-date text-muted text-sm d-none d-md-block mr-4\"></div>
                <button data-toggle=\"modal\" data-target=\"#viewSudent\" class=\"btn btn-primary text-sm mr-4\" id=\"setViewStudent\"
                  data-id=\"$studentId\" data-name=\"$fullnameStd\" data-code=\"$codeStudent\" data-nickname=\"$nicknameStd\"
                  data-yofstd=\"$yearOfStudy\" data-department=\"$departmentStd\" data-levelclass=\"$classLevel\"
                  data-address=\"$address\" data-phone=\"$phone\" data-imgstd=\"$imageStd\" data-fater=\"$faterName\" data-moter=\"$moterName\"
                  data-imghome=\"$imageHome\" data-teacherimg=\"$imageTeacher\" data-teachername=\"$teacherName\">
                  <i class=\"fas fa-id-card\"></i> View
                </button>
                ".setPointButtonStatus(
                  $studentId,$fullnameStd,$nicknameStd,$codeStudent,$yearOfStudy,$departmentStd,$classLevel,
                  $address,$phone,$imageStd,$faterName,$moterName,$imageHome,$teacherName,$imageTeacher,$teacherId,$session_id_member
                )."
             </div>
        </div>
      </div>
    ";
    echo $elStd;
}

function ListDataTeacher($admin_id,$username,$email,$passwd,$departmentAdmin,$position,$imageAdmin){
    $elTeacher = "
        <div class=\"get-data\" >
          <div class=\"list-item\" data-id=\"19\">
            <div>
              <img src=\"../config/admin-profile/$imageAdmin\" class=\"imgstd-avatar\" height=\"50\" width=\"50\" />
            </div>
            <div class=\"\"> 
              <a href=\"#\" class=\"item-author text-color\" data-abc=\"true\">
                name: $username
              </a>
              <div class=\"item-except text-muted text-sm h-1x\">
               email: $email
              </div>
            </div>
            <div class=\"\">
              <a href=\"#\" class=\"item-author text-color\" data-abc=\"true\">
                ตำแหน่ง: $position 
              </a>
              <div class=\"item-except text-muted text-sm h-1x\">
                แผนก: $departmentAdmin
              </div>
            </div>
            <div class=\"no-wrap ml-auto d-flex\">
                <div class=\"item-date text-muted text-sm d-none d-md-block mr-4\"></div>
                <button data-toggle=\"modal\" data-target=\"#formUpdateDataTeacher\" class=\"btn btn-warning text-sm mr-4\" id=\"setUpdateDataAdmin\"
                  data-id=\"$admin_id\" data-username=\"$username\" data-email=\"$email\" data-password=\"$passwd\"
                  data-department=\"$departmentAdmin\" data-position=\"$position\" data-image=\"$imageAdmin\"
                >
                  <i class=\"fas fa-user-edit\"></i> update
                </button>
                <a href=\"controllers/edit.teacher.php?adminId=$admin_id&img_admin=$imageAdmin&admin_name=$username\" class=\"btn btn-danger text-sm\"><i class=\"fas fa-trash-alt\"></i> Trash</a>
            </div>
          </div>
        </div>
    ";
    echo $elTeacher;
}

?>