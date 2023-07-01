@extends('rootartiste')
@section('content')
<div>
    <div id="listHeader">
        <div>
            <h2 class="text-center" style="font-size: 30px;">Modification artiste</h2>
            <section class="contact-clean">
                <form class="text-center" method="post" action="/artiste/update" enctype="multipart/form-data">
                    @csrf
                    <input class="form-control" type="hidden" name="id" value="{{$artiste->id}}">
                    <label class="form-label">nom</label>
                    <input class="form-control" type="text" name="nom" value="{{$artiste->nom}}">
                    <div>@if ($errors->has('nom'))
                        <small class="form-text text-danger">{{ $errors->first('nom') }}</small>
                    @endif </div>

                    <label class="form-label">tarif</label>
                    <input class="form-control" type="number" name="tarif" value="{{$artiste->tarif}}">
                    <div>@if ($errors->has('tarif'))
                        <small class="form-text text-danger">{{ $errors->first('tarif') }}</small>
                    @endif </div>

                    <label class="form-label">photo</label>
                    <input class="form-control" type="file" name="photo">
                    <div>@if ($errors->has('photo'))
                        <small class="form-text text-danger">{{ $errors->first('photo') }}</small>
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

