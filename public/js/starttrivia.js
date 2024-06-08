
var currentUrl = window.location.href;
var urlParts = currentUrl.split("/");
var categoryId = urlParts[urlParts.length - 1]
$.ajax({
  url: '/api/user/get-category',
  method: 'POST',
  data: {
    categoryID: categoryId,
    _token: '{{ csrf_token() }}'
  },
  success: function (response) {
    document.getElementById('header-text').innerText = response.category_name;
  }
});
document.addEventListener("DOMContentLoaded", function () {
  var userResults = localStorage.getItem('question_answers')
  if (userResults) {
    localStorage.clear('question_answers');
  }
});

document.addEventListener("DOMContentLoaded", function () {
  const readyButton = document.querySelector('.btn-play');


  const countdownElement = document.getElementById('countdown');
  let countdownValue = 10;

  readyButton.addEventListener('click', function () {

    overlay.style.display = 'block';
    startCountdown();

  });

  function startCountdown() {
    countdownElement.textContent = countdownValue;
    const countdownInterval = setInterval(function () {
      countdownValue--;
      countdownElement.textContent = countdownValue;
      if (countdownValue <= 0) {
        clearInterval(countdownInterval);
        redirectToGame();
      }
    }, 1000);
  }

  function redirectToGame() {
    window.location.href = '/user/start-trivia/' + categoryId;
  }

});
