function validateGrosir() {
    const grosir = document.querySelector('input[name="grosir"]:checked').value;
    const hargaGrosir = document.getElementById('harga_grosir').value;

    if (grosir === "ya" && (hargaGrosir === "" || isNaN(hargaGrosir))) {
        alert("Jika Grosir dipilih 'Ya', maka Harga Grosir harus diisi dan berupa nilai numerik.");
        return false;
    }

    if (grosir === "tidak" && hargaGrosir !== "") {
        alert("Jika Grosir dipilih 'Tidak', Harga Grosir harus dikosongkan.");
        return false;
    }
    return true;
}
