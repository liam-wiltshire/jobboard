@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <div class="panel panel-default">
                    <div class="panel-heading">Create Job</div>

                    <div class="panel-body">
                        {{ Form::model($job,array('url' => "/admin/editjob/{$job->id}")) }}

                        <div class="form-group">
                            @if ($errors->has())
                            <div class="alert-danger">{{ $errors->first('job') }}</div>
                            @endif
                            {{ Form::label('job','Job') }}
                            {{ Form::text('job',Input::old('job'),['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            @if ($errors->has())
                                <div class="alert-danger">{{ $errors->first('description') }}</div>
                            @endif
                            {{ Form::label('description','Description') }}
                            {{ Form::textarea('description',Input::old('description'),['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            @if ($errors->has())
                                <div class="alert-danger">{{ $errors->first('job_state_id') }}</div>
                            @endif
                            {{ Form::label('job_state_id','State') }}
                            {{ Form::select('job_state_id',$state,Input::old('job_state_id'),['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            @if ($errors->has())
                                <div class="alert-danger">{{ $errors->first('price') }}</div>
                            @endif
                            {{ Form::label('price','Price (&pound;)') }}
                            {{ Form::text('price',Input::old('price'),['class' => 'form-control']) }}
                            <p><small>Think about how long this would take you, and apply that to &pound;2 per hour.</small></p>
                        </div>
                            {{ Form::submit('Create Job') }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection