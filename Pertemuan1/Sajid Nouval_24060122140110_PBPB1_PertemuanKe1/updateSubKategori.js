function updateSubKategori() {
    const kategori = document.getElementById('kategori').value;
    const subKategori = document.getElementById('sub_kategori');

    subKategori.innerHTML = '<option value="">--Pilih Sub Kategori--</option>';

    if (kategori === "Baju") {
        subKategori.innerHTML += '<option value="Baju Pria">Baju Pria</option>';
        subKategori.innerHTML += '<option value="Baju Wanita">Baju Wanita</option>';
        subKategori.innerHTML += '<option value="Baju Anak">Baju Anak</option>';
    } else if (kategori === "Elektronik") {
        subKategori.innerHTML += '<option value="Mesin Cuci">Mesin Cuci</option>';
        subKategori.innerHTML += '<option value="Kulkas">Kulkas</option>';
        subKategori.innerHTML += '<option value="AC">AC</option>';
    } else if (kategori === "Alat Tulis") {
        subKategori.innerHTML += '<option value="Kertas">Kertas</option>';
        subKategori.innerHTML += '<option value="Map">Map</option>';
        subKategori.innerHTML += '<option value="Pulpen">Pulpen</option>';
    }
}
