<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Jabatan;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Throwable;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Jabatan::withCount('employees')->get();
        return view('dashboard.jabatan.index', ['data' => $data]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'string|required',
        ]);

        if ($validator->fails()) {
            return back()->with('error', $validator->messages()->all()[0]);
        }

        $data = [
            'name' => $request->name,
            'status' => 1
        ];

        if (Jabatan::create($data)) {
            return redirect()->route('dashboard.jabatan.index')->with('success', 'Create data success.');
        } else {
            return back()->with('error', 'Something wrong when create data.');
        }
    }

    public function show(string $id)
    {
        try {
            $jabatan = Jabatan::findOrFail($id);
            $data = $jabatan->employees;
            return view('dashboard.jabatan.show', ['data' => $data, 'jabatan' => $jabatan]);
        } catch (Throwable $e) {
            return back()->with('error', 'Something went wrong.');
        }
    }

    public function edit(string $id)
    {
        try {
            $data = Jabatan::find($id);
            return view('dashboard.jabatan.edit', ['data' => $data]);
        } catch (Throwable $e) {
            return back()->with('error', 'Something went wrong.');
        }
    }

    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'string|required',
        ]);

        if ($validator->fails()) {
            return back()->with('error', $validator->messages()->all()[0]);
        }

        try {
            $data = Jabatan::find($id);
            $field = [
                'name' => $request->name,
            ];

            if ($data->update($field)) {
                return redirect()->route('dashboard.jabatan.index')->with('success', 'Update data success.');
            }

            return redirect()->route('dashboard.jabatan.edit', $id)->with('error', 'Something wrong when update data.');
        } catch (Throwable $e) {
            return back()->with('error', 'Something went wrong.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = Jabatan::find($id);
            if ($data->delete()) {
                return redirect()->route('dashboard.jabatan.index')->with('success', 'Delete data success.');
            }

            return redirect()->route('dashboard.jabatan.index')->with('error', 'Something wrong when delete data.');
        } catch (Throwable $e) {
            return back()->with('error', 'We will back again.');
        }
    }
}
