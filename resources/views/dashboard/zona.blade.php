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
                        {{-- @foreach ($allmenu as $menus)
                        <tr>
                          <td>{{ $menus->list_menu_id }}</td>
                          <td>{{ $menus->nama_menu }}</td>
                          <td>{{ $menus->link_menu }}</td>
                          <td><div class="{{ $menus->icon_menu }}"></div></td>
                        </tr>
                        @endforeach --}}
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

<!-- /.col-lg-6 -->
<div class="col-lg-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            Wilayah
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalwilayah">add</button>
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Wilayah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($wilayah as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama_wilayah }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
</div>
<!-- /.col-lg-6 -->

<!-- /.col-lg-6 -->
<div class="col-lg-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            Area
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalarea">add</button>
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Area</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($area as $item1)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item1->wilayah->nama_wilayah }},<b>{{ $item1->nama_area }}</b></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
</div>
<!-- /.col-lg-6 -->

<!-- /.col-lg-6 -->
<div class="col-lg-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            Rayon
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalrayon">add</button>
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        @foreach ($rayon as $item2)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item2->area->wilayah->nama_wilayah }},{{ $item2->area->nama_area }},<b>{{ $item2->nama_rayon }}</b></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
</div>
<!-- /.col-lg-6 -->

<!-- Modal Wilayah-->
<div class="modal fade" id="modalwilayah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Add Wilayah</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ url('/addwilayah') }}"">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama Wilayah</label>
                            <input class="form-control" name="namawilayah">
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
<!-- /.modal Wilayah-->

<!-- Modal Area-->
<div class="modal fade" id="modalarea" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Add Area</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ url('/addarea') }}"">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama Area</label>
                            <input class="form-control" name="namaarea">
                            <label>Pilih Wilayah</label>
                            <select class="form-control" name="wilid">
                                @foreach ($wilayah as $wilselect)
                                <option value="{{ $wilselect->wilayah_id }}">{{ $wilselect->nama_wilayah }}</option>
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
<!-- /.modal Area-->

<!-- Modal Rayon-->
<div class="modal fade" id="modalrayon" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Add Area</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ url('/addrayon') }}"">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama Rayon</label>
                            <input class="form-control" name="namarayon">
                            <label>Pilih Area</label>
                            <select class="form-control" name="areaid">
                                @foreach ($area as $arselect)
                                <option value="{{ $arselect->area_id }}">{{ $arselect->wilayah->nama_wilayah }},{{ $arselect->nama_area }}</option>
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
<!-- /.modal Rayon-->

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
@endsection