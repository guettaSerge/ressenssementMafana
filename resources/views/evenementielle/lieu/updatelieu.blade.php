@extends('rootlieu')
@section('content')
<div>
    <div id="listHeader">
        <div>
            <h2 class="text-center" style="font-size: 30px;">Modifier de Laptop</h2>
            <section class="contact-clean">
                <form class="text-center" method="post" action="/lieu/update" enctype="multipart/form-data">
                    @csrf
                    <input class="form-control" type="hidden" name="id" value="{{$lieu->id}}">
                    <label class="form-label">nom</label>
                    <input class="form-control" type="text" name="nom" value="{{$lieu->nom}}">
                    <div>@if ($errors->has('nom'))
                        <small class="form-text text-danger">{{ $errors->first('nom') }}</small>
                    @endif </div>

                    <label class="form-label">placenormal</label>
                    <input class="form-control" type="text" name="placenormal" value="{{$lieu->placenormal}}">
                    <div>@if ($errors->has('placenormal'))
                        <small class="form-text text-danger">{{ $errors->first('placenormal') }}</small>
                    @endif </div>
                    <label class="form-label">placereserve</label>
                    <input class="form-control" type="text" name="placereserve" value="{{$lieu->placereserve}}">
                    <div>@if ($errors->has('placereserve'))
                        <small class="form-text text-danger">{{ $errors->first('placereserve') }}</small>
                    @endif </div>
                    <label class="form-label">placevip</label>
                    <input class="form-control" type="text" name="placevip" value="{{$lieu->placevip}}">
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

                    <label class="form-label">tarif</label>
                    <input class="form-control" type="number" name="tarif" value="{{$lieu->tarif}}">
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

