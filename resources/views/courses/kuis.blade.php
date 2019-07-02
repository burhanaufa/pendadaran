@extends('layouts.app')

@section('content')

{{-- <script>
  $(document).ready(function() {
    $('.input-radio-'+id).click(function(){
      $('.submit-'+id).trigger(‘click’);

    });
  });
</script> --}}

<div class="container">
    <title>{{ config('app.name', 'Portal Pembelajaran SMA 1 Semarang') }}</title>
<h1>Quiz</h1>
  <br>
  @foreach($course as $cour)
  <div class="card timbul5" style="height: auto">
    <div class="exploration-image mt-3 pb-3 d-flex">
      <div class="card-body">
        <h1>
            {!!$cour->isi_pertanyaan!!}
        </h1>
        <div style="float: left;">
            <div class="form-check" >
              <form id="quis-{{ $cour->id }}">
          @foreach ($cour->jawaban as $jawaban)
              <label class="form-check-label">
                <input type="radio" class="input-radio-{{ $cour->id }}" name="optradio"><h4 class="ml-5">{!! $jawaban->isi_jawaban !!}</h4>
              </label>
          @endforeach
              <input type="submit" class="submit-{{ $cour->id }}" hidden>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endforeach
  <a href="{{url('/kuis',)}}" class="btn btn-danger" style="vertical-align: bottom" >Submit Your Quiz</a>
  {{$course->links()}}
</div>
@endsection
