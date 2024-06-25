if (!localStorage.getItem('user_mobile_no')) {
  window.location.href = "/";
} else {
  const user_phone_no = localStorage.getItem('user_mobile_no');
  localStorage.setItem('user_mobile_no', user_phone_no);
}

const modal = document.getElementById('myModal');
const body = document.body;
startCountdownAndProgressBar(60);
function startCountdownAndProgressBar(duration) {
  var timer = duration;
  var progressBar = document.querySelectorAll(".circular-progress");

  var interval = setInterval(function () {
    // Update countdown timer
    var countdownElement = document.querySelector('.time-countdown');
    if (countdownElement) {
      countdownElement.textContent = timer;
    }
    // Update progress bar
    progressBar.forEach(function (progressBar) {
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
        var data = JSON.parse(localStorage.getItem('question_answers'));
        var totalQuestions = data.length;
        let correctAnswers = 0;
        data.forEach(item => {
          if (item.selectedAnswer === item.correct_score) {
            correctAnswers++;
          }
        });
        document.getElementById('total_questions').value = totalQuestions;
      }
    });

    timer--;
  }, 1000);
}

document.addEventListener('DOMContentLoaded', function () {
    console.log(localStorage.getItem('question_answers'));
  var user_phone_no = localStorage.getItem('user_mobile_no');
  document.getElementById('userr_phone').value = user_phone_no;
  // Add event listener to the form submission
  document.querySelector('form').addEventListener('submit', function (event) {
    event.preventDefault();
    var username = document.querySelector('input[name="username"]').value;
    var user_phone_no = localStorage.getItem('user_mobile_no');
    var phone = user_phone_no;
    localStorage.setItem('user_phone', phone);
        console.log(localStorage.getItem('question_answers'));
        saveQuest();
      this.submit();
  });
});
const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
console.log(csrfToken);
function saveQuest(){
    console.log('sasas');
    var questionAnswers = localStorage.getItem('question_answers');
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
        body: JSON.stringify({ dataToSend })
      })
        .then(response => {
          if (response.ok) {
            localStorage.removeItem('question_answers');
          } else {
            localStorage.removeItem('question_answers');
            console.error('Failed to send data to the backend');
          }
        })
        .catch(error => {
          console.error('Error sending data to the backend:', error);
        });
    }
}
document.addEventListener('DOMContentLoaded', function () {
  // Fetch the first question when the page loads
  fetchQuestion();
  // Add event listeners to radio buttons
  document.addEventListener('change', function (event) {
    if (event.target.matches('input[type="radio"]')) {
      var selectedAnswer = event.target.value;
      var selectedQuestionId = event.target.getAttribute('data-question');
      // Show the loader
      fetchQuestion(selectedQuestionId, selectedAnswer); // Fetch the next question
    }
  });
});
var overlay = document.createElement('div');
function fetchQuestion1(questionId = null, selectedAnswer = null) {
  if (questionId && selectedAnswer) {
    overlay.classList.add('overlay');
    document.body.appendChild(overlay);
    $.ajax({
      url: '/api/user/check-trivia-result',
      method: 'POST',
      data: {
        questionID: questionId,
        userChoice: selectedAnswer,
        _token: '{{ csrf_token() }}'
      },
      success: function (response) {
        var correctElements = document.querySelectorAll('.correct-answer');
        correctElements.forEach(function (element) {
          element.classList.add("blinking");
        });
        var correctLabel = document.querySelector(`label[for="${questionId}_${response.choice}"]`);
        if (correctLabel) {
          correctLabel.classList.add("correct-answer", "blinking");
        }
        if (response.status === true) {
          var successSound = new Audio('/correct.mp3');
          successSound.play();
          var currentCount = parseInt(document.getElementById('points-earned').innerText);
          document.getElementById('points-earned').innerText = currentCount + 1;
          document.getElementById('scored').innerText = currentCount + 1;
          document.getElementById('total_score').value = currentCount + 1;
        } else {
          var wrongSound = new Audio('/wrong.mp3');
          wrongSound.play();
        }
        setTimeout(function () {
          fetchQuestion(questionId, selectedAnswer);
        }, 1000);
      }
    });

  }
}

