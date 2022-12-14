@extends('layout.app')
Dashboard
@section('title')

@section('content')

<section class="content-header">
<div class="row">
    <div class="col-lg-3 col-6">

        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{$guru->count()}}</h3>
                <p>Data Guru</p>
            </div>
            <div class="icon">
                <i class="fas fa-user"></i>
            </div>
            <a href="{{ route ('guru.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-6">

        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{$kelas->count()}}</h3>
                <p>Data Kelas</p>
            </div>
            <div class="icon">
                <i class="fas fa-chalkboard-teacher"></i>
            </div>
            <a href="{{ route ('kelas.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-6">

        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{$mapel->count()}}</h3>
                <p>Data Mapel</p>
            </div>
            <div class="icon">
                <i class="nav-icon fas fa-book"></i>
            </div>
            <a href="{{ route ('mapel.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-6">

        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{$siswa->count()}}</h3>
                <p>Data Siswa</p>
            </div>
            <div class="icon">
                <i class="nav-icon fas fa-users"></i>
            </div>
            <a href="{{ route ('siswa.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

</div>

@endsection
