function validateNamaProduk() {
    const namaProduk = document.getElementById('nama_produk').value;
    if (namaProduk.length < 5 || namaProduk.length > 30) {
        alert("Nama produk harus diisi, minimal 5 karakter, maksimal 30 karakter.");
        return false;
    }
    return true;
}
