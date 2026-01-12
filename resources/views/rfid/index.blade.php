@extends('adminlte::page')

@section('content_header')
    <p></p>
@endsection


@section('content')
    <div class="container-fluid">

        <form action="{{ route('rfid.scan') }}" method="POST">
            @csrf
            <input type="text" name="rfid" autofocus>
        </form>




        @if (isset($data))
            <div class="card">
                <div class="card-body">
                    <img src="{{ asset('storage/' . $data->image) }}" alt="{{ $data->lname }}" class="img-thumbnail"
                        style="max-width: 150px;">
                    <p><strong>School ID:</strong>{{ $data->school_id }}</p>
                    <p><strong>name:</strong>{{ $data->fname . ' ' . $data->mname . ' ' . $data->lname . ' ' . $data->sname }}
                    </p>
                </div>
            </div>
        @endif

    </div>
@endsection
