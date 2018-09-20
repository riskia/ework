@extends('dashboard.index')

@section('nama', 'Menu')

@section('css')
  <!-- DataTables CSS -->
  <link href="css/dataTables.bootstrap.css" rel="stylesheet">

  <!-- DataTables Responsive CSS -->
  <link href="css/dataTables.responsive.css" rel="stylesheet">

  <link href="css/bootstrap-toggle.min.css" rel="stylesheet">
@endsection

@section('content')
<input type="checkbox" checked id="test" value="halo" v-model="message" >
<label for="test">hallo</label>
<span>Message is: @{{ message }}</span>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Menu List <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">add</button><br>
            </div>
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Add Menu</h4>
                        </div>
                        <form action="{{ url('addmenu') }}" method="POST">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Nama Menu</label>
                                    <input class="form-control" name="namamenu">
                                </div>
                                <div class="form-group">
                                    <label>Link Menu</label>
                                    <input class="form-control" name="linkmenu">
                                </div>
                                <div class="form-group">
                                    <label>Icon Menu</label>
                                    <input class="form-control" name="iconmenu">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                                {{ csrf_field() }}
                            </div>
                        </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>id_menu</th>
                            <th>Nama Menu</th>
                            <th>Link Menu</th>
                            <th>icon menu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allmenu as $menus)
                        <tr>
                          <td>{{ $menus->id_list_menu }}</td>
                          <td>{{ $menus->nama_menu }}</td>
                          <td>{{ $menus->link_menu }}</td>
                          <td><div class="{{ $menus->icon_menu }}"></div></td>
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

<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <b>Menu Management</b>
            </div>
            <!-- .panel-heading -->
            <div class="panel-body">
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><b>Manajer</b></a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="form-group">
                                    <form action="addusermenu" method="POST">
                                        <input type="hidden" name="userlevel" value="2">
                                        @foreach ($data as $item)
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="menu" id="{{ $item->nama_menu }}" v-model="cek" value="{{ $item->id_list_menu }}"
                                                @if ($item->id_user_level == '2' &&  $item->id_list_menu = true)
                                                    checked
                                                @endif>
                                                <label for="{{ $item->nama_menu }}">{{ $item->nama_menu }}</label>
                                            </label>
                                            {{-- <input type="hidden" name="menus[]" value="{{ $item->id_list_menu }}"> --}}
                                        </div>
                                        @endforeach
                                        <span>Checked names: @{{ cek }}</span><br>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><b>Asman</b></a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="form-group">
                                    <form action="addusermenu" method="POST">
                                        <input type="hidden" name="userlevel" value="3">
                                        @foreach ($data as $item)
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="menu[]" value="{{ $item->id_list_menu }}" @if ($item->id_user_level == '3' &&  $item->id_list_menu = true)
                                                    checked
                                                @endif>{{ $item->nama_menu }}
                                            </label>
                                            <input type="hidden" name="menus[]" value="{{ $item->id_list_menu }}">
                                        </div>
                                        @endforeach
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><b>SPV</b></a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="form-group">
                                    <form action="addusermenu" method="POST">
                                        <input type="hidden" name="userlevel" value="4">
                                        @foreach ($data as $item)
                                        <div class="checkbox">
                                            <label>
                                                {{-- <input type="checkbox" name="menu[]" value="{{ $item->id_list_menu }}" @if ($item->SPV == 1)
                                                    checked
                                                @endif>{{ $item->nama_menu }} --}}
                                            </label>
                                            <input type="hidden" name="menus[]" value="{{ $item->id_list_menu }}">
                                        </div>
                                        @endforeach
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><b>Operator</b></a>
                            </h4>
                        </div>
                        <div id="collapseFour" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="form-group">
                                    <form action="addusermenu" method="POST">
                                        <input type="hidden" name="userlevel" value="5">
                                        @foreach ($data as $item)
                                        <div class="checkbox">
                                            <label>
                                                {{-- <input type="checkbox" name="menu[]" value="{{ $item->id_list_menu }}" @if ($item->Operator == 1)
                                                    checked
                                                @endif>{{ $item->nama_menu }} --}}
                                            </label>
                                            <input type="hidden" name="menus[]" value="{{ $item->id_list_menu }}">
                                        </div>
                                        @endforeach
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->  
@endsection

@section('js')
  <!-- DataTables JavaScript -->
  <script src="js/jquery.dataTables.min.js"></script>
  <script src="js/dataTables.bootstrap.min.js"></script>
  <script src="js/dataTables.responsive.js"></script>

  <script src="js/bootstrap-toggle.min.js"></script>

  <!-- Page-Level Demo Scripts - Tables - Use for reference -->
  <script>
      $(document).ready(function() {
          $('#dataTables-example').DataTable({
              responsive: true
          });
      });
  </script>

<script src="js/vue.js"></script>

<script>
  new Vue({
  el: '#app',
  data: {
    message: [],
    cek: []
  }
})
</script>
@endsection