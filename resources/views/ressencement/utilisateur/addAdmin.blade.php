@extends('root')
@section('content')
    <div>
        <div id="listHeader">
            <div>
                <h2 class="text-center" style="font-size: 30px;">Ajout d'Administrateur</h2>
                <section class="contact-clean">
                    <form class="text-center" method="post"><label class="form-label">Utilisateur</label><select class="form-select">
                            <optgroup label="This is a group">
                            @foreach ($utilisateur as $user)
                                <option value="{{$user['idutilisateur']}}" selected="">{{$user['nom']}}</option>
                                @endforeach
                            </optgroup>
                        </select>
                        <div class="mb-3"></div>
                        <p class="text-danger">Une erreur s'est produite lors de l'insertion de ce truc mon frère</p>
                        <div class="mb-3"></div>
                        <div class="text-center mb-3"><button class="btn btn-primary" type="submit">Ajouter</button></div>
                    </form>
                </section>
            </div>
        </div>
    </div>
@endsection
