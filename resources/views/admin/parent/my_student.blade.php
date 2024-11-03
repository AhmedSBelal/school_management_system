@extends('layout.app')

@section('content')

<main class="app-main"> <!--begin::App Content Header-->
    <div class="app-content-header"> <!--begin::Container-->
        <div class="container-fluid"> <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">parent Student List ({{$parent->name}} {{$parent->last_name}})</h3>
                </div>
            </div> <!--end::Row-->
        </div> <!--end::Container-->
    </div>
    <!--end::App Content Header-->
    @include('messages')

    <!--begin::App Content-->
    <div class="app-content"> <!--begin::Container-->
        <div class="container-fluid"> <!--begin::Row-->
            <div class="row">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="card-title">Search Student</h3>
                        </div>
                        <form action="" method="get"> <!--begin::Body-->
                            @csrf
                            <div class="card-body row">
                                <div class="col-md-2 mb-3">
                                    <label class="form-label">Student ID</label>
                                    <input type="text" class="form-control" name="id" placeholder="Student ID" value="{{Request::get('id')}}">
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Name" value="{{Request::get('name')}}">
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" class="form-control" name="last_name" placeholder="Last Name" value="{{Request::get('last_name')}}">
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="text" class="form-control" name="email" placeholder="Eamil" value="{{Request::get('email')}}">
                                </div>
                                <div class="form-group col-md-3 mb-3 d-flex align-items-end gap-2">
                                    <button class="btn btn-primary" type="submit">Search</button>
                                    <a href="{{ url('admin/parent/my-student/'. $parent->id) }}" class="btn btn-success">Reset</a>
                                </div>
                            </div>
                        </form> <!--end::Form-->
                    </div> <!-- /.card -->
            </div> <!--end::Row-->
        </div> <!--end::Container-->
    </div> <!--end::App Content-->

    @if (!empty($students))
        <!--begin::App Content-->
        <div class="app-content"> <!--begin::Container-->
            <div class="container-fluid"> <!--begin::Row-->
                <div class="row">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h3 class="card-title">Student List</h3>
                            </div> <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Profile pic</th>
                                            <th>Studnet Name</th>
                                            <th>Email</th>
                                            <th>Parent Name</th>
                                            <th>Created Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($students as $student)
                                        <tr>
                                            <td>{{$student->id}}</td>
                                            <td>
                                                @if (!empty($student->profile_pic))
                                                <img src="{{asset('upload/profile/' . $student->profile_pic)}}" alt=""
                                                class="h-[50px] w-[50px] rounded-full" >
                                                @endif
                                            </td>
                                            <td>{{$student->name}} {{$student->last_name}}</td>
                                            <td>{{$student->email}}</td>
                                            <td>{{$student->parent_name}}</td>
                                            <td>{{ date('d-m-y H:i A', strtotime($student->created_at))}}</td>
                                            <td>
                                                <a href="{{url('admin/parent/assign_student_parent/' . $student->id . '/' . $parent->id)}}" class="btn btn-primary btn-sm">
                                                    Add Student To Parent
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <br>
                                <div style="display: flex; align-items: center; justify-content: flex-end;">
                                    {!! $students->appends(request()->query())->links() !!}
                                </div>
                            </div> <!-- /.card-body -->
                        </div> <!-- /.card -->
                </div> <!--end::Row-->
            </div> <!--end::Container-->
        </div> <!--end::App Content-->
    @endif



    <!--begin::App Content-->
    <div class="app-content"> <!--begin::Container-->
        <div class="container-fluid"> <!--begin::Row-->
            <div class="row">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="card-title">Parent Student List</h3>
                        </div> <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Profile pic</th>
                                        <th>Studnet Name</th>
                                        <th>Email</th>
                                        <th>Parent Name</th>
                                        <th>Created Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($my_students as $student)
                                    <tr>
                                        <td>{{$student->id}}</td>
                                        <td>
                                            @if (!empty($student->profile_pic))
                                            <img src="{{asset('upload/profile/' . $student->profile_pic)}}" alt=""
                                            class="h-[50px] w-[50px] rounded-full" >
                                            @endif
                                        </td>
                                        <td>{{$student->name}} {{$student->last_name}}</td>
                                        <td>{{$student->email}}</td>
                                        <td>{{$student->parent_name}}</td>
                                        <td>{{ date('d-m-y H:i A', strtotime($student->created_at))}}</td>
                                        <td>
                                            <a href="{{url('admin/parent/assign_student_parent_delete/' . $student->id)}}" class="btn btn-danger btn-sm">
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <br>
                            <div style="display: flex; align-items: center; justify-content: flex-end;">
                                {!! $my_students->appends(request()->query())->links() !!}
                            </div>
                        </div> <!-- /.card-body -->
                    </div> <!-- /.card -->
            </div> <!--end::Row-->
        </div> <!--end::Container-->
    </div> <!--end::App Content-->

</main> <!--end::App Main-->

@endsection
