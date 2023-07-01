@extends('root')
@section('content')
    <div>
        <div id="listHeader">
            <div>
                <h2 class="text-center" style="font-size: 30px;">Ajout d'Administrateur</h2>
                <section class="contact-clean">
                    <form class="text-center" method="post" action="assignationPointVente">
                        @csrf
                        <label class="form-label">Utilisateur</label>
                        <select class="form-select" name="idutilisateur">
                            <optgroup label="This is a group">
                            @foreach ($utilisateur as $user)
                                <option value="{{$user['id']}}" selected="">{{$user['nom']}}</option>
                                @endforeach
                            </optgroup>
                        </select>
                        <div>@if ($errors->has('idutilisateur'))
                            <small class="form-text text-danger">{{ $errors->first('idutilisateur') }}</small>
                        @endif </div>
                        <label class="form-label">point de Vente</label>
                        <select class="form-select" name="idpointvente">
                            <optgroup label="This is a group">
                            @foreach ($pointvente as $user)
                                <option value="{{$user['id']}}" selected="">{{$user['nom']}}</option>
                                @endforeach
                            </optgroup>
                        </select>
                        <div>@if ($errors->has('idpointvente'))
                            <small class="form-text text-danger">{{ $errors->first('idpointvente') }}</small>
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
