@extends('rootprestationlieu')
@section('content')
<div>
    <div id="listHeader">
        <div>
            <h2 class="text-center" style="font-size: 30px;">Ajout de prestation d'lieu</h2>
            <section class="contact-clean">
                <form class="text-center" method="post" action="/prestationlieu">
                    @csrf
                    <label class="form-label">lieu</label>
                    <select class="form-control" name="idlieu" >
                        @foreach ($lieu as $art)
                        <option value="{{$art->id}}">{{$art->nom}}</option>
                        @endforeach
                    </select>
                    <div>@if ($errors->has('idlieu'))
                        <small class="form-text text-danger">{{ $errors->first('idlieu') }}</small>
                    @endif </div>
                    <label class="form-label">tarif</label>
                    <input class="form-control" type="number" name="tarif">
                    <div>@if ($errors->has('tarif'))
                        <small class="form-text text-danger">{{ $errors->first('tarif') }}</small>
                    @endif </div>
                    <label class="form-label">tarifplacenormal</label>
                    <input class="form-control" type="number" name="tarifplacenormal">
                    <div>@if ($errors->has('tarifplacenormal'))
                        <small class="form-text text-danger">{{ $errors->first('tarifnormal') }}</small>
                    @endif </div>

                    <label class="form-label">tarifplacereserve</label>
                    <input class="form-control" type="number" name="tarifplacereserve">
                    <div>@if ($errors->has('tarifplacereserve'))
                        <small class="form-text text-danger">{{ $errors->first('tarifplacereserve') }}</small>
                    @endif </div>

                    <label class="form-label">tarifplacevip</label>
                    <input class="form-control" type="number" name="tarifplacevip">
                    <div>@if ($errors->has('tarifplacevip'))
                        <small class="form-text text-danger">{{ $errors->first('tarifplacevip') }}</small>
                    @endif </div>

                    <label class="form-label">idprestation</label>
                    <input class="form-control" type="number" name="idprestation" value="{{$idprestation}}">
                    <div>@if ($errors->has('idprestation'))
                        <small class="form-text text-danger">{{ $errors->first('idprestation') }}</small>
                    @endif </div>

                    <label class="form-label">placenormalvendu</label>
                    <input class="form-control" type="number" name="placenormalvendu" value="{{$prestationlieu->placenormalvendu}}">
                    <div>@if ($errors->has('placenormalvendu'))
                        <small class="form-text text-danger">{{ $errors->first('placenormalvendu') }}</small>
                    @endif </div>
                    <label class="form-label">placereservevendu</label>
                    <input class="form-control" type="number" name="placereservevendu" value="{{$prestationlieu->placereservevendu}}">
                    <div>@if ($errors->has('placereservevendu'))
                        <small class="form-text text-danger">{{ $errors->first('placereservevendu') }}</small>
                    @endif </div>
                    <label class="form-label">placevipvendu</label>
                    <input class="form-control" type="number" name="placevipvendu" value="{{$prestationlieu->placevipvendu}}">
                    <div>@if ($errors->has('placevipvendu'))
                        <small class="form-text text-danger">{{ $errors->first('placevipvendu') }}</small>
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

