<div class="container">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h4 class="box-title">Test AUDIO RECORD</h4>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <form id="formNotificacion">
                        <div class="form-group">
                            <button type="button" id="btnGrabar" class="btn btn-success">Grabar</button>
                            <button type="button" id="btnDetener" class="btn btn-danger">Detener</button>
                        </div>
                        <label for="formGroupExampleInput">AUDIO</label>
                        <div class="form-group">
                            <!-- <input id="audio" type="file" name="record" size="20"/> -->
                            <audio>
                                <!-- <source src="horse.ogg" type="audio/ogg">
                                <source src="horse.mp3" type="audio/mpeg"> -->
                                Your browser does not support the audio element.
                            </audio>
                            <audio id="audioRecorded" controls>
                                Your browser does not support the audio element.
                            </audio>
                        </div>            
                        <div id="recordedAudios"class="form-group">
                        </div>
                    </form>
                </div>
            </div>
            <!-- FIN .row -->
        </div>
        <!-- FIN .box-body -->
    </div>
    <!-- FIN .box box-primary -->
</div>
<script>
  //
  //PRIMER BLOQUE DE CODIGO
  //
// var audioIN = { audio: true };
    //  audio is true, for recording
 
    // Access the permission for use
    // the microphone
    // navigator.mediaDevices.getUserMedia({
    //   audio: {
    //     sampleRate: 44000,
    //     echoCancellation: false,
    //     noiseSuppression: true,
    //     autoGainControl: true
    //   }
    // })
    //   // 'then()' method returns a Promise
    //   .then(function (mediaStreamObj) {
    //     console.log('Sample rate :', mediaStreamObj.getAudioTracks()[0].getSettings().sampleRate);
        
    //     console.log(mediaStreamObj.getTracks()[0]);
    //     audioGrabado = mediaStreamObj.getTracks()[0];

    //     console.log(audioGrabado.getConstraints());
    //     restricciones = {
    //       sampleRate: 11025
    //     }
    //     audioGrabado.applyConstraints(restricciones);
    //     console.log("SAMPLE RATE: -> " + audioGrabado.getSettings().sampleRate);
    //     console.log(audioGrabado.getConstraints());

    //     //
    //     // Connect the media stream to the
    //     // first audio element
    //     let audio = document.querySelector('audio');
    //     //returns the recorded audio via 'audio' tag
 
    //     // 'srcObject' is a property which
    //     // takes the media object
    //     // This is supported in the newer browsers
    //     if ("srcObject" in audio) {
    //       audio.srcObject = mediaStreamObj;
    //     }
    //     else {   // Old version
    //       audio.src = window.URL
    //         .createObjectURL(mediaStreamObj);
    //     }
 
    //     // Start record
    //     let start = document.getElementById('btnGrabar');
 
    //     // Stop record
    //     let stop = document.getElementById('btnDetener');
 
    //     // 2nd audio tag for play the audio
    //     let playAudio = document.getElementById('audioRecorded');
 
    //     // This is the main thing to recorded
    //     // the audio 'MediaRecorder' API
    //     let mediaRecorder = new MediaRecorder(mediaStreamObj);;
    //     // Pass the audio stream
    //     // Start event
    //     start.addEventListener('click', function (ev) {
    //       mediaRecorder.start();
    //       // console.log(mediaRecorder.state);
    //     })
 
    //     // Stop event
    //     stop.addEventListener('click', function (ev) {
    //       mediaRecorder.stop();
    //       // console.log(mediaRecorder.state);
    //     });
 
    //     // If audio data available then push
    //     // it to the chunk array
    //     mediaRecorder.ondataavailable = function (ev) {
    //       dataArray.push(ev.data);
    //     }
 
    //     // Chunk array to store the audio data
    //     let dataArray = [];
 
    //     // Convert the audio data in to blob
    //     // after stopping the recording
    //     mediaRecorder.onstop = function (ev) {
 
    //       // blob of type wav
    //       let audioData = new Blob(dataArray,{ 'type': 'audio/wav;' });
           
    //       // After fill up the chunk
    //       // array make it empty
    //       dataArray = [];
 
    //       // Creating audio url with reference
    //       // of created blob named 'audioData'
    //       let audioSrc = window.URL
    //           .createObjectURL(audioData);
 
    //       // Pass the audio url to the 2nd video tag
    //       playAudio.src = audioSrc;
    //     }
    //   })
 
    //   // If any error occurs then handles the error
    //   .catch(function (err) {
    //     console.log(err.name, err.message);
    // });
    //
    //FIN PRIMER BLOQUE DE CODIGO
    //
    //
    //
    //BLOQUE CODIGO 2
    //
    // async function generoAudio(){
    //   const constraints = { audio: { sampleRate: 48000 } };
    //   const mediaStream = await navigator.mediaDevices.getUserMedia(constraints);
  
    //   const audioContext = new AudioContext();
    //   const source = audioContext.createMediaStreamSource(mediaStream);
  
    //   // Resample the audio to the desired sample rate
    //   const resampleRatio = 48000 / 11025;
    //   const scriptProcessor = audioContext.createScriptProcessor(4096, 1, 1);
    //   scriptProcessor.onaudioprocess = function (audioProcessingEvent) {
    //     const inputBuffer = audioProcessingEvent.inputBuffer;
    //     const outputBuffer = audioProcessingEvent.outputBuffer;
  
    //     for (let channel = 0; channel < outputBuffer.numberOfChannels; channel++) {
    //       const inputData = inputBuffer.getChannelData(channel);
    //       const outputData = outputBuffer.getChannelData(channel);
  
    //       for (let sample = 0; sample < outputBuffer.length; sample++) {
    //         const inputSampleIndex = Math.floor(sample * resampleRatio);
    //         outputData[sample] = inputData[inputSampleIndex];
    //       }
    //     }
    //   };
    //   source.connect(scriptProcessor);
  
    //   const destination = audioContext.createMediaStreamDestination();
    //   scriptProcessor.connect(destination);
  
    //   const mediaRecorder = new MediaRecorder(destination.stream);
    // // Start record
    // let start = document.getElementById('btnGrabar');

    // // Stop record
    // let stop = document.getElementById('btnDetener');

    // // 2nd audio tag for play the audio
    // let playAudio = document.getElementById('audioRecorded');
    // // Pass the audio stream
    // // Start event
    // start.addEventListener('click', function (ev) {
    //   mediaRecorder.start();
    //   // console.log(mediaRecorder.state);
    // })

    // // Stop event
    // stop.addEventListener('click', function (ev) {
    //   mediaRecorder.stop();
    //   // console.log(mediaRecorder.state);
    // });

    // // If audio data available then push
    // // it to the chunk array
    // mediaRecorder.ondataavailable = function (ev) {
    //   dataArray.push(ev.data);
    // }

    // // Chunk array to store the audio data
    // let dataArray = [];

    // // Convert the audio data in to blob
    // // after stopping the recording
    // mediaRecorder.onstop = function (ev) {

    //   // blob of type wav
    //   let audioData = new Blob(dataArray,{ 'type': 'audio/wav;' });
        
    //   // After fill up the chunk
    //   // array make it empty
    //   dataArray = [];

    //   // Creating audio url with reference
    //   // of created blob named 'audioData'
    //   let audioSrc = window.URL
    //       .createObjectURL(audioData);

    //   // Pass the audio url to the 2nd video tag
    //   playAudio.src = audioSrc;
    // }
    // }
    //
    //FIN BLOQUE CODIGO 2
    //
  // async function hola(){
  //   const constraints = { audio: { sampleRate: 48000 } };
  //   const mediaStream = await navigator.mediaDevices.getUserMedia(constraints);
  //   const workletUrl = "<?php echo base_url(lib)?>/props/AudioWorkletProcessor.js";
  //   debugger;
  //   const audioContext = new AudioContext();
  //   await audioContext.audioWorklet.addModule(workletUrl);
  //   console.log(audioContext);
  //   const source = audioContext.createMediaStreamSource(mediaStream);
  //   const audioWorkletNode = new AudioWorkletNode(audioContext, "resample-worklet-processor");
  //   const destination = audioContext.createMediaStreamDestination();
  //   const mediaRecorder = new MediaRecorder(destination.stream);

  //   // Set the desired sample rate manually
  //   const desiredSampleRate = 11025;
  //   let sampleRate = audioContext.sampleRate;
  //   audioWorkletNode.port.postMessage({ sampleRate, desiredSampleRate });

  //   source.connect(audioWorkletNode);
  //   audioWorkletNode.connect(destination);

  //   // Start record
  //   let start = document.getElementById('btnGrabar');

  //   // Stop record
  //   let stop = document.getElementById('btnDetener');

  //   // 2nd audio tag for play the audio
  //   let playAudio = document.getElementById('audioRecorded');
  //   // Pass the audio stream
  //   // Start event
  //   start.addEventListener('click', function (ev) {
  //     mediaRecorder.start();
  //     // console.log(mediaRecorder.state);
  //   })

  //   // Stop event
  //   stop.addEventListener('click', function (ev) {
  //     mediaRecorder.stop();
  //     // console.log(mediaRecorder.state);
  //   });

  //   // If audio data available then push
  //   // it to the chunk array
  //   mediaRecorder.ondataavailable = function (ev) {
  //     dataArray.push(ev.data);
  //   }

  //   // Chunk array to store the audio data
  //   let dataArray = [];

  //   // Convert the audio data in to blob
  //   // after stopping the recording
  //   mediaRecorder.onstop = function (ev) {

  //     // blob of type wav
  //     let audioData = new Blob(dataArray,{ 'type': 'audio/wav;' });
        
  //     // After fill up the chunk
  //     // array make it empty
  //     dataArray = [];

  //     // Creating audio url with reference
  //     // of created blob named 'audioData'
  //     let audioSrc = window.URL
  //         .createObjectURL(audioData);

  //     // Pass the audio url to the 2nd video tag
  //     playAudio.src = audioSrc;
  //   }
  // }
  // navigator.mediaDevices.getUserMedia({
  //   audio: {
  //     sampleRate: 11025,
  //     echoCancellation: false,
  //     noiseSuppression: true,
  //     autoGainControl: true
  //   }
  // })
  //   // 'then()' method returns a Promise
  //   .then(function (mediaStreamObj) {
  // const audioCtx = new AudioContext();
  // const scriptProcessorNode = audioCtx.createScriptProcessor(4096, 1, 1);
  // const mediaStreamSource = audioCtx.createMediaStreamSource(mediaStreamObj);
  // const recordedChunks = [];

  // // Record audio into recordedChunks array
  // const mediaRecorder = new MediaRecorder(mediaStreamObj);
  // mediaRecorder.addEventListener('dataavailable', (event) => {
  //   recordedChunks.push(event.data);
  // });

  // // When recording is stopped, downsample the audio to 11025Hz
  // mediaRecorder.addEventListener('stop', () => {
  //   const blob = new Blob(recordedChunks, { type: 'audio/wav' });
  //   const url = URL.createObjectURL(blob);
  //   const audio = new Audio(url);

  //   const source = audioCtx.createMediaElementSource(audio);
  //   source.connect(scriptProcessorNode);
  //   scriptProcessorNode.connect(audioCtx.destination);

  //   const bufferLength = scriptProcessorNode.bufferSize;
  //   const sampleRate = audioCtx.sampleRate;
  //   const targetSampleRate = 11025;
  //   const downsampledBufferLength = Math.round(bufferLength * targetSampleRate / sampleRate);
  //   const downsampledBuffer = new Float32Array(downsampledBufferLength);

  //   scriptProcessorNode.onaudioprocess = (audioProcessingEvent) => {
  //     const inputBuffer = audioProcessingEvent.inputBuffer;
  //     const inputData = inputBuffer.getChannelData(0);

  //     for (let i = 0; i < downsampledBufferLength; i++) {
  //       const index = Math.round(i * sampleRate / targetSampleRate);
  //       downsampledBuffer[i] = inputData[index];
  //     }

  //     const outputBuffer = audioProcessingEvent.outputBuffer;
  //     const outputData = outputBuffer.getChannelData(0);
  //     outputData.set(downsampledBuffer);
  //   };

  //   audio.addEventListener('ended', () => {
  //     URL.revokeObjectURL(url);
  //   });
  //   audio.play();
  //   setTimeout(() =>{ audio.stop();}), 5000);
    
  // });
  //   });
