@extends('careers_views/master')
@section('content')
<div class="col-md-12">

       
        
        

@if(!$steps->isEmpty())
@foreach($steps as $stepsView)

<div class="col-md-8 m-auto" style="margin:auto;float:none">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Introduction</h3>
            </div>
            <div class="col-md-12 m-auto" style="margin:auto;float:none;padding-bottom:20px">
            {!!$stepsView->introduction!!}
            </div>
        
        </div>
</div>
@if($stepsView->step1name != '')
<div class="col-md-8 m-auto" style="margin:auto;float:none">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">{{ $stepsView->step1name }}</h3>
        </div>
        <div class="col-md-12 m-auto" style="margin:auto;float:none;padding-bottom:20px">
                @if($stepsView->step1Type == 'vimeo')
                <div class="form-group" style="text-align: center">
                    <iframe src="https://player.vimeo.com/video/{{$stepsView->step1}}"
                        width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                        allowfullscreen></iframe>
                </div>
                @elseif($stepsView->step1Type == 'youtube')
                <div class="form-group" style="text-align: center">
                    <iframe src="https://www.youtube.com/embed/{{$stepsView->step1}}"
                        width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                        allowfullscreen></iframe>
                </div>
                @elseif($stepsView->step1Type == 'text')
                <div class="form-group">
                    <div class="col-md-12 m-auto" style="margin:auto;float:none;padding-bottom:20px">
                        {!!$stepsView->step1!!}
                    </div>
                </div>
                @else
                <div class="form-group">
                    <label for="video">No Description</label>
                </div>
                @endif
        </div>
    </div>
</div>
@endif
@if($stepsView->step2name != '')
<div class="col-md-8 m-auto" style="margin:auto;float:none">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">{{ $stepsView->step2name }}</h3>
        </div>
        <div class="col-md-12 m-auto" style="margin:auto;float:none;padding-bottom:20px">
                @if($stepsView->step2type == 'vimeo')
                <div class="form-group" style="text-align: center">
                    <iframe src="https://player.vimeo.com/video/{{$stepsView->step2}}"
                        width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                        allowfullscreen></iframe>
                </div>
                @elseif($stepsView->step2type == 'youtube')
                <div class="form-group" style="text-align: center">
                    <iframe src="https://www.youtube.com/embed/{{$stepsView->step2}}"
                        width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                        allowfullscreen></iframe>
                </div>
                @elseif($stepsView->step2type == 'text')
                <div class="form-group">
                    <div class="col-md-12 m-auto" style="margin:auto;float:none;padding-bottom:20px">
                        {!!$stepsView->step2!!}
                    </div>
                </div>
                @else
                <div class="form-group">
                    <label for="video">No Description</label>
                </div>
                @endif
        </div>
    </div>
</div>
@endif
@if($stepsView->step3name != '')
<div class="col-md-8 m-auto" style="margin:auto;float:none">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">{{ $stepsView->step3name }}</h3>
        </div>
        <div class="col-md-12 m-auto" style="margin:auto;float:none;padding-bottom:20px">
                @if($stepsView->step3Type == 'vimeo')
                <div class="form-group" style="text-align: center">
                    <iframe src="https://player.vimeo.com/video/{{$stepsView->step3}}"
                        width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                        allowfullscreen></iframe>
                </div>
                @elseif($stepsView->step3Type == 'youtube')
                <div class="form-group" style="text-align: center">
                    <iframe src="https://www.youtube.com/embed/{{$stepsView->step3}}"
                        width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                        allowfullscreen></iframe>
                </div>
                @elseif($stepsView->step3Type == 'text')
                <div class="form-group">
                    <div class="col-md-12 m-auto" style="margin:auto;float:none;padding-bottom:20px">
                        {!!$stepsView->step3!!}
                    </div>
                </div>
                @else
                <div class="form-group">
                    <label for="video">No Description</label>
                </div>
                @endif
        </div>
    </div>
