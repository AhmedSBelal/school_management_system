@extends('layout.app')

@section('content')

<main class="app-main"> <!--begin::App Content Header-->
    <div class="col-md-12"> <!--begin::Quick Example-->
        <div class="card card-primary card-outline mb-4"> <!--begin::Header-->
            <div class="card-header">
                <div class="card-title">Edit Admin</div>
            </div> <!--end::Header--> <!--begin::Form-->
            <form action="" method="post"> <!--begin::Body-->
                @csrf
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="school" required value="{{old('name', $admin->name)}}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="school@school.example" required value="{{old('email', $admin->email)}}">
                        <div style="color: red;">
                            {{$errors->first('email')}}
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="password">
                        <div class="form-text">if you want to update password.</div>
                    </div>
                <div class="card-footer"> <button type="submit" class="btn btn-primary">Update</button> </div> <!--end::Footer-->
            </form> <!--end::Form-->
        </div> <!--end::Quick Example--> <!--begin::Input Group-->
    </div>
</main> <!--end::App Main-->

@endsection
