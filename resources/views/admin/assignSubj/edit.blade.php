@extends('layout.app')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>General Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">General Form</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Assign Subject</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="" method="post">

                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Select Class</label>
                                    <select name="class_id" required class="form-control">
                                        <option value="">Select class</option>
                                        @foreach($getClass as $class)
                                        <option {{ ($getRecord->class_id == $class->id)? 'selected' : ''}} value="{{$class->id}}">{{$class->name}}</option>

                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Select Subject</label>

                                    @foreach($getSubject as $subject)

                                    @php 
                                        $checked = "";
                                    @endphp
                                    @foreach($getAssignSubjId as $subjecrAssign)
                                    @if($subjecrAssign->subject_id == $subject->id) 
                                    @php 
                                        $checked = "checked";
                                    @endphp
                                    @endif
                                    @endforeach

                                    <div>
                                        <label for="" style="font-weight: normal;">
                                            <input {{$checked}} type="checkbox" name="subject_id[]" value="{{$subject->id}}"> {{$subject->name}}
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" id="" class="form-control">
                                        <option {{ ($getRecord->status == 0)? 'selected' : ''}} value="0">Active</option>
                                        <option {{ ($getRecord->status == 1)? 'selected' : ''}} value="1">InActive</option>
                                    </select>
                                </div>




                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                        </form>
                    </div>
                    <!-- /.card -->





                    <!-- /.card -->

                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@endsection