@extends('master')
@section('content')
<div class="col-md-12 d-flex">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Add Questions</h3>
        </div>

        <div class="col-md-12">
            @foreach ($errors->all() as $error)
            <div class="alert alert-danger">
                <ul>
                    <li>{{ $error }}</li>
                </ul>
            </div>
            @endforeach @if (Session::has("success"))
            <div class="alert alert-success">
                <ul>
                    <li>{{ Session::get("success") }}</li>
                </ul>
            </div>
            @endif
        </div>


        {!! Form::open(['action' => 'careersQuestion@store']) !!}
        {{ Form::token() }}
        <div class="box-body">
            <div class="form-group">
                <label for="question">Question</label>
            </div>
            <div class="form-group">
                {{ Form::text('question[]', '',array('class' => 'form-control','placeholder' => 'Question')) }}
            </div>
            <div id="TextBoxContainer">
                </div>
            <div class="form-group">
                    <button id="btnAdd" type="button" class="btn btn-success" data-toggle="tooltip" data-original-title="Add more controls"><i class="glyphicon glyphicon-plus-sign"></i>&nbsp; Add More Questions&nbsp;</button>
            </div>
            <div class="form-group">
                {{ Form::submit('Submit',array('class' => 'btn btn-primary')) }}
            </div>
        </div>
        {!! Form::close() !!}
        <script src="https://code.jquery.com/jquery-latest.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script>
$(function () {
    $("#btnAdd").bind("click", function () {
        var div = $("<div />");
        div.html(GetDynamicTextBox(""));
        $("#TextBoxContainer").append(div);
    });
    $("body").on("click", ".remove", function () {
        $(this).closest("tr").remove();
    });
});
function GetDynamicTextBox(value) {
    return '<div class="form-group">{{ Form::text("question[]", "",array("class" => "form-control","placeholder" => "Question")) }}</div>'
}
</script>
@endsection