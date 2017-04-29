<?php //error_reporting(0);
/**
 * @File  : srvmember.php
 * @Author: sukmo < dev@ipnudiy.or.id >
 * @Date  : 2017-01-24 12:17:58
 * @Modif : sukmo
 * @Time  : 2017-01-31 15:55:57
 */

//if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' )) {
    
    require '../core/ssp.class.php';

 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
// entitas tbl_member
// id_member
// username
// password
// nama
// alamat
// telp
// status


$table="tbl_member";

$primaryKey="id_member";


$columns = array(
    array( 'db' => 'nama', 'dt' => 'nama' ),
    array( 'db' => 'username',  'dt' => 'username' ),
    array( 'db' => 'telp',   'dt' => 'telp' ),
    array( 'db' => 'status',     'dt' => 'status' )
    
);
 
// SQL server connection information
$sql_details = array(
    'user' => 'root',
    'pass' => 'toor',
    'db'   => 'db_simuh',
    'host' => 'localhost'
);
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */
 
echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);

//}