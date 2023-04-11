
  <h1>Recorder.js example</h1>
  <button id="start-btn">Start Recording</button>
  <button id="stop-btn">Stop Recording and Download</button>
  <script>
    var recorder = null;
    var audioContext = null;

    var startBtn = document.getElementById('btnGrabar');
    var stopBtn = document.getElementById('btnDetener');

    startBtn.onclick = function() {
      if (recorder !== null) {
        recorder.clear();
        recorder.destroy();
        recorder = null;
      }

      if (audioContext !== null) {
        audioContext.close();
        audioContext = null;
      }

      audioContext = new AudioContext({
        sampleRate: 11025
      });

      navigator.mediaDevices.getUserMedia({
        audio: true
      }).then(function(stream) {
        var input = audioContext.createMediaStreamSource(stream);
        recorder = new Recorder(input, {
          numChannels: 1,
          sampleRate: 11025
        });
        recorder.record();
      }).catch(function(err) {
        console.error('Error getting user media: ' + err);
      });
    };

    stopBtn.onclick = function() {
      if (recorder !== null) {
        recorder.stop();
        recorder.exportWAV(function(blob) {
          var url = URL.createObjectURL(blob);
          var link = document.createElement('a');
          link.href = url;
          link.download = 'recorded-audio.wav';
          link.click();
        });
      }
    };
  </script>
