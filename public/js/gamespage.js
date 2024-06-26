
document.addEventListener('DOMContentLoaded', function() {
    var audio = document.getElementById('background-music');
    audio.play();
  });


  // Function to create a simple sine wave oscillator
  function createOscillator(frequency) {
    const oscillator = audioContext.createOscillator();
    oscillator.type = 'sine';
    oscillator.frequency.value = frequency;
    oscillator.start(0);
    return oscillator;
  }

  // Function to create a gain node (volume control)
  function createGainNode() {
    const gainNode = audioContext.createGain();
    gainNode.gain.value = 0.5; // Set initial volume
    return gainNode;
  }

  // Function to play soothing background music
  function playSoothingBackground() {
    initAudioContext(); // Initialize the audio context

    const oscillator1 = createOscillator(220); // Adjust frequency as needed
    const oscillator2 = createOscillator(330); // Adjust frequency as needed
    const gainNode1 = createGainNode();
    const gainNode2 = createGainNode();

    // Connect nodes
    oscillator1.connect(gainNode1);
    oscillator2.connect(gainNode2);
    gainNode1.connect(audioContext.destination);
    gainNode2.connect(audioContext.destination);

    // Adjust volumes
    gainNode1.gain.exponentialRampToValueAtTime(0.1, audioContext.currentTime + 5); // Fade out over 5 seconds
    gainNode2.gain.exponentialRampToValueAtTime(0.1, audioContext.currentTime + 5); // Fade out over 5 seconds

    // Play the audio element
    const audioElement = document.getElementById('background-music');
    audioElement.play().catch(function(error) {
      console.error('Failed to play audio:', error);
    });
  }
  if (!localStorage.getItem('user_mobile_no')) {
    window.location.href = "/";
  } else {
    const user_phone_no = localStorage.getItem('user_mobile_no');
    localStorage.setItem('user_mobile_no', user_phone_no);
  }
