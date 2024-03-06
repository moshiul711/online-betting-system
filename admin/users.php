<?php
session_start();
if ($_SESSION['admin'] == null) {
    header('location:auth/login.php');
}
?>

<?php
include_once 'layouts/header.php';
?>



    <div id="page-wrapper" style="padding-top: 20px">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Registered User's Information
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="odd gradeX">
                                <td>Ali</td>
                                <td>01728365564</td>
                                <td>ali@gmail.com</td>
                                <td class="text-center">
                                    <a class="btn btn-primary" href="#">View</a>
                                    <a class="btn btn-success" href="#">Update</a>
                                    <a class="btn btn-danger" href="#">Delete</a>
                                </td>
                            </tr>
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
    </div>

</div>

<?php
include_once 'layouts/footer.php';
?>
