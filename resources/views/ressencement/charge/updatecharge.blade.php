@extends('rootcharge')
@section('content')
<div>
    <div id="listHeader">
        <div>
            <h2 class="text-center" style="font-size: 30px;">modifier de charge</h2>
            <section class="contact-clean">
                <form class="text-center" method="post" action="/charge/update">
                    @csrf
                    <label class="form-label">pere de famille</label>
                    <input name="id" value="{{$charge->id}}" type="hidden"/>
                    <select name="idperefamille" class="form-control">
                        @foreach ($perefamille as $item)
                        <option value="{{$item->id}}">{{$item->id}}</option>
                        @endforeach
                    </select>
                    <div>@if ($errors->has('idperefamille'))
                        <small class="form-text text-danger">{{ $errors->first('idperefamille') }}</small>
                    @endif </div>
                    <label class="form-label">personne</label>
                    <select name="idpersonne" class="form-control">
                        @foreach ($personne as $item)
                        <option value="{{$item->id}}">{{$item->nom}}</option>
                        @endforeach
                    </select>
                    <div>@if ($errors->has('idpersonne'))
                        <small class="form-text text-danger">{{ $errors->first('idpersonne') }}</small>
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



