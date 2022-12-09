
class AddImage extends HTMLElement {
  constructor() {
    super();
  }
  get count() {
    return this.getAttribute("count");
  }
  get names() {
    return this.getAttribute("names");
  }
  get defaultbtn() {
    return this.getAttribute("setdefault");
  }
  get custom() {
    return this.getAttribute("custom");
  }
  get filenames() {
    return this.getAttribute("filenames");
  }
  get wrapper() {
    return this.getAttribute("wrapper");
  }
  get cancle() {
    return this.getAttribute("cancles");
  }
  connectedCallback() {
    this.renderImage();
  }
  renderImage() {
    this.innerHTML = `
            <div class="container">
                <div class="wrapper ${this.wrapper}">
                    <div class="image">
                       <img src="" alt="" class="${this.id}"> 
                    </div>
                    <div class="content">
                        <div class="icon">
                            <i class="fas fa-cloud-upload-alt"></i>
                        </div>
                        <div class="text">${this.names}</div>
                    </div>
                    <div class="btnCancle ${this.cancle}">
                        <i class="fas fa-times"></i>
                    </div>
                    <div class="file-name ${this.filenames}">File name hear</div>
                </div>
                <input type="file" name="${this.count}" class="${this.defaultbtn}" hidden>
                <p class="BtnCustom" id="${this.custom}">Choose a file</p> 
            </div>
        `;
  }
}
customElements.define("mian-add-image", AddImage);

class ModalAddHistoryStudent extends HTMLElement {
  constructor() {
    super();
  }

  connectedCallback() {
    this.rederHistory();
  }
  rederHistory() {
    this.innerHTML = `
        <div class="modal fade" id="formAddStudentHistory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header border-bottom-0">
                      <p class="modal-title" id="exampleModalLabel">Add History Student</p>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="controllers/edit.student.php" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                            <input type="hidden" name="memberId" id="memberId" value="${this.id}" />
                            <div class="row mb-0 mt-0">
                                <div class="col-md-4">
                                    <mian-add-image id="stdImg" count="imageStudent" wrapper="x-wrap" filenames="ximgname" cancles="x-cancle"
                                        names="รูปนักศึกษา" custom="setbtnCustom" setdefault="setDefaultImgStd"></mian-add-image>
                                </div>
                                <div class="col-md-8">
                                    <div class="row mb-0">
                                        <div class="form-group mb-0 col-md-7">
                                          <label class="mb-0" for="Fullname">Fullname</label>
                                          <input type="text" class="form-control" name="Fullname" id="Fullname" placeholder="Full Name">
                                        </div>
                                        <div class="form-group mb-0 col-md-5">
                                          <label class="mb-0" for="NikName">NickName</label>
                                          <input type="text" class="form-control" name="nickname" id="NickName" placeholder="Nik Name">
                                        </div>
                                    </div>
                                    <div class="form-group mb-0">
                                      <label for="StudentCode" class="mb-0">StudentCode</label>
                                      <input type="text" class="form-control" name="studentCode" id="StudentCode" placeholder="StudentCode">
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-8 mb-0">
                                          <label for="Phone" class="mb-0">Phone</label>
                                          <input type="phone" class="form-control" name="phone" id="Phone" placeholder="+666 877">
                                        </div>
                                        <div class="form-group col-4 mb-0">
                                          <label for="yearstudy" class="mb-0">Year Of Studyne</label>
                                          <input type="text" class="form-control" name="yearstudy" id="yearstudy" placeholder="...">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group mb-0 col-md-8">
                                          <label for="Department" class="mb-0">DepartMent</label>
                                            <select class="custom-select clsdpartment" name="Department" id="Department" required>
			                                    <option disable" hidden>--เลือกแผนก--</option>
                                                <option value="it">it</option>
                                                <option value="accounting">accounting</option>
                                                <option value="Electronic">Electronic</option>
                                                <option value="computerbusiness">computerbusiness</option>
                                                <option value="Electric">Electric</option>
			                                </select>
                                        </div>
                                        <div class="form-group mb-0 col-md-4">
                                          <label for="classlevel" class="mb-0">Class Level</label>
                                            <select class="custom-select clsdpartment" id="classlevel" name="classlevel" required>
			                                    <option disable" hidden>ระดับชั้นการศึกษา</option>
                                                <option value="ปวช:1">ปวช 1</option>
                                                <option value="ปวช:2">ปวช 2</option>
                                                <option value="ปวช:3">ปวช 3</option>
                                                <option value="ปวส:1">ปวส 1</option>
                                                <option value="ปวส:2">ปวส 2</option>
                                                
			                                </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-0 mt-1">
                                <div class="col-md-8">
                                    <div class="form-group mb-0">
                                        <label class="ml-1 mt-0 mb-0 font-weight-bold text-success">address</label>
                                       <textarea class="form-control" rows="3" name="address" id="address"></textarea>
                                    </div>
                                    <div class="form-group mb-0">
                                      <label for="father" class="mb-0">Father Name</label>
                                      <input type="text" class="form-control" name="father" id="father" placeholder="Father Name">
                                    </div>
                                    <div class="form-group mb-0">
                                      <label for="mother" class="mb-0">Mother Name</label>
                                      <input type="text" class="form-control" id="mother" name="mother" placeholder="Mother Name">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <mian-add-image id="homeImg" names="รูปบ้าน นศ" count="imageShowRoom" wrapper="home-wrap" filenames="filesethome"
                                      cancles="home-cancle" custom="imgCustomHome" setdefault="defaultImgHome"></mian-add-image>
                                </div>
                            </div>
                            <button type="submit" class="btnAddSubmit">Save Student History</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      `;
  }
}
customElements.define("main-modal-history", ModalAddHistoryStudent);

