function validateForm() {
    return validateNamaProduk() &&
           validateDeskripsiProduk() &&
           validateKategori() &&
           validateSubKategori() &&
           validateHargaSatuan() &&
           validateGrosir() &&
           validateJasaKirim() &&
           validateCaptcha();
}
