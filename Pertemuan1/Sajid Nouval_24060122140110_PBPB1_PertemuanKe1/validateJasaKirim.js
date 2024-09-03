function validateJasaKirim() {
    const jasaKirim = document.querySelectorAll('input[name="jasa_kirim[]"]:checked');
    if (jasaKirim.length < 3) {
        alert("Minimal 3 jasa kirim yang harus dipilih.");
        return false;
    }
    return true;
}
