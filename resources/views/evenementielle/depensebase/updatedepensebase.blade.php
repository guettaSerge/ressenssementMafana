@extends('rootdepensebase')
@section('content')
<div>
    <div id="listHeader">
        <div>
            <h2 class="text-center" style="font-size: 30px;">Modifier le depense de base</h2>
            <section class="contact-clean">
                <form class="text-center" method="post" action="/depensebase/update">
                    @csrf
                    <input class="form-control" type="hidden" name="id" value="{{$depensebase->id}}">
                    <label class="form-label">nom</label>
                    <input class="form-control" type="text" name="nom" value="{{$depensebase->nom}}">
                    <div>@if ($errors->has('nom'))
                        <small class="form-text text-danger">{{ $errors->first('nom') }}</small>
                    @endif </div>

                    <label class="form-label">Tarif standart</label>
                    <input class="form-control" type="number" name="tarifstandart" value="{{$depensebase->tarifstandart}}">
                    <div>@if ($errors->has('tarifstandart'))
                        <small class="form-text text-danger">{{ $errors->first('tarifstandart') }}</small>
                    @endif </div>

                    <label class="form-label">Tarif premium</label>
                    <input class="form-control" type="number" name="tarifpremium" value="{{$depensebase->tarifpremium}}">
                    <div>@if ($errors->has('tarifpremium'))
                        <small class="form-text text-danger">{{ $errors->first('tarifpremium') }}</small>
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