// Obtenemos el audio de getUserMedia con una tasa de muestreo de 44100 kHz
// navigator.mediaDevices.getUserMedia({
//   audio: {
//     sampleRate: 44100,
//     echoCancellation: false,
//     noiseSuppression: true,
//     autoGainControl: true
//   }
// }).then(function(stream) {
//   // Creamos un objeto MediaRecorder y lo iniciamos
//   var mediaRecorder = new MediaRecorder(stream);
//   mediaRecorder.start();
//   setTimeout(() => { audio.stop();}), 5000);
//   // Cuando se detiene la grabación, convertimos el audio a 11025 kHz con Sox
//   mediaRecorder.onstop = function(e) {
//     var audioChunks = e.data;
//     var blob = new Blob(audioChunks);
//     var reader = new FileReader();
//     reader.onload = function() {
//       var buffer = this.result;
//       // Convertimos el audio a 11025 kHz con Sox
//       var soxCommand = "sox -t raw -r 44100 -e signed-integer -b 16 - -t raw -r 11025 -e signed-integer -b 16 -"
//       var soxWorker = new Worker('sox-worker.js');
//       soxWorker.postMessage({ command: soxCommand, inputBuffer: buffer });
//       soxWorker.onmessage = function(e) {
//         var outputBuffer = e.data;
//         // Ahora puedes usar el audio grabado en 11 kHz
//         // ...
//       };
//     };
//     reader.readAsArrayBuffer(blob);
//   };
// });
//
//BLOQUE DE CODIGO 4
//
// var constraints = {
//   audio: {
//     sampleRate: 11025,
//     channelCount: 1,
//     echoCancellation: false,
//     noiseSuppression: true,
//     autoGainControl: true
//   }
// };

