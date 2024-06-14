<!-- banner-section start -->
@extends('layout')
@section('content')
<link rel="stylesheet" href="{{ asset('css/gamespage.css')}}">
<style>
    .form {

        margin: 0 auto;
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    fieldset {
        border: 2px solid #B2D236;
        border-radius: 5px;
        margin-bottom: 20px;
        padding: 10px 20px;
    }

    legend {
        background-color: #B2D236;
        color: white;
        WIDTH: 20%;
        padding: 5px 10px;
        border-radius: 5px;
        font-weight: bold;
    }

    @media (max-width: 998px) {
        legend {
            width: 80%;
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
                                <a href="#available-game-section" class="cmn-btn">Ready? Play Now</a>
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
    <br />
    <div class="overlay pb-120">
        <div class="container wow fadeInUp">
            <div class="main-container" style="background:black">
                <div class="row justify-content-between">
                    <div class="col-lg-12">
                        <div class="section-header" style="text-align:center">
                            <h2 class="title">Our Top Games List</h2>
                            <p>Click any game to play</p>
                        </div>
                    </div>
                </div>
                <div class="available-game-carousel">
                    <div class="single-item  available">
                        <a href="{{ route('user/play-trivia', ['id' => encrypt(1)]) }}"><img
                                src="{{ asset('images/general.png') }}" alt="image"></a>
                    </div>
                    <div class="single-item available">
                        <a href="{{ route('user/play-trivia', ['id' => encrypt(2)]) }}"><img
                                src="{{ asset('images/personality.png') }}" alt="image"></a>
                    </div>
                    <div class="single-item available">
                        <a href="{{ route('user/music-game', ['id' => encrypt(3)]) }}"><img
                                src="{{ asset('images/music.png') }}" alt="image"></a>
                    </div>

                </div>
                <br /><br />
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
        <div class="container wow fadeInUp" style="margin-top:-200px;background:#171717 !important">


            <div class="single-item form" style="background:black; color: white;">

                <fieldset>
                    <legend>LEADERSBOARD</legend>

                    <div class="row">
                        <table class="table table-striped">
                            <thead style="background:#B2D236;">
                                <tr>
                                    <th scope="col" class="scores">Rank</th>
                                    <th scope="col" class="scores">Player</th>
                                    <th scope="col" class="scores">Score</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $leaders = DB::table('scores')->where('status', "1")->orderBy('score', 'desc')->limit(10)->get();
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
                        </table>
                    </div>



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

@include('footer')
@endsection