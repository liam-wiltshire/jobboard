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
                    <div class="panel-heading">Your Jobs</div>

                    <div class="panel-body">
                        <p>Key: To Do = Blue, Waiting For Review = Oranage, Rejected = Red, Completed = Green</p>
                        <div class="row">
                            @foreach ($jobs as $job)
                                <div class="col-sm-6 col-md-4">
                                    <div class="panel panel-{{ $job->ClaimedJob->ClaimedJobState->type }}">
                                        <div class="panel-heading">{{$job->job}}</div>
                                        <div class="panel-body"><p>{{$job->description}}</p>
                                            <p><strong>Comments:</strong></p>
                                        @foreach ($job->Reviews()->orderBy('id','DESC')->get() as $review)
                                        <p>{{$review->comments}}</p>
                                        @endforeach
                                        </div>
                                        <div class="panel-footer">
                                            @if ($job->ClaimedJob->ClaimedJobState->id == 1 || $job->ClaimedJob->ClaimedJobState->id == 4)
                                                <a href="/user/completeJob/{{$job->id}}" class="btn btn-primary">Mark As Done</a>
                                            @endif

                                        </div>
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
