exports.allUsers = () => {
  return axios.get('/users')
}

exports.updateUser = ({ data, id }) => {
  return axios.patch(`/users/${id}`, data)
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

exports.resetPasswordUser = ({ data, id }) => {
  return axios.patch(`/users/${id}/reset`, data)
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

exports.selfResetPassword = ({ data }) => {
  return axios.patch(`/auth/reset_password`, data)
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

exports.selfAccountSetting = ({ data }) => {
  return axios.patch(`/auth/setting`, data)
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

exports.detailUser = (id) => {
  return axios.get(`/users/${id}`)
}
