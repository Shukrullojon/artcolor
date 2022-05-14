<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Agent\StoreRequest;

class AgentController extends Controller
{
    public function index()
    {
        $agents = Agent::latest()->paginate(20);
        return view('admin.agent.index',[
            'agents' => $agents,
        ]);
    }

    public function create(){
        return view("admin.agent.create");
    }

    public function store(StoreRequest $request){

        Agent::create([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'code'=>$request->code,
        ]);
        return redirect()->route('agents.index')->with("success","Saved!");
    }

    public function show($id){
        $agent = Agent::where('id',$id)->first();
        return view('admin.agent.show',[
            'agent' => $agent,
        ]);
    }

    public function destroy($id){
        Agent::destroy($id);
        return redirect()->route('agents.index')->with("success","Destroy successful!");
    }
}
