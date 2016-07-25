@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <div class="panel panel-default">
                    <div class="panel-heading">Create Treansaction</div>

                    <div class="panel-body">
                        {{ Form::open(array('url' => '/admin/createtransaction')) }}


                        <div class="form-group">
                            @if ($errors->has())
                                <div class="alert-danger">{{ $errors->first('description') }}</div>
                            @endif
                            {{ Form::label('description','Description') }}
                            {{ Form::text('description',Input::old('description'),['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            @if ($errors->has())
                                <div class="alert-danger">{{ $errors->first('user_id') }}</div>
                            @endif
                            {{ Form::label('user_id','User') }}
                            {{ Form::select('user_id',$users,Input::old('user_id'),['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            @if ($errors->has())
                                <div class="alert-danger">{{ $errors->first('amount') }}</div>
                            @endif
                            {{ Form::label('amount','Amount (&pound;)') }}
                            {{ Form::text('amount',Input::old('amount'),['class' => 'form-control']) }}
                        </div>
                            {{ Form::submit('Create Transaction') }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection