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
customElements.define("mian-priview-image", AddImage);

const setImagePriviews = (getImage, setDefaultFile, setCustomBtn,btnCancle,getImgNames,setWrapper) => {
  let setwrapper = document.querySelector(setWrapper);
  let setImgName = document.querySelector(getImgNames);
  let setBtncancle = document.querySelector(btnCancle);
  let typeImg = document.querySelector(getImage);
  let defaultInput = document.querySelector(setDefaultFile);
  let CustomButton = document.querySelector(setCustomBtn);
  let setExp = /[0-9a-zA-Z\^\&\'\@\{\}\[\]\,\$\=\!\-\#\(\)\.\%\+\~\_ ]+$/;

    CustomButton.onclick = function(){
        defaultInput.click();
    }
    defaultInput.addEventListener("change",function(){
        const file = this.files[0]
         if(file){
            const reader = new FileReader()
            reader.onload = function(){
                const result = reader.result;
                typeImg.src = result
                setwrapper.classList.add('active')
            }
            setBtncancle.addEventListener('click',function(){
                typeImg.src ="";
                setwrapper.classList.remove('active')
            })
            reader.readAsDataURL(file)
         }
        if(this.value){
            let valueStore = this.value.match(setExp);
            setImgName.textContent = valueStore;
        }
    });
};

class ModalUpdateDataProfile extends HTMLElement {
  connectedCallback() {
    this.renderUpdateData();
  }
  renderUpdateData() {
    this.innerHTML = `
        <div class="modal fade" id="editModalProfle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header border-bottom-0">
                      <p class="modal-title" id="exampleModalLabel">Add Teacher</p>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="controllers/edit.profile.php" method="POST" enctype="multipart/form-data">
                        <div class="modal-body mt-0">
                            <div class="row mb-0 mt-0">
                                <div class="col-md-4">
                                    <mian-priview-image id="editteacherImg" count="editimageTeacher" wrapper="editset-wrap" filenames="editnameImg" cancles="editget-cancle"
                                        names="รูปภาพอาจารย์" custom="editsetbtnCustom" setdefault="editsetDefaultImgAdmin"></mian-priview-image>
                                </div>
                                <div class="col-md-8 mt-0">
                                    <div class="form-group mb-0 col-md-12">
                                      <label class="mb-0" for="editUsername">User Name</label>
                                      <div class="input-group mb-2">
                                          <div class="input-group-prepend">
                                              <div class="input-group-text"><i class="fa fa-user text-purper"></i></div>
                                          </div>
                                          <input type="text" class="form-control" id="editUsername" name="edit_username" placeholder="User Name" required>
                                      </div>
                                    </div>
                                    <div class="form-group mb-0 col-md-12">
                                      <label class="mb-0" for="editEmail">Email</label>
                                      <div class="input-group mb-2">
                                          <div class="input-group-prepend">
                                              <div class="input-group-text"><i class="fa fa-envelope text-primary"></i></div>
                                          </div>
                                          <input type="text" class="form-control" id="editEmail" name="edit_email" placeholder="Add Email" required>
                                      </div>
                                    </div>
                                    <div class="form-group mb-0 col-md-12">
                                      <label class="mb-0" for="editPassword">Password</label>
                                      <div class="input-group mb-2">
                                          <div class="input-group-prepend">
                                              <div class="input-group-text"><i class="fa fa-key text-danger"></i></div>
                                          </div>
                                          <input type="password" class="form-control" id="editPassword" name="edit_password" placeholder="Add Password" required>
                                      </div>
                                    </div>
                                    <div class="row col-md-12">
                                        <div class="form-group mb-0 col-md-6">
                                            <label class="mb-0" for="Department">Department</label>
                                              <div class="input-group mb-2">
                                                  <div class="input-group-prepend">
                                                      <div class="input-group-text"><i class="fas fa-graduation-cap text-info"></i></div>
                                                  </div>
                                                  <select class="custom-select clsdpartment" name="edit_department" id="" required>
			                                          <option id="editDepartment" selected hidden></option>
                                                      <option value="it">it</option>
                                                      <option value="accounting">accounting</option>
                                                      <option value="Electronic">Electronic</option>
                                                      <option value="computerbusiness">computerbusiness</option>
                                                      <option value="Electric">Electric</option>
			                                      </select>
                                              </div>
                                        </div>
                                        <div class="form-group mb-0 col-md-6">
                                            <label class="mb-0" for="editPosition">Position</label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fas fa-star text-ggren"></i></div>
                                                </div>
                                                <input type="text" class="form-control" id="editPosition" name="edit_position" placeholder="Add Position" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="admin_id" id="editAdminId" />
                            <input type="hidden" name="imageteachername" id="editImgName" />
                            <button type="submit" class="btnAddSubmit"><i class="far fa-save"></i> Save Add Data Teacher</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    `;
  }
}
customElements.define('main-edit-profile',ModalUpdateDataProfile)

setImagePriviews(".editteacherImg", ".editsetDefaultImgAdmin","#editsetbtnCustom",".editget-cancle i",".editnameImg",".editset-wrap");

$(document).on("click", "#editdataprofle",function(e){
    let id = $(this).data('id'),username = $(this).data('username'),email = $(this).data('email'),
        password = $(this).data('password'),department = $(this).data('department'),position = $(this).data('position'),
        images = $(this).data('photo');

        $('#editAdminId').val(id)
        $('#editUsername').val(username)
        $('#editEmail').val(email)
        $('#editPassword').val(password)
        $('#editDepartment').val(department)
        $('#editDepartment').html(department)
        $('#editPosition').val(position)

        $('.editteacherImg').attr('src',`../config/admin-profile/${images}`)
        $('.editset-wrap').last().addClass('active')
        $('#editImgName').val(images)
    e.preventDefault()
});
