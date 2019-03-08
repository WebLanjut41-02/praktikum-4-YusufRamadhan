<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

						        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Update Mata Kuliah</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                           
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="<?=base_url();?>index.php/admin/proses_updatemk" method="post">
                                        
                                        <div class="form-group">
                                            <label>Kode Mata Kuliah</label>
                                            <input class="form-control" type="text" name="kdmk" value="<?php echo $dataMatkul[0]->KD_matkul ?>" readonly>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Nama Mata Kuliah</label>
                                            <input class="form-control" type="text" name="mk" value="<?php echo $dataMatkul[0]->Nama_matkul ?>">
                                        </div>
                                    
                                        <div class="form-group">
                                            <label>SKS</label>
                                            <select class="form-control" name='sks'>
                                                <option value="1" <?php if($dataMatkul[0]->SKS=="1") echo "selected" ?> >1</option>
                                                <option value="2" <?php if($dataMatkul[0]->SKS=="2") echo "selected" ?> >2</option>
                                                <option value="3" <?php if($dataMatkul[0]->SKS=="3") echo "selected" ?> >3</option>
                                                <option value="4" <?php if($dataMatkul[0]->SKS=="4") echo "selected" ?> >4</option>
                                                <option value="5" <?php if($dataMatkul[0]->SKS=="5") echo "selected" ?> >5</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-success" name="inputmk">Submit</button>
                                        <button type="reset" class="btn btn-default">Reset Button</button>
                                    </form>
                                </div>
                            </div>
                            <!-- /.row (nested) -->
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
    <script src="<?=base_url();?>assets/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?=base_url();?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?=base_url();?>assets/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?=base_url();?>assets/dist/js/sb-admin-2.js"></script>

</body>

</html>
