function getXMLHttpRequest() {
  if (window.XMLHttpRequest) {
    return new XMLHttpRequest();
  } else {
    return new ActiveXObject('Microsoft.XMLHTTP');
  }
}

const checkPhone = () => {
  let inner = 'error_phone_number';
  let phone_number = encodeURI(document.getElementById('phone_number').value);
  let url = './utils/get_order.php?phone_number=' + phone_number;
  let xhr = getXMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      let response = JSON.parse(xhr.responseText);
      if (response.status === 'error') {
        document.getElementById(inner).innerText = response.message;
      } else {
        document.getElementById(inner).innerText = '';
      }
    }
  };
  xhr.open('GET', url, true);
  xhr.send();
};

function getModel(brand_code) {
  if (brand_code === "") {
      document.getElementById("model").innerHTML = "<option value=''>-- Pilih model --</option>";
      return;
  }

  var xhr = new XMLHttpRequest();
  xhr.open("GET", "utils/get_model.php?brand_code=" + brand_code, true);
  xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && xhr.status == 200) {
          document.getElementById("model").innerHTML = xhr.responseText;
      }
  };
  xhr.send();
}

const addOrder = () => {
  const name = document.getElementById('name').value;
  const phone_number = document.getElementById('phone_number').value;
  const address = document.getElementById('address').value;
  const brand = document.getElementById('brand').value;
  const model = document.getElementById('model').value;
  const colorRadio = document.getElementsByName('color');
  let color;
  for (let i = 0; i < colorRadio.length; i++) {
    if (colorRadio[i].checked) {
      color = colorRadio[i].value;
      break;
    }
  }

  if (!name || !phone_number || !address || !brand || !model || !color) {
    displayNotification('Semua field harus diisi.', 'danger');
    return false;
  }

  let xhr = getXMLHttpRequest();
  let url = './utils/add_order.php';
  let params = 
    'name=' + encodeURIComponent(name) +
    '&phone=' + encodeURIComponent(phone_number) +
    '&address=' + encodeURIComponent(address) +
    '&brand=' + encodeURIComponent(brand) +
    '&model=' + encodeURIComponent(model) +
    '&color=' + encodeURIComponent(color); 

 xhr.onreadystatechange = function() {
  if (xhr.readyState === 4 && xhr.status === 200) {
    let response = JSON.parse(xhr.responseText);
    console.log(response); 
    if (response.status === 'success') {
      displayNotification('Pesanan berhasil ditambahkan', 'success');
      document.getElementById('form-status').innerHTML = '';
    } else if (response.message === 'Nomor telepon sudah digunakan.') {
      displayNotification('Nomor telepon sudah digunakan. Silakan gunakan nomor lain.', 'danger');
      document.getElementById('form-status').innerHTML = 'Gagal menambahkan pesanan.';
    } else {
      displayNotification('Gagal menambahkan pesanan: ' + response.message, 'danger');
      document.getElementById('form-status').innerHTML = 'Pesanan gagal!';
    }
  }
};

  xhr.open('POST', url, true);
  xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  xhr.send(params); 
  return false; 
};

const displayNotification = (message, type) => {
  const notificationElement = document.getElementById('notification');
  notificationElement.classList.remove('d-none', 'alert-danger', 'alert-success');
  notificationElement.classList.add(`alert-${type}`);
  notificationElement.textContent = message;
  console.log(`Notifikasi: ${message}`); 
};