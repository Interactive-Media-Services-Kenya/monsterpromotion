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

        /* Add this CSS */
        body.overlay-shown {
            overflow: hidden;
            /* Prevent scrolling */
        }

        body.overlay-shown>*:not(#overlay) {
            display: none;
            /* Hide all content except the overlay */
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

        /* Overlay styles */
        .overlaid {
            display: none;
            position: fixed;
            z-index: 200;
            width: 100%;
            height: 100%;
            background: red;
            top: 0;
            left: 0;
            z-index: 100;
            background-color: rgba(0, 0, 0, 0.5);
            text-align: center;
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
    </style>

    <!-- Modal -->

    <div id="myModal" class="modal">
        <div class="modal-content">

            <span class="close">&times;</span>
            <form action="#">
                <div class="subscribe">
                    <input type="text" placeholder="Enter Fullname"><br />

                </div>
                <div class="subscribe" style="margin-top:20px">
                    <input type="text" placeholder="Enter Phone No">
                    <br />

                    <button type="button" class="btn btn-primary btn-play"
                        style="margin-top:20px;width:100%;background:#171717;border:none">PLAY
                        NOW</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Browse Tournaments start -->
    <section id="tournaments-section">
        <!-- Overlay with countdown timer -->


        <div class="overlay pt-120 pb-120">
            <div class="container wow fadeInUp">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8 text-center">
                        <div class="section-header">
                            <h2 class="title">QUESTION : 1</h2>
                            {{-- <p>et to know our top Monster GChampions.</p> --}}
                        </div>
                    </div>
                </div>

                <div class="single-item">
                    <div class="row">

                        <div class="col-lg-9 col-md-9 d-flex align-items-center">
                            <div class="mid-area">
                                {{-- <h4>ATTEMPT THE TRIVIA</h4> --}}
                                <div class="title-bottom">

                                    <p>What year was Monster Energy Drink first introduced to the market?</p>

                                </div>
                                <div style="color:white"><input type="radio" name="person" /> 1990</div>
                                <div style="color:white"><input type="radio" name="person" /> 1994</div>
                                <div style="color:white"><input type="radio" name="person" /> 2020</div>
                                <div style="color:white"><input type="radio" name="person" /> 2023</div>


                            </div>
                        </div>
                        <div class="col-lg-3 d-flex align-items-center">
                            <div class="prize-area text-center">
                                <div class="contain-area">
                                    <span class="prize" style="color:white"> Time Remaining : <span class="time-countdown"
                                            style="color:#56be78"></span></span>
                                    <!-- Move the class here -->
                                    <a href="" class="cmn-btn">NEXT QUESTION</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>
    <!-- Browse Tournaments end -->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Function to start countdown timer and redirect if time elapses
            function startTimer(duration, redirectUrl) {
                var timer = duration,
                    minutes, seconds;
                setInterval(function() {
                    minutes = parseInt(timer / 60, 10);
                    seconds = parseInt(timer % 60, 10);

                    minutes = minutes < 10 ? "0" + minutes : minutes;
                    seconds = seconds < 10 ? "0" + seconds : seconds;

                    // Display the countdown timer
                    var countdownElement = document.querySelector('.time-countdown');
                    if (countdownElement) {
                        countdownElement.textContent = minutes + ":" + seconds;
                    }

                    if (--timer < 0) {
                        // Redirect to another page if time elapses
                        window.location.href = redirectUrl;
                    }
                }, 1000);
            }

            // Start countdown timer on page load (15 minutes = 900 seconds)
            startTimer(900, 'redirect-page-url'); // Replace 'redirect-page-url' with the URL to redirect
        });
    </script>


    @include('footer');
@endsection
