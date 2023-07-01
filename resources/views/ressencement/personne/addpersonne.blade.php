@extends('rootpersonne')
@section('content')
<div>
    <div id="listHeader">
        <div>
            <h2 class="text-center" style="font-size: 30px;">Ajout de personne</h2>
            <section class="contact-clean">
                <form class="text-center" method="post" action="/personne">
                    @csrf
                    <label class="form-label">nom</label>
                    <input class="form-control" type="text" name="nom">
                    <div>@if ($errors->has('nom'))
                        <small class="form-text text-danger">{{ $errors->first('nom') }}</small>
                    @endif </div>
                    <label class="form-label">prenom</label>
                    <input class="form-control" type="text" name="prenom">
                    <div>@if ($errors->has('prenom'))
                        <small class="form-text text-danger">{{ $errors->first('prenom') }}</small>
                    @endif </div>
                    <label class="form-label">date de naissance</label>
                    <input class="form-control" type="date" name="datenaissance">
                    <div>@if ($errors->has('datenaissance'))
                        <small class="form-text text-danger">{{ $errors->first('datenaissance') }}</small>
                    @endif </div>

                    <label class="form-label">genre</label>
                    <select name="idgenre" class="form-control">
                        @foreach ($genre as $gr)
                        <option value="{{$gr->id}}">{{$gr->nom}}</option>
                        @endforeach
                    </select>
                    <div>@if ($errors->has('idgenre'))
                        <small class="form-text text-danger">{{ $errors->first('idgenre') }}</small>
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

