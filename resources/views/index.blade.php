@extends('layout')
@section('content')
<link rel="stylesheet" href="{{ asset('css/indexpage.css')}}">
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
                        <input class="form-control" name="phone" id="phone_no" placeholder="Enter Phone No" type="tel"
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