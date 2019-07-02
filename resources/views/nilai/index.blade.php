@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Nilai</h1>
<div class ="col-md-12">
<table class="table table-striped">
    <thead>
        <tr>
            <td>Nama Siswa</td>
            <td>Nis</td>
            <td>Materi Id</td>
            <td>Nilai</td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Burhan</td>
            <td>13523217</td>
            <td>15</td>
            <td>80</td>
        </tr>
        <tr>
            <td>Burhan</td>
            <td>13523217</td>
            <td>7</td>
            <td>60</td>
            </tr>
    </tbody>
</table>
</div>
</div>
@endsection
