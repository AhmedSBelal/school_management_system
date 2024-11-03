@extends('layout.app')

@section('content')

<main class="app-main"> <!--begin::App Content Header-->
    <div class="app-content-header"> <!--begin::Container-->
        <div class="container-fluid"> <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Assign Subject List</h3>
                </div>
                <div class="col-sm-6" style="text-align: right">
                    <a href="{{url('admin/assign_subject/add')}}" class="btn btn-primary">Assign New Subject</a>
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
                            <h3 class="card-title">Search Subject</h3>
                        </div>
                        <form action="/admin/assign_subject/list" method="get"> <!--begin::Body-->
                            @csrf
                            <div class="card-body row">
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Class Name</label>
                                    <input type="text" class="form-control" name="class_name" placeholder="Class Name" value="{{Request::get('class_name')}}">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Subject Name</label>
                                    <input type="text" class="form-control" name="subject_name" placeholder="Subject Name" value="{{Request::get('subject_name')}}">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Date</label>
                                    <input type="date" class="form-control" name="date" value="{{Request::get('date')}}">
                                </div>
                                <div class="form-group col-md-3 mb-3 d-flex align-items-end gap-2">
                                    <button class="btn btn-primary" type="submit">Search</button>
                                    <a href="{{ url('admin/assign_subject/list') }}" class="btn btn-success">Reset</a>
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
                            <h3 class="card-title">Assign Subject List</h3>
                        </div> <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div style="overflow-x: auto;">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Class Name</th>
                                            <th>Subject Name</th>
                                            <th>Status</th>
                                            <th>Created By</th>
                                            <th>Created Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($classesSubjects as $item)
                                        <tr>
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->class_name}}</td>
                                            <td>{{$item->subject_name}}</td>
                                            <td>{{$item->status == 0 ? 'Active' : 'Inactive'}}</td>
                                            <td>{{$item->created_by_name}}</td>
                                            <td class="min-w-36">{{ date('d-m-y H:i A', strtotime($item->created_at)) }}</td>
                                            <td class="min-w-72">
                                                <a href="{{url('admin/assign_subject/edit/'.$item->id)}}" class="btn btn-primary" >Edit</a>
                                                <a href="{{url('admin/assign_subject/edit_single/'.$item->id)}}" class="btn btn-primary" >Edit Single</a>
                                                <a href="{{url('admin/assign_subject/delete/'. $item->id)}}" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <br>
                            <div style="display: flex; align-items: center; justify-content: flex-end;">
                                {!! $classesSubjects->appends(Request::class::except('page'))->links() !!}
                            </div>
                        </div> <!-- /.card-body -->
                    </div> <!-- /.card -->
            </div> <!--end::Row-->
        </div> <!--end::Container-->
    </div> <!--end::App Content-->

</main> <!--end::App Main-->

@endsection
