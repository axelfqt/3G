@extends('layouts.app')

@section('content')
    <h2 class="form__title">Nouvel agent</h2>
    <form class="form__flex" method="POST" action="{{ route('agent.store') }}" enctype="multipart/form-data">
        @csrf

            <div class="field">
                <label class="label">Nom :</label>
                <div class="control">
                    <input class="input" type="text" placeholder="'Guilb'" name="nom_agent" value="{{ old('nom_agent') }}">
                </div>
                @if ($errors->has('nom_agent'))
                    <p class="help is-danger">{{ $errors->first('nom_agent') }}</p>
                @endif
            </div>
            <div class="field">
                <label class="label">Prénom :</label>
                <div class="control">
                    <input class="input" type="text" placeholder="'Antoine'" name="prenom_agent" value="{{ old('prenom_agent') }}">
                </div>
                @if ($errors->has('prenom_agent'))
                    <p class="help is-danger">{{ $errors->first('prenom_agent') }}</p>
                @endif
            </div>
        
            <div class="field is-grouped btn">
                <div class="control">
                    <button class="button is-link">Créer</button>
                </div>
            </div>
    </form>
@endsection