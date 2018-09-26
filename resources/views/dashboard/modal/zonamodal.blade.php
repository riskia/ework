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
                            <input class="form-control" name="namawilayah" required>
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
                            <input class="form-control" name="namaarea" required>
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
                            <input class="form-control" name="namarayon" required>
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