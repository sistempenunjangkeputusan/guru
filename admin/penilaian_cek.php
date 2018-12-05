<?php
	include "koneksi.php";

	$pilih_kriteria="SELECT * FROM subkriteria WHERE kd_kriteria='".$_POST["crt"]."'";
	$q=mysqli_query($koneksi, $pilih_kriteria);
	while($data_kriteria=mysqli_fetch_array($q)){

?>
    <option value="<?php echo $data_kriteria["kd_subkriteria"] ?>"><?php echo $data_kriteria["nm_subkriteria"] ?> (RN : <?php echo $data_kriteria["rn_awal"] ?> - <?php echo $data_kriteria["rn_akhir"] ?>)</option><br>

<?php
	}
?>