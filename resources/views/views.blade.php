@extends('layouts.app')

@section('content')
    <h2 class="home__title">Récapitulatif de l'annonce : {{ $annonce->ref_annonce }}</h2>
    <div class="annonce__recap">
        <p>Prix : {{ $annonce->prix_annonce }}€</p>
        <p>Surface : {{ $annonce->surface_habitable }}m²</p>
        <p>Nombre de pièces : {{ $annonce->nombre_de_piece }}</p>
        <p>Agent immobilier : {{ $agent->nom_agent }} {{ $agent->prenom_agent }}</p>
        <p><a href="{{ route('annonces.edit', ['id' => $annonce->id]) }}">Editer l'annonce</a> | <a href="{{ route('annonces.delete', ['id' => $annonce->id]) }}">Supprimer l'annonce</a></p>
    </div>
@endsection