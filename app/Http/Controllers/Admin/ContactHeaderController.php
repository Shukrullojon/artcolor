<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactHeader;
use Illuminate\Http\Request;

class ContactHeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $headers = ContactHeader::latest()->paginate(10);

        return  view('admin.contact_header.index' , ['headers' => $headers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('admin.contact_header.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ContactHeader::create($request->all());
        return redirect()->route('contact_headers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ContactHeader $contactHeader)
    {
        return  view('admin.contact_header.show' , ['contactHeader' => $contactHeader]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ContactHeader $contactHeader)
    {
        return  view('admin.contact_header.edit' ,['contactHeader' => $contactHeader]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContactHeader $contactHeader)
    {
        $contactHeader->update($request->all());
        return redirect()->route('contact_headers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactHeader $contactHeader)
    {
        $contactHeader->delete();
        return redirect()->route('contact_headers.index');
    }
}
