@extends('konsumen_app.layouts.app')

@section('title','User Profile')

@section('extra_head')
<!-- Custom styles for this page -->
<style media="screen">

</style>
@endsection

@section('content')
  <!-- main wrapper start -->
  <main id="profile-vue">
      <breadcrumb :title="'Profile'"></breadcrumb>

      <!-- my account wrapper start -->
      <div class="my-account-wrapper section-space pb-0">
          <div class="container">
              <div class="section-bg-color">
                  <div class="row">
                      <div class="col-lg-12">
                          <!-- My Account Page Start -->
                          <div class="myaccount-page-wrapper">
                              <!-- My Account Tab Menu Start -->
                              <div class="row">
                                  <div class="col-lg-3 col-md-4">
                                      <div class="myaccount-tab-menu nav" role="tablist">
                                          <a href="#account-info" class="active" data-toggle="tab"><i class="fa fa-user"></i> Account
                                              Details</a>
                                          <a href="#reset-password" data-toggle="tab"><i class="fa fa-key"></i> Password change</a>
                                          <a href="#orders" data-toggle="tab"><i class="fa fa-cart-arrow-down"></i>
                                              Orders</a>
                                          <a href="#address-edit" data-toggle="tab"><i class="fa fa-map-marker"></i>
                                              address</a>
                                          <a href="javascript:void(0)" onclick="logoutAction()"><i class="fa fa-sign-out"></i> Logout</a>
                                      </div>
                                  </div>
                                  <!-- My Account Tab Menu End -->

                                  <!-- My Account Tab Content Start -->
                                  <div class="col-lg-9 col-md-8">
                                      <div class="tab-content" id="myaccountContent">

                                          <!-- Single Tab Content Start -->
                                          <div class="tab-pane fade" id="orders" role="tabpanel">
                                              <div class="myaccount-content">
                                                  <h3>Orders</h3>
                                                  <div class="myaccount-table table-responsive text-center">
                                                      <table class="table table-bordered">
                                                          <thead class="thead-light">
                                                              <tr>
                                                                  <th>Order</th>
                                                                  <th>Date</th>
                                                                  <th>Status</th>
                                                                  <th>Total</th>
                                                                  <th>Action</th>
                                                              </tr>
                                                          </thead>
                                                          <tbody>
                                                              <tr v-for="(elem, i) in orders" :key="i">
                                                                  <td>1</td>
                                                                  <td>Aug 22, 2019</td>
                                                                  <td>Pending</td>
                                                                  <td>$3000</td>
                                                                  <td><a href="cart.html" class="btn btn__bg">View</a>
                                                                  </td>
                                                              </tr>
                                                          </tbody>
                                                      </table>
                                                  </div>
                                              </div>
                                          </div>
                                          <!-- Single Tab Content End -->

                                          <!-- Single Tab Content Start -->
                                          <div class="tab-pane fade" id="address-edit" role="tabpanel">
                                              <div class="myaccount-content">
                                                  <h3>Billing Address</h3>
                                                  <address>
                                                      <p><strong>Erik Jhonson</strong></p>
                                                      <p>1355 Market St, Suite 900 <br>
                                                          San Francisco, CA 94103</p>
                                                          <p>Mobile: (123) 456-7890</p>
                                                  </address>
                                                  <a href="#" class="btn btn__bg"><i class="fa fa-edit"></i>
                                                      Edit Address</a>
                                              </div>
                                          </div>
                                          <!-- Single Tab Content End -->

                                          <!-- Single Tab Content Start -->
                                          <div class="tab-pane fade show active" id="account-info" role="tabpanel">
                                              <div class="myaccount-content">
                                                  <h3>Account Details</h3>
                                                  <div class="account-details-form">
                                                      <form action="#">
                                                          <div class="row">
                                                              <div class="col-lg-6">
                                                                  <div class="single-input-item">
                                                                      <label for="first-name" class="required">Nama</label>
                                                                      <input type="text" v-model="profile_detail.nama_konsumen" placeholder="Nama" />
                                                                  </div>
                                                              </div>
                                                              <div class="col-lg-6">
                                                                  <div class="single-input-item">
                                                                      <label for="last-name" class="required">No Telpon</label>
                                                                      <input type="text" v-model="profile_detail.nomor_hp" placeholder="No Telpon" />
                                                                  </div>
                                                              </div>
                                                          </div>
                                                          <div class="single-input-item">
                                                              <label for="display-name" class="required">Alamat</label>
                                                              <input type="text" v-model="profile_detail.alamat_konsumen" placeholder="Alamat" />
                                                          </div>
                                                          <div class="single-input-item">
                                                              <label for="email" class="required">Username</label>
                                                              <input type="email" v-model="profile_detail.username" placeholder="Username" readonly/>
                                                          </div>
                                                          <div class="single-input-item">
                                                              <button class="btn btn__bg">Save Changes</button>
                                                          </div>
                                                      </form>
                                                  </div>
                                              </div>
                                          </div> <!-- Single Tab Content End -->

                                          <!-- Single Tab Content Start -->
                                          <div class="tab-pane fade" id="reset-password" role="tabpanel">
                                              <div class="myaccount-content">
                                                  {{-- <h3>Reset Password</h3> --}}
                                                  <div class="account-details-form">
                                                      <form action="#">
                                                          <fieldset>
                                                              <legend>Password change</legend>
                                                              <div class="single-input-item">
                                                                  <label for="current-pwd" class="required">Password lama</label>
                                                                  <input type="password" id="current-pwd" placeholder="Current Password" />
                                                              </div>
                                                              <div class="row">
                                                                  <div class="col-lg-6">
                                                                      <div class="single-input-item">
                                                                          <label for="new-pwd" class="required">Password Baru</label>
                                                                          <input type="password" id="new-pwd" placeholder="New Password" />
                                                                      </div>
                                                                  </div>
                                                                  <div class="col-lg-6">
                                                                      <div class="single-input-item">
                                                                          <label for="confirm-pwd" class="required">Konfirmasi Password Baru</label>
                                                                          <input type="password" id="confirm-pwd" placeholder="Confirm Password" />
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                          </fieldset>
                                                          <div class="single-input-item">
                                                              <button class="btn btn__bg">Save Changes</button>
                                                          </div>
                                                      </form>
                                                  </div>
                                              </div>
                                          </div> <!-- Single Tab Content End -->
                                      </div>
                                  </div> <!-- My Account Tab Content End -->
                              </div>
                          </div> <!-- My Account Page End -->
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- my account wrapper end -->
  </main>
  <!-- main wrapper end -->
@endsection

@section('extra_script')
<!-- Page level plugins -->
<script>
  $auth.needAuthentication();

  var vue_profile = new Vue({
    el: '#profile-vue',
    data(){
      return {
        profile_detail: {
          nama_konsumen: '',
          nomor_hp: '',
          alamat_konsumen: '',
          username: ''
        },
        password_changes: {
          password_lama: '',
          password: '',
          password_confirmation: '',
        },
        orders: [],
        address: []
      }
    },
    mounted() {
      //do something after mounting vue instance
    },
    created() {
      //do something after creating vue instance
    },
    methods: {
      getUmkm() {
        axios.get('umkm-konsumen').then((res)=>{
          this.umkm = res.data;
        }).catch((err)=>{
          console.log(err);
        })
      },
    }
  });
</script>
@endsection
