<!-- banner-section start -->
@extends('layout')
@section('content')
<style>
    #banner-section {
        position: relative;
    }
   .scores{
    color:white;
   }
    #tournaments-section .single-item .title-bottom {
        border-bottom: none;
        margin-top: 20px;
        padding-bottom: 35px;
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

    #how-works-section .single-item .icon-area {
        background: #4609C3;
        border-radius: 10px;
        display: inline-block;
        padding: 23px 25px;
        position: relative;
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
            #banner-section {
                height: 70vh;
            }
        }

        @media (max-width: 998px) {
            .banner-content {
                padding: 20px;
            }
            .header-title{
              font-size:18px;  
            }
        }
    }

    #tournaments-section .single-item .prize-area {
        border: none;
        width: 100%;
        /* height: 100%; */
    }

    .cmn-btn {
        background: #b2d236;
        color: white;
    }

    #how-works-section .single-item .icon-area {
        background: #b2d236 !important;
        border-radius: 10px;
        display: inline-block;
        padding: 23px 25px;
        position: relative;
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
                                <a href="#available-game-section" class="cmn-btn">Ready? Play Now</a>
                                {{-- <a href="https://www.youtube.com/watch?v=MJ0zpsWQ_XM"
                                    class="mfp-iframe popupvideo">
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
                            <p>Click any game to play</p>
                        </div>
                    </div>
                </div>
                <div class="available-game-carousel">
                    <div class="single-item">
                        <a href="{{ route('user/play-trivia') }}"><img src="{{ asset('images/6oG1ggLQFyBC.png') }}"
                                alt="image"></a>
                    </div>
                    <div class="single-item">
                        <a href="{{ route('user/play-trivia') }}"><img src="{{ asset('images/Ri48fTxVZ3Pj.png') }}"
                                alt="image"></a>
                    </div>
                    <div class="single-item">
                        <a href="{{ route('user/play-trivia') }}"><img src="{{ asset('images/9Z2wX0RylL4S.png') }}"
                                alt="image"></a>
                    </div>
                    <div class="single-item">
                        <a href="{{ route('user/play-trivia') }}"><img src="{{ asset('images/9tY3c177ITYs.png') }}"
                                alt="image"></a>
                    </div>
                    <div class="single-item">
                        <a href="{{ route('user/play-trivia') }}"><img src="{{ asset('images/9Z2wX0RylL4S.png') }}"
                                alt="image"></a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- Available Game In end -->

<!-- How Works start -->

<!-- How Works end -->

<!-- Browse Tournaments start -->
<section id="tournaments-section">
    <div class="overlay pt-120 pb-120">
        <div class="container wow fadeInUp">
        <div class="row align-items-center justify-content-between mx-3">
    <div class="col d-flex">
        <div class="section-header">
            <span class="title header-title" style="text-align: left;"><u>TOP PLAYERS</u></span>
        </div>
    </div>
    <div class="col d-flex justify-content-end">
        <div class="section-header text-md-right">
            <a href="{{ route('leaders-board')}}" class="cmn-btn btn-play">VIEW ALL</a>
        </div>
    </div>
</div>






            <div class="single-item">
                <div class="row" >
            <table class="table table-striped">
  <thead style="background:black">
    <tr>
      <th scope="col" class="scores">Player Rank</th>
      <th scope="col" class="scores">Username</th>
      <th scope="col" class="scores">Total Score</th>
    </tr>
  </thead>
  <tbody>
  @php
            $leaders=DB::table('scores')->where('status',"1")->orderBy('score','desc')->limit(10)->get();
                                 
            @endphp
            @foreach($leaders as $leader)
         
    <tr>
      <th scope="row" class="scores">{{ $loop->iteration }}</th>
      <td class="scores">{{ $leader->name }}</td>
      <td class="scores">{{ $leader->score }}</td>
     
    </tr>
     <tr style="border-bottom: 1px solid #ccc;">
            <td colspan="3"></td>
        </tr>
            @endforeach
    
  </tbody>
</table> </div>
            </div>
           
            
           
        </div>
    </div>
</section>
<section id="how-works-section" class="border-area">
    <div class="overlay pt-120 pb-120">
        <div class="container wow fadeInUp">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="section-header">
                        <h2 class="title">How It Works</h2>
                        <p>It's easier than you think. Just 3 simple easy steps</p>
                    </div>
                </div>
            </div>
            <div class="row mp-top">
                <div class="col-lg-4 col-md-4 col-sm-6 d-flex justify-content-center">
                    <div class="single-item">
                        <div class="icon-area">
                            <span>1</span>
                            <img src="{{ asset('images/X9Rg4sp6JlL8.png') }}" alt="image">
                        </div>
                        <div class="text-area">
                            <h5>Scan Code</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 d-flex justify-content-center obj-rel">
                    <div class="single-item">
                        <div class="icon-area">
                            <span>2</span>
                            <img src="{{ asset('images/R1h81k9PrJYk.png') }}" alt="image">
                        </div>
                        <div class="text-area">
                            <h5>Start Trivia</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 d-flex justify-content-center obj-rel">
                    <div class="single-item">
                        <div class="icon-area">
                            <span>3</span>
                            <img src="{{ asset('images/CLufmFhQfboo.png') }}" alt="image">
                        </div>
                        <div class="text-area">
                            <h5>Win Prize</h5>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<script>
    const balloonContainer = document.getElementById("balloon-container");

        function random(num) {
            return Math.floor(Math.random() * num);
        }

        function getRandomStyles() {
            var mt = random(200);
            var ml = random(50);
            var dur = random(5) + 5;
            var width = 100;
            var height = 250; 
            if (window.innerWidth < 768) {
                width = 70; 
                height = 225; 
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

<script>
document.addEventListener('DOMContentLoaded', function() {
        var phoneElements = document.querySelectorAll('.masked-phone');

        phoneElements.forEach(function(element) {
            var phone = element.textContent.trim(); 
            var maskedPhone = maskPhoneNumber(phone);
            element.textContent = maskedPhone; 
        });

        function maskPhoneNumber(phone) {
            var visibleDigits = phone.substring(phone.length - 4);
            var maskedPart = '*'.repeat(phone.length - 4);
            return maskedPart + visibleDigits;
        }
    });

    // localStorage.setItem('user_mobile_no',phone);
    console.log(localStorage.getItem('user_mobile_no'));
</script>

@include('footer');
@endsection