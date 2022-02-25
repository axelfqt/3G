<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Annonce;
use Illuminate\Http\Request;

class HomeController extends Controller{

    //function pour afficher les annonces sur la page d'accueil
    public function index(){
        $annonces = Annonce::all();
        return view('home', [
            'annonces' => $annonces,
        ]);
    }

    //function pour afficher les annonces en détail (id)
    public function show($id){
        $annonce = Annonce::findOrFail($id);
        $agent = Agent::find($annonce->agent_id);
        return view('views', [
            'annonce' => $annonce,
            'agent' => $agent,
        ]);
    }

    //function pour editer une annonce (id)
    public function edit($id){
        $annonce = Annonce::findOrFail($id);
        $agents = Agent::all();
        return view('edit', [
            'annonce' => $annonce,
            'agents' => $agents
        ]);
    }

    //function pour update l'annonce edité ci-dessus (request / id)
    public function update(Request $request, $id){
        request()->validate([
            'ref_annonce' => ['required'],
            'prix_annonce' => ['required'],
            'surface_habitable' => ['required'],
            'nombre_de_piece' => ['required'],
        ]);
        $post = Annonce::findOrFail($id);
        $post->ref_annonce = $request->ref_annonce;
        $post->prix_annonce = $request->prix_annonce;
        $post->surface_habitable = $request->surface_habitable;
        $post->nombre_de_piece = $request->nombre_de_piece;
        $post->agent_id = $request->agent;
        $post->updated_at = now();
        $post->save();
        return redirect('/')->with('message', "L'annonce a été modifiée avec succès ! ");
    }

    //function pour supprimer une annonce (id)
    public function delete($id){
        $annonce = Annonce::findOrFail($id);
        $annonce->delete();
        return redirect('/')->with('message', "L'annonce a été supprimée avec succès ! ");
    }

    //function pour afficher la page qui contient le formulaire de création d'annonce
    public function create(){
        $agents = Agent::all();
        return view('form', [
            'agents' => $agents
        ]);
    }

    //function pour créer via le formulaire dans la bdd (annonce)
    public function store(Request $request){
        request()->validate([
            'ref_annonce' => ['required'],
            'prix_annonce' => ['required'],
            'surface_habitable' => ['required'],
            'nombre_de_piece' => ['required'],
        ]);
        Annonce::create([
            'ref_annonce' => $request->ref_annonce,
            'prix_annonce' => $request->prix_annonce,
            'surface_habitable' => $request->surface_habitable,
            'nombre_de_piece' => $request->nombre_de_piece,
            'agent_id' =>$request->agent,
        ]);
        return redirect('annonces/create')->with('message', "L'annonce a été crée avec succès ! ");
    }

    //function pour trier les annonces par prix
    public function price(){
        $annonces = Annonce::orderBy('prix_annonce')->get();
        return view('home', [
            'annonces' => $annonces
        ]);
    }

    //function pour trier les annonces par surface
    public function area(){
        $annonces = Annonce::orderBy('surface_habitable')->get();
        return view('home', [
            'annonces' => $annonces
        ]);
    }
}