</div>
@endif
@if($stepsView->step4name != '')
<div class="col-md-8 m-auto" style="margin:auto;float:none">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">{{ $stepsView->step4name }}</h3>
        </div>
        <div class="col-md-12 m-auto" style="margin:auto;float:none;padding-bottom:20px">
                @if($stepsView->step4type == 'vimeo')
                <div class="form-group" style="text-align: center">
                    <iframe src="https://player.vimeo.com/video/{{$stepsView->step4}}"
                        width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                        allowfullscreen></iframe>
                </div>
                @elseif($stepsView->step4type == 'youtube')
                <div class="form-group" style="text-align: center">
                    <iframe src="https://www.youtube.com/embed/{{$stepsView->step4}}"
                        width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                        allowfullscreen></iframe>
                </div>
                @elseif($stepsView->step4type == 'text')
                <div class="form-group">
                    <div class="col-md-12 m-auto" style="margin:auto;float:none;padding-bottom:20px">
                        {!!$stepsView->step4!!}
                    </div>
                </div>
                @else
                <div class="form-group">
                    <label for="video">No Description</label>
                </div>
                @endif
        </div>
    </div>
</div>
@endif
@if($stepsView->stepname5 != '')
<div class="col-md-8 m-auto" style="margin:auto;float:none">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">{{ $stepsView->stepname5 }}</h3>
        </div>
        <div class="col-md-12 m-auto" style="margin:auto;float:none;padding-bottom:20px">
                @if($stepsView->steptype5 == 'vimeo')
                <div class="form-group" style="text-align: center">
                    <iframe src="https://player.vimeo.com/video/{{$stepsView->stepcont5}}"
                        width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                        allowfullscreen></iframe>
                </div>
                @elseif($stepsView->steptype5 == 'youtube')
                <div class="form-group" style="text-align: center">
                    <iframe src="https://www.youtube.com/embed/{{$stepsView->stepcont5}}"
                        width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                        allowfullscreen></iframe>
                </div>
                @elseif($stepsView->steptype5 == 'text')
                <div class="form-group">
                    <div class="col-md-12 m-auto" style="margin:auto;float:none;padding-bottom:20px">
                        {!!$stepsView->stepcont5!!}
                    </div>
                </div>
                @else
                <div class="form-group">
                    <label for="video">No Description</label>
                </div>
                @endif
        </div>
    </div>
</div>
@endif
@if($stepsView->stepname6 != '')
<div class="col-md-8 m-auto" style="margin:auto;float:none">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">{{ $stepsView->stepname6 }}</h3>
        </div>
        <div class="col-md-12 m-auto" style="margin:auto;float:none;padding-bottom:20px">
                @if($stepsView->steptype6 == 'vimeo')
                <div class="form-group" style="text-align: center">
                    <iframe src="https://player.vimeo.com/video/{{$stepsView->stepcont6}}"
                        width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                        allowfullscreen></iframe>
                </div>
                @elseif($stepsView->steptype6 == 'youtube')
                <div class="form-group" style="text-align: center">
                    <iframe src="https://www.youtube.com/embed/{{$stepsView->stepcont6}}"
                        width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                        allowfullscreen></iframe>
                </div>
                @elseif($stepsView->steptype6 == 'text')
                <div class="form-group">
                    <div class="col-md-12 m-auto" style="margin:auto;float:none;padding-bottom:20px">
                        {!!$stepsView->stepcont6!!}
                    </div>
                </div>
                @else
                <div class="form-group">
                    <label for="video">No Description</label>
                </div>
                @endif
        </div>
    </div>
</div>
@endif
@if($stepsView->stepname7 != '')
<div class="col-md-8 m-auto" style="margin:auto;float:none">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">{{ $stepsView->stepname7 }}</h3>
        </div>
        <div class="col-md-12 m-auto" style="margin:auto;float:none;padding-bottom:20px">
                @if($stepsView->steptype7 == 'vimeo')
                <div class="form-group" style="text-align: center">
                    <iframe src="https://player.vimeo.com/video/{{$stepsView->stepcont7}}"
                        width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                        allowfullscreen></iframe>
                </div>
                @elseif($stepsView->steptype7 == 'youtube')
                <div class="form-group" style="text-align: center">
                    <iframe src="https://www.youtube.com/embed/{{$stepsView->stepcont7}}"
                        width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                        allowfullscreen></iframe>
                </div>
                @elseif($stepsView->steptype7 == 'text')
                <div class="form-group">
                    <div class="col-md-12 m-auto" style="margin:auto;float:none;padding-bottom:20px">
                        {!!$stepsView->stepcont7!!}
                    </div>
                </div>
                @else
                <div class="form-group">
                    <label for="video">No Description</label>
                </div>
                @endif
        </div>
    </div>
