@extends('adminlte::page')

@section('content_header')
    <h1>Vendors</h1>
@endsection

@section('content')
    <div class="container-fluid">

        <x-auth-session-status class="mb-2" :status="session('success')" />


        <div class="card">
            <div class="card-body">
                <div>
                    <a href="{{ route('seller.create') }}"><x-primary-button class="mb-2">Register</x-primary-button></a>
                </div>
                <table class="table table-bordered table-hover table-sm">
                    <thead>
                        <tr>
                            <th>Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sellers as $vendor)
                            <tr style="cursor:pointer;" onclick="window.location='{{ route('seller.show', $vendor->id) }}'">
                                <td>{{ $vendor->fname . ' ' . $vendor->mname . ' ' . $vendor->lname . ' ' . $vendor->sname }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $sellers->links() }}
            </div>
        </div>

    </div>
@endsection
