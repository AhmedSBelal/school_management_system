<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Str;

class ParentController extends Controller
{
    public function list() {
        $data['parents'] = User::getParents(); // pagination
        $data['title'] = 'Parent List';
        return view('admin.parent.list', $data);
    }

    public function add() {
        $data['title'] = 'Add New Parent';
        return view('admin.parent.add', $data);
    }

    public function store(Request $request) {
        request()->validate([
            'email' => 'required|email|unique:users',
            'mobile_number' => 'nullable|min:8|max:15',
            'occupation' => 'nullable|max:255',
            'address' => 'required|max:255',
            'password' => 'required',
            'name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'status' => 'required'
        ]);
        $parent = new User;
        $parent->name = trim($request->name);
        $parent->last_name = trim($request->last_name);
        $parent->gender = $request->gender;
        $parent->occupation = $request->occupation;
        $parent->address = $request->address;
        $parent->mobile_number = $request->mobile_number;
        $parent->status = $request->status;
        $parent->email = trim($request->email);
        $parent->password = Hash::make($request->password);
        $parent->role = 4;
        if (!empty($request->file('profile_pic'))) {
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('ymdhis') . Str::random(20);
            $fileName = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/profile/', $fileName);
            $parent->profile_pic = $fileName;
        }
        $parent->save();
        return redirect('admin/parent/list')->with('success','Parent Successfully Created');
    }

    public function edit($id) {
        $data['parent'] = User::getSingle($id);
        if (empty($data['parent'])) {
            return abort(404);
        }
        $data['title'] = "Edit Parent";
        return view('admin.parent.edit', $data);
    }

    public function update($id, Request $request) {
        request()->validate([
            'email' => 'required|email|unique:users,email,' . $id,
            'mobile_number' => 'nullable|min:8|max:15',
            'occupation' => 'nullable|max:255',
            'address' => 'required|max:255',
            'name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'status' => 'required'
        ]);
        $parent = User::getSingle($id);
        $parent->name = trim($request->name);
        $parent->last_name = trim($request->last_name);
        $parent->gender = $request->gender;
        $parent->occupation = $request->occupation;
        $parent->address = $request->address;
        $parent->mobile_number = $request->mobile_number;
        $parent->status = $request->status;
        $parent->email = trim($request->email);
        $parent->role = 4;
        if (!empty($request->file('profile_pic'))) {
            if (!empty($parent->profile_pic)) {
                unlink('upload/profile/' . $parent->profile_pic);
            }
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('ymdhis') . Str::random(20);
            $fileName = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/profile/', $fileName);
            $parent->profile_pic = $fileName;
        }
        if (!empty($parent->password)) {
            $parent->password = Hash::make($request->password);
        }
        $parent->save();
        return redirect('admin/parent/list')->with('success','Parnet Successfully Updated');
    }

    public function delete($id) {
        $parent = User::getSingle($id);
        if (!empty($parent)) {
            $parent->is_delete = 1;
            $parent->save();
            return redirect()->back()->with('success','Parent Successfully Deleted');
        }
        return abort(404);
    }

    public function myStudent($id) {
        $data['title'] = "Parent Student List";
        // $data['parent_id'] = $id;
        $data['parent'] = User::getSingle($id);
        $data['students'] = User::getSearchStudents();
        $data['my_students'] = User::getMyStudents($id);
        return view('admin.parent.my_student', $data);
    }

    public function AssignStudnetParent($student_id, $parent_id) {
        $student = User::getSingle($student_id);
        $student->parent_id = $parent_id;
        $student->save();
        return redirect()->back()->with('success', 'Student Successfully Assign');
    }

    public function AssignStudnetParentDelete($student_id) {
        $student = User::getSingle($student_id);
        $student->parent_id = null;
        $student->save();
        return redirect()->back()->with('success', 'Student Successfully Assign Deleted');
    }

}
