<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Mail\NoticeSender;
use App\Models\Employee;
use App\Models\Notice;
use App\Models\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Throwable;


class ScoreController extends Controller
{
    public function index()
    {
        $employees = Employee::with('jabatan', 'department')->get();
        $data = Score::with('employee', 'createdByUser')->get();
        return view('dashboard.application.score.index', ['data' => $data, 'employees' => $employees]);
    }

    public function different()
    {
        $employees = Employee::with('jabatan', 'department')->get();
        return view('dashboard.application.score.different', ['employees' => $employees]);
    }

    public function same()
    {
        $employees = Employee::with('jabatan', 'department')->get();
        return view('dashboard.application.score.same', ['employees' => $employees]);
    }

    public function user(string $id)
    {
        $fullname = Employee::find($id)->fullname;
        $data = Score::where('id_employee', '=', $id)->with('employee', 'createdByUser')->get();
        return view('dashboard.application.score.show', ['data' => $data, 'slug' => $fullname]);
    }

    public function month(string $slug)
    {
        $data = Score::where('month', '=', $slug)->with('employee', 'createdByUser')->get();
        return view('dashboard.application.score.show', ['data' => $data, 'slug' => $slug]);
    }

    public function differentStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_employee' => 'required|integer',
            'month' => 'required',
            'one' => 'integer|required',
            'two' => 'integer|required',
            'three' => 'integer|required',
            'four' => 'integer|required',
            'five' => 'integer|required',
            'six' => 'integer|required',
            'seven' => 'integer|required',
            'eight' => 'integer|required',
            'nine' => 'integer|required',
            'ten' => 'integer|required',
        ]);

        if ($validator->fails()) {
            return back()->with('error', $validator->messages()->all()[0]);
        }

        if ($request->id_employee == 0) {
            return back()->with('error', 'Please select employee.');
        }

        $check = Score::where('month', '=', $request->month)->where('created_by', '=', Auth::user()->id);

        if ($check->count() > 0) {
            if ($check->first()->id_employee == $request->id_employee) {
                return back()->with('error', 'Cannot add data for same periode.');
            }
        }

        $score = $request->one + $request->two + $request->three + $request->four + $request->five + $request->six + $request->seven + $request->eight + $request->nine + $request->ten;

        $data = [
            'id_employee' => $request->id_employee,
            'month' => $request->month,
            'score' => $score * 2,
            'created_by' => Auth::user()->id
        ];

        if (Score::create($data)) {
            return redirect()->route('dashboard.score.index')->with('success', 'Create data success.');
        } else {
            return back()->with('error', 'Something wrong when create data.');
        }
    }

    public function sameStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_employee' => 'required|integer',
            'month' => 'required',
            'one' => 'integer|required',
            'two' => 'integer|required',
            'three' => 'integer|required',
            'four' => 'integer|required',
            'five' => 'integer|required',
        ]);

        if ($validator->fails()) {
            return back()->with('error', $validator->messages()->all()[0]);
        }

        if ($request->id_employee == 0) {
            return back()->with('error', 'Please select employee.');
        }

        $check = Score::where('month', '=', $request->month);

        if ($check->count() > 0) {
            if ($check->first()->id_employee == $request->id_employee) {
                return back()->with('error', 'Cannot add data for same periode.');
            }
        }

        $score = $request->one + $request->two + $request->three + $request->four + $request->five;

        $data = [
            'id_employee' => $request->id_employee,
            'month' => $request->month,
            'score' => $score * 4,
            'created_by' => Auth::user()->id
        ];

        if (Score::create($data)) {
            return redirect()->route('dashboard.score.index')->with('success', 'Create data success.');
        } else {
            return back()->with('error', 'Something wrong when create data.');
        }
    }

    public function destroy(string $id)
    {
        try {
            $data = Score::find($id);
            if ($data->delete()) {
                return redirect()->route('dashboard.score.index')->with('success', 'Delete data success.');
            }

            return redirect()->route('dashboard.score.index')->with('error', 'Something wrong when delete data.');
        } catch (Throwable $e) {
            return back()->with('error', 'We will back again.');
        }
    }
}
