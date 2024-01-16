<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Departement;
use App\Models\Employee;
use App\Models\EmployeeStatus;
use App\Models\Jabatan;
use App\Models\Notice;
use App\Models\Score;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Throwable;

class EmployeeController extends Controller
{
    public function index()
    {
        $data = Employee::with('department', 'jabatan', 'status')->get();
        return view('dashboard.employee.index', ['data' => $data]);
    }

    public function create()
    {
        $departement = Departement::where('status', '=', 1)->get();
        $jabatan = Jabatan::where('status', '=', 1)->get();
        $status = EmployeeStatus::all();
        return view('dashboard.employee.create', ['departement' => $departement, 'jabatan' => $jabatan, 'status' => $status]);
    }

    public function show(string $id)
    {
        try {
            $notice = Notice::where('id_employee', '=', $id)->with('employee')->get();
            $scores = Score::where('id_employee', '=', $id)->with('employee')->get();
            $data = Employee::find($id)->with('department', 'jabatan', 'status')->first();
            return view('dashboard.employee.show', ['data' => $data, 'notice' => $notice, 'scores' => $scores]);
        } catch (Throwable $e) {
            return back()->with('error', 'Something went wrong.');
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nik' => 'required|unique:employees,nik',
            'uid' => 'required|unique:employees,uid',
            'fullname' => 'required',
            'nickname' => 'required',
            'place_of_birth' => 'required',
            'birthdate' => 'required|date',
            'gender' => 'required',
            'religion' => 'required',
            'tgl_masuk' => 'required|date',
            'id_departement' => 'required',
            'id_jabatan' => 'required',
            'id_status' => 'required',
            'telp' => 'required',
            'email' => 'required',
            'address' => 'required',
            'citizen' => 'required',
            'city' => 'required',
            'blood_group' => 'required',
            'married' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->with('error', $validator->messages()->all()[0]);
        }

        $data = [
            'nik' => $request->nik,
            'uid' => $request->uid,
            'fullname' => $request->fullname,
            'nickname' => $request->nickname,
            'place_of_birth' => $request->place_of_birth,
            'birthdate' => $request->birthdate,
            'gender' => $request->gender,
            'religion' => $request->religion,
            'tgl_masuk' => $request->tgl_masuk,
            'id_departement' => $request->id_departement,
            'id_jabatan' => $request->id_jabatan,
            'id_status' => $request->id_status,
            'telp' => $request->telp,
            'email' => $request->email,
            'address' => $request->address,
            'citizen' => $request->citizen,
            'city' => $request->city,
            'blood_group' => $request->blood_group,
            'married' => $request->married,
        ];

        if (Employee::create($data)) {
            return redirect()->route('dashboard.employee.index')->with('success', 'Create data success.');
        } else {
            return back()->with('error', 'Something wrong when create data.');
        }
    }

    public function edit(string $id)
    {
        try {
            $data = Employee::with('department', 'jabatan', 'status')->findOrFail($id);
            $departement = Departement::where('status', '=', 1)->get();
            $jabatan = Jabatan::where('status', '=', 1)->get();
            $status = EmployeeStatus::all();

            return view('dashboard.employee.edit', ['data' => $data, 'departement' => $departement, 'jabatan' => $jabatan, 'status' => $status]);
        } catch (Throwable $e) {
            return back()->with('error', 'Something went wrong.');
        }
    }

    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'nik' => 'required',
            'uid' => 'required',
            'fullname' => 'required',
            'nickname' => 'required',
            'place_of_birth' => 'required',
            'birthdate' => 'required|date',
            'gender' => 'required',
            'religion' => 'required',
            'tgl_masuk' => 'required|date',
            'id_departement' => 'required',
            'id_jabatan' => 'required',
            'id_status' => 'required',
            'telp' => 'required',
            'email' => 'required',
            'address' => 'required',
            'citizen' => 'required',
            'city' => 'required',
            'blood_group' => 'required',
            'married' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->with('error', $validator->messages()->all()[0]);
        }

        $field = [
            'nik' => $request->nik,
            'uid' => $request->uid,
            'fullname' => $request->fullname,
            'nickname' => $request->nickname,
            'place_of_birth' => $request->place_of_birth,
            'birthdate' => $request->birthdate,
            'gender' => $request->gender,
            'religion' => $request->religion,
            'tgl_masuk' => $request->tgl_masuk,
            'id_departement' => $request->id_departement,
            'id_jabatan' => $request->id_jabatan,
            'id_status' => $request->id_status,
            'telp' => $request->telp,
            'email' => $request->email,
            'address' => $request->address,
            'citizen' => $request->citizen,
            'city' => $request->city,
            'blood_group' => $request->blood_group,
            'married' => $request->married,
        ];

        $nikCheck = Employee::where('nik', '=', $request->nik);
        $uidCheck = Employee::where('uid', '=', $request->uid);

        if ($nikCheck->count() > 0) {
            if ($nikCheck->first()->id != $id) {
                return back()->with('error', 'This NIK already used.');
            }
        }

        if ($uidCheck->count() > 0) {
            if ($uidCheck->first()->id != $id) {
                return back()->with('error', 'This Card ID already used.');
            }
        }

        $data = Employee::find($id);
        if ($data->update($field)) {
            return redirect()->route('dashboard.employee.index')->with('success', 'Update data success.');
        }

        return redirect()->route('dashboard.employee.edit', $id)->with('error', 'Something wrong when update data.');
    }

    public function destroy(string $id)
    {
        try {
            $data = Employee::find($id);
            if ($data->delete()) {
                return redirect()->route('dashboard.employee.index')->with('success', 'Delete data success.');
            }

            return redirect()->route('dashboard.employee.index')->with('error', 'Something wrong when delete data.');
        } catch (Throwable $e) {
            return back()->with('error', 'We will back again.');
        }
    }
}
