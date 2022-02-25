@extends('layouts.app')

@section('content')
    <h2 class="form__title">Nouvelle annonce</h2>
        <form  class="form__flex" method="POST" action="{{ route('annonces.store') }}">
            @csrf
            <div class="field">
                <label class="label">Référence :</label>
                <div class="control">
                    <input class="input" type="text" placeholder="Ex : F05GMD" name="ref_annonce" value="{{ old('ref_annonce')}}">
                </div>
                @if ($errors->has('ref_annonce'))
                    <p class="help is-danger">{{ $errors->first('ref_annonce') }}</p>
                @endif
            </div>
            <div class="field">
                <label class="label">Prix :</label>
                <div class="control">
                    <input class="input" type="number" step="any" placeholder="Ex : 185.001" name="prix_annonce" value="{{ old('prix_annonce')}}">
                </div>
                @if ($errors->has('prix_annonce'))
                    <p class="help is-danger">{{ $errors->first('prix_annonce') }}</p>
                @endif
            </div>
            <div class="field">
                <label class="label">Surface :</label>
                <div class="control">
                    <input class="input" type="number" step="any" placeholder="Ex : 66.6" name="surface_habitable" value="{{ old('surface_habitable')}}">
                </div>
                @if ($errors->has('surface_habitable'))
                    <p class="help is-danger">{{ $errors->first('surface_habitable') }}</p>
                @endif
            </div>
            <div class="field">
                <label class="label">Pièce(s) :</label>
                <div class="control">
                    <input class="input" type="number" placeholder="Ex : 8" name="nombre_de_piece" value="{{ old('nombre_de_piece')}}">
                </div>
                @if ($errors->has('nombre_de_piece'))
                    <p class="help is-danger">{{ $errors->first('nombre_de_piece') }}</p>
                @endif
            </div>
            <div class="field">
                <label class="label">Agent :</label>
                <div class="control">
                    <div class="select">
                    <select name="agent">
                        @foreach ($agents as $agent)
                            <option value="{{ $agent->id }}">{{ $agent->nom_agent }} {{ $agent->prenom_agent }}</option>
                        @endforeach
                    </select>
                    </div>
                </div>
            </div>

            <div class="field is-grouped btn">
                <div class="control">
                    <button class="button is-link">Créer</button>
                </div>
            </div>
        </form>
@endsection