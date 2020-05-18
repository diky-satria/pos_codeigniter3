</div>
                </main>
                
            </div>
        </div>
        <!-- Modal logout -->
        <div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-footer">
                <a href="<?php echo base_url() ?>auth/logout" class="btn btn-sm btn-primary">Logout</a>
              </div>
            </div>
          </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url() ?>assets/sbadmin/dist/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url() ?>assets/sbadmin/dist/assets/demo/chart-area-demo.js"></script>
        <script src="<?php echo base_url() ?>assets/sbadmin/dist/assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url() ?>assets/sbadmin/dist/assets/demo/datatables-demo.js"></script>
        <script>
          $(document).ready(function() {
              $('#example').DataTable();
          } );

          function sum(){
            var harga_beli = document.getElementById('harga_beli').value;
            var harga_jual = document.getElementById('harga_jual').value;
            var hasil = parseInt(harga_jual) - parseInt(harga_beli);
            if(!isNaN(hasil)){
              var untung = document.getElementById('untung').value = hasil; 
            }
          }

          function hitung(){
            var bayar = document.getElementById('bayar').value;
            var sub_total = document.getElementById('sub_total').value;
            var result = parseInt(bayar) - parseInt(sub_total);
            if(!isNaN(result)){
              var kembali = document.getElementById('kembali').value = result;
            }
          }
        </script>
    </body>
</html>
