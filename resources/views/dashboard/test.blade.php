@extends('dashboard.index')

@section('nama', 'test')

@section('css')
  <!-- DataTables CSS -->
  <link href="css/dataTables.bootstrap.css" rel="stylesheet">

  <!-- DataTables Responsive CSS -->
  <link href="css/dataTables.responsive.css" rel="stylesheet">

  <link href="css/bootstrap-toggle.min.css" rel="stylesheet">
@endsection

@section('content')
{{-- {!! json_encode($data) !!} --}}

<ul class="list-group">
  <li v-for="responders in responders.data">@{{ responder.user }}</li>
</ul>
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
    var app = new Vue({
  el: '#app',
  data: {
    responders:[]
  }
  mounted: function() {
        $.get('/getuser', function(data) {
            app.responders = data;
        }
})
</script>
@endsection