const setImagePriviews = (
  getImage,
  setDefaultFile,
  setCustomBtn,
  btnCancle,
  getImgNames,
  setWrapper
) => {
  let setwrapper = document.querySelector(setWrapper);
  let setImgName = document.querySelector(getImgNames);
  let setBtncancle = document.querySelector(btnCancle);
  let typeImg = document.querySelector(getImage);
  let defaultInput = document.querySelector(setDefaultFile);
  let CustomButton = document.querySelector(setCustomBtn);
  let setExp = /[0-9a-zA-Z\^\&\'\@\{\}\[\]\,\$\=\!\-\#\(\)\.\%\+\~\_ ]+$/;

  CustomButton.onclick = function () {
    defaultInput.click();
  };
  defaultInput.addEventListener("change", function () {
    const file = this.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function () {
        const result = reader.result;
        typeImg.src = result;
        setwrapper.classList.add("active");
      };
      setBtncancle.addEventListener("click", function () {
        typeImg.src = "";
        setwrapper.classList.remove("active");
      });
      reader.readAsDataURL(file);
    }
    if (this.value) {
      let valueStore = this.value.match(setExp);
      setImgName.textContent = valueStore;
    }
  });
};

/* priview image student */
setImagePriviews(
  ".stdImg",
  ".setDefaultImgStd",
  "#setbtnCustom",
  ".x-cancle i",
  ".ximgname",
  ".x-wrap"
);

/* priview image home */
setImagePriviews(
  ".homeImg",
  ".defaultImgHome",
  "#imgCustomHome",
  ".home-cancle i",
  ".filesethome",
  ".home-wrap"
);

class ViewsModalStudentHistory extends HTMLElement {
  connectedCallback() {
    this.renDerView();
  }
  renDerView() {
    this.innerHTML = `
         <div class="modal fade" id="viewSudent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header border-bottom-0">
                      <p class="modal-title" id="exampleModalLabel">View History Student</p>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-0 mt-0">
                            <div class="col-md-4">
                                <p class="text-center">Student Image</p>
                                <div class="image" id="">
                                    <img src="" id="imageviewStd" />
                                </div>
                                <div class="col-md-12 row mt-3">
                                    <h4 id="getFater"></h4>
                                </div>
                                <div class="col-md-12 row">
                                    <h4 id="getMoter"></h4>
                                </div>
                                <div class="row">
                                    <p id="teacherName" class="mt-1 ml-auto"></p>
                                    <img src="" id="imageTeacher" class="ml-auto" width="40" height="40" />
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="row col-md-12 mb-3">
                                    <div class="col-md-8">
                                        <h4 class="text-info">ชื่อ-นามสกุล: <span id="fullname"></span></h4>
                                    </div>
                                    <div class="col-md-4">
                                        <h4>ชื่อเล่น: <span id="nickname"></span></h4>
                                    </div>
                                    <div class="col-md-6">
                                        <h4 class="text-purper">รหัสนักศึกษา: <span id="stdCode"></span></h4>
                                    </div>
                                    <div class="col-md-6">
                                        <h4>เบอร์โทร: <span id="phone"></span></h4>
                                    </div>
                                    <div class="col-md-6">
                                        <h4 class="text-primary" id="department"></h4>
                                    </div>
                                    <div class="col-md-3">
                                        <h4 class="text-success" id="classlevels"></h4>
                                    </div>
                                    <div class="col-md-3">
                                        <h4 class="text-dark" id="yearofstudy"></h4>
                                    </div>
                                    <div class="set-mega col-md-12">
                                        <h4 class="text-ggren">ที่อยู่: <span id="location"></span></h4>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <p class="text-center">Home Student Image</p>
                                    <div class="image-home" id="">
                                        <img src="" id="imageviewHome" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         </div>   
        `;
  }
}
customElements.define("main-view-student", ViewsModalStudentHistory);

