<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFamilyRequest;
use App\Http\Requests\UpdateFamilyRequest;
use App\Models\Family;
use App\Models\Person;
use Illuminate\Http\Request;

class FamilyController extends Controller
{
    protected Family $family;

    public function __construct(Family $family)
    {
        $this->family = $family;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Family::class);
        $families = $this->family->paginate(10);

        dd($families);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Family::class);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFamilyRequest $request)
    {
        $this->authorize('create', Family::class);
    }

    /**
     * Display the specified resource.
     */
    public function show(Family $family)
    {
        $this->authorize('view', $family);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Family $family)
    {
        $this->authorize('update', $family);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFamilyRequest $request, Family $family)
    {
        $this->authorize('update', $family);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Family $family)
    {
        $this->authorize('delete', $family);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function myfamily()
    {
        $family = $this->family->find(session('family'));
//        $this->authorize('view', $family);

        $person = $family->people()->inRandomOrder()->firstOrFail();

        return redirect(route('person', ['person' => $person]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function person(Request $request, Person $person)
    {
        $family = $person->family;
//        $this->authorize('view', $family);

        return view('families.person', compact(['family', 'person']));
    }
}
