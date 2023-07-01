@extends('rootdomicile')
@section('content')
<div>
    <div id="listHeader">
        <div>
            <h2 class="text-center" style="font-size: 30px;">Ajout d'un domicile</h2>
            <section class="contact-clean">
                <form class="text-center" method="post" action="/domicile">
                    @csrf
                    <label class="form-label">nom</label>
                    <input class="form-control" type="text" name="nom">
                    <div>@if ($errors->has('nom'))
                        <small class="form-text text-danger">{{ $errors->first('nom') }}</small>
                    @endif </div>


                    <label class="form-label">Region</label>
                    <select name="idregion"  class="form-control">
                        @foreach ($region as $item)
                        <option value="{{$item->id}}">{{$item->nom}}</option>
                        @endforeach
                    </select>
                    <div>@if ($errors->has('idregion'))
                        <small class="form-text text-danger">{{ $errors->first('idregion') }}</small>
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

