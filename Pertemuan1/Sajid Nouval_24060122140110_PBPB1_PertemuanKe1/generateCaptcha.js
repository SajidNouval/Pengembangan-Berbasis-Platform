function generateCaptcha() {
    let captcha = '';
    for (let i = 0; i < 5; i++) {
        const randomChar = String.fromCharCode(Math.floor(Math.random() * 26) + 97); // a-z
        captcha += randomChar;
    }
    document.getElementById('captcha').value = captcha;
}

window.onload = function() {
    generateCaptcha();
};
