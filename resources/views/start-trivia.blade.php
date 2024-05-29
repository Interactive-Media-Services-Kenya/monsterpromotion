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
    </style>

    <!-- Modal -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            {{-- <div class="logo-section flex-grow-1 d-flex align-items-center" style="background:red">
                <a class="site-logo site-title" href="/"><img
                        src="https://www.monsterenergy.com/img/home/monster-logo.png" alt="site-logo"></a>
            </div> --}}
            <span class="close">&times;</span>
            <form action="#">
                <div class="subscribe">
                    <input type="email" placeholder="Enter Fullname"><br />

                </div>
                <div class="subscribe" style="margin-top:20px">
                    <input type="email" placeholder="Enter Phone No">
                    <br />

                    <button class="btn btn-primary" style="margin-top:20px;width:100%;background:#171717;border:none">PLAY
                        NOW</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Browse Tournaments start -->
    <section id="tournaments-section">
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

                <div class="single-item">
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
                                    <button class="cmn-btn">READY? LETS START</button>

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
        document.addEventListener("DOMContentLoaded", function() {
            const readyButton = document.querySelector('.cmn-btn');
            const modal = document.getElementById('myModal');
            const closeBtn = modal.querySelector('.close');

            readyButton.addEventListener('click', function() {
                modal.style.display = 'block';
            });

            closeBtn.addEventListener('click', function() {
                modal.style.display = 'none';
            });

            window.addEventListener('click', function(event) {
                if (event.target === modal) {
                    modal.style.display = 'none';
                }
            });
        });
    </script>
    @include('footer');
@endsection