function fetchQuestion(questionId = null, selectedAnswer = null) {
  var user_phone_no = localStorage.getItem('user_mobile_no');
  var xhr = new XMLHttpRequest();
  var url = '/user/select-question?user_code=' + user_phone_no + '&category_id=' + categoryId;

  if (questionId && selectedAnswer) {
    var questions = JSON.parse(localStorage.getItem('question_answers')) || [];
    questions.push({
      trivia_type: 'personality',
      questionId: questionId,
      selectedAnswer: selectedAnswer,
    });
    localStorage.setItem('question_answers', JSON.stringify(questions));
    url += `&questionId=${questionId}&selectedAnswer=0&user_code=${user_phone_no}`;
  } else {
    if (questionId) {
      url += `&questionId=${questionId}&selectedAnswer=0&user_code=${user_phone_no}`;
      localStorage.setItem('question_answers', JSON.stringify(questions));
    }
  }
  xhr.open('GET', url, true);

  xhr.onload = function () {
    if (xhr.status >= 200 && xhr.status < 400) {
      var questionData = JSON.parse(xhr.responseText);
      if (questionData == 'caught-up') {
        Swal.fire({
          icon: 'info',
          title: 'Caught Up!!',
          text: 'No More Quizes Under This Category, Try Another One.',
          showCancelButton: true,
          confirmButtonText: 'OK',
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = "/user/play-games";
          } else {
            window.location.href = "/user/play-games";
          }
        });
        return;
      }
      if (questionData.question) {
        localStorage.setItem('last_question', questionData.id);
        updateQuestion(questionData);
        document.getElementById('loader2').style.display = 'none';
      } else {
        document.getElementById('loader2').style.display = 'none';
        modal.style.display = 'block';
        body.classList.add('modal-open');
        const data = JSON.parse(localStorage.getItem('question_answers'));
        const totalQuestions =10;
        document.getElementById('total_questions').value = totalQuestions;
      }
    } else {
      console.error('Request failed: ' + xhr.statusText);
    }
  };
  xhr.onerror = function () {
    console.error('Request failed');
  };
  xhr.send();
}


let questionCounter = 1;

function updateQuestion(questionData) {
  if (questionCounter == 11) {
    modal.style.display = 'block';
    body.classList.add('modal-open');
    var data = JSON.parse(localStorage.getItem('question_answers'));
    var totalQuestions = data.length;
    var currentCount = parseInt(document.getElementById('points-earned').innerText);
    document.getElementById('points-earned').innerText = currentCount + 1;
    document.getElementById('scored').innerText = currentCount + 1;
    document.getElementById('total_score').value = currentCount + 1;
    document.getElementById('total_questions').value = totalQuestions;
  }
  localStorage.setItem('last_question', questionData.id);
  var questionContainer = document.getElementById('question-container');
  questionContainer.innerHTML = '';
  var questionElement = document.createElement('div');
  questionElement.innerHTML = `
  <p>
  <audio controls>
      <source src="/music/${questionData.music_title}" type="audio/mp3">
      Your browser does not support the audio element.
  </audio>
</p>
    <p>${questionData.question}</p>
    <br />
    <div style="color:white">
      <input type="radio" style="display: none;" name="answer" value="${questionData.choice_A}" data-question="${questionData.id}">
        <label for="${questionData.id}_A" onclick="fetchQuestion1(${questionData.id}, 'A')" class="radio-button ">${questionData.choice_A}</label>
    </div>
    <div style="color:white">
      <input type="radio" style="display: none;" name="answer" value="${questionData.choice_B}" data-question="${questionData.id}">
        <label for="${questionData.id}_B" onclick="fetchQuestion1(${questionData.id},'B')" class="radio-button ">${questionData.choice_B}</label>
    </div> `;
  questionContainer.appendChild(questionElement);

  document.getElementById('question-number').textContent = questionCounter;
  questionCounter++; // Increment the counter for the next question
  overlay.remove();
}
document.addEventListener('DOMContentLoaded', function () {
  document.getElementById('saveit').addEventListener('click', function (event) {
    console.log('sasas');
    var questionAnswers = localStorage.getItem('question_answers');
    var dataToSend = {
      questionAnswers: questionAnswers,
      user_phone: localStorage.getItem('user_mobile_no')
    };
    // Check if the item exists
    if (questionAnswers) {
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        // Prepare data to send
        var dataToSend = {
          // Assuming dataToSend is properly defined in your original code
          dataToSend: dataToSend
        };

        // Send AJAX request
        $.ajax({
          url: 'save-quiz-attempt', // Endpoint URL
          type: 'POST', // HTTP method
          headers: {
            'X-CSRF-TOKEN': csrfToken // CSRF token
          },
          contentType: 'application/json', // Content type
          data: JSON.stringify(dataToSend), // Data to send (needs to be stringified JSON)
          success: function(response) {
            // Handle success response
            localStorage.removeItem('question_answers');
          },
          error: function(xhr, status, error) {
            // Handle error response
            console.error('Failed to send data to the backend:', error);
            localStorage.removeItem('question_answers');
          }
        });
      }

  });
  // document.getElementById('dontsave').addEventListener('click', function (event) {
  //   event.preventDefault();
  //   localStorage.removeItem('question_answers');
  //   window.location.href = '/leaders-board';
  // });
});



