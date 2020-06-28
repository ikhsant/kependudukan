<?php
$title = 'Data Status';
include "../include/header.php";
?>

<?php
$xcrud->table('status');
$xcrud->table_name('Data Status');
$xcrud->after_insert('redirect','custom_function.php');

$xcrud->unset_view();
$xcrud->unset_csv();
$xcrud->unset_limitlist();
$xcrud->unset_numbers();
$xcrud->unset_pagination();
$xcrud->unset_print();
$xcrud->unset_sortable();
$xcrud->hide_button('save_new');
$xcrud->hide_button('save_edit');


echo $xcrud->render();
?>

<?php 
include "../include/footer.php";
?>