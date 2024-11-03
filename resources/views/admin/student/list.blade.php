@extends('layout.app')

@section('content')

<main class="app-main"> <!--begin::App Content Header-->
    <div class="app-content-header"> <!--begin::Container-->
        <div class="container-fluid"> <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Student List (Total : {{$students->total()}})</h3>
                </div>
                <div class="col-sm-6" style="text-align: right">
                    <a href="{{url('admin/student/add')}}" class="btn btn-primary">Add New Student</a>
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
                                <div class="col-md-2 mb-3">
                                    <label class="form-label">Admission Number</label>
                                    <input type="text" class="form-control" name="admission_number" placeholder="Admission Number" value="{{Request::get('admission_number')}}">
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label class="form-label">Roll Number</label>
                                    <input type="text" class="form-control" name="roll_number" placeholder="Roll Number" value="{{Request::get('roll_number')}}">
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label class="form-label" for="class_search">Class</label>
                                    <input type="text" class="form-control" placeholder="Class" name="class" value="{{Request::get('class')}}">
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label class="form-label">Gender</label>
                                    <select name="gender" id="form-label" class="form-control">
                                        <option value="">Select Gender</option>
                                        <option value="male" {{Request::get('gender') == "male" ? 'selected' : ''}}>Male</option>
                                        <option value="female" {{Request::get('gender') == "female" ? 'selected' : ''}}>Female</option>
                                        <option value="other" {{Request::get('gender') == "other" ? 'selected' : ''}}>Other</option>
                                    </select>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label class="form-label">Caste</label>
                                    <input type="text" class="form-control" name="caste" placeholder="Caste" value="{{Request::get('caste')}}">
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label class="form-label">Religion</label>
                                    <input type="text" class="form-control" name="religion" placeholder="Religion" value="{{Request::get('religion')}}">
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label class="form-label">Mobile Number</label>
                                    <input type="text" class="form-control" name="mobile_number" placeholder="Mobile Number" value="{{Request::get('mobile_number')}}">
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label class="form-label">Blood Group</label>
                                    <input type="text" class="form-control" name="blood_group" placeholder="Blood Group" value="{{Request::get('blood_group')}}">
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label class="form-label">Status</label>
                                    <select name="status" id="" class="form-control">
                                        <option value="">Select Status</option>
                                        <option value="0" {{Request::get('status') == "0" ? 'selected' : ''}}>Active</option>
                                        <option value="1" {{Request::get('status') == "1" ? 'selected' : ''}}>Inactive</option>
                                    </select>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label class="form-label">Admission Date</label>
                                    <input type="date" class="form-control" name="admission_date" placeholder="Admission Date" value="{{Request::get('admission_date')}}">
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label class="form-label">Created Date</label>
                                    <input type="date" class="form-control" name="date" value="{{Request::get('date')}}">
                                </div>
                                <div class="form-group col-md-3 mb-3 d-flex align-items-end gap-2">
                                    <button class="btn btn-primary" type="submit">Search</button>
                                    <a href="{{ url('admin/student/list') }}" class="btn btn-success">Reset</a>
                                </div>
                            </div>
                        </form> <!--end::Form-->
                    </div> <!-- /.card -->
            </div> <!--end::Row-->
        </div> <!--end::Container-->
    </div> <!--end::App Content-->


    <!--begin::App Content-->
    <div class="app-content"> <!--begin::Container-->
        <div class="container-fluid"> <!--begin::Row-->
            <div class="row">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="card-title">Student List</h3>
                        </div> <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div style="overflow-x: auto;">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Profile Pic</th>
                                            <th>Student Name</th>
                                            <th>Parent Name</th>
                                            <th>Email</th>
                                            <th>Admission Number</th>
                                            <th>Roll Number</th>
                                            <th>Class</th>
                                            <th>Gender</th>
                                            <th>Date Of Birth</th>
                                            <th>Caste</th>
                                            <th>Religion</th>
                                            <th>Mobile Number</th>
                                            <th>Admission Date</th>
                                            <th>Blood Group</th>
                                            <th>Height</th>
                                            <th>Weight</th>
                                            <th>Status</th>
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
                                                <td>{{$student->parent_name}} {{$student->parent_last_name}}</td>
                                                <td>{{$student->email}}</td>
                                                <td>{{$student->admission_number}}</td>
                                                <td>{{$student->roll_number}}</td>
                                                <td>{{$student->class_name}}</td>
                                                <td>{{$student->gender}}</td>
                                                <td class="min-w-32">{{$student->date_of_birth}}</td>
                                                <td>{{$student->caste}}</td>
                                                <td>{{$student->religion}}</td>
                                                <td>{{$student->mobile_number}}</td>
                                                <td class="min-w-32">{{$student->admission_date}}</td>
                                                <td>{{$student->blood_group}}</td>
                                                <td>{{$student->height}}</td>
                                                <td>{{$student->weight}}</td>
                                                <td>{{$student->status == 0 ? 'Active' : 'Inactive'}}</td>
                                                <td class="min-w-36">{{ date('d-m-y H:i A', strtotime($student->created_at))}}</td>
                                                <td class="min-w-40">
                                                    <a href="{{url('admin/student/edit/' . $student->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                                    <a href="{{url('admin/student/delete/' . $student->id)}}" class="btn btn-danger btn-sm">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <br>
                            <div style="display: flex; align-items: center; justify-content: flex-end;">
                                {!! $students->appends(request()->query())->links() !!}
                            </div>
                        </div> <!-- /.card-body -->
                    </div> <!-- /.card -->
            </div> <!--end::Row-->
        </div> <!--end::Container-->
    </div> <!--end::App Content-->

</main> <!--end::App Main-->

@endsection
