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
        return $character->titan;
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'gender' => 'in:male,female|nullable'
        ]);

        return Character::create($request->all());
    }

    public function destroy($id)
    {
        return Character::destroy($id);
    }

    public function update(Request $request, Character $character)
    {
        $request->validate([
            'name' => 'required',
            'gender' => 'in:male,female|nullable'
        ]);

        return 1;

        return $character;

        return $character->update($request->all());
    }
}
