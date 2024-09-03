function validateDeskripsiProduk() {
    const deskripsi = document.getElementById('deskripsi').value;
    if (deskripsi.length < 5 || deskripsi.length > 100) {
        alert("Deskripsi produk harus diisi, minimal 5 karakter, maksimal 100 karakter.");
        return false;
    }
    return true;
}
