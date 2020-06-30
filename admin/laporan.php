<?php
$title = 'Data Laporan';
include "../include/header.php";
$status = mysqli_query($conn,"SELECT * FROM status");

?>

<div class="row">
	<div class="col-sm-4">
		<div class="panel panel-default">
		<div class="panel-heading">
			PILIH LAPORAN
		</div>
		<div class="panel-body">
			<form>
				<div class="form-group">
					<label>Pilih Status</label>
					<select name="status" class="form-control" required>
					<?php foreach ($status as $row): ?>
						<option value="<?= $row['id_status'] ?>"><?= $row['nama_status'] ?></option>
					<?php endforeach ?>
					</select>
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
		</div>
	</div>
<div class="col-sm-8">
<?php 
if (isset($_GET['status'])){
	$id_status = $_GET['status'];
	$status = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM status WHERE id_status = '$id_status' "));
	$nama_status = $status['nama_status'];

	$xcrud->table('penduduk');
	$xcrud->table_name($nama_status);
	$xcrud->where('status',$id_status);
	$xcrud->columns('no_kk,nik,nama,desa,keterangan');
	$xcrud->relation('desa','desa','id_desa','nama_desa');
	$xcrud->relation('status','status','id_status','nama_status');

	$xcrud->unset_add();
	$xcrud->unset_edit();
	$xcrud->unset_remove();
	$xcrud->unset_search();
	$xcrud->unset_view();
	$xcrud->unset_csv();
	$xcrud->unset_limitlist();
	$xcrud->unset_numbers();
	$xcrud->unset_pagination();
	// $xcrud->unset_print();
	$xcrud->unset_sortable();
	$xcrud->hide_button('save_new');
	$xcrud->hide_button('save_edit');

	echo $xcrud->render();
}
?>
</div>
</div>

<?php  
include '../include/footer.php';
?>