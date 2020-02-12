@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ route('atm') }}" method="get">
                        @csrf
                    Amount To be deducted : <input type="number" name="amount">
                    <input type="submit" value="submit">
                    </form>
                </div>
            </div><br>
            @if($insf != "")
                        {{$insf}}
                    @else
                        FiveHundred Notes => {{$notes[0]}} <br>
                        OneHundred Notes  => {{$notes[1]}}<br>
                        Fifty Notes  => {{$notes[2]}}<br>
                        Twenty Notes => {{$notes[3]}}<br>
                        Ten Notes  => {{$notes[4]}}<br>
                        Five Notes  => {{$notes[5]}}<br>
                    @endif
        </div>
    </div>
</div>
@endsection
