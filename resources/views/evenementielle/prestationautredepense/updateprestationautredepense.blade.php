@extends('rootprestationautredepense')
@section('content')
<div>
    <div id="listHeader">
        <div>
            <h2 class="text-center" style="font-size: 30px;">Modifier prestation depense de base </h2>
            <section class="contact-clean">
                <form class="text-center" method="post" action="/prestationautredepense/update">
                    @csrf
                    <input type="hidden" name="id" value="{{$prestationautredepense->id}}">
                    <label class="form-label">autre depense</label>
                    <select class="form-control" name="idautredepense" >
                        @foreach ($autredepense as $art)
                        <option value="{{$art->id}}">{{$art->nom}}</option>
                        @endforeach
                    </select>
                    <div>@if ($errors->has('idartiste'))
                        <small class="form-text text-danger">{{ $errors->first('idartiste') }}</small>
                    @endif </div>
                    <label class="form-label">Tarif</label>
                    <input class="form-control" type="number" name="tarif" value="{{$prestationautredepense->tarif}}">
                    <div>@if ($errors->has('tarif'))
                        <small class="form-text text-danger">{{ $errors->first('tarif') }}</small>
                    @endif </div>
                    <label class="form-label">idprestation</label>
                    <input class="form-control" type="number" name="tarif" value="{{$prestationautredepense->idprestation}}">
                    <div>@if ($errors->has('idprestation'))
                        <small class="form-text text-danger">{{ $errors->first('idprestation') }}</small>
                    @endif </div>


                    <p class="text-danger">{{$error}}</p>
                    <div class="mb-3"></div>
                    <div class="mb-3"></div>
                    <div class="text-center mb-3"></div><button class="btn btn-primary" type="submit">Ajouter</button></div>
                </form>
            </section>
        </div>
    </div>
</div>
@endsection