// navigator.mediaDevices.getUserMedia(constraints)
//   .then(stream => {
//     const options = { mimeType: 'audio/webm' };
//     const mediaRecorder = new MediaRecorder(stream, options);
//     const chunks = [];

//     mediaRecorder.addEventListener('dataavailable', event => {
//       chunks.push(event.data);
//     });

//     mediaRecorder.addEventListener('stop', () => {
//       debugger;
//       const blob = new Blob(chunks, { type: 'audio/webm' });
//       const audio = document.createElement('audio');
//       audio.controls = true;
//       audio.src = URL.createObjectURL(blob);
//       document.body.appendChild(audio);
//     });

//     mediaRecorder.start();

//     setTimeout(() => {
//       debugger;
//       mediaRecorder.stop();
//     }, 5000);
//   })
//   .catch(error => {
//     console.error(error);
//   });

//
// FIN BLOQUE DE CODIGO 4
//
//
//BLOQUE DE CODIGO 5
//
// let audioContext = new AudioContext();
// let destinationNode = audioContext.createMediaStreamDestination();
// destinationNode.desiredSampleRate = 11025;

// navigator.mediaDevices.getUserMedia({ audio: true })
//   .then(stream => {
//     const sourceNode = audioContext.createMediaStreamSource(stream);
//     sourceNode.connect(destinationNode);
//     const recordedChunks = [];

