@extends('layout.app')

@section('content')

<main class="app-main"> <!--begin::App Content Header-->
    <div class="app-content-header"> <!--begin::Container-->
        <div class="container-fluid"> <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">parent List (Total : {{$parents->total()}})</h3>
                </div>
                <div class="col-sm-6" style="text-align: right">
                    <a href="{{url('admin/parent/add')}}" class="btn btn-primary">Add New Parent</a>
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
                            <h3 class="card-title">Search Parent</h3>
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
                                    <label class="form-label">Gender</label>
                                    <select name="gender" id="form-label" class="form-control">
                                        <option value="">Select Gender</option>
                                        <option value="male" {{Request::get('gender') == "male" ? 'selected' : ''}}>Male</option>
                                        <option value="female" {{Request::get('gender') == "female" ? 'selected' : ''}}>Female</option>
                                        <option value="other" {{Request::get('gender') == "other" ? 'selected' : ''}}>Other</option>
                                    </select>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label class="form-label">Occupation</label>
                                    <input type="text" class="form-control" name="occupation" placeholder="Occupation" value="{{Request::get('occupation')}}">
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label class="form-label">Address</label>
                                    <input type="text" class="form-control" name="address" placeholder="Address" value="{{Request::get('address')}}">
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label class="form-label">Mobile Number</label>
                                    <input type="text" class="form-control" name="mobile_number" placeholder="Mobile Number" value="{{Request::get('mobile_number')}}">
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label class="form-label">Status</label>
                                    <select name="status" id="" class="form-control">
                                        <option value="">Select Status</option>
                                        <option value="0" {{Request::get('parent') == "0" ? 'selected' : ''}}>Active</option>
                                        <option value="1" {{Request::get('parent') == "1" ? 'selected' : ''}}>Inactive</option>
                                    </select>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label class="form-label">Created Date</label>
                                    <input type="date" class="form-control" name="date" value="{{Request::get('date')}}">
                                </div>
                                <div class="form-group col-md-3 mb-3 d-flex align-items-end gap-2">
                                    <button class="btn btn-primary" type="submit">Search</button>
                                    <a href="{{ url('admin/parent/list') }}" class="btn btn-success">Reset</a>
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
                            <h3 class="card-title">Parent List</h3>
                        </div> <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div style="overflow-x: auto;">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Profile pic</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Gender</th>
                                            <th>Mobile Number</th>
                                            <th>Occupation</th>
                                            <th>Address</th>
                                            <th>Status</th>
                                            <th>Created Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($parents as $parent)
                                            <tr>
                                                <td>{{$parent->id}}</td>
                                                <td>
                                                    @if (!empty($parent->profile_pic))
                                                    <img src="{{asset('upload/profile/' . $parent->profile_pic)}}" alt=""
                                                    class="h-[50px] w-[50px] rounded-full" >
                                                    @endif
                                                </td>
                                                <td>{{$parent->name}} {{$parent->last_name}}</td>
                                                <td>{{$parent->email}}</td>
                                                <th>{{$parent->gender}}</th>
                                                <th>{{$parent->mobile_number}}</th>
                                                <th>{{$parent->occupation}}</th>
                                                <th>{{$parent->address}}</th>
                                                <td>{{$parent->status == 0 ? 'Active' : 'Inactive'}}</td>
                                                <td class="min-w-36">{{ date('d-m-y H:i A', strtotime($parent->created_at))}}</td>
                                                <td class="min-w-72">
                                                    <a href="{{url('admin/parent/edit/' . $parent->id)}}" class="btn btn-primary">Edit</a>
                                                    <a href="{{url('admin/parent/my-student/' . $parent->id)}}" class="btn btn-primary">My Student</a>
                                                    <a href="{{url('admin/parent/delete/' . $parent->id)}}" class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <br>
                            <div style="display: flex; align-items: center; justify-content: flex-end;">
                                {!! $parents->appends(request()->query())->links() !!}
                            </div>
                        </div> <!-- /.card-body -->
                    </div> <!-- /.card -->
            </div> <!--end::Row-->
        </div> <!--end::Container-->
    </div> <!--end::App Content-->

</main> <!--end::App Main-->

@endsection
