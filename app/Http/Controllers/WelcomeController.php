<?php

namespace App\Http\Controllers;

use App\Models\Family;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(Request $request)
    {
        $family = [];
        if (session('family') == 0) {
            session(['family' => 0]);
            session(['family_name' => '']);
            if (isset($request->family)) {
                if (strpos($request->family, "-") > 0) {
                    $id = substr($request->family, 0, strpos($request->family, "-"));
                    $slug = substr($request->family, strpos($request->family, "-") + 1);
                    $familySearch = Family::where('id', $id)->where('slug', $slug)->first();
                    if ($familySearch) {
                        $family = $familySearch;
                        session(['family' => $family->id]);
                        session(['family_name' => $family->name]);
                    }
                }
            } else {
                $familySearch = Family::find(1);
                if ($familySearch) {
                    $family = $familySearch;
                    session(['family' => $family->id]);
                    session(['family_name' => $family->name]);
                }
            }
        } else {
            $familySearch = Family::find(session('family'));
            if ($familySearch) {
                $family = $familySearch;
                session(['family' => $family->id]);
                session(['family_name' => $family->name]);
            }
        }
        return view('welcome', compact(['family']));
    }
}
