<!-- banner-section start -->
@extends('layout')
@section('content')
<style>
    @media (max-width: 998px) {
        .section-header {
            margin-top: 40px !important;
            margin-bottom: 40px;
        }
    }

    body.modal-open {
        overflow: hidden;
        /* Prevent scrolling */
    }

    body.modal-open>*:not(.modal) {
        display: none;
        /* Hide all content except the modal */
    }

    /* Modal styles */
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.4);
        text-align: center;
        /* Center horizontally */
    }

    .modal-content {
        background-color: #fefefe;
        margin: 0 auto;
        /* Center horizontally */
        margin-top: 20%;
        /* Adjust vertical position */
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        max-width: 500px;
        /* Limit maximum width */
        display: inline-block;
        /* Allows centering with margin: auto */
    }

    @media (max-width: 998px) {
        .modal-content {

            margin-top: 50%;

        }
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    /* Countdown styles */
    .countdown {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: white;
        font-size: 24px;
    }

    #tournaments-section .single-item .title-bottom {
        border-bottom: 1px solid #32286D;
        margin-top: 10px;
        padding-bottom: 15px;
    }

    .radio-button {
        display: inline-block;
        padding: 10px 20px;
        width: 100%;
        border: none;
        background-color: #acd038;
        color: white;
        border: 1px solid #acd038;
        cursor: pointer;
        text-align: center;
        margin-right: 10px;
    }

    .radio-button:hover {
        background-color: #111;
    }

    .countdown-circle {
        display: inline-block;
        width: 50px;
        /* Adjust size as needed */
        height: 50px;
        /* Adjust size as needed */
        background-color: #56be78;
        color: white;
        border-radius: 50%;
        font-size: 20px;
        line-height: 50px;
        /* Center text vertically */
        text-align: center;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    :root {
        --progress-bar-width: 100px;
        --progress-bar-height: 100px;
        --font-size: 2rem;
    }


    .circular-progress {
        width: var(--progress-bar-width);
        height: var(--progress-bar-height);
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .inner-circle {
        position: absolute;
        width: calc(var(--progress-bar-width) - 30px);
        height: calc(var(--progress-bar-height) - 30px);
        border-radius: 50%;
        background-color: lightgrey;
    }

    .percentage {
        position: relative;
        font-size: var(--font-size);
        color: #56be78;
    }

    @media screen and (max-width: 800px) {
        :root {
            --progress-bar-width: 150px;
            --progress-bar-height: 150px;
            --font-size: 1.3rem;
        }
    }

    @media screen and (max-width: 500px) {
        :root {
            --progress-bar-width: 120px;
            --progress-bar-height: 120px;
            --font-size: 1rem;
        }
    }



    #question2-container,
    #question3-container {
        display: none;
        /* Hide additional questions initially */
    }


    /* Modal styles */
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.4);
        text-align: center;
        /* Center horizontally */
    }

    .modal-content {
        background-color: #fefefe;
        margin: 0 auto;
        /* Center horizontally */
        margin-top: 10%;
        /* Adjust vertical position */
        padding: 20px;
        border: 1px solid #888;
        width: 100%;
        /* max-width: 500px; */
        /* height: 100%; */
        /* Limit maximum width */
        display: inline-block;
        /* Allows centering with margin: auto */
    }

    @media (max-width: 998px) {
        .modal-content {

            margin-top: 50%;

        }
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    #loader2 {
        display: none;
        /* Initially hide the loader */
        position: fixed;
        z-index: 9999;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: black;
        text-align: center;
    }

    #loader2 img {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    #loader2 #loadd {
        position: absolute;
        top: 60%;
        left: 52%;
        transform: translate(-60%, -52%);
    }

    @keyframes flyIn {
        0% {
            opacity: 0;
            transform: translateY(-50px);
        }

        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .question-container {
        animation: flyIn 0.5s ease forwards;
    }

    .radio-button {
        animation: flyIn 0.5s ease forwards;
        animation-delay: 0.2s;
        /* Delay each radio button animation */
    }

    @keyframes blink {
        0% {
            background-color: #ed902e;
            border-color: #ed902e;
        }

        50% {
            background-color: transparent;
            border-color: transparent;
        }

        100% {
            background-color: #ed902e;
            border-color: #ed902e;
        }
    }

    .blinking {
        animation: blink 0.5s infinite;
        /* Adjusted duration to blink faster */
    }

    .user-selected {
        background-color: blue;
    }

    #balloon-container {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        overflow: hidden;
        height: 100%;


        transition: opacity 500ms;
    }

    .banner-content {
        position: relative;

        z-index: 1;

    }

    .balloon {
        height: 160px;
        width: 525px;
        position: relative;
        */
    }

    .balloon:before {
        content: "";
        height: 75px;
        width: 1px;
        padding: 1px;
        background-color: #FDFD96;
        display: block;
        position: absolute;
        top: 125px;
        left: 0;
        right: 0;
        margin: auto;
    }

    .balloon:after {
        content: "▲";
        text-align: center;
        display: block;
        position: absolute;
        color: inherit;
        top: 120px;
        left: 0;
        right: 0;
        margin: auto;
    }

    @keyframes float {
        from {
            transform: translateY(100vh);
            opacity: 1;
        }

        to {
            transform: translateY(-300vh);
            opacity: 0;
        }
    }

    .inputt {
        margin-right: 5px;
        display: inline-block;
        width: 100px;
        height: 100px;
        border-radius: 50%;
        color: white;
        border: #FDFD96;
        background: #acd038;
        text-align: center;
        line-height: 100px;
        margin-right: 5px;

        font-weight: bold;
        font-size: 23px;
    }

    @media (max-width: 998px) {
        .inputt {
            margin-right: 5px;
            display: inline-block;
            width: 120px;
            height: 120px;
            border-radius: 50%;
            color: white;
            border: #acd038;

            background: #acd038;
            text-align: center;
            line-height: 120px;
            margin-right: 5px;

            font-weight: bold;
            font-size: 23px;
        }

        #question-number,
        .title {
            font-size: 20px !important;
        }
    }

    .spacer {
        width: 20px;
    }

    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: transparent;
        z-index: 999;
        pointer-events: auto;
    }
