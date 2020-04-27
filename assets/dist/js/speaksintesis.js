
var teks = document.getElementById('teks').textContent;
var msg = new SpeechSynthesisUtterance();
var agen = navigator.userAgent;
if (agen.includes('Chrome') == true) {
	window.speechSynthesis.onvoiceschanged = function() {
		var voices = window.speechSynthesis.getVoices();
		if (voices.filter(function(voice) { return voice.lang == 'id-ID'; }).length > 0){
			msg.voice = voices.filter(function(voice) { return voice.lang == 'id-ID'; })[0];
		}     
	};
} else {
	var voices = window.speechSynthesis.getVoices();
	if (voices.filter(function(voice) { return voice.lang == 'id-ID'; }).length == 0) {
		msg.voice = voices[0];
	}
}	
msg.voiceURI = 'native';
msg.volume = 1; // 0 to 1
msg.rate = 1; // 0.1 to 10
msg.pitch = 2; //0 to 2
msg.text = teks;
msg.lang = 'id-ID';
speechSynthesis.speak(msg);