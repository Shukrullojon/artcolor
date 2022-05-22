<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Contacts\StoreContactRequest;
use App\Models\Address;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::latest()->paginate(10);
        return view('admin.contacts.index' , compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = '';
        if(isset($request->image)){
            $image = $this->uploadImage($request);
        }
        $contact = Contact::create([
            'logo' => $image ,
            'phone_1' => $request->phone_1,
            'phone_2' => $request->phone_2 ,
            'email' => $request->email ,
            'timetable' => $request->timetable,
            'telegram' => $request->telegram,
            'youtube'  => $request->youtube,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'title_uz' => $request->title_uz,
            'title_ru' => $request->title_ru,
            'title_en' => $request->title_en,
        ]);

        $inputs = $request->all();
        $address_uz = $inputs['address_uz'];
        $address_ru = $inputs['address_ru'];
        $address_en = $inputs['address_en'];

        foreach($address_uz as $key => $item){
            Address::create([
                'address_uz' => $item,
                'address_ru' => $address_ru[$key],
                'address_en' => $address_en[$key],
                'contact_id' => $contact->id,
            ]);
        }
        return  redirect()->route('contacts.index');
    }


    public function uploadImage($request){
        $name =  rand(1000,9999).time()."." . $request->file('image')->getClientOriginalExtension();
        $request->image->move(public_path('uploads/'), $name);
        return $name;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        return view('admin.contacts.show' , ['contact' => $contact ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        return view('admin.contacts.edit' , ['contact' => $contact]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        $image = '';
        if(isset($request->image)){
            $image = $this->uploadImage($request);
        }else{
            $image = $contact->logo;
        }
        $contact->update([
            'logo' => $image ,
            'phone_1' => $request->phone_1,
            'phone_2' => $request->phone_2 ,
            'email' => $request->email ,
            'timetable' => $request->timetable,
            'telegram' => $request->telegram,
            'youtube'  => $request->youtube,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'title_uz' => $request->title_uz,
            'title_ru' => $request->title_ru,
            'title_en' => $request->title_en,
        ]);


        $old_adresses = $contact->addresses ;

        foreach ($old_adresses as $adress){
            $adress->delete();
        }

        $inputs = $request->all();


        $address_uz = $inputs['address_uz'];
        $address_ru = $inputs['address_ru'];
        $address_en = $inputs['address_en'];

        foreach($address_uz as $key => $item){
            Address::create([
                'address_uz' => $item,
                'address_ru' => $address_ru[$key],
                'address_en' => $address_en[$key],
                'contact_id' => $contact->id,
            ]);
        }
        return  redirect()->route('contacts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
