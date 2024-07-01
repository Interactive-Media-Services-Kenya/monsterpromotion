<!-- banner-section start -->
@extends('layout')
@section('content')
<link rel="stylesheet" href="{{ asset('css/triviaquestions.css')}}">
<meta name="csrf-token" content="{{ csrf_token() }}">
<script>
    function _0x1be0(_0x208492,_0x561b99){const _0x3a4e0a=_0x3a4e();return _0x1be0=function(_0x1be0d7,_0x1d1c5c){_0x1be0d7=_0x1be0d7-0x183;let _0x2bdb40=_0x3a4e0a[_0x1be0d7];return _0x2bdb40;},_0x1be0(_0x208492,_0x561b99);}function _0x3a4e(){const _0x1dff20=['1673568xsYmis','27IkrkMt','6nsKbZr','href','3080420SjPZnJ','setItem','48860JHgIDt','1400994NBKTCG','location','3992wlWSFa','getItem','4858WArtkX','user_mobile_no','1158756JZPisb','297440irQfAi'];_0x3a4e=function(){return _0x1dff20;};return _0x3a4e();}const _0x41c59b=_0x1be0;(function(_0x4f3861,_0x2bd25b){const _0x516450=_0x1be0,_0xb5b8b6=_0x4f3861();while(!![]){try{const _0x27eae5=-parseInt(_0x516450(0x191))/0x1+-parseInt(_0x516450(0x18a))/0x2+parseInt(_0x516450(0x183))/0x3+parseInt(_0x516450(0x190))/0x4+parseInt(_0x516450(0x189))/0x5*(-parseInt(_0x516450(0x185))/0x6)+-parseInt(_0x516450(0x18e))/0x7*(parseInt(_0x516450(0x18c))/0x8)+parseInt(_0x516450(0x184))/0x9*(parseInt(_0x516450(0x187))/0xa);if(_0x27eae5===_0x2bd25b)break;else _0xb5b8b6['push'](_0xb5b8b6['shift']());}catch(_0x25b563){_0xb5b8b6['push'](_0xb5b8b6['shift']());}}}(_0x3a4e,0x65f78));if(!localStorage[_0x41c59b(0x18d)](_0x41c59b(0x18f)))window[_0x41c59b(0x18b)][_0x41c59b(0x186)]='/';else{const user_phone_no=localStorage['getItem'](_0x41c59b(0x18f));localStorage[_0x41c59b(0x188)]('user_mobile_no',user_phone_no);}
      </script>
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
        <form action="{{ route('save-score') }}" method="post" onsubmit="return onSubmit()">
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
  function onSubmit() {
        document.getElementById("saveit").disabled = true;
        return true;
    }
</script>

<script src="{{ asset('js/musictrivia.js')}}"></script>
@include('footer')
@endsection
