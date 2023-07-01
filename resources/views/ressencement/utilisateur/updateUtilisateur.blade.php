@extends('rootUtilisateur')
@section('content')
<div>
    <div id="listHeader">
        <div>
            <h2 class="text-center" style="font-size: 30px;">Update de Utilisateur</h2>
            <section class="contact-clean">
                <form class="text-center" method="post" action="/addUtilisateur">
                    @csrf
                    <input class="form-control" type="hidden" name="id" value="{{$Utilisateur->id}}">
                    <label class="form-label">nom</label>
                    <input class="form-control" type="text" name="nom" value="{{$Utilisateur->nom}}">
                    <div>@if ($errors->has('nom'))
                        <small class="form-text text-danger">{{ $errors->first('nom') }}</small>
                    @endif </div>
                    <label class="form-label">prenom</label>
                    <input class="form-control" type="text" name="prenom" value="{{$Utilisateur->prenom}}">
                    <div>@if ($errors->has('prenom'))
                        <small class="form-text text-danger">{{ $errors->first('prenom') }}</small>
                    @endif </div>
                    <label class="form-label">email</label>
                    <input class="form-control" type="text" name="email" value="{{$Utilisateur->email}}">
                    <div>@if ($errors->has('email'))
                        <small class="form-text text-danger">{{ $errors->first('email') }}</small>
                    @endif </div>
                    <label class="form-label">passe</label>
                    <input class="form-control" type="text" name="passe" value="">
                    <div>@if ($errors->has('passe'))
                        <small class="form-text text-danger">{{ $errors->first('passe') }}</small>
                    @endif </div>
                    <p class="text-danger">{{$error}}</p>

                    <div class="mb-3"></div>

                    <div class="mb-3"></div>
                    <div class="text-center mb-3"><button class="btn btn-primary" type="submit">modifier</button></div>
                </form>
            </section>
        </div>
    </div>
</div>
@endsection
