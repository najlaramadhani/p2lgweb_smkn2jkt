<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Mail\NoticeSender;
use App\Models\Employee;
use App\Models\Notice;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Throwable;

class NoticeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        $data = Notice::with('employee')->get();
        return view('dashboard.application.notice.index', ['data' => $data, 'employees' => $employees]);
    }

    public function user(string $id)
    {
        $fullname = Employee::find($id)->fullname;
        $data = Notice::where('id_employee', '=', $id)->with('employee')->get();
        return view('dashboard.application.notice.show', ['data' => $data, 'slug' => $fullname]);
    }

    public function prihal(string $slug)
    {
        $data = Notice::where('about', '=', $slug)->with('employee')->get();
        return view('dashboard.application.notice.show', ['data' => $data, 'slug' => $slug]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_employee' => 'required',
            'note' => 'required',
            'hrd_meet_start' => 'date|required',
            'hrd_meet_end' => 'date|required',
            'about' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with('error', $validator->messages()->all()[0]);
        }

        if ($request->id_employee == 0) {
            return back()->with('error', 'Please select employee.');
        }

        $data = [
            'id_employee' => $request->id_employee,
            'note' => $request->note,
            'hrd_meet_start' => $request->hrd_meet_start,
            'hrd_meet_end' => $request->hrd_meet_end,
            'about' => $request->about,
        ];

        if (Notice::create($data)) {
            $findEmployee = Employee::find($request->id_employee);
            $fullname = $findEmployee->fullname;
            $email = $findEmployee->email;
            Mail::to($email)->send(new NoticeSender($fullname));
            return redirect()->route('dashboard.notice.index')->with('success', 'Create data success.');
        } else {
            return back()->with('error', 'Something wrong when create data.');
        }
    }

    public function edit(string $id)
    {
        $data = Notice::findOrFail($id);
        $employee = $data->employee;
        return view('dashboard.application.notice.edit', ['data' => $data, 'employee' => $employee]);
    }

    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'note' => 'required',
            'hrd_meet_start' => 'date|required',
            'hrd_meet_end' => 'date|required',
            'about' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with('error', $validator->messages()->all()[0]);
        }

        $data = Notice::find($id);
        $field = [
            'note' => $request->note,
            'hrd_meet_start' => $request->hrd_meet_start,
            'hrd_meet_end' => $request->hrd_meet_end,
            'about' => $request->about,
        ];

        if ($data->update($field)) {
            return redirect()->route('dashboard.notice.index')->with('success', 'Update data success.');
        } else {
            return back()->with('error', 'Something wrong when create data.');
        }
    }

    public function destroy(string $id)
    {
        try {
            $data = Notice::find($id);
            if ($data->delete()) {
                return redirect()->route('dashboard.notice.index')->with('success', 'Delete data success.');
            }

            return redirect()->route('dashboard.notice.index')->with('error', 'Something wrong when delete data.');
        } catch (Throwable $e) {
            return back()->with('error', 'We will back again.');
        }
    }
}
