@extends('master') 
@section('content')
<div class="col-md-12">
        <div class="col-md-12">

                <div class="box box-primary">
                    <div class="box-header with-border d-flex align-items-center">
                        <h3 class="box-title col-xs-12 d-flex align-items-center p-0">Sales Training</h3>
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
            
                  
                 </div>
            </div>

            @foreach($publications as $publicationsView)

            
             
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{ $publicationsView->category_name}} ({{ $publicationsView->category_title}})</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive px-10 py-0">
                        @if (Session::has("success-delete"))
                        <div class="alert alert-success">
                            <ul>
                                <li>{{ Session::get("success-delete") }}</li> 
                            </ul>
                        </div>
                        @endif
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                   
                                    <th>Title</th>
                                    <th>Duration</th>
                                    {{-- <th>Completed</th> --}}
                                    <th>Video</th>
                                    <th>Download PDF</th>
                                </tr>
                                @foreach ($publicationsView->sales_training_database_model as $language)
                                    
                                
                                <tr>
                                    
                                    <td>{{ $language->title}}</td>
                                    <td>{{ $language->duration}} min.</td>
                                    {{-- <td>
                                            @php 
                                            $categorya = $language->completed;
                                            if($categorya == '0'){
                                                echo 'Not';
                                            }
                                            else{
                                                echo 'Yes';
                                            }
                                            @endphp
                                    </td> --}}
                                    <td>
                                    <a target="_blank" href="{{ $language->video}}">View</a>
                                    </td>
                                <td><a target="_blank" href="{{url('')}}/sales_training/{{ $language->documents}}">Download/View</a> </td>
                                 
                                </tr>
                                @endforeach
                               
                            </tbody>
                        </table>
                       
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            @endforeach 
</div>

@endsection