$(document).on("click", "#setViewStudent", function (events) {
  let fullname = $(this).data("name"),
    codeStd = $(this).data("code"),
    nickname = $(this).data("nickname"),
    yearOfStudy = $(this).data("yofstd"),
    departmentStd = $(this).data("department"),
    classLevels = $(this).data("levelclass"),
    address = $(this).data("address"),
    phone = $(this).data("phone"),
    imageStd = $(this).data("imgstd"),
    fater = $(this).data("fater"),
    moter = $(this).data("moter"),
    imagehome = $(this).data("imghome"),
    teacherName = $(this).data("teachername"),
    imageTeacher = $(this).data("teacherimg");

  $("#fullname").html(fullname);
  $("#nickname").html(nickname);
  $("#imageviewStd").attr("src", `../config/image-history/${imageStd}`);
  $("#stdCode").html(codeStd);
  $("#phone").html(phone);
  $("#department").html("แผนก: " + departmentStd);
  $("#classlevels").html("ชั้น: " + classLevels);
  $("#yearofstudy").html("ปีรุ่น: " + yearOfStudy);
  $("#location").html(address);
  $("#imageviewHome").attr("src", `../config/image-history/${imagehome}`);
  $("#getFater").html("fater: " + fater);
  $("#getMoter").html("moter: " + moter);
  $("#teacherName").html("ผู้เพิ่ม: " + teacherName);
  $("#imageTeacher").attr("src", `../config/admin-profile/${imageTeacher}`);
  events.preventDefault();
});

class ModalUpdateDataUser extends HTMLElement {
  connectedCallback() {
    this.renderEditUser();
  }
  renderEditUser() {
    this.innerHTML = `
        <div class="modal fade" id="formUpdateUserStd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header border-bottom-0">
                      <p class="modal-title" id="exampleModalLabel">Add History Student</p>
                      <small class="modal-title ml-auto mt-2" id="editSessionIdMember"></small>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="controllers/edit.student.php" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                            <input type="hidden" name="memberId" id="memberId" value="${this.id}" />
                            <div class="row mb-0 mt-0">
                                <div class="col-md-4">
                                    <mian-add-image id="editstdImg" count="editimageStudent" wrapper="edit-wrap" filenames="editImgname" cancles="edit-cancle"
                                        names="รูปนักศึกษา" custom="editbtnCustom" setdefault="editDefaultImgStd"></mian-add-image>
                                </div>
                                <div class="col-md-8">
                                    <div class="row mb-0">
                                        <div class="form-group mb-0 col-md-7">
                                          <label class="mb-0" for="editFullname">Fullname</label>
                                          <input type="text" class="form-control" name="editfullname" id="editFullname" placeholder="Full Name">
                                        </div>
                                        <div class="form-group mb-0 col-md-5">
                                          <label class="mb-0" for="editNikName">NickName</label>
                                          <input type="text" class="form-control" name="editnickname" id="editNickName" placeholder="Nik Name">
                                        </div>
                                    </div>
                                    <div class="form-group mb-0">
                                      <label for="editStudentCode" class="mb-0">StudentCode</label>
                                      <input type="text" class="form-control" name="studentCode" id="editStudentCode" placeholder="StudentCode">
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-8 mb-0">
                                          <label for="editPhone" class="mb-0">Phone</label>
                                          <input type="phone" class="form-control" name="phone" id="editPhone" placeholder="+666 877">
                                        </div>
                                        <div class="form-group col-4 mb-0">
                                          <label for="edityearstudy" class="mb-0">Year Of Student</label>
                                          <input type="text" class="form-control" name="yearstudy" id="edityearstudy" placeholder="...">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group mb-0 col-md-8">
                                          <label for="Department" class="mb-0">DepartMent</label>
                                            <select class="custom-select clsdpartment" name="Department" id="Department" required>
			                                    <option id="editDepartment" selected hidden></option>
                                                <option value="it">it</option>
                                                <option value="accounting">accounting</option>
                                                <option value="Electronic">Electronic</option>
                                                <option value="computerbusiness">computerbusiness</option>
                                                <option value="Electric">Electric</option>
			                                </select>
                                        </div>
                                        <div class="form-group mb-0 col-md-4">
                                          <label for="Classlevel" class="mb-0">Class Level</label>
                                            <select class="custom-select clsdpartment" id="Classlevel" name="classlevel" required>
			                                    <option id="editClasslevel" selected hidden></option>
                                                <option value="ปวช:1">ปวช 1</option>
                                                <option value="ปวช:2">ปวช 2</option>
                                                <option value="ปวช:3">ปวช 3</option>
                                                <option value="ปวส:1">ปวส 1</option>
                                                <option value="ปวส:2">ปวส 2</option>
                                                
			                                </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-0 mt-1">
                                <div class="col-md-8">
                                    <div class="form-group mb-0">
                                        <label class="ml-1 mt-0 mb-0 font-weight-bold text-success">address</label>
                                       <textarea class="form-control" rows="3" name="address" id="editaddress"></textarea>
                                    </div>
                                    <div class="form-group mb-0">
                                      <label for="editfather" class="mb-0">Father Name</label>
                                      <input type="text" class="form-control" name="father" id="editfather" placeholder="Father Name">
                                    </div>
                                    <div class="form-group mb-0">
                                      <label for="editmother" class="mb-0">Mother Name</label>
                                      <input type="text" class="form-control" id="editmother" name="mother" placeholder="Mother Name">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <mian-add-image id="edithomeImg" names="รูปบ้าน นศ" count="editimageShowRoom" wrapper="edithome-wrap" filenames="editfilesethome"
                                      cancles="edithome-cancle" custom="editimgCustomHome" setdefault="editdefaultImgHome"></mian-add-image>
                                </div>
                            </div>
                            <input type="hidden" name="status" value="PUTUPDATE" />
                            <input type="hidden" name="edit_id" id="editStudentId" />
                            <input type="hidden" name="edit_img_home" id="editImageHome" />
                            <input type="hidden" name="edit_img_std" id="editImageStudent" />
                            <button type="submit" class="btnAddSubmit">Save Student History</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        `;
  }
}
customElements.define("modal-update-userhistory", ModalUpdateDataUser);

