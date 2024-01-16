<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Departement;
use App\Models\Employee;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Throwable;

class DepartementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Departement::withCount('employees')->get();
        return view('dashboard.departement.index', ['data' => $data]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'string|required|unique:departements,code',
            'name' => 'string|required',
            'options' => 'string|required',
        ]);

        if ($validator->fails()) {
            return back()->with('error', $validator->messages()->all()[0]);
        }

        $data = [
            'code' => $request->code,
            'name' => $request->name,
            'options' => $request->options,
            'status' => 1
        ];

        if (Departement::create($data)) {
            return redirect()->route('dashboard.departement.index')->with('success', 'Create data success.');
        } else {
            return back()->with('error', 'Something wrong when create data.');
        }
    }

    public function show(string $id)
    {
        try {
            $department = Departement::findOrFail($id);
            $data = $department->employees;
            return view('dashboard.departement.show', ['data' => $data, 'departement' => $department]);
        } catch (Throwable $e) {
            return back()->with('error', 'Something went wrong.');
        }
    }

    public function edit(string $id)
    {
        try {
            $data = Departement::find($id);
            return view('dashboard.departement.edit', ['data' => $data]);
        } catch (Throwable $e) {
            return back()->with('error', 'Something went wrong.');
        }
    }

    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'string|required',
            'name' => 'string|required',
            'options' => 'string|required',
        ]);

        if ($validator->fails()) {
            return back()->with('error', $validator->messages()->all()[0]);
        }

        $check = Departement::where('code', '=', $request->code);

        if ($check->count() > 0) {
            if ($check->first()->id != $id) {
                return back()->with('error', 'This code already used.');
            }
        }


        try {
            $data = Departement::find($id);
            $field = [
                'code' => $request->code,
                'name' => $request->name,
                'options' => $request->options,
            ];

            if ($data->update($field)) {
                return redirect()->route('dashboard.departement.index')->with('success', 'Update data success.');
            }

            return redirect()->route('dashboard.departement.edit', $id)->with('error', 'Something wrong when update data.');
        } catch (Throwable $e) {
            return back()->with('error', 'Something went wrong.');
        }
    }

    public function destroy(string $id)
    {
        try {
            $data = Departement::find($id);
            if ($data->delete()) {
                return redirect()->route('dashboard.departement.index')->with('success', 'Delete data success.');
            }

            return redirect()->route('dashboard.departement.index')->with('error', 'Something wrong when delete data.');
        } catch (Throwable $e) {
            return back()->with('error', 'We will back again.');
        }
    }
}
