@extends('dashboard.index')

@section('nama', 'Zona')

@section('css')
  <!-- DataTables CSS -->
  <link href="css/dataTables.bootstrap.css" rel="stylesheet">

  <!-- DataTables Responsive CSS -->
  <link href="css/dataTables.responsive.css" rel="stylesheet">

  <link href="css/bootstrap-toggle.min.css" rel="stylesheet">
@endsection

@section('content')

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

@include('dashboard.modal.zonamodal')

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