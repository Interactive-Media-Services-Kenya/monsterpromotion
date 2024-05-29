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
        }
    </style>
    <section id="banner-section">

        <div id="balloon-container">
        </div>
        <div class="banner-content d-flex
        align-items-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="main-content">
                            <div class="top-area justify-content-center text-center">
                                <h1>ITS MONSTER TIME</h1>
                                <h3>LETS PLAY A GAME, BE OUR NEXT CHAMPION</h3>
                                <p>Just simple way,answer as many questions as you can within 60 seconds</p>
                                <div class="btn-play d-flex justify-content-center align-items-center">
                                    <a href="registration.html" class="cmn-btn">Ready? Play Now</a>
                                    {{-- <a href="https://www.youtube.com/watch?v=MJ0zpsWQ_XM" class="mfp-iframe popupvideo">
                                        <img src="images/hKSskvYIu5WE.png" alt="play">
                                    </a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ani-illu">

                </div>
            </div>
        </div>
    </section>
    <!-- banner-section end -->

    <!-- Available Game In start -->
    <section id="available-game-section">

        <div class="overlay pb-120">
            <div class="container wow fadeInUp">
                <div class="main-container">
                    <div class="row justify-content-between">
                        <div class="col-lg-10">
                            <div class="section-header">
                                <h2 class="title">Our Top Games List</h2>
                                <p>You can play any of our games below to win amazing gifts</p>
                            </div>
                        </div>
                    </div>
                    <div class="available-game-carousel">
                        <div class="single-item">
                            <a href="#"><img src="images/6oG1ggLQFyBC.png" alt="image"></a>
                        </div>
                        <div class="single-item">
                            <a href="#"><img src="images/Ri48fTxVZ3Pj.png" alt="image"></a>
                        </div>
                        <div class="single-item">
                            <a href="#"><img src="images/9Z2wX0RylL4S.png" alt="image"></a>
                        </div>
                        <div class="single-item">
                            <a href="#"><img src="images/9tY3c177ITYs.png" alt="image"></a>
                        </div>
                        <div class="single-item">
                            <a href="#"><img src="images/9Z2wX0RylL4S.png" alt="image"></a>
                        </div>
                    </div>
                    {{-- <div class="btn-area text-center">
                        <a href="tournaments.html" class="cmn-btn">View All</a>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>
    <!-- Available Game In end -->

    <!-- How Works start -->
    <section id="how-works-section" class="border-area">
        <div class="overlay pt-120 pb-120">
            <div class="container wow fadeInUp">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 text-center">
                        <div class="section-header">
                            <h2 class="title">How It Works</h2>
                            <p>It's easier than you think. Follow 4 simple easy steps</p>
                        </div>
                    </div>
                </div>
                <div class="row mp-top">
                    <div class="col-lg-3 col-md-3 col-sm-6 d-flex justify-content-center">
                        <div class="single-item">
                            <div class="icon-area">
                                <span>1</span>
                                <img src="images/X9Rg4sp6JlL8.png" alt="image">
                            </div>
                            <div class="text-area">
                                <h5>Signup</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 d-flex justify-content-center obj-rel">
                        <div class="single-item">
                            <div class="icon-area">
                                <span>2</span>
                                <img src="images/R1h81k9PrJYk.png" alt="image">
                            </div>
                            <div class="text-area">
                                <h5>Deposit</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 d-flex justify-content-center obj-alt">
                        <div class="single-item">
                            <div class="icon-area">
                                <span>3</span>
                                <img src="images/W2n6PFJ8Abd6.png" alt="image">
                            </div>
                            <div class="text-area">
                                <h5>Compete</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 d-flex justify-content-center obj-rel">
                        <div class="single-item">
                            <div class="icon-area">
                                <span>4</span>
                                <img src="images/CLufmFhQfboo.png" alt="image">
                            </div>
                            <div class="text-area">
                                <h5>Get Paid</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 text-center">
                        <a href="registration.html" class="cmn-btn">Join Now!</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- How Works end -->

    <!-- Browse Tournaments start -->
    <section id="tournaments-section">
        <div class="overlay pt-120 pb-120">
            <div class="container wow fadeInUp">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8 text-center">
                        <div class="section-header">
                            <h2 class="title">LEADERS BOARD</h2>
                            <p>Get to know our top Monster Champions.</p>
                        </div>
                    </div>
                </div>

                <div class="single-item">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 d-flex align-items-center">
                            <img class="top-img" src="images/oHuUWtmDwB6J.png" alt="image">
                        </div>
                        <div class="col-lg-6 col-md-9 d-flex align-items-center">
                            <div class="mid-area">
                                <h4>Mix It Mondays - Carry Only</h4>
                                <div class="title-bottom d-flex">
                                    <div class="time-area bg">
                                        <img src="images/NCtbeIh0Ry44.png" alt="image">
                                        <span>Starts in</span>
                                        <span class="time">10d 2H 18M</span>
                                    </div>
                                    <div class="date-area bg">
                                        <span class="date">Apr 21, 5:00 AM EDT</span>
                                    </div>
                                </div>
                                <div class="single-box d-flex">
                                    <div class="box-item">
                                        <span class="head">ENTRY/PLAYER</span>
                                        <span class="sub">10 Credits</span>
                                    </div>
                                    <div class="box-item">
                                        <span class="head">Team Size</span>
                                        <span class="sub">2 VS 2</span>
                                    </div>
                                    <div class="box-item">
                                        <span class="head">Max Teams</span>
                                        <span class="sub">64</span>
                                    </div>
                                    <div class="box-item">
                                        <span class="head">Enrolled</span>
                                        <span class="sub">11</span>
                                    </div>
                                    <div class="box-item">
                                        <span class="head">skill Level</span>
                                        <span class="sub">All</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 d-flex align-items-center">
                            <div class="prize-area text-center">
                                <div class="contain-area">
                                    <span class="prize"><img src="images/FIWhhUUYhL79.png" alt="image">prize</span>
                                    <h4 class="dollar">$739</h4>
                                    <a href="tournaments-single.html" class="cmn-btn">View Tournament</a>
                                    <p>Top 3 Players Win a Cash Prize</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-item">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 d-flex align-items-center">
                            <img class="top-img" src="images/N2ziBCLyOHZj.png" alt="image">
                        </div>
                        <div class="col-lg-6 col-md-9 d-flex align-items-center">
                            <div class="mid-area">
                                <h4>Head 2 Head - Weekly - Nano</h4>
                                <div class="title-bottom d-flex">
                                    <div class="time-area bg">
                                        <img src="images/NCtbeIh0Ry44.png" alt="image">
                                        <span>Starts in</span>
                                        <span class="time">10d 2H 18M</span>
                                    </div>
                                    <div class="date-area bg">
                                        <span class="date">Apr 21, 5:00 AM EDT</span>
                                    </div>
                                </div>
                                <div class="single-box d-flex">
                                    <div class="box-item">
                                        <span class="head">ENTRY/PLAYER</span>
                                        <span class="sub">10 Credits</span>
                                    </div>
                                    <div class="box-item">
                                        <span class="head">Team Size</span>
                                        <span class="sub">2 VS 2</span>
                                    </div>
                                    <div class="box-item">
                                        <span class="head">Max Teams</span>
                                        <span class="sub">64</span>
                                    </div>
                                    <div class="box-item">
                                        <span class="head">Enrolled</span>
                                        <span class="sub">11</span>
                                    </div>
                                    <div class="box-item">
                                        <span class="head">skill Level</span>
                                        <span class="sub">All</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 d-flex align-items-center">
                            <div class="prize-area text-center">
                                <div class="contain-area">
                                    <span class="prize"><img src="images/FIWhhUUYhL79.png" alt="image">prize</span>
                                    <h4 class="dollar">$854</h4>
                                    <a href="tournaments-single.html" class="cmn-btn">View Tournament</a>
                                    <p>Top 3 Players Win a Cash Prize</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-item">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 d-flex align-items-center">
                            <img class="top-img" src="images/MNHpwdKvvcgf.png" alt="image">
                        </div>
                        <div class="col-lg-6 col-md-9 d-flex align-items-center">
                            <div class="mid-area">
                                <h4>marathon aim premium</h4>
                                <div class="title-bottom d-flex">
                                    <div class="time-area bg">
                                        <img src="images/NCtbeIh0Ry44.png" alt="image">
                                        <span>Starts in</span>
                                        <span class="time">10d 2H 18M</span>
                                    </div>
                                    <div class="date-area bg">
                                        <span class="date">Apr 21, 5:00 AM EDT</span>
                                    </div>
                                </div>
                                <div class="single-box d-flex">
                                    <div class="box-item">
                                        <span class="head">ENTRY/PLAYER</span>
                                        <span class="sub">10 Credits</span>
                                    </div>
                                    <div class="box-item">
                                        <span class="head">Team Size</span>
                                        <span class="sub">2 VS 2</span>
                                    </div>
                                    <div class="box-item">
                                        <span class="head">Max Teams</span>
                                        <span class="sub">64</span>
                                    </div>
                                    <div class="box-item">
                                        <span class="head">Enrolled</span>
                                        <span class="sub">11</span>
                                    </div>
                                    <div class="box-item">
                                        <span class="head">skill Level</span>
                                        <span class="sub">All</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 d-flex align-items-center">
                            <div class="prize-area text-center">
                                <div class="contain-area">
                                    <span class="prize"><img src="images/FIWhhUUYhL79.png" alt="image">prize</span>
                                    <h4 class="dollar">$105</h4>
                                    <a href="tournaments-single.html" class="cmn-btn">View Tournament</a>
                                    <p>Top 3 Players Win a Cash Prize</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>
    <!-- Browse Tournaments end -->

    <!-- Counter In start -->
    <section id="counter-section">
        <div class="overlay pt-120 pb-120">
            <div class="container">
                <div class="row mp-none">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-item text-center">
                            <div class="img-area">
                                <img src="images/FaX7Gxpa1zzQ.png" alt="image">
                            </div>
                            <h3><span class="counter">84</span>K</h3>
                            <p>Matches Played</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-item text-center">
                            <div class="img-area">
                                <img src="images/ymmVEw3fZVcI.png" alt="image">
                            </div>
                            <h3>$<span class="counter">96</span>m</h3>
                            <p>Winnings Paid</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-item text-center">
                            <div class="img-area">
                                <img src="images/P69luVhH7JX3.png" alt="image">
                            </div>
                            <h3><span class="counter">180</span></h3>
                            <p>Active Ladders</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-item text-center">
                            <div class="img-area">
                                <img src="images/QNr7rTlgBzAB.png" alt="image">
                            </div>
                            <h3><span class="counter">168</span>b</h3>
                            <p>XP Earned</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Counter In end -->

    <!-- Players of the Week In start -->
    <section id="players-week-section">
        <div class="overlay pt-120 pb-120">
            <div class="container wow fadeInUp">
                <div class="row justify-content-center">
                    <div class="col-lg-7 mb-30">
                        <div class="section-header text-center">
                            <h2 class="title">Players of the Week</h2>
                            <p>We take a look at the best player of the week awarded
                                on Monday for the previous Monday to Sunday</p>
                        </div>
                    </div>
                </div>
                <div class="row mp-none">
                    <div class="col-lg-4 col-md-6">
                        <div class="single-item text-center">
                            <div class="img-area">
                                <div class="img-wrapper">
                                    <img src="images/8bM6AasrjZOt.png" alt="image">
                                </div>
                            </div>
                            <a href="profile.html">
                                <h5>Barton Griggs</h5>
                            </a>
                            <p class="date">
                                <span class="text-sm earn">1970 XP Earned</span>
                                <span class="text-sm">04/05 - 04/12</span>
                            </p>
                            <p class="text-sm credit">
                                <span class="text-sm"><img src="images/hbQWP654IrGK.png" alt="image"> +20
                                    credits</span>
                            </p>
                            <a href="profile.html" class="cmn-btn">View Profile</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-item mid-area text-center">
                            <div class="top-level">
                                <img src="images/9H6wYb3UM1iX.png" alt="image">
                            </div>
                            <div class="img-area">
                                <div class="img-wrapper">
                                    <img src="images/YPfyijStJVJj.png" alt="image">
                                </div>
                            </div>
                            <a href="profile.html">
                                <h5>Mervin Trask</h5>
                            </a>
                            <p class="date">
                                <span class="text-sm earn">1970 XP Earned</span>
                                <span class="text-sm">04/05 - 04/12</span>
                            </p>
                            <p class="text-sm credit">
                                <span class="text-sm"><img src="images/hbQWP654IrGK.png" alt="image"> +20
                                    credits</span>
                            </p>
                            <a href="profile.html" class="cmn-btn">View Profile</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-item text-center">
                            <div class="img-area">
                                <div class="img-wrapper">
                                    <img src="images/nq9UAnU1EIm4.png" alt="image">
                                </div>
                            </div>
                            <a href="profile.html">
                                <h5>Adria Poulin</h5>
                            </a>
                            <p class="date">
                                <span class="text-sm earn">1970 XP Earned</span>
                                <span class="text-sm">04/05 - 04/12</span>
                            </p>
                            <p class="text-sm credit">
                                <span class="text-sm"><img src="images/hbQWP654IrGK.png" alt="image"> +20
                                    credits</span>
                            </p>
                            <a href="profile.html" class="cmn-btn">View Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Players of the Week In end -->

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
