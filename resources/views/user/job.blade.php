@extends('layouts.user')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{$job->job}}</div>

                <div class="panel-body">
                    <p>{{$job->description}}</p>
                    <hr />
                    &pound;{{number_format($job->price,2)}}
                </div>
                <div class="panel-footer">
                    <a href="/user/claimJob/{{$job->id}}" class="btn bg-success">Claim Job</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
