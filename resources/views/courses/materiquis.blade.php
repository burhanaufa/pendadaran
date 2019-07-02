@extends('layouts.app')

@section('content')
<div class="container">
    <title>{{ config('app.name', 'Portal Pembelajaran SMA 1 Semarang') }}</title>
    <a href="{{url('/kuis', $materi->id)}}" class="btn btn-outline-primary" >Go to Quiz</a>
    <div>
        {!!$materi->konten_materi!!}
    </div>
{{-- <div>
    <a href="{{url('/kuis', $materi->id)}}" class="btn btn-primary">Go to Quiz</a>
</div> --}}
@endsection