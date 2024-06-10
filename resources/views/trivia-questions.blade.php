<!-- banner-section start -->
@extends('layout')
@section('content')
<link rel="stylesheet" href="{{ asset('css/triviaquestions.css')}}">
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Modal -->
<div id="balloon-container" style="z-index: 0">
</div>
<div id="loader2">
    <img src="https://www.monsterenergy.com/img/home/monster-logo.png" alt="site-logo">
    <p id="loadd" style="color:white">Loading Next Question....</p>
</div>
<div id="myModal" class="modal">
    <div class="modal-content">
        <img src="https://www.monsterenergy.com/img/home/monster-logo.png" alt="site-logo">
        {{-- <span class="close">&times;</span> --}}
        <p style="color:#56be78"><b>CONGRATULATIONS YOU GOT <span style="color:black" id="scored"> <span
                        style="color:black">POINTS</span></b></p>
        <br />
        <p style="color:black">Enter details below to save your score</p><br />
        <form action="{{ route('save-score') }}" method="post">
            @csrf
            <div class="subscribe">
                <input type="text" name="username" placeholder="Enter Fullname">
                <input type="hidden" id="total_score" name="score" value=""><br />
                <input type="hidden" id="total_questions" name="total_questions" value="">
                <input type="hidden" id="userr_phone" name="phone" value="">
            </div>
            <div class="subscribe" style="margin-top:10px">
                <br />
                <button type="submit" id="saveit" class="btn btn-primary btn-play"
                    style="margin-top:20px;width:100%;background:#171717;border:none">SAVE SCORE</button>
                <button type="submit" id="dontsave" class="btn btn-primary btn-play"
                    style="margin-top:20px;width:100%;background:rgb(136, 64, 64);border:none">DONT SAVE</button>
            </div>
        </form>
    </div>
</div>

<!-- Browse Tournaments start -->
<section id="tournaments-section" style="background:#171717;margin-top:50px !important;">
    <!-- Overlay with countdown timer -->
    <div class=" pt-120 pb-120">
        <div class="container wow fadeInUp">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="section-header">
                        <h2 class="title">QUESTION <span id="question-number"></span> / <span>10</span></h2>

                    </div>
                </div>
            </div>
            <div class="single-item" style="background:black">
                <div class="row">
                    <div class="col-lg-9 col-md-9 d-flex align-items-center">
                        <div class="mid-area">
                            <div class="title-bottom " id="question-container">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 d-flex align-items-center">
                        <div class="prize-area text-center">
                            <div class="contain-area d-flex justify-content-center align-items-center">
                                <div class="circular-progress" data-inner-circle-color="lightgrey" data-percentage="100"
                                    data-progress-color="crimson" data-bg-color="#b2d236">
                                    <div class="inner-circle"></div>
                                    <p class="percentage time-countdown">60</p>
                                </div>
                                <div class="spacer"></div> <!-- Add a spacer -->
                                <span class="inputt" id="points-earned">0</span> <!-- Adjust padding-top as needed -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Browse Tournaments end -->
<script src="{{ asset('js/playtrivia.js')}}"></script>

@include('footer')
@endsection