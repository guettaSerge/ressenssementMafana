@extends('roottranobe')
@section('content')
<div>
    <div id="listHeader">
        <div>
            <h2 class="text-center" style="font-size: 30px;">Ajout de Tranobe</h2>
            <section class="contact-clean">
                <form class="text-center" method="post" action="/tranobe">
                    @csrf
                    <label class="form-label">nom</label>
                    <input class="form-control" type="text" name="nom">
                    <div>@if ($errors->has('nom'))
                        <small class="form-text text-danger">{{ $errors->first('nom') }}</small>
                    @endif </div>
                    <label class="form-label">Vallee</label>
                    <select name="idvallee" class="form-control">
                        @foreach ($vallee as $val)
                            <option value="{{$val->id}}">{{$val->nom}}</option>
                        @endforeach
                    </select>
                    <div>@if ($errors->has('idvallee'))
                        <small class="form-text text-danger">{{ $errors->first('idvallee') }}</small>
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

