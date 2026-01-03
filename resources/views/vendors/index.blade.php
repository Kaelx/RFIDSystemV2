@extends('adminlte::page')

@section('content_header')
    <h1>Vendors</h1>
@endsection

@section('content')
    <div class="container">
        <div>
            <a href="{{ route('vendors.create') }}"><x-primary-button class="mb-2">Add Vendor</x-primary-button></a>
        </div>
        <table class="table table-bordered" id="users-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vendors as $vendor)
                    <tr>
                        <td>{{ $vendor->fname . ' ' . $vendor->mname . ' ' . $vendor->lname . ' ' . $vendor->sname }}
                        </td>
                        <td>
                            <a href="{{ route('vendors.show', $vendor->id) }}"><x-primary-button>View</x-primary-button></a>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @push('js')
            <script>
                $(function() {
                    $('#users-table').DataTable({
                        responsive: true,
                        autoWidth: false,
                    });
                });
            </script>
        @endpush
    </div>
@endsection
