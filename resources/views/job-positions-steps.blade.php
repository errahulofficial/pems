@extends('master')
@section('content')
<style>
    .description {
        font-size: 1em;
        display: inline-block;
        margin-top: 10px;
        margin-left: 0px;
        margin-bottom: 0px;
        color: rgb(23, 23, 23);
        overflow: hidden;
        font-weight: normal;
        -webkit-user-select: none;
        /* Safari */
        -moz-user-select: none;
        /* Firefox */
        -ms-user-select: none;
        /* IE10+/Edge */
        user-select: none;
        /* Standard */

    }

    .colorpicker {
        position: relative;
        z-index: 10;
        display: block;
        width: 100%;
        border-radius: 10px;
        height: auto;
        background-color: #fff;
        transition: all 0.8s;
        -webkit-user-select: none;
        /* Safari */
        -moz-user-select: none;
        /* Firefox */
        -ms-user-select: none;
        /* IE10+/Edge */
        user-select: none;
        /* Standard */
        -webkit-box-shadow: none;
        -moz-box-shadow: none;
        box-shadow: none;
    }

    .picker {
        display: inherit;
    }

    .swatch {
        margin-left: 0;
        margin-right: auto;
        margin-top: 5px;
        margin-bottom: 5px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        width: 100%;
        height: 30px;
        border-radius: 20px;
        border: 1px #222d32 solid;
        box-shadow: none;
    }

    .slider-container {
        margin-left: 0;
        margin-right: auto;
        margin-top: 5px;
        margin-bottom: 15px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        width: 100%;
        height: 30px;
        border: 0px #222d32 solid;
        border-radius: 20px;
    }

    .slider {
        -webkit-appearance: none;
        -moz-appearance: none;
        /* Override default CSS styles */
        appearance: none;
        width: 100%;
        /* Full-width */
        height: 30px;
        /* Specified height */
        outline: none;
        /* Remove outline */
        margin: 0 auto;
        box-shadow: none;
    }

    .slider::-webkit-slider-thumb:hover {
        border: 2px rgb(151, 174, 243) solid;
        border: 2px rgba(151, 174, 243, 0.8) solid;
    }

    .slider::-webkit-slider-thumb {
        -webkit-appearance: none;
        -moz-appearance: none;
        /* Override default look */
        appearance: none;
        width: 28px;
        /* Set a specific slider handle width */
        height: 28px;
        /* Slider handle height */
        border-radius: 30px;
        border: 2px rgb(255, 255, 255) solid;
        border: 2px rgba(255, 255, 255, 0.8) solid;
        box-shadow: none;
        cursor: pointer;
        /* Cursor on hover */
    }

    .slider::-moz-range-thumb {
        width: 28px;
        /* Set a specific slider handle width */
        height: 28px;
        /* Slider handle height */
        border-radius: 30px;
        border: 2px rgb(64, 99, 206) solid;
        border: 2px rgba(64, 99, 206, 0.8) solid;
        cursor: pointer;
        /* Cursor on hover */
    }

    form {
        margin: auto;
    }

    input {
        width: 100%;
    }

    .hue {
        background-image: linear-gradient(to right, red, orange, yellow, green, blue, indigo, violet);
        margin-left: auto;
        margin-right: auto;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        border: 1px #222d32 solid;
        border-radius: 20px;
    }

    .satcolor {
        background-color: transparent;
    }

    .sat {
        background-image: linear-gradient(to right, #494949 0%, transparent 100%), linear-gradient(to right, #fff 0%, transparent 0%);
        margin-left: auto;
        margin-right: auto;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        border: 1px #222d32 solid;
        border-radius: 20px;
    }

    .light {
        background-image: linear-gradient(to right, #000 0%, transparent 100%), linear-gradient(to right, #fff 0%, transparent 100%);
        margin-left: auto;
        margin-right: auto;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        border: 1px #222d32 solid;
        border-radius: 20px;
    }

</style>
<div class="col-md-5 d-flex">

    <div class="box box-primary">
        <div class="box-header with-border d-flex align-items-center">
            <h3 class="box-title col-xs-12 d-flex align-items-center p-0">Add Job positions Step
            </h3>
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

        {!! Form::open(['action' => ['jobPositionsSteps@create',"".$id],'id'=>'form']) !!} {{ Form::token() }}
        <div class="box-body">
            <div class="form-group">
                <label for="name">Step name</label> {{ Form::text('stepname', '',array('class' => 'form-control','placeholder' =>
        'name','required'=>'true')) }}

            </div>
            <div class="form-group">
                <label for="timespan">Time Span (minutes)</label> {{ Form::number('timespan', '',array('class' => 'form-control','placeholder'
        => 'Time Span','required'=>'true')) }}

            </div>
            <div class="form-group">
                <label for="desc">Description</label> {{ Form::textarea('desc', '',array('class' => 'form-control','placeholder' => 'Description','required'=>'true'))
        }}
            </div>
            {{-- <div class="form-group">
        <label for="status">Status</label> {{ Form::select('status', [ '1' => 'Active', '0' => 'Deactive' ] , null, ['class'
        => 'form-control'] ) }}
        </div> --}}
        <div class="form-group">
            <label for="status">Status</label> {{ Form::text('status', '',array('class' => 'form-control','placeholder' => 'Status','required'=>'true'))
          }}

        </div>
        <div class="form-group">
            <label for="status">Select Color</label>
            <div class="colorpicker" id="colorpicker">
                <span key="picker" class="picker" id="picker">
                    <h3 class="description">COLOR</h3>
                    <div class="swatch" id="color">
                    </div>
                    {{ Form::text('colorcode', '',array('class' => 'form-control','placeholder' =>
        'colorcode','id'=>'colorcode','required'=>'true')) }}
                    <h6 class="description">HUE</h6>
                    <div class="slider-container">
                        <input name="hue" type="range" min="1" max="300" value="130" class="slider hue" />
                    </div>
                    <h6 class="description">SATURATION</h6>
                    <div class="slider-container">
                        <input name="sat" id="sat" type="range" min="1" max="100" value="60" class="slider sat" />
                    </div>
                    <h6 class="description">LIGHT</h6>
                    <div class="slider-container">
                        <input name="light" type="range" min="1" max="100" value="55" class="slider light" />
                    </div>
            </div>
        </div>
        <div class="form-group d-flex">
            <span class="margin">{{ Form::submit('ADD STEP',array('class' => 'btn btn-primary')) }}</span>

            <span class="margin"><a class="btn btn-success" href="{{ url('job-positions') }}">BACK / CANCEL</a></span>
        </div>
    </div>
    {!! Form::close() !!}
</div>
</div>

<div class="col-md-7 d-flex">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">View Job Position Steps</h3>
            <br><br>
            <h3 class="margin box-title"><b>View by</b></h3>
            <br><br>
            <p class="">
                <a href="{{ url('job-positions-steps/'.$id.'/position/up') }}">
                    <button type="button" class="btn btn-success">Job Position <i class="fa fa-arrow-up"></i></button>
                </a>
                <a href="{{ url('job-positions-steps/'.$id.'/position/down') }}">
                    <button type="button" class="btn btn-success">Job Position <i class="fa fa-arrow-down"></i></button>
                </a>
                <a href="{{ url('job-positions-steps/'.$id.'/time/up') }}">
                    <button type="button" class="btn btn-success">Time Created <i class="fa fa-arrow-up"></i> </button>
                </a>

                <a href="{{ url('job-positions-steps/'.$id.'/time/down') }}">
                    <button type="button" class="btn btn-success">Time Created <i class="fa fa-arrow-down"></i></button>
                </a>

            </p>
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
                        <th>Name</th>
                        <th>Color</th>
                        <th>Time Span</th>
                        {{--
            <th>Desc</th> --}}
                        {{-- <th>Created at</th> --}}
                        <th>Status</th>
                        <th>Action</th>
                    </tr>

                    @foreach ($job as $jobview)
                    <tr>
                        <td>{{ $jobview->stepname}}</td>
                        <td>
                            <span class="d-flex"
                                style="background:{{ $jobview->colorcode}};width:25px;height:25px;border-radius:50%;"></span>
                        </td>
                        <td>
                            @if(!empty($jobview->timespan))
                            {{ $jobview->timespan}} min
                            @else
                            Not Set
                            @endif

                        </td>
                        {{--
            <td>
              @php $dataa = $jobview->desc; echo substr($dataa,0,40); 
@endphp
            </td> --}}
                        {{-- @php $created = substr($jobview->created_at,0,-9); $created = substr($created,-10); 
@endphp --}}
                        {{-- <td>{{ $created }}</td> --}}
                        <td>

                            <span class="">{{$jobview->status}}</span>
                        </td>
                        <td>
                            <a data-toggle="modal" data-target="#modal-delete-{{ $jobview->jobPositionStepId}}" href="">
                                <span class="label label-danger">Delete <i class="fa fa-trash "></i></span></a>


                            <div class="modal modal-danger fade" id="modal-delete-{{ $jobview->jobPositionStepId}}"
                                style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-contents">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">Delete Job Position Step</h4>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline pull-left"
                                                data-dismiss="modal">Close</button>
                                            <a
                                                href="{{ url('job-positions-steps-delete') }}/{{ $jobview->jobPositionStepId}}"><button
                                                    type="button" class="btn btn-outline">Sure to Delete !</button></a>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>



                            <a data-toggle="modal" data-target="#modal-edit-{{ $jobview->jobPositionStepId}}" href="">
                                <span class="label label-success">Edit <i class="fa fa-pencil"></i></span></a>




                            <div class="modal modal-success fade" id="modal-edit-{{ $jobview->jobPositionStepId}}"
                                style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-contents">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">Edit Job Position Step</h4>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline pull-left"
                                                data-dismiss="modal">Close</button>
                                            <a
                                                href="{{ url('job-positions-steps-edit') }}/{{ $jobview->jobPositionStepId}}/{{$id}}">
                                                <button type="button" class="btn btn-outline">Sure to Edit !</button>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>


                            <a data-toggle="modal" data-target="#modal-view-{{ $jobview->jobPositionStepId}}" href="">
                                <span class="label label-success">View <i class="fa fa-eye"></i></span></a>



                            <div class="modal modal-success fade" id="modal-view-{{ $jobview->jobPositionStepId}}"
                                style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-contents">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">{{ $jobview->stepname}}</h4>
                                        </div>
                                        <div class="modal-body">
                                            <h4>Description</h4>
                                            <p> {{ $jobview->desc }}</p>
                                            @php $created = substr($jobview->created_at,0,-9); $created =
                                            substr($created,-10);
                                            @endphp
                                            <h4>Created At</h4>
                                            <p> {{ $created }}</p>
                                            <h4>Status</h4>
                                         <p>{{$jobview->status}}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline pull-left"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>

                        </td>

                    </tr>
                    @endforeach

                </tbody>
            </table>
            <div class="px-10 py-0"> {{ $job->links() }}</div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>
<script>
    let hue = 130;
    let sat = 60;
    let light = 55;

    const hslToHex = (h, s, l) => {
        h /= 360;
        s /= 100;
        l /= 100;
        let r, g, b;
        if (s === 0) {
            r = g = b = l; // achromatic
        } else {
            const hue2rgb = (p, q, t) => {
                if (t < 0) t += 1;
                if (t > 1) t -= 1;
                if (t < 1 / 6) return p + (q - p) * 6 * t;
                if (t < 1 / 2) return q;
                if (t < 2 / 3) return p + (q - p) * (2 / 3 - t) * 6;
                return p;
            };
            const q = l < 0.5 ? l * (1 + s) : l + s - l * s;
            const p = 2 * l - q;
            r = hue2rgb(p, q, h + 1 / 3);
            g = hue2rgb(p, q, h);
            b = hue2rgb(p, q, h - 1 / 3);
        }
        const toHex = x => {
            const hex = Math.round(x * 255).toString(16);
            return hex.length === 1 ? '0' + hex : hex;
        };
        return `#${toHex(r)}${toHex(g)}${toHex(b)}`;
    }

    const colorChange = () => {
        const swatch = document.querySelector('.swatch');
        const colorcode = document.getElementById('colorcode');
        swatch.style.backgroundColor = getHSL();
        swatch.value = getHEX();
        colorcode.value = getHEX();
        console.log(`${getHSL()} hex: ${getHEX()}`);
        document.getElementById('sat').style.backgroundColor = getHSL();
    };

    const getHEX = () => {
        return hslToHex(hue, sat, light);
    };
    const getHSL = () => {
        return `hsl(${hue}, ${sat}%, ${light}%)`;
    };

    const main = () => {
        const hueInput = document.querySelector('input[name=hue]');
        hueInput.addEventListener('input', () => {
            hue = hueInput.value;
            colorChange();
        });

        const satInput = document.querySelector('input[name=sat]');
        satInput.addEventListener('input', () => {
            sat = satInput.value;
            colorChange();
        });

        const lightInput = document.querySelector('input[name=light]');
        lightInput.addEventListener('input', () => {
            light = lightInput.value;
            colorChange();
        });

        colorChange();
    };

    document.addEventListener('DOMContentLoaded', main);

</script>
@endsection
