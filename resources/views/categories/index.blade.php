@extends('adminlte::page')

@section('content_header')
    <h1>Categories</h1>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header"><a href="#"><button>Add Department</button></a></div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Department</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($departments as $department)
                            <tr>
                                <td>{{ $department->name }}</td>
                                <td>button here</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


        <hr>

        <div class="card">
            <div class="card-header"><a href="#"><button>Add Program</button></a></div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Program/Course</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($programs as $program)
                            <tr>
                                <td>{{ $program->name }}</td>
                                <td>button here</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


        <hr>


        <div class="card">
            <div class="card-header"><a href="#"><button>Add Position</button></a></div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Job Position</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jobPositions as $jobPosition)
                            <tr>
                                <td>{{ $jobPosition->name }}</td>
                                <td>button here</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>




    </div>
@endsection
