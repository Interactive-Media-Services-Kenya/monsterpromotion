@extends('layout')
@section('content')
<link rel="stylesheet" href="{{ asset('css/indexpage.css')}}">
</head>

<body>
    <div class="contad" style="margin-top:20px !important;">
        <br /> <br /> <br /> <br />
        <h4 style="text-align:center;color:#B2D236; ">BE OUR NEXT CHAMPION</h>
            <br />
            <p style="text-align:center;color:white;">Win Tickets to an exclusive monster energy party.<br /> Share a
                selfie
                with
                a monster energy can,<br /> unlock some exciting games,play and stand a chance to be our next champion.
            </p>
            <br />
            <div class="conta" style="padding-bottom:30px">
                <div class=" wrapper">
                    <form action="#" method="POST">
                        @csrf
                        <div style="display: flex;">
                            <input class="form-control" name="phone" id="phone_no" placeholder="Enter Phone No"
                                type="tel" style="border:1px solid #171717;width: 50%; border-radius: 5px 0 0 5px;">
                            <button type="button" class="verify-button"
                                style="border:1px solid #171717;background:#171717;color:white;width: 50%; font-size: 15px; border-radius: 0 5px 5px 0;">Verify
                                Phone</button>
                        </div>
                        <div style="display: flex;">
                            <input type="number" name="otp" class="form-control" oninput="verifyOTP()"
                                id="verificationid" style="margin-top:10px;border:1px solid #171717;width:49%"
                                type=" text" placeholder="Enter  Code">
                            <span style="width:2%"></span>
                            <input name="username" id="username" class="form-control"
                                style="margin-top:10px;border:1px solid #171717;width:49%" type=" text"
                                placeholder="Enter Username">
                        </div>
                        <span style="color:red;display:none" id="verifying_code"></span><span id="ellipsis"
                            style="color:red;display:none"></span>
                        <span class="response-message" style="color:dodgerblue"></span>
                        <div class="upload-form" style="margin-top:-20px;">


                            <input class="file-input" id="selfie" type="file" name="file" accept="image/*" hidden>
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
