@extends('adminlte::page')

@section('content_header')
    <h1>Profile Record</h1>
@endsection


@section('content')
    <div class="container-fluid">
        @if ($data->isNotEmpty())
            <div class="card">
                <div class="card-body">
                    @php $seller = $data->first()->recordable; @endphp
                    <p><strong>Name:</strong>
                        {{ $seller->fname . ' ' . $seller->mname . ' ' . $seller->lname . ' ' . $seller->sname }}
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
                                    <td>{{ $row->created_at->format('F d, Y') }}</td>
                                    <td>{{ $row->created_at->format('h:i A') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <a href="{{ route('seller.show', $seller->id) }}"><x-secondary-button>Back</x-secondary-button></a>
        @else
            <div class="alert alert-info">
                No record found for this seller.
            </div>
        @endif
    </div>
@endsection
