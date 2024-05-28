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
    </style>
    <section id="banner-section">
        <div class="banner-content d-flex
        align-items-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="main-content">
                            <div class="top-area justify-content-center text-center">
                                <h3>Play Unlimited</h3>
                                <h1>Tournaments</h1>
                                <p>Compete in Free and Paid entry Tournaments. Transform your
                                    games to real money eSports</p>
                                <div class="btn-play d-flex justify-content-center align-items-center">
                                    <a href="registration.html" class="cmn-btn">Get Started</a>
                                    <a href="https://www.youtube.com/watch?v=MJ0zpsWQ_XM" class="mfp-iframe popupvideo">
                                        <img src="images/hKSskvYIu5WE.png" alt="play">
                                    </a>
                                </div>
                            </div>
                            {{-- <div class="row justify-content-center">
                                <div class="col-lg-12">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-6">
                                            <div class="bottom-area text-center">
                                                <img src="images/R0mMHlZhfUCF.png" alt="banner-vs">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}





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
                                <h2 class="title">Available Games</h2>
                                <p>We are constantly adding new games</p>
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
                    <div class="btn-area text-center">
                        <a href="tournaments.html" class="cmn-btn">View All</a>
                    </div>
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
                            <h2 class="title">Browse Tournaments</h2>
                            <p>Find the perfect tournaments for you. Head to head matches
                                where you pick the game, rules and prize.</p>
                        </div>
                    </div>
                </div>
                <div class="row mb-40 mp-none">
                    <div class="col-lg-3 col-md-3">
                        <div class="single-input">
                            <span>Status</span>
                            <select>
                                <option>Status</option>
                                <option value="1">Upcoming 1</option>
                                <option value="2">Upcoming 2</option>
                                <option value="3">Upcoming 3</option>
                                <option value="5">Upcoming 5</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="single-input">
                            <span>Search</span>
                            <input type="text" placeholder="Search">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="single-input">
                            <span>Team Size</span>
                            <select>
                                <option>Select Team Size</option>
                                <option value="1">Size 1</option>
                                <option value="2">Size 2</option>
                                <option value="3">Size 3</option>
                                <option value="4">Size 4</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="single-input">
                            <span>Entry Fee</span>
                            <select>
                                <option>Select Entry Fee</option>
                                <option value="1">50</option>
                                <option value="2">60</option>
                                <option value="3">70</option>
                                <option value="4">80</option>
                            </select>
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
                <div class="single-item">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 d-flex align-items-center">
                            <img class="top-img" src="images/tlwPIjA9cnXw.png" alt="image">
                        </div>
                        <div class="col-lg-6 col-md-9 d-flex align-items-center">
                            <div class="mid-area">
                                <h4>Begum Fortnite Tournament 23</h4>
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
                                    <h4 class="dollar">$473</h4>
                                    <a href="tournaments-single.html" class="cmn-btn">View Tournament</a>
                                    <p>Top 3 Players Win a Cash Prize</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-item mp-none">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 d-flex align-items-center">
                            <img class="top-img" src="images/uzjYAaIJPOYz.png" alt="image">
                        </div>
                        <div class="col-lg-6 col-md-9 d-flex align-items-center">
                            <div class="mid-area">
                                <h4>60 Player - Weekly - Micro</h4>
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
                                    <h4 class="dollar">$778</h4>
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

    <!-- Features In start -->
    <section id="features-section">
        <div class="overlay pt-120">
            <div class="container wow fadeInUp">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="section-header text-center">
                            <h2 class="title">Begam Games Features</h2>
                            <p>The biggest esports tournaments anytime, anywhere</p>
                        </div>
                    </div>
                </div>
                <div class="row pm-none">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-item text-center">
                            <div class="img-area">
                                <img src="images/tJEsFwTf3IPo.png" alt="image">
                            </div>
                            <h5>Premium Support</h5>
                            <p>Our dedicated admins are there to answer in no time, avg response time is 5mins.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-item text-center">
                            <div class="img-area">
                                <img src="images/6HKxuHMHqHQl.png" alt="image">
                            </div>
                            <h5>Instant Deposits</h5>
                            <p>Make a deposit and receive your funds instantly to your account.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-item text-center">
                            <div class="img-area">
                                <img src="images/PihofoiaOoEW.png" alt="image">
                            </div>
                            <h5>Climb the Leaderboards</h5>
                            <p>Compete in monthly leaderboard challenges for real cash and prizes.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-item text-center">
                            <div class="img-area">
                                <img src="images/GN3jISpbONzJ.png" alt="image">
                            </div>
                            <h5>Make 2x your $$</h5>
                            <p>Our dedicated admins are there to answer in no time, avg response time is 5mins.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-item text-center">
                            <div class="img-area">
                                <img src="images/50tVxRMV9cpK.png" alt="image">
                            </div>
                            <h5>Make up to 10X your $$</h5>
                            <p>Make up to 10X your money on multiplayer tourneys. With paid and free entry.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-item text-center">
                            <div class="img-area">
                                <img src="images/dw229D8o1KqT.png" alt="image">
                            </div>
                            <h5>Play at your Level</h5>
                            <p>With ranked divisions we help you find the right level to compete.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Features In end -->

    <!-- Call to Action In start -->
    <section id="call-to-action">
        <div class="overlay pt-120 pb-120">
            <div class="container">
                <div class="main-content">
                    <div class="row d-sm-flex justify-content-sm-end">
                        <div class="col-lg-4 col-md-1">
                            <img class="left" src="images/87omSrHoKfUb.png" alt="image">
                        </div>
                        <div class="col-lg-4 col-md-5 col-sm-5 d-flex align-items-center">
                            <div class="section-item">
                                <h4>Invite Friends and Win Rewards.Join BEGAM Games today</h4>
                            </div>
                        </div>
                        <div
                            class="col-lg-4 col-md-6 col-sm-6 d-flex justify-content-center justify-content-sm-end align-items-center">
                            <div class="btn-area d-flex justify-content-center justify-content-sm-end align-items-center">
                                <a href="registration.html" class="cmn-btn">Join Now</a>
                            </div>
                            <img src="images/neaYspSi4PR8.png" alt="image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Call to Action In end -->

    <!-- Testimonials In start -->
    <section id="testimonials-section">
        <div class="overlay pt-120 pb-120">
            <div class="container wow fadeInUp">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="section-header text-center">
                            <h2 class="title">Our Gamers Review</h2>
                            <p>Thousands of Happy Gamers All Around the World</p>
                        </div>
                    </div>
                </div>
                <div class="row mp-none">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-item text-center">
                            <p>I play Tournament every day, it's a great way to relax and win cash too!</p>
                            <div class="bottom-area d-flex justify-content-between">
                                <div class="left-area d-flex">
                                    <div class="img">
                                        <div class="img-area">
                                            <img src="images/0mNtIv1lsa0l.png" alt="image">
                                        </div>
                                    </div>
                                    <div class="title-area">
                                        <h6>Brice Tong</h6>
                                        <span>Texas, USA</span>
                                    </div>
                                </div>
                                <div class="amount">
                                    <h6>$306</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-item text-center">
                            <p>When I hang out with my friends, we play Tournament, its so much fun</p>
                            <div class="bottom-area d-flex justify-content-between">
                                <div class="left-area d-flex">
                                    <div class="img">
                                        <div class="img-area">
                                            <img src="images/0mNtIv1lsa0l.png" alt="image">
                                        </div>
                                    </div>
                                    <div class="title-area">
                                        <h6>Alva Adair</h6>
                                        <span>Frankfurt, Germany</span>
                                    </div>
                                </div>
                                <div class="amount">
                                    <h6>$496</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-item text-center">
                            <p>I joined for the community but ended up winning cash, amazing.</p>
                            <div class="bottom-area d-flex justify-content-between">
                                <div class="left-area d-flex">
                                    <div class="img">
                                        <div class="img-area">
                                            <img src="images/0mNtIv1lsa0l.png" alt="image">
                                        </div>
                                    </div>
                                    <div class="title-area">
                                        <h6>Ray Sutton</h6>
                                        <span>Ontario, Canada</span>
                                    </div>
                                </div>
                                <div class="amount">
                                    <h6>$306</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonials In end -->

    <!-- Call Action In start -->
    <section id="call-action" class="pb-120">
        <div class="overlay">
            <div class="container wow fadeInUp">
                <div class="row d-flex justify-content-between align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <div class="left-area">
                            <h2 class="title">Build Your Esports Profile</h2>
                            <p>Showcase your achievements, match history and win rate while you build your reputation on
                                Begam.</p>
                            <a href="registration.html" class="cmn-btn-second">Sign Up Free</a>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6">
                        <div class="right-area">
                            <img src="images/hlpOtZVOF0Yx.png" alt="image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('footer');
@endsection
