function validateKategori() {
    const kategori = document.getElementById('kategori').value;
    if (kategori === "") {
        alert("Kategori harus diisi.");
        return false;
    }
    return true;
}
