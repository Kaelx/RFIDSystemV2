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




        @if (isset($student))
            <div class="card">
                <div class="card-body">
                    <img src="{{ asset('storage/' . $student->image) }}" alt="{{ $student->lname }}" class="img-thumbnail"
                        style="max-width: 150px;">
                    <p><strong>School ID:</strong>{{ $student->school_id }}</p>
                    <p><strong>name:</strong>{{ $student->fname . ' ' . $student->mname . ' ' . $student->lname . ' ' . $student->sname }}
                    </p>
                </div>
            </div>
        @endif

    </div>
@endsection
