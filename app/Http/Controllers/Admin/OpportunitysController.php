<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OpportunityRequest;
use App\Models\Opportunity;
use Illuminate\Support\Str;

class OpportunitysController extends Controller
{
	public function index()
    {
        $opportunitys = Opportunity::orderBy('title', 'asc')->paginate(10);
    	return view('admin.opportunitys.index', compact('opportunitys'));
    }

    public function create()
    {
        return view('admin.opportunitys.create');
    }

    public function store(OpportunityRequest $request)
    {
        $opportunity = new Opportunity($request->all());
        $opportunity->slug = Str::slug($opportunity->title, '_');

        if($opportunity->save()){
            return redirect()->route('admin.opportunitys.index')->with('msg_success', 'Oportunidade cadastrada com sucesso!');
        } else {
            return redirect()->back();
        }
    }

    public function edit(Opportunity $opportunity)
    {
        return view('admin.opportunitys.edit', compact('opportunity'));
    }

    public function update(OpportunityRequest $request, Opportunity $opportunity)
    {
        $opportunity->update($request->all());
        $opportunity->slug = Str::slug($opportunity->title, '_');

        if($opportunity->save()){
            return redirect()->route('admin.opportunitys.index')->with('msg_success', 'Oportunidade atualizada com sucesso!');
        } else {
            return redirect()->back();
        }    	
    }

    public function destroy(Opportunity $opportunity)
    {
        if($opportunity){
            if($opportunity->delete()){
                return redirect()->route('admin.opportunitys.index')->with('msg_success', 'Oportunidade removida com sucesso!');                
            } else {
                return redirect()->route('admin.opportunitys.index')->with('msg_error', 'Ocorreu um erro ao remover a oportunidade!'); 
            }
        } else {
            return redirect()->route('admin.opportunitys.index')->with('msg_error', 'Oportunidade não encontrada!');
        }
    }
}