</style>
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Modal -->
<div id="balloon-container" style="z-index: 0">
</div>
<div id="loader2">
    <img src="https://www.monsterenergy.com/img/home/monster-logo.png" alt="site-logo">
    <p id="loadd" style="color:white">Loading Next Question....</p>
</div>
<div id="myModal" class="modal">
    <div class="modal-content">
        <img src="https://www.monsterenergy.com/img/home/monster-logo.png" alt="site-logo">
        {{-- <span class="close">&times;</span> --}}
        <p style="color:#56be78"><b>CONGRATULATIONS YOU GOT <span style="color:black" id="scored"> <span
                        style="color:black">POINTS</span></b></p>
        <br />
        <p style="color:black">Enter details below to save your score</p><br />
        <form action="{{ route('save-score') }}" method="post">
            @csrf
            <div class="subscribe">
                <input type="text" name="username" placeholder="Enter Fullname">
                <input type="hidden" id="total_score" name="score" value=""><br />
                <input type="hidden" id="total_questions" name="total_questions" value="">
                <input type="hidden" id="userr_phone" name="phone" value="">
            </div>
            <div class="subscribe" style="margin-top:10px">
                <br />
                <button type="submit" id="saveit" class="btn btn-primary btn-play"
                    style="margin-top:20px;width:100%;background:#171717;border:none">SAVE SCORE</button>
                <button type="submit" id="dontsave" class="btn btn-primary btn-play"
                    style="margin-top:20px;width:100%;background:rgb(136, 64, 64);border:none">DONT SAVE</button>
            </div>
        </form>
    </div>
</div>

<!-- Browse Tournaments start -->
<section id="tournaments-section" style="background:#171717;margin-top:50px !important;">
    <!-- Overlay with countdown timer -->
    <div class=" pt-120 pb-120">
        <div class="container wow fadeInUp">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="section-header">
                        <h2 class="title">QUESTION <span id="question-number"></span> / <span>10</span></h2>

                    </div>
                </div>
            </div>
            <div class="single-item" style="background:black">
                <div class="row">
                    <div class="col-lg-9 col-md-9 d-flex align-items-center">
                        <div class="mid-area">
                            <div class="title-bottom " id="question-container">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 d-flex align-items-center">
                        <div class="prize-area text-center">
                            <div class="contain-area d-flex justify-content-center align-items-center">
                                <div class="circular-progress" data-inner-circle-color="lightgrey" data-percentage="100"
                                    data-progress-color="crimson" data-bg-color="#b2d236">
                                    <div class="inner-circle"></div>
                                    <p class="percentage time-countdown">60</p>
                                </div>
                                <div class="spacer"></div> <!-- Add a spacer -->
                                <span class="inputt" id="points-earned">0</span> <!-- Adjust padding-top as needed -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Browse Tournaments end -->
<script src="{{ asset('js/playtrivia.js')}}"></script>

@include('footer')
@endsection