<!-- banner-section start -->
@extends('layout')
@section('content')
<link rel="stylesheet" href="{{ asset('css/starttrivia.css')}}">



<!-- Browse Tournaments start -->
<section id="tournaments-section" style="background:#171717;margin-top:30px !important;">
    <!-- Overlay with countdown timer -->
    <div id="overlay" class="overlaid">
        <div class="countdown">
            <h2>Trivia starts in <span id="countdown" style="font-size:35px !important">10</span> seconds</h2>
        </div>
    </div>
    <div class="overlay pt-120 pb-120">
        <div class="container wow fadeInUp">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="section-header">
                        <h2 class="title"><span id="header-text" style="color:#B2D236"></span></h2>
                    </div>
                </div>
            </div>

            <div class=" single-item" style="background:black">
                <div class="row">

                    <div class="col-lg-9 col-md-9 d-flex align-items-center">
                        <div class="mid-area">
                            <h4>HOW TO PLAY</h4>
                            <div class="title-bottom">

                                <p>1. Each Question has a defined Time</p>
                                <p>2. You Should answer the question before the set time elapses.</p>
                                <p>3. Once counter resets to 0, the question is marked as failed attempt
                                </p>
                                <p>4. Answer as many questions as possible within the allocated time.
                                </p>
                                <p>5. Each correct attempt earns you a point.</p>
                                <br/>
                                <h4>PRIZES</h4>
                                <p>Participants in the draw stand a chance to win the following prizes:</p>
                                <p>1. One out of the 30 Tickets for the Exclusive Concert for Khaligraph and Femi One (one ticket admits two).</p>
                                    <p>2. One out of the 8 Monster Boom boxes.</p><br/>
                                    <p>*****The more times you play, the higher the chances of winning*****</p>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-3 d-flex align-items-center">
                        <div class="prize-area text-center">
                            <div class="contain-area">
                                <span class="prize"><img src="https://www.monsterenergy.com/img/home/monster-logo.png"
                                        alt="image"></span>
                                <button class="cmn-btn btn-play" style="background: #b2d236;">READY?
                                    LETS START</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</section>
<!-- Browse Tournaments end -->
<audio id="background-music" loop>
    <source src="/background.mp3" type="audio/mp3">
    <source src="/background.ogg" type="audio/ogg">
    <!-- Include other formats if necessary -->
    Your browser does not support the audio element.
  </audio>

<script>
document.addEventListener('DOMContentLoaded', function() {
  var audio = document.getElementById('background-music');
  audio.play();
});
</script>
<script src="{{ asset('js/starttrivia.js')}}"></script>
@include('footer')
@endsection
