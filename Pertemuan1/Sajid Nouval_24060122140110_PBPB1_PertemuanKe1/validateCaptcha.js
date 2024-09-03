function validateCaptcha() {
    const captcha = document.getElementById('captcha').value;
    const captchaInput = document.getElementById('captcha_input').value;
    if (captcha !== captchaInput) {
        alert("Captcha tidak sesuai.");
        return false;
    }
    return true;
}
