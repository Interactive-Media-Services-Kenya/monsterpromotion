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

        /* Overlay styles */
        .overlaid {
            display: none;
            position: fixed;
            z-index: 200;
            width: 100%;
            height: 100%;
            background: red;
            top: 0;
            left: 0;
            z-index: 100;
            background-color: rgba(0, 0, 0, 0.5);
            text-align: center;
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
            text-align: center margin-right: 10px;
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
            color: rgb(0, 0, 0, 0.8);
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
    </style>

    <!-- Modal -->
    <div id="loader2">
        <img
        src="https://www.monsterenergy.com/img/home/monster-logo.png" alt="site-logo"> 
        <p   id="loadd" style="color:white">Loading Next Question....</p>
    </div>

    <div id="myModal" class="modal">
        <div class="modal-content">
            <img src="https://www.monsterenergy.com/img/home/monster-logo.png" alt="site-logo">
            {{-- <span class="close">&times;</span> --}}
            <p style="color:#56be78"><b>CONGRATULATIONS YOU GOT <span style="color:black" id="scored"> <span
                            style="color:black">POINTS</span></b></p>
            <br />
            <p style="color:black">Enter details below to save your score</p><br />
            <form action="{{ route('save-score') }}">
                @csrf
                <div class="subscribe">
                    <input type="text" name="username" placeholder="Enter Fullname">
                    <input type="hidden" id="total_score" name="score" value="" placeholder="Enter Fullname"><br/>
                    <input type="hidden" id="total_questions" name="total_questions" value=""
                        placeholder="Enter Fullname">
                </div>
                <div class="subscribe" style="margin-top:10px">
                    <input type="number" name="phone" placeholder="Enter Phone No">
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



        <div class="overlay pt-120 pb-120">
            <div class="container wow fadeInUp">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8 text-center">
                        <div class="section-header">
                            <h2 class="title">QUESTION</h2>
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
                                    <!-- Added d-flex and justify-content-center align-items-center -->
                                    <div class="circular-progress" data-inner-circle-color="lightgrey" data-percentage="100"
                                        data-progress-color="crimson" data-bg-color="black">
                                        <div class="inner-circle"></div>
                                        <p class="percentage time-countdown">60</p>
                                    </div>
                                    <br />
                                    <!-- Move the class here -->

                                </div>
                                <span style="padding-top:-200px !important">1 Points</span>
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
                        document.getElementById('scored').innerText = correctAnswers + 'POINTS';
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
    // Add event listener to the form submission
    document.querySelector('form').addEventListener('submit', function(event) {
        // Prevent the default form submission behavior
        event.preventDefault();
        
        // Validate the input fields
        var username = document.querySelector('input[name="username"]').value;
        var phone = document.querySelector('input[name="phone"]').value;
        
        if (username.trim() === '' || phone.trim() === '') {
            // If any input field is empty, display an alert message
            alert('Please enter your full name and phone number.');
        } else {
            // If all input fields are filled, submit the form
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

        function fetchQuestion(questionId = null, selectedAnswer = null, correctAnswer = null) {
            disableRadioButtons();
            document.getElementById('loader2').style.display = 'block';
            var xhr = new XMLHttpRequest();
            var url = '/user/select-question';

            if (questionId && selectedAnswer) {
                // Save question ID and selected answer in localStorage
                var questions = JSON.parse(localStorage.getItem('question_answers')) || [];
                questions.push({
                    trivia_type: 'personality',
                    questionId: questionId,
                    selectedAnswer: selectedAnswer,
                    correct_score: correctAnswer
                });
                localStorage.setItem('question_answers', JSON.stringify(questions));
                url += `?questionId=${questionId}&selectedAnswer=${selectedAnswer}`;
            }

            xhr.open('GET', url, true);

            xhr.onload = function() {
                if (xhr.status >= 200 && xhr.status < 400) {
                    var questionData = JSON.parse(xhr.responseText);
                    if (questionData.question) {

                        updateQuestion(questionData);
                        // Hide the loader
                        document.getElementById('loader2').style.display = 'none';

                    } else {
                        document.getElementById('loader2').style.display = 'none';

                        modal.style.display = 'block';
                        body.classList.add('modal-open');
                        console.log(localStorage.getItem('question_answers'));

                        const data = JSON.parse(localStorage.getItem('question_answers'));
                        const totalQuestions = data.length;
                        let correctAnswers = 0;

                        data.forEach(item => {
                            if (item.selectedAnswer === item.correct_score) {
                                correctAnswers++;
                            }
                        });
                        document.getElementById('scored').innerText = correctAnswers;
                        document.getElementById('total_score').value =correctAnswers;
                        document.getElementById('total_questions').value = totalQuestions;
                        // window.location.href = '/another-route';
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
        function disableRadioButtons() {
    var radioButtons = document.querySelectorAll('input[type="radio"]');
    radioButtons.forEach(function(radioButton) {
        radioButton.disabled = true;
    });
}
        function updateQuestion(questionData) {
            var questionContainer = document.getElementById('question-container');
            questionContainer.innerHTML = '';
            var questionElement = document.createElement('div');
            questionElement.innerHTML = `
            <p>${questionData.question}</p>
            <br />
            <div style="color:white">
                <input type="radio" style="display: none;"  name="answer" value="${questionData.choice_A}" data-question="${questionData.id}">
                <label for="${questionData.id}_${questionData.choice_A}" onclick="fetchQuestion(${questionData.id}, 'A', '${questionData.correct_answer}')" class="radio-button">${questionData.choice_A}</label>
            </div>
            <div style="color:white">
                <input type="radio"  style="display: none;" name="answer" value="${questionData.choice_B}" data-question="${questionData.id}">
                <label for="${questionData.id}_${questionData.choice_B}" onclick="fetchQuestion(${questionData.id},'B','${questionData.correct_answer}')" class="radio-button">${questionData.choice_B}</label>
            </div>
            <div style="color:white">
                <input type="radio" style="display: none;"  name="answer" value="${questionData.choice_C}" data-question="${questionData.id}">
                <label for="${questionData.id}_${questionData.choice_C}" onclick="fetchQuestion(${questionData.id},'C','${questionData.correct_answer}')" class="radio-button">${questionData.choice_C}</label>
            </div>
            <div style="color:white">
                <input type="radio" style="display: none;"  name="answer" value="${questionData.choice_D}" data-question="${questionData.id}">
                <label for="${questionData.id}_${questionData.choice_D}" onclick="fetchQuestion(${questionData.id},'D','${questionData.correct_answer}')"  class="radio-button">${questionData.choice_D}</label>
            </div>
        `;
            questionContainer.appendChild(questionElement);
        }

        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('saveit').addEventListener('click', function(event) {
        localStorage.removeItem('question_answers');
    });
    document.getElementById('dontsave').addEventListener('click', function(event) {
        event.preventDefault();
        
        localStorage.removeItem('question_answers');
        
        window.location.href = '/';
    });
});

    </script>
 <script>
// document.addEventListener('DOMContentLoaded', function() {
//     // Add an event listener to play audio when the document is clicked
//     document.addEventListener('click', function() {
//         var audio = document.getElementById('beepAudio');
//         audio.play();
//     });
// });

</script>

    @include('footer');
@endsection
