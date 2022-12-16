<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LiveSearchController extends Controller
{
    function search(Request $request)
    {
        if ($request->get('query')) {
            $query = $request->get('query');
            $data = User::where('full_name', 'LIKE', "%{$query}%")->get('full_name');
            return response()->json($data);

        }
    }

}
