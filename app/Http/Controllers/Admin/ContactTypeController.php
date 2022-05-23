<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ContactType\StoreContactTypeRequest;
use App\Models\ContactType;
use Illuminate\Http\Request;

class ContactTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contactTypes = ContactType::latest()->paginate(10);
        return view('admin.contact_type.index' , compact('contactTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contact_type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContactTypeRequest $request)
    {
        ContactType::create($request->all());
        return redirect()->route('contact_types.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ContactType $contactType)
    {
        return view('admin.contact_type.show' , compact('contactType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ContactType $contactType)
    {
        return view('admin.contact_type.edit' , compact('contactType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContactType $contactType)
    {
        $contactType->update($request->all());
        return redirect()->route('contact_types.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactType $contactType)
    {
        $contactType->delete();
        return redirect()->route('contact_types.index');
    }
}
