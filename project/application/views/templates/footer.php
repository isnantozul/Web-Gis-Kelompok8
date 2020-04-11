 <!-- Footer -->
 <footer class="sticky-footer bg-white">
   <div class="container my-auto">
     <div class="copyright text-center my-auto">
       <span>Copyright &copy; Kelompok 8 PBD <?= date('Y') ?></span>
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
         <a class="btn btn-primary" href="<?= base_url("auth/logout") ?>">Logout</a>
       </div>
     </div>
   </div>
 </div>

 <!-- Bootstrap core JavaScript-->

 <script type="text/javascript" src="<?= base_url() ?>vendor/sbadmin2/vendor/jquery/jquery.min.js"></script>

 <script type="text/javascript" src="<?= base_url() ?>vendor/sbadmin2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

 <!-- Core plugin JavaScript-->
 <script type="text/javascript" src="<?= base_url() ?>vendor/sbadmin2/vendor/jquery-easing/jquery.easing.min.js"></script>

 <!-- Custom scripts for all pages-->
 <script type="text/javascript" src="<?= base_url() ?>vendor/sbadmin2/js/sb-admin-2.min.js"></script>

 <!-- Page level plugins -->
 <script type="text/javascript" src="<?= base_url() ?>vendor/sbadmin2/vendor/chart.js/Chart.min.js"></script>

 <!-- Page level custom scripts -->
 <script type="text/javascript" src="<?= base_url() ?>vendor/sbadmin2/js/demo/chart-area-demo.js"></script>
 <script type="text/javascript" src="<?= base_url() ?>vendor/sbadmin2/js/demo/chart-pie-demo.js"></script>

 <script type="text/javascript">
   $('.deleted').on('click', function() {
     var link = "<?= base_url('admin/delete_map/'); ?>";
     var id = $(this).attr('id').toString();
     var res = link.concat(id);
     $(".modalDelete").attr('href', res);
     $('#exampleModalCenter').modal('show');
     //  console.log(id);
   });
 </script>

 </body>

 </html>