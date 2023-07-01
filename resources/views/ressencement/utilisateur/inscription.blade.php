@extends('rootutilisateur')
@section('content')

<section class="contact-clean">
    <form class="text-center" method="post" action="/inscription">
        @csrf
        <h2 class="text-center">Inscription</h2>
        <div class="mb-3"><label class="form-label">Nom</label><input class="form-control" type="text" name="nom" placeholder="Name">
        @if ($errors->has('nom'))
            <small class="form-text text-danger">{{ $errors->first('nom') }}</small>
        @endif
        </div>

        <div class="mb-3"><label class="form-label">Email</label><input class="form-control" type="email" name="email" placeholder="Name">
        @if ($errors->has('email'))
            <small class="form-text text-danger">{{ $errors->first('email') }}</small>
        @endif
        </div>
        <div class="mb-3"><label class="form-label">Mot de Passe</label><input class="form-control" type="password" name="passe" placeholder="Mot de Passe">
        @if ($errors->has('passe'))
            <small class="form-text text-danger">{{ $errors->first('passe') }}</small>
        @endif
            <small class="form-text text-danger">{{ $error }}</small>

        </div>
        <div class="mb-3"><label class="form-label">Confirmation de Mot de Passe</label><input class="form-control" type="password" name="confirm" placeholder="Email">
        @if ($errors->has('confirm'))
            <small class="form-text text-danger">{{ $errors->first('confirm') }}</small>
        @endif
            <small class="form-text text-danger">{{ $error }}</small>

            <div class="mb-3"><label class="form-label">is admin</label>
                <select  class="form-control" name="isadmin" >
                    <option value="1">no</option>
                    <option value="2">yes</option>
                </select>
        </div>
        <div class="mb-3"></div>
        <div class="text-center mb-3"><button class="btn btn-primary" type="submit">s'inscrire</button></div>
        <div class="text-center"><a class="text-start" href="/login">J'ai déja un compte</a></div>
    </form>
</section>
@endsection





