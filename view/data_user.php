<?php 
	include '../control/koneksi.php';
?> 

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data User</h3>
        </div>
        <div class="box-body">
          <button type="button" data-toggle="modal" data-target="#ModalAddUser" class="btn btn-info fa fa-plus" class="btn btn-danger"><span class="gliphicon gliphicon-plus" data-toggle="modal" data-target=.bs-example-modal-lg></span> Tambah Data</button>
        </div>

        <!-- ModalADD  -->
        <div id="ModalAddUser" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
              	<form action="#" method="post">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <h4 class="modal-title" id="myModalLabel"><center>Tambah Data User</center></h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                      <div class="row">
                        <div class="col-md-6">
                          <!-- /.form-group -->
                         <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" id="username" class="form-control" />
                          </div>
                          <!-- /.form-group -->
                          <div class="form-group">
                            <label> Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" />
                          </div>
                          <!-- /.form-group -->
                          <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" id="password" class="form-control" />
                          </div>
                          <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                          <!-- /.form-group -->
                          <div class="form-group">
                            <label> Alamat</label>
                            <input type="text" name="alamat" id="alamat" class="form-control"  />
                          </div>
                          <!-- /.form-group -->
                          <div class="form-group">
                            <label> No HP</label>
                            <input type="number" name="no_tlp" id="no_tlp" class="form-control"/>
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
                      <!-- /.col -->
                      </div>
                    <!-- /.row -->
                    </div>
                  <!-- /.box-body -->
                  <div class="modal-footer">
                      <button type="button" class="btn btn-info" id="saveUser">Save</button>
                      <button type="reset" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">
                      Close
                    </button>
                  </div>
             </form>
              </div>         
            </div>
          </div>
        </div>

        <!-- End-ModalADD  -->

      <!-- ModalEdit  -->
      <div class="modal fade" id="EditDataUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <form action="#" method="post" id="updateFormUser">
            <div class="modal-header">
              <h4 class="modal-title" id="exampleModalLabel"><center>Edit Data User</center></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" id="info_updateUser">
               
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="updateUser">Update </button>
            </div>
            </form>
          </div>
        </div>
      </div>

      <!-- End-ModalEdit  -->

       <!-- ModalHapus  -->
      <div class="modal fade" id="delDataUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <form action="#" method="post" id="delFormUser">
           <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title" id="myModalLabel"><center>Delete User</center></h4>
            </div> 
            <div class="modal-body" id="info_delUser">
               
            </div>
            <div class="modal-footer ">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="delUser">Delete</button>
            </div>
            </form>
          </div>
        </div>
      </div>

      <!-- End-ModalHapus  -->


<!-- /.box-header -->
	<div class="box-body">
		<table id="user" class="table table-bordered table-striped">
			<thead>
				<tr class="info">
					<th>Id Pengguna</th>
					<th>Username</th>
					<th>Nama</th>
					<th>Alamat</th>
					<th>No Hp</th>
					<th>Level</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$query = ("SELECT * FROM user");
					$hasil_query = mysqli_query($koneksi,$query);
					$number = 1;
					while ($row = mysqli_fetch_array($hasil_query)) {
				?>
			<tr>
        <td><?php echo $row['id_pengguna']; ?></td>
        <td><?php echo $row['username']; ?></td>
        <td><?php echo $row['nama']; ?></td>
        <td><?php echo $row['alamat']; ?></td>
        <td><?php echo $row['no_tlp']; ?></td>
        <td><?php echo $row['level']; ?></td>
       <td>
        <button class="btn btn-info btn-sm fa fa-edit edit_dataUser" id="<?php echo $row['id_pengguna'] ?>"> Edit</button>
       <button class="btn btn-danger btn-sm fa fa-trash del_data" id="<?php echo $row['id_pengguna'] ?>"> Hapus</button>
       </td>
     </tr>

      <?php 
        $number++;
        }
      ?>		
			</tbody>
		</table>
	</div>
</div>
</div>
</div>
</section>

 <script>
  $(function () {
    $('#user').DataTable()
    $('#pelajaran').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

<script type="text/javascript">
  $(document).ready(function(){

    $("#saveUser").click(function(){
      
      var username = $('#username').val();
      var nama = $('#nama').val();
      var password = $('#password').val();
      var alamat = $('#alamat').val();
      var no_tlp = $('#no_tlp').val();
      var level = $('#level').val();
      
      var value = {    username,
                       nama,
                       password,
                       alamat,
                       no_tlp,
                       level
                       };
                      
      $.ajax({
        type : 'POST',
        url : "../control/save_user.php",
        data :value,
        success: function(data){
          $('#ModalAddUser').modal('hide');
          $('.modal').remove();
          $('.modal-backdrop').remove();
          $('body').removeClass( "modal-open" );
          window.onload = data_user();
        }
      })
    });
    $(document).on('click','.edit_dataUser', function(){
    var edit_id=$(this).attr('id');
    $.ajax({
      url :"../control/edit_dataUser.php",
      type : "post",
      data : {edit_id : edit_id},
      success:function(data){
        $("#info_updateUser").html(data);
        $("#EditDataUser").modal('show');
      }
    });
  });
  $(document).on('click','#updateUser', function(){
    $.ajax({
      url:"../control/save_updateUser.php",
      type: "post",
      data: $("#updateFormUser").serialize(),
      success:function(data){
        $("#EditDataUser").modal('hide');
        $('.modal').remove();
        $('.modal-backdrop').remove();
        $('body').removeClass( "modal-open" );
        window.onload = data_user();
      }
    });
  });
  $(document).on('click','.del_data', function(){
    var del_id=$(this).attr('id');
    $.ajax({
      url :"../control/del_dataUser.php",
      type : "post",
      data : {del_id : del_id},
      success:function(data){
        $("#info_delUser").html(data);
        $("#delDataUser").modal('show');
      }
    });
  });  
   $(document).on('click','#delUser', function(){
    $.ajax({
      url:"../control/save_deleteUser.php",
      type: "post",
      data: $("#delFormUser").serialize(),
      success:function(data){
        $("#delDataUser").modal('hide');
        $('.modal').remove();
        $('.modal-backdrop').remove();
        $('body').removeClass( "modal-open" );
        window.onload = data_user();
      }
    });
  });
});
</script>
  