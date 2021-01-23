@extends('master') 
@section('content')
<div class="col-md-5 d-flex">

    <div class="box box-primary">
        <div class="box-header with-border d-flex align-items-center">
            <h3 class="box-title col-xs-12 d-flex align-items-center p-0">Update Recruitment Training</h3>
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

        @foreach($category as  $categorySelect)
        {!! Form::open(['action' => ['recruitmentTrainingDatabase@update',''.$categorySelect->recruitment_training_id],'id'=>'form','files'=>'true',]) !!} 
        {{ Form::token() }}
        <div class="box-body">
            <div class="row">

                <div class="col-md-12 form-group">
                    <label for="recruitment_training_category_id">Select Category</label> 
                    {{ Form::select('recruitment_training_category_id',$selectrecruitment_training_category,NULL,array('class'=>'form-control','required'=>'true','id'=>'recruitment_training_category_id',))
                    }}

<script>
        $('#recruitment_training_category_id').prepend($("<option selected></option>").attr("value",'{{$categorySelect->recruitment_training_category_id}}').text('{{$categorySelect->category_name}}')); 
    </script>
                </div>

                <div class="col-md-12 form-group">
                    <label for="Title">Title</label>
                     {{ Form::text('title', $categorySelect->title,array('class' => 'form-control','placeholder'
                    => 'Title','required'=>'true')) }}
                </div>

                <div class="col-md-12 form-group">
                    <label for="Duration">Duration</label>
                     {{ Form::text('duration', $categorySelect->duration,array('class' => 'form-control','placeholder'
                    => 'Duration','required'=>'true')) }}
                </div>

                <div class="col-md-12 form-group">
                    <label for="Video">Video URL (Youtube/Vimeo)</label>
                     {{ Form::text('video', $categorySelect->video,array('class' => 'form-control','placeholder'
                    => 'Video','required'=>'true')) }}
                </div>

                <div class="col-md-12 form-group">
                
                    <label for="Documents">Document (PDF, Doc, Docx, Png, Jpg)</label>
                    <label for=""><a href="{{url('recruitment_training')}}/{{$categorySelect->documents}}">Document</a></label>
                    
                     {{ Form::file('documents',array('class' => 'form-control','placeholder'
                    => 'Documents')) }}
                </div>
               
                <div class="col-md-12 form-group">
                    {{ Form::submit('UPDATE RECRUITMENT TRAINING',array('class' => 'btn btn-warning')) }}
                </div>
                
            </div>
        </div>
        {!! Form::close() !!}
        @endforeach
     </div>
</div>
@endsection