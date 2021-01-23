@extends('master')
@section('content')
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
            <h3 class="box-title">My Team</h3>

        </div>
        <!-- /.box-header -->

        <div class="box-body table-responsive px-10 py-0">
            <table class="table table-hover">
                <tbody>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Skype</th>
                        <th>Phone</th>
                        <th>Has</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($salesteam as $item)
                    <tr>
                        <td>{{ $item->sales_person_name }}</td>
                        <td>{{ $item->sales_person_email }}</td>
                        <td>{{ $item->sales_person_skype }}</td>
                        <td>{{ $item->sales_person_phone }}</td>
                        <td>{{ '--' }}</td>
                        <td>{{ '--' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="px-10 py-0"> {{ $salesteam->links() }}</div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>


@endsection