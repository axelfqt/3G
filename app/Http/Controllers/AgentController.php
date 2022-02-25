<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    //function pour afficher les agents sur la page
    public function showAgent(){
        $agents = Agent::all();
        return view('listAgent', [
            'agents' => $agents
        ]);
    }
    
    //function pour rediriger sur le formulaire de création
    public function createAgent(){
        return view('formAgent');
    }

    //function pour traiter le formulaire et inserer dans la bdd (agent)
    public function storeAgent(Request $request){
        request()->validate([
            'nom_agent' => ['required'],
            'prenom_agent' => ['required'],
        ]);
        Agent::create([
            'nom_agent' => $request->nom_agent,
            'prenom_agent' => $request->prenom_agent
        ]);
        return redirect('agent/create')->with('message', "L'agent a été crée avec succès ! ");
    }

    //function pour supprimer un agent
    public function delete($id){
        $agent = Agent::findOrFail($id);
        $agent->delete();
        return redirect('agent')->with('message', "L'agent a été supprimée avec succès ! ");
    }
}
