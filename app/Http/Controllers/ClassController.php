<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassController extends Controller
{
    //
    public function list() {
        $data['title'] = 'Class List';
        $data['classes'] = ClassModel::getRecords();
        return view('admin.class.list', $data);
    }

    public function add() {
        $data['title'] = 'Add New Class';
        return view('admin.class.add', $data);
    }

    public function store(Request $request) {
        $class = new ClassModel;
        $class->name = $request->name;
        $class->status = $request->status;
        $class->created_by = Auth::user()->id;
        $class->save();
        return redirect('admin/class/list')->with('success', "Class Successfully Created");
    }

    public function edit($id) {
        $data['class'] = ClassModel::getSingle($id);
        if (empty($data['class'])) {
            abort(404);
        }
        $data['title'] = "Edit Class";
        return view('admin.class.edit', $data);
    }

    public function update(Request $request, $id) {
        $class = ClassModel::getSingle($id);
        $class->name = $request->name;
        $class->status = $request->status;
        $class->save();
        return redirect('admin/class/list')->with('success', 'Class Successfully Updated.');
    }

    public function delete($id) {
        $class = ClassModel::getSingle($id);
        $class->is_delete = 1;
        $class->save();
        return redirect()->back()->with('success', 'Class Successfully Deleted');
    }

}