//     const recorder = new MediaRecorder(destinationNode.stream);
//     recorder.ondataavailable = e => recordedChunks.push(e.data);
//     recorder.onstop = () => {
//       const blob = new Blob(recordedChunks, { type: 'audio/webm' });
//       const url = URL.createObjectURL(blob);
//       // do something with the recorded audio
//       const audio = document.createElement('audio');
//       var bloqueAudios = document.getElementById('recordedAudios');
//       audio.controls = true;
//       audio.src = url
//       bloqueAudios.appendChild(audio);
//     };

//     recorder.start();
//     setTimeout(() => recorder.stop(), 5000); // record for 5 seconds
//   })
//   .catch(err => console.error(err));


//
// FIN BLOQUE DE CODIGO 5
//
//
//BLOQUE DE CODIGO 6
//
// navigator.mediaDevices.getUserMedia({ audio: true })
//   .then(stream => {
//     const options = {
//       mimeType: 'audio/webm;codecs=opus',
//       audioBitsPerSecond: 11025,
//       sampleRate: 11025,
//       channelCount: 1,
//       echoCancellation: false,
//       noiseSuppression: true,
//       autoGainControl: true
//     };
//     const recorder = new MediaRecorder(stream, options);
//     const chunks = [];

//     recorder.ondataavailable = e => {
//       chunks.push(e.data);
//     };

