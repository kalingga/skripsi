<!doctype html>
<html>
    <head>
        <title>Harviacode - Datatables</title>
        <link rel="stylesheet" href="http://localhost/simuh/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css"/>
        <style>
            .dataTables_wrapper .dataTables_processing {
                position: absolute;
                top: 50%;
                left: 50%;
                width: 100%;
                height: 40px;
                margin-left: -50%;
                margin-top: -25px;
                padding-top: 20px;
                text-align: center;
                font-size: 1.2em;
                color:grey;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Serverside Datatables - Harviacode
                            <div class="btn-group pull-right">
                                <a href="#">Add</a>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="tblmember">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>

        <script src="http://localhost/simuh/js/jquery-1.10.2.min.js"></script>
        <script src="http://localhost/simuh/js/bootstrap.min.js"></script>
        <script src="http://localhost/simuh/js/jquery.datatables.min.js"></script>
        <script //src="datatables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function() {
                $('#tblmember').DataTable( {
                    "bProcessing": true,
                    "bServerSide": true,
                    "sAjaxSource": "ajax/srvmember.php",
                    "sAjaxDataProp": ""
                } );
            } );
        </script>
    </body>
</html>
