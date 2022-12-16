<?php

namespace App\Http\Controllers;

use App\Models\Profession;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfessionController extends Controller
{
    public function index()
    {

        $professions = Profession::with('adminCreatedProfession','adminUpdatedProfession')->get();
        return view('profession.index',compact('professions'));
    }

    public function create()
    {
        return view('profession.create');
    }

    public function store()
    {
        $data = request()->validate([
            'profession'=>'string',
        ]);
        $data['admin_created_id'] = Auth::user()->id;
        Profession::create($data);
        notify()->success("Profession was added");
        return redirect()->route('profession.table');
    }

    public function edit(Profession $profession)
    {
        return view('profession.edit',compact('profession'));
    }

    public function update(Profession $profession)
    {
        $data = request()->validate([
            'profession'=>'string',
        ]);
        $data['admin_updated_id'] = Auth::user()->id;

        $profession->update($data);
        notify()->success("Profession was updated");
        return redirect()->route('profession.table');
    }

    public function destroy(Profession $profession)
    {
        $profession->delete();
        notify()->warning("Profession was deleted");
        return redirect()->route('profession.table');
    }
}
