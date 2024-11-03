<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Str;

class TeacherController extends Controller
{
    public function list() {
        $data['teachers'] = User::getTeachers(); // pagination
        $data['title'] = 'Teacher List';
        return view('admin.teacher.list', $data);
    }

    public function add() {
        $data['title'] = 'Add New Teacher';
        return view('admin.teacher.add', $data);
    }

    public function store(Request $request) {
        request()->validate([
            'email' => 'required|email|unique:users',
            'mobile_number' => 'nullable|min:8|max:15',
            'password' => 'required',
            'name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'admission_date' => 'required',
            'date_of_birth' => 'required',
            'status' => 'required',
            'current_address' => 'required',
            'marital_status' => 'nullable|max:50'
        ]);
        $student = new User;
        $student->name = trim($request->name);
        $student->last_name = trim($request->last_name);
        $student->gender = $request->gender;
        $student->status = $request->status;
        $student->email = trim($request->email);
        $student->password = Hash::make($request->password);
        $student->role = 2;
        $student->date_of_birth = $request->date_of_birth;
        $student->current_address = $request->current_address;
        if (!empty($request->note)) {
            $student->note = $request->note;
        }
        if (!empty($request->marital_status)) {
            $student->marital_status = $request->marital_status;
        }
        if (!empty($request->work_experience)) {
            $student->work_experience = $request->work_experience;
        }
        if (!empty($request->qualification)) {
            $student->qualification = $request->qualification;
        }
        if (!empty($request->address)) {
            $student->address = $request->address;
        }
        if (!empty($request->mobile_number)) {
            $student->mobile_number = $request->mobile_number;
        }
        if (!empty($request->file('profile_pic'))) {
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('ymdhis') . Str::random(20);
            $fileName = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/profile/', $fileName);
            $student->profile_pic = $fileName;
        }
        if (!empty($request->admission_date)) {
            $student->admission_date = $request->admission_date;
        }
        $student->save();
        return redirect('admin/teacher/list')->with('success','Teacher Successfully Created');
    }

    public function edit($id) {
        $data['teacher'] = User::getSingle($id);
        if (empty($data['teacher'])) {
            return abort(404);
        }
        $data['title'] = "Edit Teacher";
        return view('admin.teacher.edit', $data);
    }

    public function update($id, Request $request) {
        request()->validate([
            'email' => 'required|email|unique:users,email,'.$id,
            'mobile_number' => 'nullable|min:8|max:15',
            'name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'status' => 'required',
            'marital_status' => 'nullable|max:50'
        ]);
        $teacher = User::getSingle($id);
        $teacher->name = trim($request->name);
        $teacher->last_name = trim($request->last_name);
        $teacher->gender = $request->gender;
        $teacher->mobile_number = $request->mobile_number;
        $teacher->status = $request->status;
        $teacher->email = trim($request->email);
        $teacher->current_address = $request->current_address;
        $teacher->role = 2;
        if (!empty($request->marital_status)) {
            $teacher->marital_status = $request->marital_status;
        }
        if (!empty($request->work_experience)) {
            $teacher->work_experience = $request->work_experience;
        }
        if (!empty($request->current_address)) {
            $teacher->current_address = $request->current_address;
        }
        if (!empty($request->note)) {
            $teacher->note = $request->note;
        }
        if (!empty($request->qualification)) {
            $teacher->qualification = $request->qualification;
        }
        if (!empty($request->permanent_address)) {
            $teacher->address = $request->permanent_address;
        }
        if (!empty($request->date_of_birth)) {
            $teacher->date_of_birth = $request->date_of_birth;
        }
        if (!empty($request->file('profile_pic'))) {
            if (!empty($teacher->profile_pic)) {
                unlink('upload/profile/' . $teacher->profile_pic);
            }
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('ymdhis') . Str::random(20);
            $fileName = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/profile/', $fileName);
            $teacher->profile_pic = $fileName;
        }
        if (!empty($request->admission_date)) {
            $teacher->admission_date = $request->admission_date;
        }
        if (!empty($request->password)) {
            $teacher->password = Hash::make($request->password);
        }
        $teacher->save();
        return redirect('admin/teacher/list')->with('success','Teacher Successfully Updated');
    }

    public function delete($id) {
        $teacher = User::getSingle($id);
        if (!empty($teacher)) {
            $teacher->is_delete = 1;
            $teacher->save();
            return redirect()->back()->with('success','Teacher Successfully Deleted');
        }
        return abort(404);
    }

}
