@extends('layout')
@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.6/sweetalert2.min.css">

<!-- SweetAlert2 JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.6/sweetalert2.all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.24.0/axios.min.js"></script>


<style>
    /* Import Google font - Poppins */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
    }

    body {
        background: #171717;
    }

    .conta {
        display: flex;
        align-items: center;
        justify-content: center;
        /* min-height: 100vh; */
        background: #171717;
    }

    .contad {
        /* display: flex; */
        align-items: center;
        justify-content: center;
        /* min-height: 100vh; */
        background: #171717;
    }

    ::selection {
        color: #fff;
        background: #171717;
    }

    .wrapper {
        width: 430px;
        background: #fff;
        border-radius: 5px;
        padding: 30px;
        box-shadow: 7px 7px 12px rgba(0, 0, 0, 0.05);
    }

    .wrapper header {
        color: #171717;
        font-size: 27px;
        font-weight: 600;
        text-align: center;
    }

    .wrapper .upload-form {
        height: 167px;
        display: flex;
        cursor: pointer;
        margin: 30px 0;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        border-radius: 5px;
        border: 2px dashed #171717;
        ;
    }

    form :where(i, p) {
        color: #171717;
    }

    form i {
        font-size: 50px;
    }

    form p {
        margin-top: 15px;
        font-size: 16px;
    }

    section .row {
        margin-bottom: 10px;
        background: #E9F0FF;
        list-style: none;
        padding: 15px 20px;
        border-radius: 5px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    section .row i {
        color: #171717;
        font-size: 30px;
    }

    section .details span {
        font-size: 14px;
    }

    .progress-area .row .content {
        width: 100%;
        margin-left: 15px;
    }

    .progress-area .details {
        display: flex;
        align-items: center;
        margin-bottom: 7px;
        justify-content: space-between;
    }

    .progress-area .content .progress-bar {
        height: 6px;
        width: 100%;
        margin-bottom: 4px;
        background: #fff;
        border-radius: 30px;
    }

    .content .progress-bar .progress {
        height: 100%;
        width: 0%;
        background: #171717;
        border-radius: inherit;
    }

    .uploaded-area {
        max-height: 232px;
        overflow-y: scroll;
    }

    .uploaded-area.onprogress {
        max-height: 150px;
    }

    .uploaded-area::-webkit-scrollbar {
        width: 0px;
    }

    .uploaded-area .row .content {
        display: flex;
        align-items: center;
    }

    .uploaded-area .row .details {
        display: flex;
        margin-left: 15px;
        flex-direction: column;
    }

    .uploaded-area .row .details .size {
        color: #404040;
        font-size: 11px;
    }

    .uploaded-area i.fa-check {
        font-size: 16px;
    }

    .name {
        color: #56be78;
    }
</style>
</head>

<body>


    <div class="contad" style="margin-bottom:200px">
        <br /> <br /> <br /> <br />
        <h3 style="text-align:center;color:white;">SHARE, PLAY AND WIN</h3>
        <p style="text-align:center;color:white;">Take a picture with a monster energy drink pack<br /> upload
            it,unlock some easy
            games,
            play and stand a chance to
            win amazing gifts. </p>
        <br />
        <div class="conta">
            <div class="wrapper">
                <form action="#" method="POST">
                    @csrf
                    <div style="display: flex;">
                        <input class="form-control" name="phone" id="phone_no" placeholder="Enter Phone No" type="text"
                            style="border:1px solid #171717;width: 70%; border-radius: 5px 0 0 5px;">

                        <button type="button" class="verify-button"
                            style="border:1px solid #171717;background:#171717;color:white;width: 30%; font-size: 15px; border-radius: 0 5px 5px 0;">Verify
                            Phone</button>

                    </div>
                    <br />

                    <input type="number" name="otp" class="form-control" onkeyup="verifyOTP()" id="verificationid"
                        style="border:1px solid #171717;" type=" text" placeholder="Enter Verification Code">
                    <span style="color:red;display:none" id="verifying_code"></span><span id="ellipsis"
                        style="color:red;display:none"></span>

                    <br />
                    <div class="upload-form" style="margin-top:-1px">
                        <input class="file-input" id="selfie" type="file" name="file" hidden>
                        <i class="fas fa-cloud-upload-alt"></i>
                        <p>Browse File to Upload</p>
                    </div>
                    <button id="submitbtn" type="button" onclick="saveDetails()"
                        style="width:100%;color:white;background:#171717;">SUBMIT</button>
                </form>
                <section class="progress-area"></section>
                <section class="uploaded-area"></section>
            </div>

            <script>
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
  //initiate sending OTP

    if (validateMobileNumber(phone)) {
        // console.log(phone)
        // document.getElementById('otp-field').style.display = 'block';
        // document.getElementById('login').disabled = true;
        $.ajax({
            url: '/user/send-otp',
            method: 'POST',
            data: {
                mobile: phone,
                _token: '{{ csrf_token() }}'
            },
            success: function (response) {
                if (response.status === 'success') {
               console.log(response.code);
                      var verification_otp=response.code;
                      localStorage.setItem('verification_otp',verification_otp);
                    toastr.success('OTP requested successfully!');
                    verificationCodeInput.disabled = false;
                    
                } else {
                    // toastr.error(response.message);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'User not found. Please register.'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '/register';
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
  xhr.open("POST", "user/uspload-photo");
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
    // Remove all non-digit characters
    number = number.replace(/\D/g, '');
    // Get the length of the number
    const length = number.length;
    if ((number.startsWith('07') || number.startsWith('01')) && length === 10) {
        return true; // Starts with '07' or '01' and has 10 digits
    } else if ((number.startsWith('254') || number.startsWith('254')) && length ===12 ) {
        return true; // Starts with '7' or '1' and has 9 digits
    } else {
        return false; // Doesn't match the specified formats
    } }

    var ellipsis = document.getElementById("ellipsis");
    var intervalId;
    
    // Function to start the animation
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
        //    document.getElementById("phone_no").disabled=true;
         
           document.getElementById("submitbtn").disabled=false;
           
            }else{
                document.getElementById("verifying_code").textContent = "Wrong Verification Code";  
                document.getElementById("ellipsis").style.display = 'none'; 
              }
            
           
           
        
    }}}

    function saveDetails() {
    let data = new FormData(form);
    console.log(data);

    $.ajax({
        url: 'user/save-user-details',
        method: 'POST',
        data: data, // Send FormData directly
        processData: false, // Prevent jQuery from automatically processing the data
        contentType: false, // Prevent jQuery from automatically setting the content type
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}' // Set CSRF token in headers
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
            }, 5000); // 5000 milliseconds = 5 seconds
        },
        error: function(xhr, status, error) {
            // Handle error response
        }
    });
}

            </script>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @include('footer');
    @endsection