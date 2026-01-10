@extends('adminlte::page')

@section('content_header')
    <p></p>
@endsection


@section('content')
    <div class="container-fluid">

        <form action="{{ }}">
            <input type="text" name="rfid">
        </form>



        <div class="card">
            <div class="card-body">
                <p><strong>School ID:</strong>{{ }}</p>
                <p><strong>name:</strong>{{ }}</p>
            </div>
        </div>
    </div>
@endsection
