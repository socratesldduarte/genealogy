<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePersonRequest;
use App\Http\Requests\UpdatePersonRequest;
use App\Models\Family;
use App\Models\Person;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePersonRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Person $person)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Person $person)
    {
        $family = Family::find(session('family'));
        $this->authorize('update', $person);

        return view('admin.person.edit', compact(['family', 'person']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePersonRequest $request, Person $person)
    {
        $this->authorize('update', $person);
        $person->update($request->all());

        return redirect(route('person', ['person' => $person]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Person $person)
    {
        //
    }
}
