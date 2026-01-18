@extends('adminlte::page')

@section('content_header')
    <h1>Profile Record</h1>
@endsection


@section('content')
    <div class="container-fluid">
        @if ($data->isNotEmpty())
            <div class="card">
                <div class="card-body">
                    @php $student = $data->first()->recordable; @endphp
                    <p><strong>Schoold ID:</strong> {{ $student->school_id }}</p>
                    <p><strong>Name:</strong>
                        {{ $student->fname . ' ' . $student->mname . ' ' . $student->lname . ' ' . $student->sname }}
                    </p>
                </div>
            </div>

            <div class="card">
                <div class="card-header">Record Details</div>
                <div class="card-body">
                    <table class="table table-bordered table-hover table-sm">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $row)
                                <tr>
                                    <td>{{ $row->scanned_at->format('F d, Y') }}</td>
                                    <td>{{ $row->scanned_at->format('h:i A') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <a href="{{ route('student.show', $student->id) }}"><x-secondary-button>Back</x-secondary-button></a>
        @else
            <div class="alert alert-info">
                No record found for this student.
            </div>
        @endif
    </div>
@endsection
