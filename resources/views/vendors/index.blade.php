@extends('adminlte::page')

@section('content_header')
    <h1>Vendors</h1>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div>
                    <a href="{{ route('vendors.create') }}"><x-primary-button class="mb-2">Register</x-primary-button></a>
                </div>
                <table class="table table-bordered" id="users-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vendors as $vendor)
                            <tr style="cursor:pointer;" onclick="window.location='{{ route('vendors.show', $vendor->id) }}'">
                                <td>{{ $vendor->fname . ' ' . $vendor->mname . ' ' . $vendor->lname . ' ' . $vendor->sname }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>


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
@endsection
