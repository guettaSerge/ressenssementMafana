@extends('rootprofession')
@section('content')
<div>
    <div id="listHeader">
        <div>
            <h2 class="text-center" style="font-size: 30px;">modifier une profession</h2>
            <section class="contact-clean">
                <form class="text-center" method="post" action="/profession/update">
                    @csrf

                    <label class="form-label">nom</label>
                    <input class="form-control" type="hidden" name="id" value="{{$profession->id}}">
                    <input class="form-control" type="text" name="nom" value="{{$profession->nom}}">
                    <div>@if ($errors->has('nom'))
                        <small class="form-text text-danger">{{ $errors->first('nom') }}</small>
                    @endif </div>


                    <label class="form-label">niveau de Vulnerabilite</label>
                    <input class="form-control" type="number" name="nivVulnerabilite" value="{{$profession->nivvulnerabilite}}">
                    <div>@if ($errors->has('nivVulnerabilite'))
                        <small class="form-text text-danger">{{ $errors->first('nivVulnerabilite') }}</small>
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

