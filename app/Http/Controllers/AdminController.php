<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    public function list() {
        $data['admins'] = User::getAdmins(); // pagination
        $data['title'] = 'Admin List';
        return view('admin.admin.list', $data);
    }

    public function add() {
        $data['title'] = 'Add New Admin';
        return view('admin.admin.add', $data);
    }

    public function store(Request $request) {
        request()->validate([
            'email' => 'required|email|unique:users'
        ]);
        $user = new User;
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->role = 1;
        $user->save();
        return redirect('admin/admin/list')->with('success','Admin successfully created');
    }

    public function edit($id) {
        $data['admin'] = User::getSingle($id);
        if (empty($data['admin'])) {
            return abort(404);
        }
        $data['title'] = "Edit Admin";
        return view('admin.admin.edit', $data);
    }

    public function update(Request $request, $id) {
        request()->validate([
            'email' => 'required|email|unique:users,email,'.$id
        ]);
        $user = User::getSingle($id);
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }
        $user->role = 1;
        $user->save();
        return redirect('admin/admin/list')->with('success','Admin successfully updated');
    }

    public function delete($id) {
        $user = User::getSingle($id);
        $user->is_delete = 1;
        $user->save();
        return redirect('admin/admin/list')->with('success','Admin successfully deleted');
    }

}
