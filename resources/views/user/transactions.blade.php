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
                    <div class="panel-heading">Transactions</div>

                    <div class="panel-body">
                        <div class="row">
                            <table class="table table-bordered">
                                <thead>
                                    <tr><th>Date</th><th>Description</th><th>Amount</th></tr>
                                </thead>
                                <tbody>
                                @foreach ($transactions->get() as $transaction)
                                    <tr><td>{{date("d-m-y",strtotime($transaction->created_at))}}</td><td>{{$transaction->description}}</td><td>&pound;{{number_format($transaction->amount,2)}}</td></tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
