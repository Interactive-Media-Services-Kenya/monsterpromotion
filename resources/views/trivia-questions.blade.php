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

        .radio-button {
            display: inline-block;
            padding: 10px 20px;
            width: 100%;
            border: none;
            background-color: #acd038;
            color: white;
            border: 1px solid #acd038;
            cursor: pointer;
            text-align: center margin-right: 10px;
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
            color: rgb(0, 0, 0, 0.8);
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
                            <audio id="beepAudio" controls style="display: none;">
                                <source src="{{ asset('monster.wav') }}" type="audio/wav">
                                <source src="{{ asset('monster.wav') }}" type="audio/mpeg">
                                Your browser does not support the audio element.
                            </audio>

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
                                <br />
                                <div style="color:white">
                                    <input type="radio" id="year_1990" name="year" value="1990"
                                        style="display: none;">
                                    <label for="year_1990" class="radio-button">1990</label>
                                </div>
                                <div style="color:white">
                                    <input type="radio" id="year_1994" name="year" value="1994"
                                        style="display: none;">
                                    <label for="year_1994" class="radio-button">1994</label>
                                </div>
                                <div style="color:white">
                                    <input type="radio" id="year_2020" name="year" value="2020"
                                        style="display: none;">
                                    <label for="year_2020" class="radio-button">2020</label>
                                </div>
                                <div style="color:white">
                                    <input type="radio" id="year_2023" name="year" value="2023"
                                        style="display: none;">
                                    <label for="year_2023" class="radio-button">2023</label>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-3 d-flex align-items-center">
                            <div class="prize-area text-center">
                                <div class="contain-area d-flex justify-content-center align-items-center">
                                    <!-- Added d-flex and justify-content-center align-items-center -->
                                    <div class="circular-progress" data-inner-circle-color="lightgrey" data-percentage="100"
                                        data-progress-color="crimson" data-bg-color="black">
                                        <div class="inner-circle"></div>
                                        <p class="percentage time-countdown">10</p>
                                    </div>
                                    <br />
                                    <!-- Move the class here -->

                                </div>
                                <span style="padding-top:-200px !important">1 Points</span>
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
            // Function to start countdown timer and progress bar animation
            function startCountdownAndProgressBar(duration, redirectUrl) {
                var timer = duration;
                var progressBar = document.querySelectorAll(".circular-progress");

                var interval = setInterval(function() {
                    // Update countdown timer
                    var countdownElement = document.querySelector('.time-countdown');
                    if (countdownElement) {
                        countdownElement.textContent = timer;
                    }

                    // Update progress bar
                    progressBar.forEach(function(progressBar) {
                        var innerCircle = progressBar.querySelector(".inner-circle");
                        var progressColor = progressBar.getAttribute("data-progress-color");
                        var endValue = Number(progressBar.getAttribute("data-percentage"));

                        var startValue = duration - timer;
                        var progressPercentage = (startValue / duration) * 100;

                        innerCircle.style.color = progressColor;
                        innerCircle.style.backgroundColor = progressBar.getAttribute(
                            "data-inner-circle-color");
                        progressBar.style.background =
                            `conic-gradient(${progressColor} ${progressPercentage}%, ${progressBar.getAttribute("data-bg-color")} ${progressPercentage}% 100%)`;

                        // If timer reaches 0, clear interval and redirect
                        if (timer <= 0) {
                            clearInterval(interval);
                            window.location.href = redirectUrl;
                        }
                    });

                    timer--;
                }, 1000);
            }

            // Start countdown timer and progress bar animation
            startCountdownAndProgressBar(10, 'redirect-page-url');
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log("Script is executing...");
            var audio = document.getElementById('beepAudio');
            audio.play();
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log("Script is executing...");
            var audio = document.getElementById('beepAudio');
            audio.play();
        });
    </script>

    @include('footer');
@endsection
