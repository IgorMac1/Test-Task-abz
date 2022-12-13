<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Profession;
use App\Models\User;
use App\Services\FileStorageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('profession','adminCreated','adminUpdated','employee')->paginate(50);

        return view('user.index', compact('users'));
    }

    public function create()
    {
        $professions = Profession::all();
        return view('user.create', compact('professions'));
    }

    public function store(CreateUserRequest $request)
    {

        $str = Str::of($request->phone)->replaceMatches('/[^+A-Za-z0-9]++/','');
        $data = $request->validated();
        $data['phone']= $str->value;
        $data['admin_created_id'] = Auth::user()->id;
        $data['photo'] = FileStorageService::upload($data['photo']);
        $data['manager_id']= DB::table('users')->where('full_name',$data['manager_id'])->value('id');

        User::create($data);
        return redirect()->route('user.table');
    }

    public function edit(User $user, Profession $professions)
    {
        $professions = $professions->all();
        return view('user.edit', compact('user', 'professions'));
    }

    public function update(UpdateUserRequest $request,User $user)
    {
        $str = Str::of($request->phone)->replaceMatches('/[^+A-Za-z0-9]++/','');
        $data = $request->validated();
        $data['admin_updated_id'] = Auth::user()->id;
        $data['phone']= $str->value;
        if (!isset($data['photo'])){
            $data['photo'] = $user->photo;
        }else{
            $data['photo'] = FileStorageService::upload($data['photo']);
            FileStorageService::remove($user['photo']);
        };
        $data['manager_id']= DB::table('users')->where('full_name',$data['manager_id'])->value('id');
        $user->update($data);
        return redirect()->route('user.table');
    }

    public function destroy(User $user)
    {
        FileStorageService::remove($user['photo']);
        $user->delete();
        return redirect()->route('user.table');
    }
}
