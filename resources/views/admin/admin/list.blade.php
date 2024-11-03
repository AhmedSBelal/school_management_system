@extends('layout.app')

@section('content')

<main class="app-main"> <!--begin::App Content Header-->
    <div class="app-content-header"> <!--begin::Container-->
        <div class="container-fluid"> <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Admin List (Total : {{$admins->total()}})</h3>
                </div>
                <div class="col-sm-6" style="text-align: right">
                    <a href="{{url('admin/admin/add')}}" class="btn btn-primary">Add New Admin</a>
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
                            <h3 class="card-title">Search Admin</h3>
                        </div>
                        <form action="" method="get"> <!--begin::Body-->
                            @csrf
                            <div class="card-body row">
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Name" value="{{Request::get('name')}}">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="text" class="form-control" name="email" placeholder="Eamil" value="{{Request::get('email')}}">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Date</label>
                                    <input type="date" class="form-control" name="date" value="{{Request::get('date')}}">
                                </div>
                                <div class="form-group col-md-3 mb-3 d-flex align-items-end gap-2">
                                    <button class="btn btn-primary" type="submit">Search</button>
                                    <a href="{{ url('admin/admin/list') }}" class="btn btn-success">Reset</a>
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
                            <h3 class="card-title">Admin List</h3>
                        </div> <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div style="overflow-x: auto;">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Created Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($admins as $admin)
                                            <tr>
                                                <td>{{$admin->id}}</td>
                                                <td>{{$admin->name}}</td>
                                                <td>{{$admin->email}}</td>
                                                <td class="min-w-36">{{ date('d-m-y H:i A', strtotime($admin->created_at))}}</td>
                                                <td class="min-w-40">
                                                    <a href="{{url('admin/admin/edit/' . $admin->id)}}" class="btn btn-primary">Edit</a>
                                                    <a href="{{url('admin/admin/delete/' . $admin->id)}}" class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <br>
                            <div style="display: flex; align-items: center; justify-content: flex-end;">
                                {!! $admins->appends(request()->query())->links() !!}
                            </div>
                        </div> <!-- /.card-body -->
                    </div> <!-- /.card -->
            </div> <!--end::Row-->
        </div> <!--end::Container-->
    </div> <!--end::App Content-->

</main> <!--end::App Main-->

@endsection
