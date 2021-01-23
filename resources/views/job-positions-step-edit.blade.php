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
<div class="col-md-6">
  
  <div class="box box-primary">
    <div class="box-header with-border d-flex align-items-center">
      <h3 class="box-title col-xs-6 d-flex align-items-center p-0">Job positions edit</h3>
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
    </div>
    @foreach ($job as $jobview)
   {!! Form::open(['action' => ['jobPositionsSteps@update',"".$jobview->jobPositionStepId],'id'=>'form']) !!}
   {{ Form::token() }}
      <div class="box-body">
        <div class="form-group">
          <label for="name">Step Name</label>
          {{ Form::text('stepname', $jobview->stepname,array('class' => 'form-control','placeholder' => 'Step Name','required'=>'true')) }}
       
        </div>
        <div class="form-group">
                <label for="timespan">Time Span (minutes)</label>
                {{ Form::number('timespan', $jobview->timespan,array('class' => 'form-control','placeholder' => 'Time Span','required'=>'true')) }}
             
              </div>
         <div class="form-group">
          <label for="desc">Desc</label>
          {{ Form::textarea('desc', $jobview->desc,array('class' => 'form-control','placeholder' => 'Desc','required'=>'true')) }}
        </div>
        
              <div class="form-group">
                  <label for="status">Status</label> {{ Form::text('status', $jobview->status,array('class' => 'form-control','placeholder' => 'Status','required'=>'true'))
                }}
      
              </div>
              <div class="form-group">
                  <label for="status">Select Color</label>
                  <div class="colorpicker" id="colorpicker">
                      <span key="picker" class="picker" id="picker">
                          <h3 class="description">COLOR</h3>
                          
                      <div class="swatch" id="color" style="background-color: {{$jobview->colorcode}}">
                          </div>
                          {{ Form::text('colorcode', $jobview->colorcode,array('class' => 'form-control','placeholder' =>
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
              
        <div class="form-group">
          {{ Form::submit('UPDATE',array('class' => 'btn btn-warning')) }}
          <br/> <br/>
          <div class="" ><a class="btn btn-success" href="{{ url('job-positions-steps') }}/{{ $backid }}">BACK / CANCEL</a></div>
    
      </div>
    </div>
   {!! Form::close() !!}
  
  </div>
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
<script>
    $(document).ready(function(){
     $("#colorcode").val("{{$jobview->colorcode}}");
     $("#color").css("background","{{$jobview->colorcode}}");
    });
    </script>
     @endforeach
@endsection