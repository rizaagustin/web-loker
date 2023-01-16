@extends('layouts.app')

@section('content')
    <section>
        <center>
            <h1>SELAMAT DATANG {{ strtoupper(Auth::user()->name) }}</h1>
        </center>
    </section>
@endsection
