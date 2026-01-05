@extends('adminlte::page')

@section('content_header')
    <h1>Categories</h1>
@endsection

@section('content')
    <div class="container-fluid">


        <div class="card shadow-lg mb-4">
            <div class="card-header text-bold">
                School Department
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-4">
                            <form action="">
                                <div class="card">
                                    <div class="card-body">
                                        <input type="hidden" name="id">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="name"
                                                placeholder="Enter Department Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="myColor" class="form-label">Choose color</label>
                                            <input type="color" class="form-control form-control-color" id="myColor"
                                                name="colorpick" value="#000000" title="Choose a color">
                                        </div>

                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button class="btn btn-sm btn-primary col-sm-3 offset-md-3"> Save</button>
                                                <button class="btn btn-sm btn-default col-sm-3"
                                                    type="button">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-8">
                            <div class="card shadow-none">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table text-nowrap table-hover compact">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th class="text-center w-50">Department</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-center"></td>
                                                    <td class="">

                                                    </td>
                                                    <td class="text-center">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <hr>


        <div class="card shadow-lg mb-4 ">
            <div class="card-header text-bold">
                School Program/Course
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-4">
                            <form action="">
                                <div class="card">
                                    <div class="card-body">
                                        <input type="hidden" name="id">

                                        <div class="form-group">
                                            <input type="text" class="form-control" name="name" id="name"
                                                placeholder="Enter Program/Course Name">
                                        </div>

                                        <div class="form-group">
                                            <label for="dept_id"> Choose department</label>
                                            <select class="form-control" name="dept_id" id="dept_id" required>
                                                <option value="" selected disabled>-- Select --</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button class="btn btn-sm btn-primary col-sm-3 offset-md-3"> Save</button>
                                                <button class="btn btn-sm btn-default col-sm-3" type="button">
                                                    Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-8">
                            <div class="card shadow-none">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table text-nowrap table-hover compact">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th class="text-center w-50">Program/Course</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-center"></td>
                                                    <td class="">
                                                    </td>
                                                    <td class="text-center">

                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <hr>



        <div class="card shadow-lg mb-4 ">
            <div class="card-header text-bold">
                Employee Position
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-4">
                            <form action="">
                                <div class="card">
                                    <div class="card-body">
                                        <input type="hidden" name="id">

                                        <div class="form-group">
                                            <input type="text" class="form-control" name="name" id="name"
                                                placeholder="Enter Position Name">
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button class="btn btn-sm btn-primary col-sm-3 offset-md-3"> Save</button>
                                                <button class="btn btn-sm btn-default col-sm-3" type="button">
                                                    Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-8">
                            <div class="card shadow-none">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table text-nowrap table-hover compact">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th class="text-center w-50">Position</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-center"></td>
                                                    <td class="">
                                                    </td>
                                                    <td class="text-center">

                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
