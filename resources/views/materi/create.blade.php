@extends('admin.index')

@section('content')

<h1>Tambah Materi</h1>
{!! Form::open(['action' => 'MateriController@store', 'method' => 'POST', 'files' => 'true']) !!}
<div class="form-group">
    {{Form::label('nama_materi', 'Name')}}
    {{Form::text('nama_materi','', ['class' => 'form-control', 'id' => 'inputler', 'placeholder'=>'Name'])}}
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            {!!Form::label('Konten Materi', 'Isi Konten')!!}
            {!!Form::textarea('konten_materi','', ['class' => 'form-control','id' => 'textarea-content',
            'placeholder'=>'Konten Materi'])!!}
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            <label for="">Upload PDF</label>
            <input type="file" name="pdf_upload" placeholder="input pdf file" class="form-input" />
        </div>
    </div>
    <div class="col-sm-6">
        <ul class="list-group">
            @if ($pdf)
                @foreach($pdf as $key=>$listpdf)
                    <li class="list-group-item" id="list-html-pdf-{{$key}}">
                        <button onclick="callLog({{$key}})" type="button" class="btn btn-primary">Tambah Halaman Ini</button>
                        {!! $listpdf !!}
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
</div>
<div class="form-group">
    {{Form::label('mapels_id','Select Id Course')}}
    {{Form::text('mapels_id','', ['single' => 'single', 'class' =>'form-control mapel'])}}
</div>
{{Form::submit('submit',['class'=>'btn btn-primary'])}}
{!! Form::close() !!}
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript">
    CKEDITOR.replace( 'konten_materi',{
    filebrowserImageBrowseUrl: '/laravel-filemanager',
    filebrowserImageUploadUrl: '/laravel-filemanager',
    filebrowserBrowseUrl: '/laravel-filemanager',
    filebrowserUploadUrl: '/laravel-filemanager'
});
    function callLog(param){
        var idName = 'list-html-pdf-' + param
       var element =  document.getElementById(idName).innerHTML
    CKEDITOR.instances['textarea-content'].insertHtml(element)
        // console.log(CKEDITOR.instances[])
    }
</script>
@endsection