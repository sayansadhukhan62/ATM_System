@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="pb-5">
            Available Numbers of Notes : <br>
            
                        Five Hundred Notes => {{$notesAvl->fiveh}}&nbsp;&nbsp;
                        One Hundred Notes  => {{$notesAvl->oneh}}&nbsp;&nbsp;
                        Fifty Notes  => {{$notesAvl->fifty}}&nbsp;&nbsp;
                        Twenty Notes => {{$notesAvl->twenty}}&nbsp;&nbsp;
                        Ten Notes  => {{$notesAvl->ten}}&nbsp;&nbsp;
                        Five Notes  => {{$notesAvl->five}}&nbsp;&nbsp;
            
            </div>
                    <form action="{{ route('atm') }}" method="get">
                        @csrf
                    Amount : 
                    <input type="number" name="amount">
                    <input type="submit" value="Submit">
                    </form>
                    <br><br>
                    @isset($insf)
                    @if($insf != "")
                        {{$insf}}
                    @else
                    Recieved Numbers of Notes : <br>
                        Five Hundred Notes => {{$notes[0]}}&nbsp;&nbsp;
                        One Hundred Notes  => {{$notes[1]}}&nbsp;&nbsp;
                        Fifty Notes  => {{$notes[2]}}&nbsp;&nbsp;
                        Twenty Notes => {{$notes[3]}}&nbsp;&nbsp;
                        Ten Notes  => {{$notes[4]}}&nbsp;&nbsp;
                        Five Notes  => {{$notes[5]}}&nbsp;&nbsp;
                    @endif
                    @endisset
        </div>
    </div>
</div>
@endsection
