<?php
$title = 'Data Penduduk';
include "../include/header.php";
$desa = mysqli_query($conn,"SELECT * FROM desa");

?>

<div class="row">
	<div class="col-sm-4">
		<div class="panel panel-default">
		<div class="panel-heading">
			PILIH DESA
		</div>
		<div class="panel-body">
			<form>
				<div class="form-group">
					<label>Pilih DESA</label>
					<select name="desa" class="form-control" required>
					<?php foreach ($desa as $row): ?>
						<option value="<?= $row['id_desa'] ?>"><?= $row['nama_desa'] ?></option>
					<?php endforeach ?>
					</select>
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
		</div>
	</div>
</div>

<?php
$xcrud->table('penduduk');
$xcrud->table_name('Data Penduduk');
$xcrud->columns('no_kk,nik,nama,desa,status,keterangan');
$xcrud->fields('status.nama_status,status.keterangan',true);
$xcrud->relation('desa','desa','id_desa','nama_desa');
$xcrud->join('status','status','id_status');
$xcrud->relation('status','status','id_status','nama_status');

$xcrud->where('status.nama_status !=','Meninggal');
$xcrud->where('status.nama_status !=','Pindah Kecamatan');

if (isset($_GET['desa'])) {
	$xcrud->where('desa',$_GET['desa']);
}

$xcrud->unset_view();
// $xcrud->unset_csv();
// $xcrud->unset_limitlist();
// $xcrud->unset_numbers();
// $xcrud->unset_pagination();
// $xcrud->unset_print();
// $xcrud->unset_sortable();
$xcrud->hide_button('save_new');
$xcrud->hide_button('save_edit');


echo $xcrud->render();
?>

<?php 
include "../include/footer.php";
?>