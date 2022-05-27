<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ServiceHeader\StoreServiceHeaderRequest;
use App\Http\Requests\Admin\ServiceHeader\UpdateServiceHeaderRequest;
use App\Models\Service;
use App\Models\ServiceItemHeader;
use Illuminate\Http\Request;

class ServiceHeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $serviceItemHeaders = ServiceItemHeader::latest()->paginate(20);
        return view('admin.service_header.index' , compact('serviceItemHeaders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::all();
        return view('admin.service_header.create' , compact('services'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServiceHeaderRequest $request)
    {

        ServiceItemHeader::create($request->all());
        return redirect()->route('service_headers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceItemHeader $serviceHeader)
    {
        return view('admin.service_header.show' , compact('serviceHeader'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceItemHeader $serviceHeader)
    {
        $services = Service::all();
        return view('admin.service_header.edit' , compact(['services','serviceHeader']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateServiceHeaderRequest $request, ServiceItemHeader $serviceHeader)
    {
        $serviceHeader->update($request->all());

        return redirect()->route('service_headers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceItemHeader $serviceHeader)
    {
        $serviceHeader->delete();
        return redirect()->route('service_headers.index');
    }
}
