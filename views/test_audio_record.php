<!DOCTYPE html>
<html>
<head>
	<title>Audio Recorder</title>
</head>
<body>
	<h1>Audio Recorder</h1>
	<button id="startRecording">Start Recording</button>
	<button id="stopRecording" disabled>Stop Recording</button>
	<button id="playRecording" disabled>Play Recording</button>
	<audio id="player" src="" controls></audio>

	<script>
		var startRecordingButton = document.getElementById('startRecording');
		var stopRecordingButton = document.getElementById('stopRecording');
		var playRecordingButton = document.getElementById('playRecording');
		var player = document.getElementById('player');

		var mediaRecorder;
		var chunks = [];

		var handleDataAvailable = (event) => {
			if (event.data.size > 0) {
				chunks.push(event.data);
			}
		};

		var startRecording = async () => {
			try {
				var stream = await navigator.mediaDevices.getUserMedia({ audio: true, video: false });
				var options = { mimeType: 'audio/webm;codecs=opus', audioBitsPerSecond: 11025 };
				mediaRecorder = new MediaRecorder(stream, options);
				mediaRecorder.ondataavailable = handleDataAvailable;
				mediaRecorder.start();
				startRecordingButton.disabled = true;
				stopRecordingButton.disabled = false;
				playRecordingButton.disabled = true;
				player.src = '';
			} catch (error) {
				console.error('Error:', error);
			}
		};

		var stopRecording = () => {
			mediaRecorder.stop();
			startRecordingButton.disabled = false;
			stopRecordingButton.disabled = true;
			playRecordingButton.disabled = false;
		};

		var playRecording = () => {
			var blob = new Blob(chunks, { type: 'audio/webm' });
			var audioURL = window.URL.createObjectURL(blob);
			player.src = audioURL;
			player.play();
		};

		startRecordingButton.addEventListener('click', startRecording);
		stopRecordingButton.addEventListener('click', stopRecording);
		playRecordingButton.addEventListener('click', playRecording);
	</script>
</body>
</html>
