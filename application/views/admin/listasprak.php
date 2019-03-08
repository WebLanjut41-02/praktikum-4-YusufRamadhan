<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
		<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">List Asisten Praktikum</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <form role="form" action="<?=base_url();?>index.php/admin/searchasprak/" method="post">
                        <div class="form-group input-group">
                            <input type="text" class="form-control" name="cari">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button" name="search"><i class="fa fa-search"></i>
                                </button>
                            </span>    
                        </div>
                    </form>
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>NIM</th>
                                        <th>Nama Asprak</th>
                                        <th>Mata Kuliah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php for ($i=0; $i < count($nama_asprak); $i++) { 
                                        if(null !== ($nama_asprak[$i])){ ?>
                                    <tr class="odd gradeX">
                                        <td class="center"><?= $nim_asprak[$i] ?></td>
                                        <td class="center"><?= $nama_asprak[$i] ?></td>
                                        <td class="center"><?= $matkul_asprak[$i] ?></td>
                                    </tr>
                                  <?php }} ?>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                          </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?= base_url();?>assets/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?= base_url();?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?= base_url();?>assets/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="<?= base_url();?>assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url();?>assets/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="<?= base_url();?>assets/vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?= base_url();?>assets/dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
  <!--   <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script> -->

</body>

</html>