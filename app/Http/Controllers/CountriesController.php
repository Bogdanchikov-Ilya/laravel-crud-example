<?php

namespace App\Http\Controllers;

use App\Models\Countries;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class CountriesController extends Controller
{
    //get all
    public function index() {
        $countries = Countries::all();
        return $countries;
    }

    //get by id
    public function indexId($id) {
        return Countries::find($id);
    }

    //create
    public function create(Request $request) {
        return Countries::create([
            'alias' => $request->alias,
            'name' => $request->name
        ]);
    }

    //update
    public function update(Request $request, $id){
        $item = Countries::find($id);
        $item->update($request->all());

        return response()->json('successfully updated');
    }

    //delete
    public function destroy($countriesId) {
        Countries::destroy($countriesId);
        return 'Delete id=' . $countriesId . ' completed';
    }
}
