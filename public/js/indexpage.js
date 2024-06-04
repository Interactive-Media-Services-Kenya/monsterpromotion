

const formput = document.querySelector(".upload-form");
const form = document.querySelector("form"),
fileInput = document.querySelector(".file-input");
phoneInput = document.getElementById("phone_no").value;

verifyButton = document.querySelector(".verify-button"),
verificationCodeInput = document.getElementById("verificationid"),
progressArea = document.querySelector(".progress-area"),
uploadedArea = document.querySelector(".uploaded-area");
fileInput.disabled = true;
verificationCodeInput.disabled = true;
document.getElementById("submitbtn").disabled=true;
formput.addEventListener("click", () =>{

fileInput.click();
});
verifyButton.addEventListener("click", () => {
var phone = document.getElementById("phone_no").value;

if (validateMobileNumber(phone)) {
$.ajax({
url: '/api/user/send-otp',
method: 'POST',
data: {
mobile: phone,
_token: '{{ csrf_token() }}'
},
success: function (response) {
  // console.log(response);
if (response.status === 'success') {
  localStorage.setItem('user_mobile_no',phone);
  console.log(response);
if(response.exist=='yes'){
document.querySelector(".upload-form").style.display = 'none';
}
      var verification_otp=response.code;
      localStorage.setItem('verification_otp',verification_otp);
    
    toastr.success('OTP requested successfully!');
    verificationCodeInput.disabled = false;
} else {
    // toastr.error(response.message);
    Swal.fire({
        icon: 'error',
        title: 'Error',
        text: 'OTP Not Send.'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = '/';
        }
    });
}
},
error: function (xhr, status, error) {
toastr.error('Error: Unable to request OTP.');
}
});
} else {
Swal.fire({
icon: 'error',
title: 'Error',
text: 'Please Enter a valid mobile No'
});
}
});
fileInput.onchange = ({target})=>{
let file = target.files[0];
if(file){
let fileName = file.name;
if(fileName.length >= 12){
let splitName = fileName.split('.');
fileName = splitName[0].substring(0, 13) + "... ." + splitName[1];
}
uploadFile(fileName);
}
}

function uploadFile(name){
let xhr = new XMLHttpRequest();
xhr.open("POST", "api/user/uspload-photo");
xhr.upload.addEventListener("progress", ({loaded, total}) =>{
let fileLoaded = Math.floor((loaded / total) * 100);
let fileTotal = Math.floor(total / 1000);
let fileSize;
(fileTotal < 1024) ? fileSize = fileTotal + " KB" : fileSize = (loaded / (1024*1024)).toFixed(2) + " MB";
let progressHTML = `<li class="row">
          <i class="fas fa-file-alt"></i>
          <div class="content">
            <div class="details">
              <span class="name">${name} • Uploading</span>
              <span class="percent">${fileLoaded}%</span>
            </div>
            <div class="progress-bar">
              <div class="progress" style="width: ${fileLoaded}%"></div>
            </div>
          </div>
        </li>`;
uploadedArea.classList.add("onprogress");
progressArea.innerHTML = progressHTML;
if(loaded == total){
progressArea.innerHTML = "";
let uploadedHTML = `<li class="row">
            <div class="content upload">
              <i class="fas fa-file-alt"></i>
              <div class="details">
                <span class="name">${name} • Uploaded</span>
                <span class="size">${fileSize}</span>
              </div>
            </div>
            <i class="fas fa-check"></i>
          </li>`;
uploadedArea.classList.remove("onprogress");
uploadedArea.insertAdjacentHTML("afterbegin", uploadedHTML);
}
});
let data = new FormData(form);
xhr.send(data);
}
function validateMobileNumber(number) {
console.log(number);
number = number.replace(/\D/g, '');
const length = number.length;
if ((number.startsWith('07') || number.startsWith('01')) && length === 10) {
return true; 
} else if ((number.startsWith('254') || number.startsWith('254')) && length ===12 ) {
return true;
} else {
return false;
} }

var ellipsis = document.getElementById("ellipsis");
var intervalId;
function startAnimation() {
var ellipsis = document.getElementById("ellipsis");
var count = 1;
var maxCount = 1;
var increasing = true; 

intervalId = setInterval(function() {
if (increasing) {
// Increase dot count
ellipsis.innerHTML += ".";
count++;
if (count > maxCount) {
increasing = false;
}
} else {
// Decrease dot count
ellipsis.innerHTML = ellipsis.innerHTML.slice(0, -1);
count--;
if (count === 1) {
increasing = true; // Start increasing dot count again
}
}
}, 200); // Adjust the interval duration as needed
}

// Start the animation
startAnimation();


// Function to stop the animation
function stopAnimation() {
clearInterval(intervalId);
ellipsis.innerHTML = ""; // Remove ellipsis when animation stops
}

function verifyOTP() {
var verificationCodeInput = document.getElementById("verificationid").value;
if (verificationCodeInput != "") {
document.getElementById("verifying_code").textContent = "Verifying code"; 
document.getElementById("verifying_code").style.display = 'inline-block';
document.getElementById("ellipsis").style.display = 'inline-block';
var otp_code= document.getElementById("verificationid").value;
var otp_retrieved=localStorage.getItem('verification_otp');
;
startAnimation();
if(otp_code.length==6){
if(otp_retrieved==otp_code){
fileInput.disabled = false;
document.getElementById("verifying_code").textContent = "Verified Succesfully"; 
document.getElementById("verifying_code").style.color = '#56be78';
document.getElementById("ellipsis").style.display = 'none';

document.getElementById("submitbtn").disabled=false;

}else{
document.getElementById("verifying_code").textContent = "Wrong Verification Code";  
document.getElementById("ellipsis").style.display = 'none'; 
}
}}}

function saveDetails() {
let file = fileInput.files[0];
let phone = document.getElementById("phone_no").value.trim();
if (document.querySelector(".upload-form").style.display === 'none') {

document.getElementById("submitbtn").disabled=false;
}else{
if (!file) {
Swal.fire({
icon: 'error',
title: 'Error',
text: 'Please select a file to upload.'
});

}
}


if (!phone) {
Swal.fire({
icon: 'error',
title: 'Error',
text: 'Please enter a phone number.'
});
return;
}
let data = new FormData(form);
console.log(data);
$.ajax({
url: 'api/user/save-user-details',
method: 'POST',
data: data,
processData: false,
contentType: false, 
headers: {
'X-CSRF-TOKEN': '{{ csrf_token() }}' 
},
success: function(response) {

Swal.fire({
icon: 'success',
title: 'Success',
text: 'Details submitted, you will be redirected shortly.'
});

// Adding a 5-second delay
setTimeout(function() {
window.location.href = 'user/play-games';
}, 1000);
},
error: function(xhr, status, error) {
if(response.status=='failed_phone'){
Swal.fire({
icon: 'error',
title: 'error',
text: 'Phone Cannot be empty.'
});

}
}
});
}
