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

    body {
        background: #171717;
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
        font-size: 30px;
    }
</style>
<script>
    // console.log('sds'+localStorage.getItem('user_mobile_no'))
    if (!localStorage.getItem('user_mobile_no')) {

        window.location.href = "/";
    } else {
        const user_phone_no = localStorage.getItem('user_mobile_no');
        console.log(user_phone_no);
    }
</script>
<!-- Modal -->
<audio id="background-music" loop>
    <source src="path_to_your_audio_file.mp3" type="audio/mp3">
    Your browser does not support the audio element.
</audio>

<div id="myModal" class="modal">
    <div class="modal-content">

        <span class="close">&times;</span>
        <form action="#">
            <div class="subscribe">
                <input type="text" required id="username" name="username" placeholder="Enter Fullname"><br />

            </div>
            <div class="subscribe" style="margin-top:20px">
                <input type="text" required placeholder="Enter Phone No">
                <br />

                <button type="button" class="btn btn-primary"
                    style="margin-top:20px;width:100%;background:#171717;border:none">PLAY
                    NOW</button>
            </div>
        </form>
    </div>
</div>

<!-- Browse Tournaments start -->
<section id="tournaments-section" style="background:#171717">
    <!-- Overlay with countdown timer -->
    <div id="overlay" class="overlaid">
        <div class="countdown">
            <h2>Trivia starts in <span id="countdown" style="font-size:25px !important">10</span> seconds</h2>
        </div>
    </div>

    <div class="overlay pt-120 pb-120">
        <div class="container wow fadeInUp">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="section-header">
                        <h2 class="title">TRIVIA GAME QUIZ</h2>
                        {{-- <p>et to know our top Monster GChampions.</p> --}}
                    </div>
                </div>
            </div>

            <div class="single-item" style="background:black">
                <div class="row">

                    <div class="col-lg-9 col-md-9 d-flex align-items-center">
                        <div class="mid-area">
                            <h4>HOW TO PLAY</h4>
                            <div class="title-bottom">

                                <p>1. Each Question has a defined Time</p>
                                <p>2. You Should answer the question before the set time elapses.</p>
                                <p>3. Once counter resets to 0, the question is marked as failed attempt</p>
                                <p>4. Answer as many questions as possible within the allocated time.</p>
                                <p>5. Each correct attempt earns you a point.</p>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-3 d-flex align-items-center">
                        <div class="prize-area text-center">
                            <div class="contain-area">
                                <span class="prize"><img src="https://www.monsterenergy.com/img/home/monster-logo.png"
                                        alt="image"></span>
                                <button class="cmn-btn btn-play" style="background: #b2d236;">READY? LETS START</button>

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
    // JavaScript
    document.addEventListener("DOMContentLoaded", function () {
        // localStorage.clear();
        var userResults = localStorage.getItem('question_answers')
        if (userResults) {
            localStorage.clear('question_answers');
        }
        const readyButton = document.querySelector('.cmn-btn');
        const modal = document.getElementById('myModal');
        const closeBtn = modal.querySelector('.close');

        readyButton.addEventListener('click', function () {

            modal.style.display = 'block';
        });

        closeBtn.addEventListener('click', function () {
            modal.style.display = 'none';
        });

        window.addEventListener('click', function (event) {
            if (event.target === modal) {
                modal.style.display = 'none';
            }
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const readyButton = document.querySelector('.btn-play');
        const modal = document.getElementById('myModal');
        const closeBtn = modal.querySelector('.close');
        const overlay = document.getElementById('overlay');
        const countdownElement = document.getElementById('countdown');

        let countdownValue = 10; // Initial countdown value
        function createBeepSound() {
            const audioContext = new (window.AudioContext || window.webkitAudioContext)();
            const oscillator = audioContext.createOscillator();
            oscillator.type = 'sine'; // Set oscillator type to sine wave
            oscillator.frequency.setValueAtTime(1000, audioContext.currentTime); // Set frequency (Hz)
            oscillator.connect(audioContext.destination);
            oscillator.start();
            setTimeout(function () {
                oscillator.stop();
            }, 100); // Stop the oscillator after 100 milliseconds
        }
        readyButton.addEventListener('click', function () {
            modal.style.display = 'none';
            overlay.style.display = 'block'; // Show the overlay
            startCountdown(); // Start the countdown when button is clicked
            const usernameInput = document.getElementById('username');
            const username = usernameInput.value.trim(); // Get the username from the input field
            if (username) {
                localStorage.setItem('username', username);
            }
        });

        closeBtn.addEventListener('click', function () {
            modal.style.display = 'none';
            overlay.style.display = 'none'; // Hide the overlay
            clearInterval(countdownInterval); // Stop the countdown if modal is closed
        });

        // Function to start the countdown
        function startCountdown() {
            countdownElement.textContent = countdownValue;
            const countdownInterval = setInterval(function () {
                countdownValue--;
                countdownElement.textContent = countdownValue;
                if (countdownValue <= 0) {
                    clearInterval(countdownInterval);
                    redirectToGame();
                }
            }, 1000);
        }

        // Function to redirect to the game
        function redirectToGame() {
            window.location.href = '/user/start-trivia';
        }
        window.addEventListener('click', function (event) {
            if (event.target === modal) {
                modal.style.display = 'none';
                overlay.style.display = 'none'; // Hide the overlay
                clearInterval(countdownInterval); // Stop the countdown if modal is closed
            }
        });
    });

</script>

@include('footer');
@endsection