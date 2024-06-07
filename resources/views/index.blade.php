@extends('layout')
@section('content')


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
        /* background: #171717; */
        background-image: url('{{asset('images/img22.jpg')}}');
    }

    .conta {
        display: flex;
        align-items: center;
        justify-content: center;
        /* min-height: 100vh; */
        /* background: #171717; */
    }

    .contad {
        /* display: flex; */
        align-items: center;
        justify-content: center;
        /* min-height: 100vh; */
        /* background: #171717; */
        background-image: url('{{asset('images/img22.jpg')}}');
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


    <div class="contad" style="margin-top:20px !important;">
        <br /> <br /> <br /> <br />
        <h3 style="text-align:center;color:white;">SHARE, PLAY AND WIN</h3>
        <p style="text-align:center;color:white;">Take a picture with a monster energy drink pack<br /> upload
            it,unlock some easy
            games,
            play and stand a chance to
            win amazing gifts. </p>
        <br />
        <div class="conta" style="padding-bottom:30px">
            <div class=" wrapper">
                <form action="#" method="POST">
                    @csrf
                    <div style="display: flex;">
                        <input class="form-control" name="phone" id="phone_no" placeholder="Enter Phone No" type="text"
                            style="border:1px solid #171717;width: 50%; border-radius: 5px 0 0 5px;">
                        <button type="button" class="verify-button"
                            style="border:1px solid #171717;background:#171717;color:white;width: 50%; font-size: 15px; border-radius: 0 5px 5px 0;">Verify
                            Phone</button>
                    </div>
                    <br />
                    <input type="number" name="otp" class="form-control" oninput="verifyOTP()" id="verificationid"
                        style="border:1px solid #171717;" type=" text" placeholder="Enter Verification Code">
                    <span style="color:red;display:none" id="verifying_code"></span><span id="ellipsis"
                        style="color:red;display:none"></span>
                    <span class="response-message" style="color:dodgerblue"></span>
                    <br />
                    <div class="upload-form" style="margin-top:-1px;">
                        <input class="file-input" id="selfie" type="file" name="file" hidden>
                        <i class="fas fa-cloud-upload-alt"></i>
                        <p>Browse File to Upload</p>
                    </div>
                    <section class="progress-area"></section>
                    <section class="uploaded-area"></section>
                    <button id="submitbtn" type="button" onclick="saveDetails()"
                        style="width:100%;color:white;background:#171717;">SUBMIT</button>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/indexpage.js')}}"></script>

    @include('footer')
    @endsection