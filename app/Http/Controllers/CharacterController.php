<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    public function index()
    {
        return Character::all();
    }

    public function show(Character $character)
    {
        return $character;
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'gender' => 'in:male,female|nullable',
            'picture' => 'file|image|nullable'
        ]);

        $character = Character::create($request->all());
        
        if($request->exists('picture')){
            $picture_url = cloudinary()->upload($request->file('picture')->getRealPath())->getSecurePath();

            $character->picture_url = $picture_url;
    
            $character->save();
        }
        
        return $character;
    }

    public function destroy($id)
    {
        return Character::destroy($id);
    }

    public function update(Request $request, Character $character)
    {
        $request->validate([
            'name' => 'required',
            'gender' => 'in:male,female|nullable',
            'picture' => 'nullable|file|image'
        ]);

        if($request->exists('picture')){
            $picture_url = cloudinary()->upload($request->file('picture')->getRealPath())->getSecurePath();

            $character->picture_url = $picture_url;
    
            $character->save();
        }

        return $character->update($request->all());
    }
}
