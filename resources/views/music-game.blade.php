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
        <p style="color:#56be78"><b>CONGRATULATIONS <span id="playerName" style="color:black"></span> </b></p>
        <br />
        <p style="color:#56be78"><b>YOU GOT </b><span style="color:black" id="scored">0 <span
                    style="color:black">POINTS</span>
        </p>
        <form action="{{ route('save-score') }}" method="post">
            @csrf
            <input type="hidden" name="username" id="username" placeholder="Enter Fullname">
            <input type="hidden" id="total_score" name="score" value="0"><br />
            <input type="hidden" id="total_questions" name="total_questions" value="">
            <input type="hidden" id="userr_phone" name="phone" value="">
            <div class="subscribe" style="margin-top:10px">
                <button type="submit" id="saveit" class="btn btn-primary btn-play"
                    style="margin-top:20px;width:100%;background:#171717;border:none">VIEW RANKING</button>

            </div>
        </form>
    </div>
</div>

<!-- Browse Tournaments start -->
<section id="tournaments-section" style="background:#171717;margin-top:50px">
    <!-- Overlay with countdown timer -->
    <div class=" pt-120 pb-120">
        <div class="container wow fadeInUp">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="section-header">
                        <h2 class="title">QUESTION <span id="question-number"></span></h2>
                        <audio id="beepAudio" controls style="display: none;">
                            <source src="{{ asset('monster.wav') }}" type="audio/wav">
                            <source src="{{ asset('monster.wav') }}" type="audio/mpeg">
                            Your browser does not support the audio element.
                        </audio>
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
<?php
$categoryId = encrypt(3);  ?>
<!-- Browse Tournaments end -->
<script>
    var categoryId = '<?= $categoryId ?>';
</script>
<script>
  var _0xc197bf=_0x5ba0;(function(_0x330884,_0x1b9443){var _0x8015b0=_0x5ba0,_0x1ee8d6=_0x330884();while(!![]){try{var _0x53f1ba=parseInt(_0x8015b0(0x197))/0x1*(-parseInt(_0x8015b0(0x18c))/0x2)+parseInt(_0x8015b0(0x193))/0x3*(parseInt(_0x8015b0(0x18a))/0x4)+parseInt(_0x8015b0(0x191))/0x5+-parseInt(_0x8015b0(0x190))/0x6*(-parseInt(_0x8015b0(0x18e))/0x7)+parseInt(_0x8015b0(0x18f))/0x8*(-parseInt(_0x8015b0(0x188))/0x9)+-parseInt(_0x8015b0(0x195))/0xa+-parseInt(_0x8015b0(0x189))/0xb*(-parseInt(_0x8015b0(0x194))/0xc);if(_0x53f1ba===_0x1b9443)break;else _0x1ee8d6['push'](_0x1ee8d6['shift']());}catch(_0x20bec1){_0x1ee8d6['push'](_0x1ee8d6['shift']());}}}(_0xccaf,0x6deeb));function _0xccaf(){var _0x5dafe9=['1129330OPEPlC','playerName','141QoOGtm','5160BIUtUE','3585220LOePfj','username','415xDVdKE','1964988zOzKHl','21329MxGlcW','7484vFYzLF','getItem','1496anDwVu','getElementById','49847kDbsjE','24RxUkzw','528rNyqMV'];_0xccaf=function(){return _0x5dafe9;};return _0xccaf();}function _0x5ba0(_0x80d972,_0x5c0e2f){var _0xccaf34=_0xccaf();return _0x5ba0=function(_0x5ba0b7,_0x1784bc){_0x5ba0b7=_0x5ba0b7-0x188;var _0x26eb70=_0xccaf34[_0x5ba0b7];return _0x26eb70;},_0x5ba0(_0x80d972,_0x5c0e2f);}var usernameInput=document[_0xc197bf(0x18d)]('username');usernameInput['value']=localStorage[_0xc197bf(0x18b)](_0xc197bf(0x196)),document['getElementById'](_0xc197bf(0x192))['textContent']=localStorage[_0xc197bf(0x18b)](_0xc197bf(0x196));
</script>
<script>
</script>
<script src="{{ asset('js/musictrivia.js')}}"></script>
@include('footer')
@endsection
