<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ContactFooter\StoreContactFooterRequest;
use App\Http\Requests\Admin\ContactFooter\UpdateContactFooterRequest;
use App\Models\ContactFooter;
use Illuminate\Http\Request;

class ContactFooterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contactFooters = ContactFooter::latest()->paginate(10);
        return  view('admin.contact_footer.index' , compact('contactFooters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('admin.contact_footer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContactFooterRequest $request)
    {
        ContactFooter::create($request->all());
        return redirect()->route('contact_footers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ContactFooter $contactFooter)
    {
        return view('admin.contact_footer.show' , compact('contactFooter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ContactFooter $contactFooter)
    {
        return view('admin.contact_footer.edit' , compact('contactFooter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContactFooterRequest $request, ContactFooter $contactFooter)
    {
        $contactFooter->update($request->all());
        return redirect()->route('contact_footers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactFooter $contactFooter)
    {
        $contactFooter->delete();
        return redirect()->route('contact_footers.index');
    }
}
