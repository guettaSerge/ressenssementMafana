@extends('roottaxe')
@section('content')
<div>
    <div id="listHeader">
        <div>
            <h2 class="text-center" style="font-size: 30px;">Modifier l'info sur le type de lieu</h2>
            <section class="contact-clean">
                <form class="text-center" method="post" action="/taxe/update">
                    @csrf
                    <input class="form-control" type="hidden" name="id" value="{{$taxe->id}}">
                    <label class="form-label">pourcentage</label>
                    <input class="form-control" type="text" name="pourcentage" value="{{$taxe->pourcentage}}">
                    <div>@if ($errors->has('pourcentage'))
                        <small class="form-text text-danger">{{ $errors->first('pourcentage') }}</small>
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

