<div class="table-responsive">
    <table class="table table-bordered table-hover" id="myTable">
        <thead class="thead-dark">
            <tr>
            {{ $thead }}
            </tr>
        </thead>
        <tbody>
            {{ $slot }}
        </tbody>
    </table>
</div>
@section('js')
    <script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );

    </script>
@stop
