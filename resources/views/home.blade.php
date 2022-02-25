@extends('layouts.app')

@section('content')
    <h1 class="home__title">3G Immo</h1>

    <div class="home__tri">
        <p>Trier par :</p>
        <p><a href="{{ route('sort.price') }}">Prix</a> | <a href="{{ route('sort.area') }}">Surface</a></p>
        
    </div>
    @if ($annonces->count() > 0)
    <div class="home__flex">
        @foreach ($annonces as $annonce)
            <div class="home__box">
                <div class="home__box-ref">
                    <p><a href="{{ route('annonces.show', ['id' => $annonce->id]) }}">{{ $annonce->ref_annonce }}</a></p>
                </div>
                <div class="home__box-prix">
                    <p>Prix : {{ $annonce->prix_annonce }}€</p>
                </div>
                <div class="home__box-surface">
                    <p>Surface : {{ $annonce->surface_habitable }}m²</p>
                </div>
                <div class="home__box-piece">
                    <p>Pièces : {{ $annonce->nombre_de_piece }}</p>
                </div>
            </div>
        @endforeach  
    </div>
    @else
        <span>Aucun biens en base de données</span>
    @endif
@endsection