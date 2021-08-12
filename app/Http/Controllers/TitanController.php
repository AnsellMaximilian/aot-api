<?php

namespace App\Http\Controllers;

use App\Models\Titan;
use Illuminate\Http\Request;

class TitanController extends Controller
{
    public function index()
    {
        return Titan::with('shifter')->get();
    }

    public function show(Titan $titan)
    {
        $titan->shifter;
        return $titan;
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'character_id' => 'nullable|numeric',
            'height_m' => 'numeric',
            'picture' => 'file|image|nullable'
        ]);
        $titan = Titan::create($request->all());

        if($request->exists('picture')){
            $picture_url = cloudinary()->upload($request->file('picture')->getRealPath())->getSecurePath();

            $titan->picture_url = $picture_url;
    
            $titan->save();
        }

        return $titan;
    }

    public function destroy($id)
    {
        return Titan::destroy($id);
    }

    public function update(Request $request, Titan $titan)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'character_id' => 'nullable|numeric',
            'height_m' => 'numeric',
            'picture' => 'file|image|nullable'
        ]);

        if($request->exists('picture')){
            $picture_url = cloudinary()->upload($request->file('picture')->getRealPath())->getSecurePath();

            $titan->picture_url = $picture_url;
    
            $titan->save();
        }

        return $titan->update($request->all());
    }
}
