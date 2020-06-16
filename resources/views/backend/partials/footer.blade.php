    <footer class="sticky-footer bg-white">
      <div class="container my-auto">
        <div class="copyright text-center my-auto">
          <span>Copyright &copy; Your Website 2019</span>
        </div>
      </div>
    </footer>
      <!-- End of Footer -->

  </div>
    <!-- End of Content Wrapper -->
</div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

 
  <!-- Bootstrap core JavaScript-->
  
  <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset('js/backend/sb-admin-2.min.js')}}"></script>
  <script src="{{asset('js/notify.min.js')}}"></script>
  <script src="{{asset('js/jquery.validate.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
  <!-- Page level plugins -->
  {{-- <script src="{{asset('vendor/chart.js/Chart.min.js')}}"></script> --}}

  <!-- Page level custom scripts -->
  {{-- <script src="{{asset('js/backend/demo/chart-area-demo.js')}}"></script> --}}
  {{-- <script src="{{asset('js/backend/chart-pie-demo.js')}}"></script> --}}
  <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
  </script>

</body>

</html>
