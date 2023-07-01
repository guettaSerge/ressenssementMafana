@extends('rootperefamille')
@section('content')
<div>
    <div id="listHeader">
        <div>
            <h2 class=" text-center" style="font-size: 30px;">Ajout de pere famille</h2>
            <section class="contact-clean">
                <form class="text-center" method="post" action="/perefamille">
                    @csrf
                    <label class="form-label">personne</label>
                    <select class="form-control" name="idpersonne" >
                        @foreach ($personne as $art)
                        <option value="{{$art->id}}">{{$art->nom}}</option>
                        @endforeach
                    </select>
                    <div>@if ($errors->has('idpersonne'))
                        <small class="form-text text-danger">{{ $errors->first('idpersonne') }}</small>
                    @endif </div>

                    <label class="form-label">date d'admission</label>
                    <input class="form-control" type="date" name="dateadmission">
                    <div>@if ($errors->has('dateadmission'))
                        <small class="form-text text-danger">{{ $errors->first('dateadmission') }}</small>
                    @endif </div>

                    <label class="form-label">domicile</label>
                    <select class="form-control" name="iddomicile" >
                        @foreach ($domicile as $art)
                        <option value="{{$art->id}}">{{$art->nom}}</option>
                        @endforeach
                    </select>
                    <div>@if ($errors->has('iddomicile'))
                        <small class="form-text text-danger">{{ $errors->first('iddomicile') }}</small>
                    @endif </div>

                    <label class="form-label">profession</label>
                    <select class="form-control" name="idprofession" >
                        @foreach ($profession as $art)
                        <option value="{{$art->id}}">{{$art->nom}}</option>
                        @endforeach
                    </select>
                    <div>@if ($errors->has('idprofession'))
                        <small class="form-text text-danger">{{ $errors->first('idprofession') }}</small>
                    @endif </div>

                    <label class="form-label">tranobe</label>
                    <select class="form-control" name="idtranobe" >
                        @foreach ($tranobe as $art)
                        <option value="{{$art->id}}">{{$art->nom}}</option>
                        @endforeach
                    </select>
                    <div>@if ($errors->has('idtranobe'))
                        <small class="form-text text-danger">{{ $errors->first('idtranobe') }}</small>
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

