<?php
    include "koneksi.php";
   
    $sel_krit = "SELECT * FROM subkriteria WHERE kd_kriteria='".$_POST["krit"]."'";
    $q=mysqli_query($koneksi, $sel_krit);
    while($data_krit = mysqli_fetch_array($q)){
   
    ?>
    <option value="<?php echo $data_krit["kd_subkriteria"] ?>"><?php echo $data_krit["nm_subkriteria"] ?></option><br>
   
    <?php
    }
?>