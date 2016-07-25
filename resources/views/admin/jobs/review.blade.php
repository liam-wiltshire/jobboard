@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <div class="panel panel-default">
                    <div class="panel-heading">Review Job</div>

                    <div class="panel-body">
                        <h2>{{$job->job}}</h2>
                        <p>{{$job->description}}</p>
                        <p>&pound;{{$job->price}}</p>
                        {{ Form::model($job,array('url' => "/admin/reviewjob/{$job->id}")) }}

                        <div class="form-group">
                            @if ($errors->has())
                            <div class="alert-danger">{{ $errors->first('action') }}</div>
                            @endif
                            {{ Form::label('action','Action') }}
                            {{ Form::select('action',[3 => 'Approved',4 => 'Rejected'],Input::old('action'),['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            @if ($errors->has())
                                <div class="alert-danger">{{ $errors->first('review') }}</div>
                            @endif
                            {{ Form::label('review','Review') }}
                            {{ Form::textarea('review',Input::old('review'),['class' => 'form-control']) }}
                        </div>

                            {{ Form::submit('Post Review') }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection