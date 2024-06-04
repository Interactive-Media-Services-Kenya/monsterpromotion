<!-- banner-section start -->
@extends('layout')
@section('content')
    <style>
        @media (max-width: 998px) {
            .section-header {
                margin-top: 40px !important;
                margin-bottom: 40px;
            }
        }

        body.modal-open {
            overflow: hidden;
            /* Prevent scrolling */
        }

        body.modal-open>*:not(.modal) {
            display: none;
            /* Hide all content except the modal */
        }

        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
            text-align: center;
            /* Center horizontally */
        }

        .modal-content {
            background-color: #fefefe;
            margin: 0 auto;
            /* Center horizontally */
            margin-top: 20%;
            /* Adjust vertical position */
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
            /* Limit maximum width */
            display: inline-block;
            /* Allows centering with margin: auto */
        }

        @media (max-width: 998px) {
            .modal-content {

                margin-top: 50%;

            }
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        /* Countdown styles */
        .countdown {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 24px;
        }

        #tournaments-section .single-item .title-bottom {
            border-bottom: 1px solid #32286D;
            margin-top: 10px;
            padding-bottom: 15px;
        }

        .radio-button {
            display: inline-block;
            padding: 10px 20px;
            width: 100%;
            border: none;
            background-color: #acd038;
            color: white;
            border: 1px solid #acd038;
            cursor: pointer;
            text-align: center;
             margin-right: 10px;
        }

        .radio-button:hover {
            background-color: #111;
        }

        .countdown-circle {
            display: inline-block;
            width: 50px;
            /* Adjust size as needed */
            height: 50px;
            /* Adjust size as needed */
            background-color: #56be78;
            color: white;
            border-radius: 50%;
            font-size: 20px;
            line-height: 50px;
            /* Center text vertically */
            text-align: center;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --progress-bar-width: 100px;
            --progress-bar-height: 100px;
            --font-size: 2rem;
        }


        .circular-progress {
            width: var(--progress-bar-width);
            height: var(--progress-bar-height);
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .inner-circle {
            position: absolute;
            width: calc(var(--progress-bar-width) - 30px);
            height: calc(var(--progress-bar-height) - 30px);
            border-radius: 50%;
            background-color: lightgrey;
        }

        .percentage {
            position: relative;
            font-size: var(--font-size);
            color: #56be78;
        }

        @media screen and (max-width: 800px) {
            :root {
                --progress-bar-width: 150px;
                --progress-bar-height: 150px;
                --font-size: 1.3rem;
            }
        }

        @media screen and (max-width: 500px) {
            :root {
                --progress-bar-width: 120px;
                --progress-bar-height: 120px;
                --font-size: 1rem;
            }
        }



        #question2-container,
        #question3-container {
            display: none;
            /* Hide additional questions initially */
        }


        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
            text-align: center;
            /* Center horizontally */
        }

        .modal-content {
            background-color: #fefefe;
            margin: 0 auto;
            /* Center horizontally */
            margin-top: 10%;
            /* Adjust vertical position */
            padding: 20px;
            border: 1px solid #888;
            width: 100%;
            /* max-width: 500px; */
            /* height: 100%; */
            /* Limit maximum width */
            display: inline-block;
            /* Allows centering with margin: auto */
        }

        @media (max-width: 998px) {
            .modal-content {

                margin-top: 50%;

            }
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
        #loader2 {
    display: none; /* Initially hide the loader */
    position: fixed;
    z-index: 9999;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: black;
    text-align: center;
}

