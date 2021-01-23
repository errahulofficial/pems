@extends('master')
@section('content')
<style>
.float-right{
  float:right
}
</style>
<div class="col-md-12 d-flex ">
 

  
    <div class="row" style="width:100%">
        <div class="col-md-12">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Add Careers Steps</h3>
            </div>
            <div class="col-md-12">

              @foreach ($errors->all() as $error)
              <div class="alert alert-danger">
                  <ul>
                      <li>{{ $error }}</li>
                  </ul>
              </div>
              @endforeach 
              
              @if (Session::has("success"))
              <div class="alert alert-success">
                  <ul>
                      <li>{{ Session::get("success") }}</li>
                  </ul>
              </div>
              @endif

              @if (Session::has("exists"))
              <div class="alert alert-warning">
                  <ul>
                      <li>{{ Session::get("exists") }}</li>
                  </ul>
              </div>
              @endif


              
          </div>

            {!! Form::open(['action' => 'careersStepsPage@storeAll','id'=>'form']) !!}
            {{ Form::token() }}

          <div class="row" style="width:100%;margin:10px 0">
            
          <div class="col-md-4 form-group">
          <label for="employeeName">Select Job Position</label>
          {{ Form::select('job_position_id',$jobPositionsArray,NULL,array('class'=>'form-control','required'=>'true')) }}
          </div>
           </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="box-group" id="accordion">
                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                <div class="panel box box-primary">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" class="collapsed">
                  <div class="box-header with-border">
                    <h4 class="box-title">Introduction</h4>
                    <i class="fa fa-angle-down float-right"></i>
                  </div>
                </a>
                  <div id="collapseOne" class="panel-collapse collapse in" aria-expanded="false">
                    <div class="box-body">
                        <div class="form-group">
                      <h4 for="video">Article</h4>
                    </div>
                      <div class="form-group">
                          {{ Form::textarea('introduction','',array('class' => 'form-control ckeditor','placeholder' => 'Introduction','required'=>'true')) }}
                      </div>
                    </div>
                  </div>
                </div>
                <div class="panel box box-primary">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="collapsed" aria-expanded="false">
                  <div class="box-header with-border">
                    <h4 class="box-title">Step 1</h4>
                    <i class="fa fa-angle-down float-right"></i>
                  </div>
                </a>
                  <div id="collapseTwo" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="video">Step Name</label>
                            {{ Form::text('stepname1','',array('class' => 'form-control','placeholder' => 'Step Name')) }}
                        </div>
                        <div class="form-group">
                            <label for="video">Select Step Type</label>
                            {{ Form::select('steptype1',['0'=>'- Select Step type -', 'video' =>'Video', 'text'=> 'Text'],'0',array('class' => 'form-control','required'=>'true')) }}
                        </div>
                        <div class="form-group embed1">
                            
                        </div>
                    </div>
                  </div>
                </div>
                <div class="panel box box-primary">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="collapsed" aria-expanded="false">
                  <div class="box-header with-border">
                    <h4 class="box-title">Step 2</h4>
                    <i class="fa fa-angle-down float-right"></i>
                  </div>
                </a>
                  <div id="collapseThree" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                      <div class="box-body">
                        <div class="form-group">
                          <label for="video">Step Name</label>
                          {{ Form::text('stepname2','',array('class' => 'form-control','placeholder' => 'Step Name')) }}
                      </div>
                      <div class="form-group">
                          <label for="video">Select Step Type</label>
                          {{ Form::select('steptype2',['0'=>'- Select Step type -', 'video' =>'Video', 'text'=> 'Text'],'0',array('class' => 'form-control','required'=>'true')) }}
                      </div>
                      <div class="form-group embed2">
                          
                      </div>
                        
                    </div>
                  </div>
                </div>
                <div class="panel box box-primary">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour" class="collapsed" aria-expanded="false">
                    <div class="box-header with-border">
                      <h4 class="box-title">Step 3</h4>
                      <i class="fa fa-angle-down float-right"></i>
                    </div>
                  </a>
                    <div id="collapseFour" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                        <div class="box-body">
                          <div class="form-group">
                            <label for="video">Step Name</label>
                            {{ Form::text('stepname3','',array('class' => 'form-control','placeholder' => 'Step Name')) }}
                        </div>
                        <div class="form-group">
                            <label for="video">Select Step Type</label>
                            {{ Form::select('steptype3',['0'=>'- Select Step type -', 'video' =>'Video', 'text'=> 'Text'],'0',array('class' => 'form-control','required'=>'true')) }}
                        </div>
                        <div class="form-group embed3">
                            
                        </div>
                        </div>
                    </div>
                  </div>
                  <div class="panel box box-primary">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive" class="collapsed" aria-expanded="false">
                      <div class="box-header with-border">
                        <h4 class="box-title">Step 4</h4>
                        <i class="fa fa-angle-down float-right"></i>
                      </div>
                    </a>
                      <div id="collapseFive" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                          <div class="box-body">
                            <div class="form-group">
                              <label for="video">Step Name</label>
                              {{ Form::text('stepname4','',array('class' => 'form-control','placeholder' => 'Step Name')) }}
                          </div>
                          <div class="form-group">
                              <label for="video">Select Step Type</label>
                              {{ Form::select('steptype4',['0'=>'- Select Step type -', 'video' =>'Video', 'text'=> 'Text'],'0',array('class' => 'form-control','required'=>'true')) }}
                          </div>
                          <div class="form-group embed4">
                              
                          </div>
                          </div>
                      </div>
                    </div>
                  <div class="panel box box-primary">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix" class="collapsed" aria-expanded="false">
                      <div class="box-header with-border">
                        <h4 class="box-title">Step 5</h4>
                        <i class="fa fa-angle-down float-right"></i>
                      </div>
                    </a>
                      <div id="collapseSix" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                          <div class="box-body">
                            <div class="form-group">
                              <label for="video">Step Name</label>
                              {{ Form::text('stepname5','',array('class' => 'form-control','placeholder' => 'Step Name')) }}
                          </div>
                          <div class="form-group">
                              <label for="video">Select Step Type</label>
                              {{ Form::select('steptype5',['0'=>'- Select Step type -', 'video' =>'Video', 'text'=> 'Text'],'0',array('class' => 'form-control','required'=>'true')) }}
                          </div>
                          <div class="form-group embed5">
                              
                          </div>
                          </div>
                      </div>
                    </div>
                  <div class="panel box box-primary">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" class="collapsed" aria-expanded="false">
                      <div class="box-header with-border">
                        <h4 class="box-title">Step 6</h4>
                        <i class="fa fa-angle-down float-right"></i>
                      </div>
                    </a>
                      <div id="collapseSeven" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                          <div class="box-body">
                            <div class="form-group">
                              <label for="video">Step Name</label>
                              {{ Form::text('stepname6','',array('class' => 'form-control','placeholder' => 'Step Name')) }}
                          </div>
                          <div class="form-group">
                              <label for="video">Select Step Type</label>
                              {{ Form::select('steptype6',['0'=>'- Select Step type -', 'video' =>'Video', 'text'=> 'Text'],'0',array('class' => 'form-control','required'=>'true')) }}
                          </div>
                          <div class="form-group embed6">
                              
                          </div>
                          </div>
                      </div>
                    </div>
                  <div class="panel box box-primary">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseEight" class="collapsed" aria-expanded="false">
                      <div class="box-header with-border">
                        <h4 class="box-title">Step 7</h4>
                        <i class="fa fa-angle-down float-right"></i>
                      </div>
                    </a>
                      <div id="collapseEight" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                          <div class="box-body">
                            <div class="form-group">
                              <label for="video">Step Name</label>
                              {{ Form::text('stepname7','',array('class' => 'form-control','placeholder' => 'Step Name')) }}
                          </div>
                          <div class="form-group">
                              <label for="video">Select Step Type</label>
                              {{ Form::select('steptype7',['0'=>'- Select Step type -', 'video' =>'Video', 'text'=> 'Text'],'0',array('class' => 'form-control','required'=>'true')) }}
                          </div>
                          <div class="form-group embed7">
                              
                          </div>
                          </div>
                      </div>
                    </div>
                  <div class="panel box box-primary">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseNine" class="collapsed" aria-expanded="false">
                      <div class="box-header with-border">
                        <h4 class="box-title">Step 8</h4>
                        <i class="fa fa-angle-down float-right"></i>
                      </div>
                    </a>
                      <div id="collapseNine" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                          <div class="box-body">
                            <div class="form-group">
                              <label for="video">Step Name</label>
                              {{ Form::text('stepname8','',array('class' => 'form-control','placeholder' => 'Step Name')) }}
                          </div>
                          <div class="form-group">
                              <label for="video">Select Step Type</label>
                              {{ Form::select('steptype8',['0'=>'- Select Step type -', 'video' =>'Video', 'text'=> 'Text'],'0',array('class' => 'form-control','required'=>'true')) }}
                          </div>
                          <div class="form-group embed8">
                              
                          </div>
                          </div>
                      </div>
                    </div>
                  <div class="panel box box-primary">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseTen" class="collapsed" aria-expanded="false">
                      <div class="box-header with-border">
                        <h4 class="box-title">Step 9</h4>
                        <i class="fa fa-angle-down float-right"></i>
                      </div>
                    </a>
                      <div id="collapseTen" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                          <div class="box-body">
                            <div class="form-group">
                              <label for="video">Step Name</label>
                              {{ Form::text('stepname9','',array('class' => 'form-control','placeholder' => 'Step Name')) }}
                          </div>
                          <div class="form-group">
                              <label for="video">Select Step Type</label>
                              {{ Form::select('steptype9',['0'=>'- Select Step type -', 'video' =>'Video', 'text'=> 'Text'],'0',array('class' => 'form-control','required'=>'true')) }}
                          </div>
                          <div class="form-group embed9">
                              
                          </div>
                          </div>
                      </div>
                    </div>
                  <div class="panel box box-primary">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseEleven" class="collapsed" aria-expanded="false">
                      <div class="box-header with-border">
                        <h4 class="box-title">Step 10</h4>
                        <i class="fa fa-angle-down float-right"></i>
                      </div>
                    </a>
                      <div id="collapseEleven" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                          <div class="box-body">
                            <div class="form-group">
                              <label for="video">Step Name</label>
                              {{ Form::text('stepname10','',array('class' => 'form-control','placeholder' => 'Step Name')) }}
                          </div>
                          <div class="form-group">
                              <label for="video">Select Step Type</label>
                              {{ Form::select('steptype10',['0'=>'- Select Step type -', 'video' =>'Video', 'text'=> 'Text'],'0',array('class' => 'form-control','required'=>'true')) }}
                          </div>
                          <div class="form-group embed10">
                              
                          </div>
                          </div>
                      </div>
                    </div>
                    <div class="panel box box-primary">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwelve" class="collapsed" aria-expanded="false">
                        <div class="box-header with-border">
                          <h4 class="box-title">Survey Questions</h4>
                          <i class="fa fa-angle-down float-right"></i>
                        </div>
                      </a>
                        <div id="collapseTwelve" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                          <div class="box-body">
                            <div class="form-group">
                                <label for="question">Add Survey Questions</label>
                            </div>
                            <div class="form-group">
                              <label for="video">Survey Header</label>
                              {{ Form::textarea('header_text','',array('class' => 'form-control ckeditor','placeholder' => 'Survey Header Text')) }}
                          </div>
                          <div class="form-group">
                            <label for="video">Survey Footer</label>
                            {{ Form::textarea('footer_text','',array('class' => 'form-control ckeditor','placeholder' => 'Survey Footer Text')) }}
                        </div>
                            @php 
                                $pin = rand(1000000, 9999999);
                                $pin2 = rand(1000000, 9999999); 
                                $string = $pin.$pin2;
                                @endphp
                            {{Form::hidden('step5', $string)}}
                            <div class="form-group">
                                {{ Form::text('question[]', '',array('class' => 'form-control','placeholder' => 'Question','required'=>'true')) }}
                            </div>
                            <div id="TextBoxContainer">
                            </div>
                            <div class="form-group">

                            </div>
                            <div class="form-group">
                                
                                <button id="btnAdd" type="button" class="btn btn-primary" data-toggle="tooltip"
                                    data-original-title="Add more controls"><i
                                        class="glyphicon glyphicon-plus-sign"></i>&nbsp; Add More
                                    Question Fields&nbsp;</button>
                            </div>

                            
                        </div>
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
                            $(this).closest("div").remove();
                        });
                        });
                         function GetDynamicTextBox(value) {
                          return '<div class="form-group" style="position:relative" >{{ Form::text("question[]", "",array("class" => "form-control","placeholder" => "Question","required"=>"true"))  }} <span style="position:absolute;right:0;top:0" class="btn btn-danger remove">remove</span> </div>'
                         }
                        </script>
                        </div>
                      </div>
                      <div class="row" style="width:100%;margin-top:20px">
                        <div class="form-group col-md-12">
                            {{ Form::submit('Save',array('class' => 'btn btn-success')) }}
                        </div>
                    </div>
              </div>
            </div>
            <!-- /.box-body -->
            {!! Form::close() !!}
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
     
</div>

<script>
  $(document).ready(function () {
  for (let index = 1; index <= 10; index++) {
    
    $('select[name="steptype'+index+'"]').change(function () {
      
      console.log($(this).val());
      if($(this).val() == 'text')
      {
        var text = '<label for="video">Enter Text</label><textarea id="step'+index+'" name="step'+index+'" class="form-control ckeditor" placeholder="Article"></textarea>';
        $('.embed'+index).empty();
        $('.embed'+index).append(text);
      }
      if($(this).val() == 'video')
      {
        var video = '<label for="video">Enter Vimeo/Youtube Video URL</label><input type="text" name="step'+index+'" class="form-control" placeholder="Video URL">';
        $('.embed'+index).empty();
        $('.embed'+index).append(video);
      }
      if($(this).val() == '0')
      {
        $('.embed'+index).empty();
      }
    });
  } 
});
  </script>
 @endsection