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



        #question2-container,
        #question3-container {
            display: none;
            /* Hide additional questions initially */
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
                            <h2 class="title">TRIVIA RESULTS</h2>
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
                                <div class="title-bottom " id="question1-container">
                                    <p>results will display Here</p>
                                </div>
                            
                            </div>

                        </div>
                       
                    </div>
                </div>


            </div>
        </div>
    </section>
    <!-- Browse Tournaments end -->

 

    @include('footer');
@endsection
