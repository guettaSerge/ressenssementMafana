@extends('rootpersonne')
@section('content')
<div>
    <div id="listHeader">
        <div>
            <h2 class="text-center" style="font-size: 30px;">modifier une personne</h2>
            <section class="contact-clean">
                <form class="text-center" method="post" action="/personne/update">
                    @csrf
                    <input class="form-control" type="hidden" name="id" value="{{$personne->id}}">
                    <label class="form-label">nom</label>
                    <input class="form-control" type="text" name="nom" value="{{$personne->nom}}">
                    <div>@if ($errors->has('nom'))
                        <small class="form-text text-danger">{{ $errors->first('nom') }}</small>
                    @endif </div>
                    <label class="form-label">prenom</label>
                    <input class="form-control" type="text" name="prenom" value="{{$personne->prenom}}">
                    <div>@if ($errors->has('prenom'))
                        <small class="form-text text-danger">{{ $errors->first('prenom') }}</small>
                    @endif </div>
                    <label class="form-label">date de naissance</label>
                    <input class="form-control" type="date" name="datenaissance" value="{{$personne->datenaissance}}">
                    <div>@if ($errors->has('datenaissance'))
                        <small class="form-text text-danger">{{ $errors->first('datenaissance') }}</small>
                    @endif </div>

                    <label class="form-label">genre</label>
                    <select name="idgenre" id="" class="form-control">
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


