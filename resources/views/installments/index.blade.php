@extends('layouts.app')

@section('content')
<h1>Installments for Investor {{ $investor_id }}</h1>
<ul>
    @foreach($installments as $installment)
        <li>Amount: {{ $installment->amount }} | Due: {{ $installment->due_date }} | Status: {{ $installment->status }}</li>
    @endforeach
</ul>
@endsection
