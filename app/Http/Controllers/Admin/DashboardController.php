<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return 'You are an admin';
    }

    public function photo(Request $request)
    {

        $file_url = cloudinary()->upload($request->file('file')->getRealPath())->getSecurePath();

        return $file_url;
    }
}
