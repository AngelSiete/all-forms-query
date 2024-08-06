<?php
 /*
Template Name: server_processing
*/
/*
 * @license MIT - https://datatables.net/license_mit
 */
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 */
 
// DB table to use
$table = <<<EOT
 (
   SELECT r.id AS id, r.form_id, r.source_url AS link, r.date_updated,
    MAX(IF(o.meta_key = 4, o.meta_value, NULL)) AS name,
    MAX(IF(o.meta_key = 8, o.meta_value, NULL)) AS razonsocial,
    MAX(IF(o.meta_key = 9, o.meta_value, NULL)) AS unicarazonsocial,
    MAX(IF(o.meta_key = 11, o.meta_value, NULL)) AS grupo,
    MAX(IF(o.meta_key = 12, o.meta_value, NULL)) AS identificacionfiscal,
    MAX(IF(o.meta_key = 13, o.meta_value, NULL)) AS domiciliosocial,
    MAX(IF(o.meta_key = 3230, o.meta_value, NULL)) AS cp,
    MAX(IF(o.meta_key = 16, o.meta_value, NULL)) AS poblacion,
    MAX(IF(o.meta_key = 17, o.meta_value, NULL)) AS provincia,
    MAX(IF(o.meta_key = 20, o.meta_value, NULL)) AS pais,
    MAX(IF(o.meta_key = 3223, o.meta_value, NULL)) AS numpersonasempleadas,
    MAX(IF(o.meta_key = 3219, o.meta_value, NULL)) AS nombrepersonacontacto,
    MAX(IF(o.meta_key = 3220, o.meta_value, NULL)) AS apellidospersonacontacto,
    MAX(IF(o.meta_key = 22, o.meta_value, NULL)) AS cargopersonacontacto,
    MAX(IF(o.meta_key = 24, o.meta_value, NULL)) AS paispersonacontacto,
    MAX(IF(o.meta_key = 3229, o.meta_value, NULL)) AS tlfpersonacontacto,
    MAX(IF(o.meta_key = 27, o.meta_value, NULL)) AS emailpersonacontacto,
    MAX(IF(o.meta_key = 41, o.meta_value, NULL)) AS provinciasinocoincide,
    MAX(IF(o.meta_key = 45, o.meta_value, NULL)) AS paissinocoincide,
    MAX(IF(o.meta_key = 3226, o.meta_value, NULL)) AS fecharecibiroferta,
    MAX(IF(o.meta_key = 3227, o.meta_value, NULL)) AS fecharealizarauditoria,
    MAX(IF(o.meta_key = 55, o.meta_value, NULL)) AS disponecertificacion,
    MAX(IF(o.meta_key = 56, o.meta_value, NULL)) AS nombrecertificacionyorganismo,
    MAX(IF(o.meta_key = 57, o.meta_value, NULL)) AS tecnicasasistidasordenador,
    MAX(IF(o.meta_key = 142, o.meta_value, NULL)) AS tipoformulario,
    MAX(IF(o.meta_key = 3190, o.meta_value, NULL)) AS correo,
    MAX(IF(o.meta_key = 7743, o.meta_value, NULL)) AS cliente,
    MAX(IF(o.meta_key = 99.1, o.meta_value, NULL)) AS politicaprivacidad,
    MAX(IF(o.meta_key = 100.1, o.meta_value, NULL)) AS comunicacioncomercial
    from kz2205M_gf_entry AS r 
    INNER JOIN kz2205M_gf_entry_meta AS o ON r.id = o.entry_id
    GROUP BY r.id
 ) temp
EOT;
 
// Table's primary key
$primaryKey = 'id';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'id', 'dt' => 0 ),
    array(
        'db' => 'id',
        'dt' => 'DT_RowId',
        'formatter' => function( $d, $row ) {
            // Technically a DOM id cannot start with an integer, so we prefix
            // a string. This can also be useful if you have multiple tables
            // to ensure that the id is unique with a different prefix
            return 'row_'.$d;
        }
    ),
    array( 'db' => 'date_updated',  'dt' => 1, 'formatter' => function( $d, $row ) {
            return date( 'd-m-Y', strtotime($d));
        } ),
    array( 'db' => 'tipoformulario', 'dt' => 2 ),
    array( 'db' => 'razonsocial',  'dt' => 3 ),
    array( 'db' => 'name',  'dt' => 4 ),
    array( 'db' => 'correo',  'dt' => 5 ),
    array( 'db' => 'cliente',  'dt' => 6 ),
    array( 'db' => 'unicarazonsocial',  'dt' => 8 ),
    array( 'db' => 'grupo',  'dt' => 9 ),
    array( 'db' => 'identificacionfiscal',  'dt' => 10 ),
    array( 'db' => 'domiciliosocial',  'dt' => 11 ),
    array( 'db' => 'cp',  'dt' => 12 ),
    array( 'db' => 'poblacion',  'dt' => 13 ),
    array( 'db' => 'provincia',  'dt' => 14 ),
    array( 'db' => 'pais',  'dt' => 15 ),
    array( 'db' => 'numpersonasempleadas',  'dt' => 16 ),
    array( 'db' => 'nombrepersonacontacto',  'dt' => 18 ),
    array( 'db' => 'apellidospersonacontacto',  'dt' => 19 ),
    array( 'db' => 'cargopersonacontacto',  'dt' => 20 ),
    array( 'db' => 'paispersonacontacto',  'dt' => 21 ),
    array( 'db' => 'tlfpersonacontacto',  'dt' => 22 ),
    array( 'db' => 'emailpersonacontacto',  'dt' => 23 ),
    array( 'db' => 'provinciasinocoincide',  'dt' => 26 ),
    array( 'db' => 'paissinocoincide',  'dt' => 27 ),
    array( 'db' => 'fecharecibiroferta',  'dt' => 30 ),
    array( 'db' => 'fecharealizarauditoria',  'dt' => 31 ),
    array( 'db' => 'disponecertificacion',  'dt' => 32 ),
    array( 'db' => 'nombrecertificacionyorganismo',  'dt' => 33 ),
    array( 'db' => 'tecnicasasistidasordenador',  'dt' => 34 ),
    array( 'db' => 'politicaprivacidad',  'dt' => 36 ),
    array( 'db' => 'comunicacioncomercial',  'dt' => 37 ),
    array( 'db' => 'id', 'dt' => 38 ),
);
 
// SQL server connection information
$sql_details = array(
    'user' => '',
    'pass' => '',
    'db'   => '',
    'host' => '',
    'charset' => 'utf8'
);
 
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */
 
require( 'ssp.class.php' );
 
echo json_encode(
    SSP::simple( $_POST, $sql_details, $table, $primaryKey, $columns )
);