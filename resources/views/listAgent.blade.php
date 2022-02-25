@extends('layouts.app')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($agents as $agent)
                <tr>
                    <td>{{ $agent->nom_agent }}</td>
                    <td>{{ $agent->prenom_agent }}</td>
                    <td><a href="{{ route('agent.delete', ['id' => $agent->id]) }}">Supprimer</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a class="list__btn" href="{{ route('agent.create') }}">Créer un nouvel agent</a>
@endsection