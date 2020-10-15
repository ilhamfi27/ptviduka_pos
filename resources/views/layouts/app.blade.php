<!DOCTYPE html>
<html lang="en">
 <head>

   <title>{{ config('app.name') }} - @yield('title', '')</title>

   @include('layouts.partials.head')
   
 </head>

 <body id="page-top">

   <div id="wrapper">

     @include('layouts.partials.sidebar')

     <!-- Content Wrapper -->
     <div id="content-wrapper" class="d-flex flex-column">

       <!-- Main Content -->
       <div id="content">

         @include('layouts.partials.header')

         @yield('content')

       </div>
       <!-- End of Main Content -->

       @include('layouts.partials.footer')

     </div>
     <!-- End of Content Wrapper -->

   </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>

    @include('layouts.partials.footer-scripts')

 </body>
</html>
