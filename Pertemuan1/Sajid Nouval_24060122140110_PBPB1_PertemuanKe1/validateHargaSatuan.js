function validateHargaSatuan() {
    const hargaSatuan = document.getElementById('harga_satuan').value;
    if (hargaSatuan === "" || isNaN(hargaSatuan)) {
        alert("Harga satuan harus diisi dan berupa nilai numerik.");
        return false;
    }
    return true;
}