</div>
@endif
@if($stepsView->stepname8 != '')
<div class="col-md-8 m-auto" style="margin:auto;float:none">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">{{ $stepsView->stepname8 }}</h3>
        </div>
        <div class="col-md-12 m-auto" style="margin:auto;float:none;padding-bottom:20px">
                @if($stepsView->steptype8 == 'vimeo')
                <div class="form-group" style="text-align: center">
                    <iframe src="https://player.vimeo.com/video/{{$stepsView->stepcont8}}"
                        width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                        allowfullscreen></iframe>
                </div>
                @elseif($stepsView->steptype8 == 'youtube')
                <div class="form-group" style="text-align: center">
                    <iframe src="https://www.youtube.com/embed/{{$stepsView->stepcont8}}"
                        width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                        allowfullscreen></iframe>
                </div>
                @elseif($stepsView->steptype8 == 'text')
                <div class="form-group">
                    <div class="col-md-12 m-auto" style="margin:auto;float:none;padding-bottom:20px">
                        {!!$stepsView->stepcont8!!}
                    </div>
                </div>
                @else
                <div class="form-group">
                    <label for="video">No Description</label>
                </div>
                @endif
        </div>
    </div>
</div>
@endif
@if($stepsView->stepname9 != '')
<div class="col-md-8 m-auto" style="margin:auto;float:none">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">{{ $stepsView->stepname9 }}</h3>
        </div>
        <div class="col-md-12 m-auto" style="margin:auto;float:none;padding-bottom:20px">
                @if($stepsView->steptype9 == 'vimeo')
                <div class="form-group" style="text-align: center">
                    <iframe src="https://player.vimeo.com/video/{{$stepsView->stepcont9}}"
                        width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                        allowfullscreen></iframe>
                </div>
                @elseif($stepsView->steptype9 == 'youtube')
                <div class="form-group" style="text-align: center">
                    <iframe src="https://www.youtube.com/embed/{{$stepsView->stepcont9}}"
                        width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                        allowfullscreen></iframe>
                </div>
                @elseif($stepsView->steptype9 == 'text')
                <div class="form-group">
                    <div class="col-md-12 m-auto" style="margin:auto;float:none;padding-bottom:20px">
                        {!!$stepsView->stepcont9!!}
                    </div>
                </div>
                @else
                <div class="form-group">
                    <label for="video">No Description</label>
                </div>
                @endif
        </div>
    </div>
</div>
@endif
@if($stepsView->stepname10 != '')
<div class="col-md-8 m-auto" style="margin:auto;float:none">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">{{ $stepsView->stepname10 }}</h3>
        </div>
        <div class="col-md-12 m-auto" style="margin:auto;float:none;padding-bottom:20px">
                @if($stepsView->steptype10 == 'vimeo')
                <div class="form-group" style="text-align: center">
                    <iframe src="https://player.vimeo.com/video/{{$stepsView->stepcont10}}"
                        width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                        allowfullscreen></iframe>
                </div>
                @elseif($stepsView->steptype10 == 'youtube')
                <div class="form-group" style="text-align: center">
                    <iframe src="https://www.youtube.com/embed/{{$stepsView->stepcont10}}"
                        width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                        allowfullscreen></iframe>
                </div>
                @elseif($stepsView->steptype10 == 'text')
                <div class="form-group">
                    <div class="col-md-12 m-auto" style="margin:auto;float:none;padding-bottom:20px">
                        {!!$stepsView->stepcont10!!}
                    </div>
                </div>
                @else
                <div class="form-group">
                    <label for="video">No Description</label>
                </div>
                @endif
        </div>
    </div>
</div>
@endif

<div class="col-md-8  m-auto" style="margin:auto;float:none">
        <div class="">
         <div class="col-md-12 m-auto" style="margin:auto;float:none;padding:20px 0px; ">
                
         <a href="{{url('careers/survey')}}/{{$id}}/{{$random_token}}/{{Session::get("steptimer")}}/{{Session::get("session_token")}}">
            <p class="btn btn-warning">I've completed the steps & am ready to schedule my interview</p>
        </a>
        </div>
    </div>
</div>
@endforeach
@else 
<div class="col-md-8 m-auto" style="margin:auto;float:none">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">No Data Found</h3>
        </div>
    </div>
</div>
@endif
@endsection