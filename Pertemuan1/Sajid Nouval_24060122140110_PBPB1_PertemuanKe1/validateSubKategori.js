function validateSubKategori() {
    const subKategori = document.getElementById('sub_kategori').value;
    if (subKategori === "") {
        alert("Sub Kategori harus diisi.");
        return false;
    }
    return true;
}
