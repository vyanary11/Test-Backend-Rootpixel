require('./bootstrap');

$('#app').tooltip({
    selector: '[data-toggle="tooltip"]',
    trigger: "hover"
});

const wrapperUploadFile = $(".wrapper-upload-file");
const fileNameUploadFile = $(".file-name-upload-file");
const defaultBtnUploadFile = $("#default-btn-upload-file");
const customBtnUploadFile = $("#custom-btn-upload-file");
const cancelBtnUploadFile = $("#cancel-btn-upload-file i");
const imgUploadFile = $("img");
let regExp = /[0-9a-zA-Z\^\&\'\@\{\}\[\]\,\$\=\!\-\#\(\)\.\%\+\~\_ ]+$/;
window.uploadFile = function(){
    const file = this.files[0];
    if(file){
    const reader = new FileReader();
    reader.onload = function(){
        const result = reader.result;
        imgUploadFile.attr('src', result);
        wrapperUploadFile.addClass("active");
    }
    cancelBtnUploadFile.on("click", function(){
        imgUploadFile.attr('src', " ");
        wrapperUploadFile.removeClass("active");
    })
    reader.readAsDataURL(file);
    }
    if(this.value){
        let valueStore = this.value.match(regExp);
        fileNameUploadFile.text(valueStore);
    }
}
