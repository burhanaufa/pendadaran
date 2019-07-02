@extends('admin.index')

@section('content')
    <h1>Edit Siswa</h1>
    {{Form::model($siswa, array('route'=> array('siswa.update',$siswa->id),'method'=>'PUT'))}}
        <div class="form-group">
            {{Form::label('name', 'Name')}}
            {{Form::text('name',$siswa->name, ['class' => 'form-control', 'placeholder'=>'Name'])}}
        </div>
        <div class="form-group">
                {{Form::label('nis', 'Nis')}}
                {{Form::text('nis',$siswa->nis, ['class' => 'form-control', 'placeholder'=>'Nis'])}}
        </div>
        <div class="form-group">
            {{Form::label('password', 'Password')}}
            {{Form::text('password',$siswa->pass, ['class' => 'form-control', 'placeholder'=>'Password'])}}
    </div>
    <div class="form-group">
            {!!Form::label('Select Course') !!}
            {!!Form::select('mapel[]',$mapel, ['multiple' => 'multiple', 'class' =>'form-control mapel'])!!}
        </div>
    <div class="form-group">
            {!!Form::label('Select Teacher') !!}
            {!!Form::select('guru[]',$guru, ['multiple' => 'multiple', 'class' =>'form-control guru'])!!}
        </div>
        {{Form::hidden('method','PUT')}}
        {{Form::submit('submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection

