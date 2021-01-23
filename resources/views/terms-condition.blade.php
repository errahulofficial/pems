@extends('master')
<style>
.toc{
	max-height: 500px !important;
}
</style>
@section('content')
<div class="col-md-12">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Terms & Conditions</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive px-10 py-0">
           {{--  @if (Session::has("success-delete"))
            <div class="alert alert-success">
                <ul>
                    <li>{{ Session::get("success-delete") }}</li>
                </ul>
            </div>
            @endif --}}
            <table class="table table-hover">
                 <div class="col-md-12 form-group">
                    {{ Form::textarea('termsCond', $newtoc,array('class' => 'form-control toc','required'=>'true', 'rows' => 50,)) }}
                </div>
            </table>

        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>
@endsection