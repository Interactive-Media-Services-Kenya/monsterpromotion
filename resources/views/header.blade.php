<!-- header-section start -->
<style>
    #header-section .header-area {
        margin-left: 0;
        margin-right: 0;
        border-bottom: 1px solid #4543A9;
        background: #171717;
    }
</style>
<header id="header-section" style="background:#171717 !important">

    <div class="overlay">
        <div class="container">
            <div class="row d-flex header-area">
                <div class="logo-section flex-grow-1 d-flex align-items-center">
                    <a class="site-logo site-title" href="/user/play-games"><img
                            src="https://www.monsterenergy.com/img/home/monster-logo.png" alt="site-logo"></a>
                </div>
                <button class="navbar-toggler ml-auto collapsed" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
                <nav class="navbar navbar-expand-lg p-0">
                    <div class="navbar-collapse collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav main-menu ml-auto">
                            <li><a href="/user/play-games" class="active">Home</a></li>

                            <li><a href="{{ route('user/play-trivia', ['id' => 1]) }}">General Quiz</a></li>
                            <li><a href="{{ route('user/play-trivia', ['id' => 2]) }}">Personality Quiz</a></li>
                            <li><a href="{{ route('user/music-game') }}">Music Game</a></li>
                            <li><a href="{{ route('leaders-board')}}">Leaders Board</a></li>
                            <li><a href="">Contact Us</a></li>
                        </ul>
                    </div>
                </nav>
                <div class="right-area header-action d-flex align-items-center">
                    <!-- <div class="search-icon">
                        <a href="/user/play-games"><img src="{{ asset('images/gYeZVMgEQGyP.png') }}" alt="icon"></a>
                    </div> -->
                    <div class="lang d-flex align-items-center">
                        <select>
                            <option value="1">EN</option>
                            <option value="2">BN</option>
                            <option value="3">ES</option>
                            <option value="4">NL</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>