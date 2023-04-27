 <!-- Core JS -->
 <!-- build:js assets/vendor/js/core.js -->
 <script src="{{ asset('tadmin/assets/vendor/libs/jquery/jquery.js') }}"></script>
 <script src="{{ asset('tadmin/assets/vendor/libs/popper/popper.js') }}"></script>
 <script src="{{ asset('tadmin/assets/vendor/js/bootstrap.js') }}"></script>
 <script src="{{ asset('tadmin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

 <script src="{{ asset('tadmin/assets/vendor/js/menu.js') }}"></script>
 <!-- endbuild -->

 <!-- Vendors JS -->

 <!-- Main JS -->
 <script src="{{ asset('tadmin/assets/js/main.js') }}"></script>

 <!-- Page JS -->

 <script src="{{ asset('tadmin/assets/js/form-basic-inputs.js') }}"></script>

 <!-- Place this tag in your head or just before your close body tag. -->
 <script async defer src="https://buttons.github.io/buttons.js"></script>


 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
 <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
 <script>
     $(document).ready(function() {
         $('#myTable').DataTable();
     });

     function ConfirmDelete() {
         return confirm("Apakah anda yakin untuk menghapus data tersebut?");
     }
 </script>

 @stack('scripts')
