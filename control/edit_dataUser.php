<?php 
include 'koneksi.php';
if (isset($_POST['edit_id'])) {
	$id=$_POST['edit_id'];
	$sql="SELECT * FROM user WHERE id_pengguna='$id'";
	$result=mysqli_query($koneksi, $sql);
	while ($row=mysqli_fetch_array($result)) {
		$id=$row['id_pengguna'];
		$username=$row['username'];
		$nama = $row['nama'];
		$password = $row['password'];
		$alamat = $row['alamat'];
		$no_tlp = $row['no_tlp'];
		$level = $row['level'];
		}
}
?>		

	 <div class="row">
	 	<div class="col-md-6">
	 	<div class="form-group">
	 		<input type="hidden" name="edit_id" id="edit_id" class="form-control" value="<?php echo $id ?>" />
	     </div>
	      <!-- /.form-group -->
	     <div class="form-group">
	        <label>Username</label>
	        <input type="text" name="username" id="username" class="form-control" value="<?php echo $username ?>" />
	      </div>
	      <!-- /.form-group -->
	      <div class="form-group">
	        <label> Nama</label>
	        <input type="text" name="nama" id="nama" class="form-control" value="<?php echo $nama ?>">
	      </div>
	      <!-- /.form-group -->
	      <div class="form-group">
	        <label>Password</label>
	        <input type="password" name="password" id="password" class="form-control" value="<?php echo $password ?>"/>
	      </div>
	      <!-- /.form-group -->
	    </div>
	    <!-- /.col -->
	    <div class="col-md-6">
	    <div class="form-group">
 			<input type="hidden" name="edit_id" id="edit_id" class="form-control" value="<?php echo $id ?>" />
       </div>
	      <!-- /.form-group -->
	      <div class="form-group">
	        <label> Alamat</label>
	        <input type="text" name="alamat" id="alamat" class="form-control" value="<?php echo $alamat ?>" />
	      </div>
	      <!-- /.form-group -->
	      <div class="form-group">
	        <label> No HP</label>
	        <input type="text" name="no_tlp" id="no_tlp" class="form-control" value="<?php echo $no_tlp ?>"/>
	      </div>
	      <!-- /.form-group -->
	      <div class="form-group">
	          <label>Level</label>
	          <select name="level" id="level" class="form-control col-md-7 col-xs-12">
	            <option value="User">User</option>
	            <option value="Operator">Operator</option>
	          </select>
	       </div>
	    <!-- /.form-group -->
	</div>
</div>