//     recorder.onstop = e => {
//       const blob = new Blob(chunks, { type: 'audio/webm;codecs=opus' });
//       const url = URL.createObjectURL(blob);
//       // do something with the recorded audio
//       const audio = document.createElement('audio');
//       var bloqueAudios = document.getElementById('recordedAudios');
//       audio.controls = true;
//       audio.src = url;
//       bloqueAudios.appendChild(audio);
//     };

//     recorder.start();

//     setTimeout(() => {
//       recorder.stop();
//     }, 5000); // record for 5 seconds
//   })
//   .catch(err => {
//     console.error(err);
//   });

//
// FIN BLOQUE DE CODIGO 6
//
//
//BLOQUE DE CODIGO 6
//
var constraints = { audio: true };
var bufferSize = 4096;
var numChannels = 1;
var sampleRate = 11025;
var context = new (window.AudioContext || window.webkitAudioContext)();
// var context = new AudioContext();
var chunks = [];

navigator.mediaDevices.getUserMedia(constraints)
  .then((stream) => {
    var mediaRecorder = new MediaRecorder(stream);
    console.log("Arreglo de chunks vacio");
    console.log(chunks);
    mediaRecorder.ondataavailable = (e) => chunks.push(e.data);
    mediaRecorder.onstop = () => {
      console.log("Arreglo de chunks lleno");
      console.log(chunks);
      var bufferLength = chunks.length * bufferSize;
      var audioBuffer = context.createBuffer(numChannels, bufferLength, sampleRate);
      console.log(audioBuffer);
      for (let i = 0; i < numChannels; i++) {
        var channelData = audioBuffer.getChannelData(i);
        console.log(channelData);
        for (let j = 0; j < chunks.length; j++) {
          channelData.set(chunks[j], j * bufferSize);
        }
      }
      var wavBuffer = encodeWAV(audioBuffer);
      console.log(wavBuffer);
      var blob = new Blob([wavBuffer], { type: 'audio/ogg' });
      var url = URL.createObjectURL(blob);
      var link = document.createElement('a');
      link.href = url;
      link.download = 'recorded.ogg';
      link.click();
    };
    setTimeout(() => mediaRecorder.stop(), 5000);
    mediaRecorder.start();
  })
  .catch((err) => console.error(err));

function encodeWAV(audioBuffer) {
  console.log(audioBuffer);
  var numChannels = audioBuffer.numberOfChannels;
  var sampleRate = audioBuffer.sampleRate;
  var bitDepth = 16;
  var bytesPerSample = bitDepth / 8;
  var blockAlign = numChannels * bytesPerSample;
  var bufferLength = audioBuffer.length * blockAlign;
  var arrayBuffer = new ArrayBuffer(44 + bufferLength);
  var dataView = new DataView(arrayBuffer);

  dataView.setUint32(0, 0x52494646, false); // "RIFF"
  dataView.setUint32(4, 36 + bufferLength, true);
  dataView.setUint32(8, 0x57415645, false); // "WAVE"
  dataView.setUint32(12, 0x666d7420, false); // "fmt "
  dataView.setUint32(16, 16, true);
  dataView.setUint16(20, 1, true);
  dataView.setUint16(22, numChannels, true);
  dataView.setUint32(24, sampleRate, true);
  dataView.setUint32(28, sampleRate * blockAlign, true);
  dataView.setUint16(32, blockAlign, true);
  dataView.setUint16(34, bitDepth, true);
  dataView.setUint32(36, 0x64617461, false); // "data"
  dataView.setUint32(40, bufferLength, true);

  var channelData = [];
  for (let i = 0; i < numChannels; i++) {
    channelData.push(audioBuffer.getChannelData(i));
  }
  console.log(channelData);
  let offset = 44;
  for (let i = 0; i < audioBuffer.length; i++) {
    for (let j = 0; j < numChannels; j++) {
      var sample = Math.max(-1, Math.min(1, channelData[j][i]));
      var sample16 = sample < 0 ? sample * 0x8000 : sample * 0x7fff;
      dataView.setInt16(offset, sample16, true);
      offset += bytesPerSample
    }
  }

  return dataView.buffer;
}
//
// FIN BLOQUE DE CODIGO 6
//
</script>