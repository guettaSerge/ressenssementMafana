@extends('roottaxe')
@section('content')
<div>
    <div id="listHeader">
        <div>
            <h2 class="text-center" style="font-size: 30px;">modifier la cotisation</h2>
            <section class="contact-clean">
                <form class="text-center" method="post" action="/taxe">
                    @csrf
                    <label class="form-label">pere de famille</label>
                    <select name="idperefamille" >
                        <option value=""></option>
                    </select>
                    <div>@if ($errors->has('idperefamille'))
                        <small class="form-text text-danger">{{ $errors->first('idperefamille') }}</small>
                    @endif </div>

                    <label class="form-label">date du payement</label>
                    <input class="form-control" type="date" name="datecotisation" value="{{$cotisation->datecotisation}}">
                    <div>@if ($errors->has('datecotisation'))
                        <small class="form-text text-danger">{{ $errors->first('datecotisation') }}</small>
                    @endif </div>

                    <label class="form-label">valeur</label>
                    <input class="form-control" type="number" name="valeur" value="{{$cotisation->valeur}}">
                    <div>@if ($errors->has('valeur'))
                        <small class="form-text text-danger">{{ $errors->first('valeur') }}</small>
                    @endif </div>



                    <p class="text-danger">{{$error}}</p>
                    <div class="mb-3"></div>
                    <div class="mb-3"></div>
                    <div class="text-center mb-3"><button class="btn btn-primary" type="submit">Ajouter</button></div>
                </form>
            </section>
        </div>
    </div>
</div>
@endsection

