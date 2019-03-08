<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
		<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">List Mata Kuliah</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Kode Matakuliah</th>
                                        <th>Matakuliah</th>
                                        <th>SKS</th>
                                        <th>Admin ID</th> 
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                 <tbody>
                                     <?php $datamatkul = $this->session->all_data;

                                        foreach ($datamatkul as $data) {
                                    ?>
                                    <tr>
                                        <td><?php echo $data->KD_matkul ?></td>
                                        <td><?php echo $data->Nama_matkul ?></td>
                                        <td><?php echo $data->SKS ?></td>
                                        <td><?php echo $data->Admin_id?></td>
                                        <td>
                                            <center>
                                            <a href="<?php echo site_url() ?>/admin/update_matkul?KD=<?php echo $data->KD_matkul ?>" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-pencil"></span></a>
                                            <a href="<?php echo base_url(); ?>index.php/admin/hapus_matkul?KD=<?php echo $data->KD_matkul ?>" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                                            </center>
                                        </td>
                                    </tr>
                            <?php } ?>
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
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

</body>

</html>