/* 1:id 2:setdefault 3:custom 4:cancles 5:filenames 6:wrapper*/
/* update priview image student */
setImagePriviews(
  ".editstdImg",
  ".editDefaultImgStd",
  "#editbtnCustom",
  ".edit-cancle i",
  ".editImgname",
  ".edit-wrap"
);
/* update priview image home history */
setImagePriviews(
  ".edithomeImg",
  ".editdefaultImgHome",
  "#editimgCustomHome",
  ".edithome-cancle i",
  ".editfilesethome",
  ".edithome-wrap"
);

$(document).on("click", "#setUpdateStudent", function (editEvent) {
  let editStudentId = $(this).data("id"),
    editFullname = $(this).data("name"),
    editStudentCode = $(this).data("code"),
    editNickname = $(this).data("nickname"),
    editYearOfStudy = $(this).data("yofstd"),
    editDepartment = $(this).data("department"),
    editClasslevel = $(this).data("classlevel"),
    editLocation = $(this).data("address"),
    editPhone = $(this).data("phone"),
    editImgStd = $(this).data("imgstd"),
    editFather = $(this).data("fater"),
    editMoter = $(this).data("moter"),
    editImageHome = $(this).data("imghome"),
    teacherid = $(this).data("teacherid"),
    sessionmemberId = $(this).data("sessionmemberId");

  $("#editStudentId").val(editStudentId);
  $("#editFullname").val(editFullname);
  $("#editNickName").val(editNickname);
  $("#editStudentCode").val(editStudentCode);
  $("#edityearstudy").val(editYearOfStudy);
  $("#editDepartment").val(editDepartment);
  $("#editDepartment").html(editDepartment);
  $("#editClasslevel").val(editClasslevel);
  $("#editClasslevel").html(editClasslevel);
  $("#editPhone").val(editPhone);
  $("#editaddress").val(editLocation);
  $("#editfather").val(editFather);
  $("#editmother").val(editMoter);
 
  $(".editstdImg").attr("src", `../config/image-history/${editImgStd}`);
  $("#editImageStudent").val(editImgStd);
  $(".edit-wrap").last().addClass("active");
  $(".edithomeImg").attr("src", `../config/image-history/${editImageHome}`);
  $("#editImageHome").val(editImageHome);
  $(".edithome-wrap").last().addClass("active");

  editEvent.preventDefault();
});

/* Search Data Student */

const myFunctionSearchDate = () => {
  let input, filter, divData, classDataList, resData, keys, keyValue;
  input = document.getElementById("MySearchData");
  filter = input.value.toUpperCase();
  divData = document.getElementById("ListAllData");
  classDataList = divData.getElementsByClassName("classDataList");
  for (keys = 0; keys < classDataList.length; keys++) {
    resData = classDataList[keys].querySelector(".set-data");
    if (resData) {
      keyValue = resData.textContent || resData.innerText;
      if (keyValue.toUpperCase().indexOf(filter) > -1) {
        classDataList[keys].style.display = "";
      } else {
        classDataList[keys].style.display = "none";
      }
    }
  }
};
