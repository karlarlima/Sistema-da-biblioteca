var video = document.querySelector('video');
   navigator.mediaDevices.getUserMedia({video:true})
   .then(stream => {
      video.srcObject = stream;
      video.play();
   })
   .catch(error => {
      console.log(error);
   })

   document.querySelector('#btnc').addEventListener('click', () => {
    var canvas = document.querySelector('canvas');
    canvas.height = video.videoHeight;
    canvas.width = video.videoWidth;
    var context = canvas.getContext('2d');
    context.drawImage(video, 0, 0);
    var link = document.createElement('a');
    link.download = 'foto.png';
    link.href = canvas.toDataURL();
    link.textContent = 'Clique para baixar a imagem';
    const eilink = link.href


   console.log(eilink)


   const converted_text = document.querySelector('#converted-text');

   Tesseract.recognize(eilink, 'por', { logger: m => console.log(m) })
   .then(result => {
      converted_text.value = result.text;
   })
})