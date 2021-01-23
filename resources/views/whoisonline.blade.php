@extends('master')
@section('content')

<div class="col-md-12">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Who's Online</h3>
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
                <tbody>
                    <tr>

                        <th>UID</th>
                        <th>LID</th>
                        {{-- <th>Completed</th> --}}
                        <th>Name</th>
                        <th>Page</th>
                        <th>Last Action</th>
                        <th>IP</th>
                    </tr>
                    
                    @foreach ($users as $user) 
                   
                        @if (Cache::has('user-is-online-' . $user->id)) 
                      
                    <tr>

                        <td>{{ $user->id}}</td>
                        <td>{{ $user->id}}</td>
                        <td>{{ $user->fname . " " . $user->lname}}</td>
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
                                    </td> 
                                     <td>--}}
                            <td><a href="http://pems.auliu.com/default">http://pems.auliu.com/default</a>
                        </td>
                        <td>{{ 1}} min.</td>
                        <td>{{Request::ip()}}</td>

                    </tr>
                    @endif
                           
                    @endforeach
                </tbody>
            </table>

        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>
@endsection