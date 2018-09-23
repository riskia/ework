@extends('dashboard.index')

@section('nama', 'Users')

@section('css')
  <!-- DataTables CSS -->
  <link href="css/dataTables.bootstrap.css" rel="stylesheet">

  <!-- DataTables Responsive CSS -->
  <link href="css/dataTables.responsive.css" rel="stylesheet">
@endsection

@section('content')

  <div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                User List
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalrayon">add</button>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>i_user</th>
                            <th>User Level</th>
                            <th>Username</th>
                            <th>Nama</th>
                            <th>Zona</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $users)
                        <tr>
                          <td>{{ $users->user_id }}</td>
                          <td>{{ $users->userlevel->nama_user_level }}</td>
                          <td>{{ $users->username }}</td>
                          <td>{{ $users->nama_user }}</td>
                          <td>
                            @if ($users->rayon!=null)
                                {{ $users->rayon->area->wilayah->nama_wilayah }},{{ $users->rayon->area->nama_area }},{{ $users->rayon->nama_rayon }}
                          @else
                              -
                          @endif
                              
                           </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>

<!-- Modal Add user-->
<div class="modal fade" id="modalrayon" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Add Area</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ url('/adduser') }}"">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama User</label>
                            <input class="form-control" name="namauser" required>
                            <label>Username</label>
                            <input class="form-control" name="username" required>
                            <label>Password</label>
                            <input class="form-control" name="namarayon" type="password" required>
                            <label>Pilih Zona</label>
                            <select class="form-control" name="rayonid">
                                @foreach ($rayon as $rayon)
                                <option value="{{ $rayon->rayon_id }}">{{ $rayon->area->wilayah->nama_wilayah }},{{ $rayon->area->nama_area }}, {{ $rayon->nama_rayon }}</option>
                                @endforeach
                            </select>
                            <label>Pilih User Level</label>
                            <select class="form-control" name="userlevelid">
                                @foreach ($userlevel as $userlevel)
                                <option value="{{ $userlevel->user_level_id }}">{{ $userlevel->nama_user_level }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        {{ csrf_field() }}
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal Add User-->
  
@endsection

@section('js')
  <!-- DataTables JavaScript -->
  <script src="js/jquery.dataTables.min.js"></script>
  <script src="js/dataTables.bootstrap.min.js"></script>
  <script src="js/dataTables.responsive.js"></script>

  <!-- Page-Level Demo Scripts - Tables - Use for reference -->
  <script>
      $(document).ready(function() {
          $('#dataTables-example').DataTable({
              responsive: true
          });
      });
  </script>
@endsection