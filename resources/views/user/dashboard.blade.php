@extends('layouts.user')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <div class="panel panel-info">
                    <div class="panel-heading">Balance</div>
                    <div class="panel-body">Your current balance is &pound;{{ number_format($balance,2) }}</div>
                    <div class="panel-footer"><a class="btn btn-primary" href="/user/transactions/">View Transactions</a></div>
                </div>
            </div>
            <div class="col-md-10 ">
                <div class="panel panel-default">
                    <div class="panel-heading">Availble Jobs</div>

                    <div class="panel-body">
                        <div class="row">
                            @foreach ($jobs as $job)
                                <div class="col-sm-6 col-md-4">
                                    <div class="panel panel-info">
                                        <div class="panel-heading">
                                            {{$job->job}}
                                        </div>
                                        <div class="panel-body">
                                            <p>{{substr($job->description,0,55)}}...</p>
                                            <p>Price: &pound;{{number_format($job->price,2)}}</p>
                                        </div>
                                        <div class="panel-footer">
                                            <a href="/user/job/{{$job->id}}" class="btn btn-success">View/Claim</a>
                                        </div>
                                    </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
