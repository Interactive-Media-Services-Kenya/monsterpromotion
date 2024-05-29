<!-- banner-section start -->
@extends('layout')
@section('content')
    <style>
        #banner-section {
            position: relative;
        }

        #banner-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('{{ asset('images/banner.jpg') }}');
            opacity: 0.5;
            background-size: cover;
            background-repeat: no-repeat;
        }

        .banner-content {
            position: relative;
            /* Make sure the content stays above the pseudo-element */
            /* Add any additional styles for the content here */
        }

        body {
            font-family: var(--body-font);
            background-color: #171717;
            font-size: 18px;
            line-height: 25px;
            padding: 0;
            margin: 0;
            font-weight: 400;
            overflow-x: hidden;
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
            /* border-radius: 75% 75% 70% 70%;
                                                                                                                                                                                                                                                                                                                            position: relative; */
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

        @media (max-width: 767px) {
            #banner-section {
                height: 70vh;

            }

            @media (max-width: 767px) {

                /* Center content vertically and horizontally */
                .banner-content {
                    padding: 20px;
                    /* Add some padding for better spacing */
                }
            }
        }
    </style>


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
                                    <a href="" class="cmn-btn">READY? LETS START</a>

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
        const balloonContainer = document.getElementById("balloon-container");

        function random(num) {
            return Math.floor(Math.random() * num);
        }

        function getRandomStyles() {
            var mt = random(200);
            var ml = random(50);
            var dur = random(5) + 5;
            var width = 160; // Default width
            var height = 525; // Default height

            // Adjust dimensions for smaller screens
            if (window.innerWidth < 768) {
                width = 70; // Adjust width for small screens
                height = 225; // Adjust height for small screens
            }

            return `
        margin: ${mt}px 0 0 ${ml}px;
        width: ${width}px;
        height: ${height}px;
        animation: float ${dur}s ease-in infinite;
    `;
        }


        function createBalloons(num) {
            // Array of image URLs
            var imageUrls = [
                "https://web-assests.monsterenergy.com/mnst/1a43af6d-be01-4540-b315-8f5cf15d7c3a.webp",
                "https://web-assests.monsterenergy.com/mnst/80f5851f-b4e7-4991-a477-0a1866c5b8ed.webp",
                "https://web-assests.monsterenergy.com/mnst/bdd04209-6311-4121-976c-f18c93b1bbdf.webp",
                "https://web-assests.monsterenergy.com/mnst/870180a1-a4ad-4e16-8036-8da586c19cdf.webp",
                "https://web-assests.monsterenergy.com/mnst/28ee69eb-aee6-4f44-b301-706aa35e16a1.webp"

            ];

            for (var i = num; i > 0; i--) {
                var balloon = document.createElement("img");
                balloon.className = "balloon";
                // Select a random image URL from the array
                var randomImageUrl = imageUrls[random(imageUrls.length)];
                balloon.src = randomImageUrl;
                balloon.style.cssText = getRandomStyles();
                balloonContainer.append(balloon);
            }
        }


        function removeBalloons() {
            balloonContainer.style.opacity = 0;
            setTimeout(() => {
                balloonContainer.remove();
            }, 500);
        }

        window.addEventListener("load", () => {
            createBalloons(30);
        });

        window.addEventListener("click", () => {
            removeBalloons();
        });
    </script>
    @include('footer');
@endsection
