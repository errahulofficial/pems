@extends('master')
@section('content')
<style>
.w-75{
	width:80%;
}
</style>
@if (Session::has("success"))
<div class="alert alert-success">
    <ul>
        <li>{{ Session::get("success") }}</li>
    </ul>
</div>
@endif
<div class="col-md-12 d-flex">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">My Territory</h3>

        </div>
        <!-- /.box-header -->

		<div class="d-flex">
		<div class="box-body w-75">
			<img src="" >
		</div>
        <div class="box-body table-responsive px-10 py-0">
            <table class="table table-hover">
                <tbody>
                    <tr>
                        <th></th>
                        <th>Counties</th>
                    </tr>
                    @foreach ($counties as $key => $item)
                    <tr>
                        <td>{{ $key }}</td>
                        <td>{{ $item->county_name}}</td>
                       
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="px-10 py-0"> {{ $counties->links() }}</div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>


@endsection