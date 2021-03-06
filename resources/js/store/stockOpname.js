exports.allStockOpname = (productId = null, beforeDate = null, afterDate = null) => {
  let condition = '';

  // ?produk_id=1&sebelum_tanggal=2020-10-30 03:02:25.0&sesudah_tanggal=2020-10-30 03:02:24.0
  if (productId || beforeDate || afterDate) {
    condition += '?';
  }

  if (productId) {
    condition += `produk_id=${productId}&`;
  }

  if (beforeDate) {
    condition += `sebelum_tanggal=${productId}&`;
  }
  
  if (afterDate) {
    condition += `sesudah_tanggal=${productId}`;
  }

  return axios.get(`/stock-opname/${condition}`);
}

exports.addStockOpname = ({ data }) => {
  return axios.post(`/stock-opname`, data)
    .then((res) => {
      $swal({
        icon: 'success',
        title: 'Data Input',
        text: 'Data Stok berhasil di-input!',
      })
      return res;
    })
    .catch((err) => {
      $ui.errorModal(err);
    })
}

exports.updateStockOpname = ({ data, id }) => {
  return axios.put(`/stock-opname/${id}`, data)
    .then((res) => {
      $swal({
        icon: 'success',
        title: 'Data Update',
        text: 'Data berhasil di-update!',
      })
      return res;
    })
    .catch((err) => {
      $ui.errorModal(err);
    })
}

exports.stockOpnameDetail = (id) => {
  return axios.get(`/stock-opname/${id}`)
}