#loader2 img {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
#loader2 #loadd {
    position: absolute;
    top: 60%;
    left: 52%;
    transform: translate(-60%, -52%);
}
@keyframes flyIn {
    0% {
        opacity: 0;
        transform: translateY(-50px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}

.question-container {
    animation: flyIn 0.5s ease forwards;
}

.radio-button {
    animation: flyIn 0.5s ease forwards;
    animation-delay: 0.2s; /* Delay each radio button animation */
}
@keyframes blink {
    0% { background-color: #ed902e; border-color: #ed902e; }
    50% { background-color: transparent; border-color: transparent; }
    100% { background-color: #ed902e; border-color: #ed902e; }
}

.blinking {
    animation: blink 0.5s infinite; /* Adjusted duration to blink faster */
}
.user-selected {
    background-color: blue;
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
        .inputt {
            margin-right: 5px;
            display: inline-block;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            color: white;
            border:#FDFD96;
            background: #acd038;
            text-align: center;
            line-height: 100px;
            margin-right: 5px;

            font-weight: bold;
            font-size: 23px;
        }
        @media (max-width: 998px) {
            .inputt {
            margin-right: 5px;
            display: inline-block;
            width: 120px;
            height: 120px;
            border-radius: 50%;
            color: white;
            border:#acd038;
   
            background: #acd038;
            text-align: center;
            line-height: 120px;
            margin-right: 5px;

            font-weight: bold;
            font-size: 23px;
        }
        }
        .spacer {
    width: 20px; 
}
.overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: transparent;
    z-index: 999; 
    pointer-events: auto;
}

    </style>
<meta name="csrf-token" content="{{ csrf_token() }}"> 
<script>
// console.log('sds'+localStorage.getItem('user_mobile_no'))
if(!localStorage.getItem('user_mobile_no')){

window.location.href="/";
}else{
    const user_phone_no=localStorage.getItem('user_mobile_no');
    console.log(user_phone_no);
}
</script>
    <!-- Modal -->
    <div id="balloon-container"  style="z-index: 0">
    </div>
    <div id="loader2">
        <img
        src="https://www.monsterenergy.com/img/home/monster-logo.png" alt="site-logo"> 
        <p   id="loadd" style="color:white">Loading Next Question....</p>
    </div>

    <div id="myModal" class="modal">
        <div class="modal-content">
            <img src="https://www.monsterenergy.com/img/home/monster-logo.png" alt="site-logo">
            {{-- <span class="close">&times;</span> --}}
            <p style="color:#56be78"><b>CONGRATULATIONS YOU GOT <span style="color:black" id="scored">  <span
                            style="color:black">POINTS</span></b></p>
            <br />
            <p style="color:black">Enter details below to save your score</p><br />
            <form action="{{ route('save-score') }}" method="post">
                @csrf
                <div class="subscribe">
                    <input type="text" name="username" placeholder="Enter Fullname">
                    <input type="hidden" id="total_score" name="score" value="" placeholder="Enter Fullname"><br/>
                    <input type="hidden" id="total_questions" name="total_questions" value=""
                        placeholder="Enter Fullname">
                        <input type="hidden" id="userr_phone" name="phone" value=""
                        placeholder="Enter Fullname">
                </div>
                <div class="subscribe" style="margin-top:10px">
                    
                    <br />
                    <button type="submit" id="saveit" class="btn btn-primary btn-play"
                        style="margin-top:20px;width:100%;background:#171717;border:none">SAVE SCORE</button>
                        <button type="submit" id="dontsave"  class="btn btn-primary btn-play"
                        style="margin-top:20px;width:100%;background:rgb(136, 64, 64);border:none">DONT SAVE</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Browse Tournaments start -->
    <section id="tournaments-section">
        <!-- Overlay with countdown timer -->
        <div class=" pt-120 pb-120">
            <div class="container wow fadeInUp">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8 text-center">
                        <div class="section-header">
                            <h2 class="title">QUESTION <span id="question-number"></span> / <span>10</span></h2>

                            <audio id="beepAudio" controls style="display: none;">
                                <source src="{{ asset('monster.wav') }}" type="audio/wav">
                                <source src="{{ asset('monster.wav') }}" type="audio/mpeg">
                                Your browser does not support the audio element.
                            </audio>
                        </div>
                    </div>
                </div>

                <div class="single-item">
                    <div class="row">
                        <div class="col-lg-9 col-md-9 d-flex align-items-center">
                            <div class="mid-area">
                                {{-- <h4>ATTEMPT THE TRIVIA</h4> --}}
                                <div class="title-bottom " id="question-container">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 d-flex align-items-center">
                            <div class="prize-area text-center">
                                <div class="contain-area d-flex justify-content-center align-items-center">
                                    <div class="circular-progress" data-inner-circle-color="lightgrey" data-percentage="100" data-progress-color="crimson" data-bg-color="#b2d236">
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

    <script>
        const modal = document.getElementById('myModal');
        const body = document.body;
        startCountdownAndProgressBar(60);

        function startCountdownAndProgressBar(duration) {
            var timer = duration;
            var progressBar = document.querySelectorAll(".circular-progress");

            var interval = setInterval(function() {
                // Update countdown timer
                var countdownElement = document.querySelector('.time-countdown');
                if (countdownElement) {
                    countdownElement.textContent = timer;
                }
                // Update progress bar
                progressBar.forEach(function(progressBar) {
                    var innerCircle = progressBar.querySelector(".inner-circle");
                    var progressColor = progressBar.getAttribute("data-progress-color");
                    var endValue = Number(progressBar.getAttribute("data-percentage"));
                    var startValue = duration - timer;
                    var progressPercentage = (startValue / duration) * 100;

                    innerCircle.style.color = progressColor;
                    innerCircle.style.backgroundColor = progressBar.getAttribute(
                        "data-inner-circle-color");
                    progressBar.style.background =
                        `conic-gradient(${progressColor} ${progressPercentage}%, ${progressBar.getAttribute("data-bg-color")} ${progressPercentage}% 100%)`;
                    // If timer reaches 0, clear interval and redirect
                    if (timer <= 0) {
                        clearInterval(interval);
                        modal.style.display = 'block';
                        body.classList.add('modal-open');
                        console.log(localStorage.getItem('question_answers'));
                        var data = JSON.parse(localStorage.getItem('question_answers'));
                        var totalQuestions = data.length;
                        let correctAnswers = 0;
                        data.forEach(item => {
                            if (item.selectedAnswer === item.correct_score) {
                                correctAnswers++;
                            }
                        });
                        document.getElementById('scored').innerText = correctAnswers + ' POINTS';
                        document.getElementById('total_score').value = correctAnswers;
                        document.getElementById('total_questions').value = totalQuestions;
                    }
                });

                timer--;
            }, 1000);
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var user_phone_no = localStorage.getItem('user_mobile_no');
    document.getElementById('userr_phone').value = user_phone_no;
            // Add event listener to the form submission
            document.querySelector('form').addEventListener('submit', function(event) {
                event.preventDefault();
                var username = document.querySelector('input[name="username"]').value;
                var user_phone_no=localStorage.getItem('user_mobile_no');
                var phone = user_phone_no;
               
                localStorage.setItem('user_phone',phone);
                if (username.trim() === '') {
                    alert('Please enter your full name.');
                } else {
                    this.submit();
                }
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            // Fetch the first question when the page loads
            fetchQuestion();
            // Add event listeners to radio buttons
            document.addEventListener('change', function(event) {
                if (event.target.matches('input[type="radio"]')) {
                    var selectedAnswer = event.target.value;
                    var selectedQuestionId = event.target.getAttribute('data-question');
                    // Show the loader
                    fetchQuestion(selectedQuestionId, selectedAnswer); // Fetch the next question
                }
            });
        });
        function fetchQuestion1(questionId = null, selectedAnswer = null, correctAnswer = null) {
    if (questionId && selectedAnswer) {
        // console.log('sas');
        // Highlight correct answer elements
        var correctElements = document.querySelectorAll('.correct-answer');
        correctElements.forEach(function(element) {
            element.classList.add("blinking");
        });

var overlay = document.createElement('div');
overlay.classList.add('overlay');
document.body.appendChild(overlay);
          if(selectedAnswer===correctAnswer){
            var successSound = new Audio('{{ asset('correct.mp3') }}');
             successSound.play();
             var currentCount = parseInt(document.getElementById('points-earned').innerText);
              document.getElementById('points-earned').innerText = currentCount + 1;
         
          }else{
            var wrongSound = new Audio('{{ asset('wrong.mp3') }}');
             wrongSound.play();
          }
        setTimeout(function() {
            fetchQuestion(questionId, selectedAnswer, correctAnswer);
            overlay.remove();
        }, 1000); 
    }
}
        function fetchQuestion(questionId = null, selectedAnswer = null, correctAnswer = null) {
            var user_phone_no=localStorage.getItem('user_mobile_no');
    var xhr = new XMLHttpRequest();
    var url = '/user/select-question?user_code='+user_phone_no;
    
    if (questionId && selectedAnswer) {
        var questions = JSON.parse(localStorage.getItem('question_answers')) || [];
        questions.push({
            trivia_type: 'personality',
            questionId: questionId,
            selectedAnswer: selectedAnswer,
            correct_score: correctAnswer
        });
       
        localStorage.setItem('question_answers', JSON.stringify(questions));
        url +=`&questionId=${questionId}&selectedAnswer=0&user_code=${user_phone_no}`;
    }else{
        if(questionId){
            url +=`&questionId=${questionId}&selectedAnswer=0&user_code=${user_phone_no}`;
        }

    }
    console.log(url);
    xhr.open('GET', url, true);

    xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 400) {
            removeBalloons();
            var questionData = JSON.parse(xhr.responseText);
            if (questionData.question) {
                localStorage.setItem('last_question',questionData.id);
                updateQuestion(questionData);
                document.getElementById('loader2').style.display = 'none';
            } else {
                document.getElementById('loader2').style.display = 'none';
                modal.style.display = 'block';
                body.classList.add('modal-open');
                const data = JSON.parse(localStorage.getItem('question_answers'));
                const totalQuestions = data.length;
                let correctAnswers = 0;
                data.forEach(item => {
                    if (item.selectedAnswer == item.correct_score) {
                        correctAnswers++;
                    }
                });
                document.getElementById('scored').innerText = correctAnswers;
                document.getElementById('total_score').value = correctAnswers;
                document.getElementById('total_questions').value = totalQuestions;
            }
        } else {
            console.error('Request failed: ' + xhr.statusText);
        }
    };
    xhr.onerror = function() {
        console.error('Request failed');
    };
    xhr.send();
}

function showCongratulationRibbons() {
    console.log("Congratulations! You selected the correct answer.");
}

            let questionCounter = 1;
     
            function updateQuestion(questionData) {
                if(questionCounter==11){
                        modal.style.display = 'block';
                        body.classList.add('modal-open');
                        console.log(localStorage.getItem('question_answers'));
                        var data = JSON.parse(localStorage.getItem('question_answers'));
                        var totalQuestions = data.length;
                        let correctAnswers = 0;
                        data.forEach(item => {
                            if (item.selectedAnswer === item.correct_score) {
                                correctAnswers++;
                            }
                        });
                        document.getElementById('scored').innerText = correctAnswers + ' POINTS';
                        document.getElementById('total_score').value = correctAnswers;
                        document.getElementById('total_questions').value = totalQuestions;
                }
                localStorage.setItem('last_question',questionData.id);
    var questionContainer = document.getElementById('question-container');
    questionContainer.innerHTML = '';
    var questionElement = document.createElement('div');
    questionElement.innerHTML = `
        <p>${questionData.question}</p>
        <br />
        <div style="color:white">
            <input type="radio" style="display: none;" name="answer" value="${questionData.choice_A}" data-question="${questionData.id}">
            <label for="${questionData.id}_${questionData.choice_A}" onclick="fetchQuestion1(${questionData.id}, 'A', '${questionData.correct_answer}')" class="radio-button ${questionData.correct_answer=='A' ? 'correct-answer' : 'incorrect'}">${questionData.choice_A}</label>
        </div>
        <div style="color:white">
            <input type="radio" style="display: none;" name="answer" value="${questionData.choice_B}" data-question="${questionData.id}">
            <label for="${questionData.id}_${questionData.choice_B}" onclick="fetchQuestion1(${questionData.id},'B','${questionData.correct_answer}')" class="radio-button ${questionData.correct_answer=='B' ? 'correct-answer' : 'incorrect'}">${questionData.choice_B}</label>
        </div>
        <div style="color:white">
            <input type="radio" style="display: none;" name="answer" value="${questionData.choice_C}" data-question="${questionData.id}">
            <label for="${questionData.id}_${questionData.choice_C}" onclick="fetchQuestion1(${questionData.id},'C','${questionData.correct_answer}')" class="radio-button ${questionData.correct_answer=='C' ? 'correct-answer' : 'incorrect'}">${questionData.choice_C}</label>
        </div>
        <div style="color:white">
            <input type="radio" style="display: none;" name="answer" value="${questionData.choice_D}" data-question="${questionData.id}">
            <label for="${questionData.id}_${questionData.choice_D}" onclick="fetchQuestion1(${questionData.id},'D','${questionData.correct_answer}')" class="radio-button ${questionData.correct_answer=='D' ? 'correct-answer' : 'incorrect'}">${questionData.choice_D}</label>
        </div>
    `;
    questionContainer.appendChild(questionElement);
    document.getElementById('question-number').textContent = questionCounter;
    questionCounter++; // Increment the counter for the next question
}
        document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('saveit').addEventListener('click', function(event) {
        // Retrieve the item from localStorage
        var questionAnswers = localStorage.getItem('question_answers');
        var u_phone= localStorage.getItem('user_mobile_no');
        var dataToSend = {
        questionAnswers: questionAnswers,
         user_phone: localStorage.getItem('user_mobile_no')
    };
        // Check if the item exists
        if (questionAnswers) {
            var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            // Send the data to the backend
            fetch('save-quiz-answers', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({dataToSend})
            })
            .then(response => {
                if (response.ok) {
                    console.log('Data sent successfully to the backend');
                    localStorage.removeItem('question_answers');
                } else {
                    localStorage.removeItem('question_answers');
                    console.error('Failed to send data to the backend');
                }
            })
            .catch(error => {
                console.error('Error sending data to the backend:', error);
            });
        } else {
            console.error('No data found in localStorage');
        }
    });
    document.getElementById('dontsave').addEventListener('click', function(event) {
        event.preventDefault();
        localStorage.removeItem('question_answers');
        window.location.href = '/leaders-board';
    });
});

    </script>
 <script>
    const balloonContainer = document.getElementById("balloon-container");
    function random(num) {
        return Math.floor(Math.random() * num);
    }
    function getRandomStyles() {
        var mt = random(200);
        var ml = random(50);
        var dur = random(5) + 5;
        var width = 30;
        var height = 50;
        if (window.innerWidth < 768) {
            width = 30; // Adjust width for small screens
            height = 50; // Adjust height for small screens
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
            "https://cdn-icons-png.flaticon.com/512/8983/8983219.png",
           
        ];
        for (var i = num; i > 0; i--) {
            var balloon = document.createElement("img");
            balloon.className = "balloon";
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
        }, 100);
    }
</script>
    @include('footer');
@endsection
