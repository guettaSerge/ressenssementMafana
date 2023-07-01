@extends('rootlieu')
@section('content')
<div>
    <div id="listHeader">
        <div>
            <h2 class="text-center" style="font-size: 30px;">Ajout de lieu</h2>
            <section class="contact-clean">
                <form class="text-center" method="post" action="/lieu" enctype="multipart/form-data">
                    @csrf
                    <label class="form-label">nom</label>
                    <input class="form-control" type="text" name="nom">
                    <div>@if ($errors->has('nom'))
                        <small class="form-text text-danger">{{ $errors->first('nom') }}</small>
                    @endif </div>

                    <label class="form-label">placenormal</label>
                    <input class="form-control" type="text" name="placenormal" >
                    <div>@if ($errors->has('placenormal'))
                        <small class="form-text text-danger">{{ $errors->first('placenormal') }}</small>
                    @endif </div>
                    <label class="form-label">placereserve</label>
                    <input class="form-control" type="text" name="placereserve" >
                    <div>@if ($errors->has('placereserve'))
                        <small class="form-text text-danger">{{ $errors->first('placereserve') }}</small>
                    @endif </div>
                    <label class="form-label">placevip</label>
                    <input class="form-control" type="text" name="placevip" >
                    <div>@if ($errors->has('placevip'))
                        <small class="form-text text-danger">{{ $errors->first('placevip') }}</small>
                    @endif </div>
                    <label class="form-label">idType</label>
                    <select class="form-control" name="idtypelieu" >
                        @foreach ($typelieu as $tp)
                        <option value="{{$tp->id}}">{{$tp->nom}}</option>
                        @endforeach
                    </select>
                    <div>@if ($errors->has('idtypelieu'))
                        <small class="form-text text-danger">{{ $errors->first('idtypelieu') }}</small>
                    @endif </div>

                    <label class="form-label">photo</label>
                    <input class="form-control" type="file" name="photo">
                    <div>@if ($errors->has('photo'))
                        <small class="form-text text-danger">{{ $errors->first('photo') }}</small>
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

