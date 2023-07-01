@extends('rootregion')
@section('content')
<div>
    <div id="listHeader">
        <div>
            <h2 class="text-center" style="font-size: 30px;">Modifier un region</h2>
            <section class="contact-clean">
                <form class="text-center" method="post" action="/region/update" e>
                    @csrf
                    <input class="form-control" type="hidden" name="id" value="{{$region->id}}">
                    <label class="form-label">nom</label>
                    <input class="form-control" type="text" name="nom" value="{{$region->nom}}">
                    <div>@if ($errors->has('nom'))
                        <small class="form-text text-danger">{{ $errors->first('nom') }}</small>
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

