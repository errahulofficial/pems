@extends('master') 
@section('content')
<div class="col-md-3 d-flex">

    <div class="box box-primary">
        <div class="box-header with-border d-flex align-items-center">
            <h3 class="box-title col-xs-6 d-flex align-items-center p-0">Add Portals</h3>
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
       {!! Form::open(['action' => 'PortalNameController@store','id'=>'form']) !!} 
        {{ Form::token() }}
        <div class="box-body">
            <div class="row">
			
			<div class="col-md-12 form-group">
                    <label for="portal_name">Portal Name</label> {{ Form::text('portal_name', '',array('class' => 'form-control','placeholder'
                    => 'Portal Name','required'=>'true')) }}
                </div>
				
                <div class="col-md-12 form-group">
                    <label for="portal_url">Portal Url</label> {{ Form::text('portal_url','',array('class' => 'form-control','placeholder'
                    => 'Portal URL','required'=>'true')) }}
                </div>
				
					<div class="col-md-12 form-group">
                    {{ Form::checkbox('accept_html','1',false,array('class' => 'form-control')) }} <label for="accept_html">Accept HTML</label> 
                </div>
				<div class="col-md-12 form-group">
                    {{ Form::checkbox('can_post_url','1',false,array('class' => 'form-control')) }} <label for="can_post_url">Can Post URL</label> 
                </div>
				
                <div class="col-md-12 form-group">
                    <label for="note">Notes</label> {{ Form::textarea('note','',array('class' => 'form-control','placeholder'
                    => 'Notes','required'=>'true')) }}
                </div>
                
                <div class="col-md-12 form-group">
                    {{ Form::submit('Add Portal',array('class' => 'btn btn-primary')) }}
                </div>
            </div>
        </div>
		
        {!! Form::close() !!}
    </div>
</div>
<div class="col-md-9 d-flex">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Portals</h3>
           
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
                        <th>Portal Name</th>
                        <th>Portal URL</th>
                        <th>Accept HTML</th>
                        <th>Can Post URL</th>
						<th>Action</th>
                    </tr>
					
                    @foreach ($names as $name)
                    <tr>
                        <td>{{ $name->portal_name}}</td>
                        <td>{{ $name->portal_url}}</td>
                        <td>@if ($name->accept_html == 1)
							<img src='/img/tick.png'>
								@else
									<img src='/img/cancel.png'>
								@endif
						</td>
						<td>@if ($name->can_post_url == 1)
							<img src='/img/tick.png'>
								@else
									<img src='/img/cancel.png'>
								@endif
						</td>
						
                        <td>
                            <a data-toggle="modal" data-target="#modal-delete-{{ $name->id}}" href=""> <span class="label label-danger"><i class="fa fa-trash "></i></span></a>
                            <div class="modal modal-danger fade" id="modal-delete-{{ $name->id}}" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-contents">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">Delete from list</h4>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                                            <a href="{{ url('pname-del') }}/{{ $name->id}}"><button type="button" class="btn btn-outline">Sure to Delete !</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="px-10 py-0"> {{ $names->links() }}</div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>
@endsection