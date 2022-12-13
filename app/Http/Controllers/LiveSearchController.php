<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LiveSearchController extends Controller
{
    function search(Request $request)
    {

        if($request->get('query'))
        {
            $query = $request->get('query');

            $data = DB::table('users')
                ->where('full_name','LIKE',"%{$query}%")
                ->get();
            $output = '<ul class="dropdown-menu" style="display:block;position:relative;width:100%;">';
            foreach ($data as $row) {
                $output .= '
                <li><a class="dropdown-item" href="#">' . $row->full_name.'</a></li>
                ';
            }
            $output .= '</ul>';
            echo $output;
        }
    }


}
