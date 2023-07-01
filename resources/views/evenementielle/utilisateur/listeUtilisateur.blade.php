@extends('rootUtilisateur')
@section('content')
<div>
    <div id="listHeader">
        <div>
            <h2 class="text-center" style="font-size: 30px;">Liste des Utilisateurs</h2>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>nom</th>
                    <th>prenom</th>
                    <th>email</th>
                    <th>modifier</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Utilisateur as $lap)
                <tr>
                    <td>{{$lap->id}}</td>
                    <td>{{$lap->nom}}</td>
                    <td>{{$lap->prenom}}</td>
                    <td>{{$lap->email}}</td>
                    <td class="text-center" style="background: #ffffff;">
                        <a class="btn btn-success" href="/updateUtilisateur?id={{$lap->id}}">&nbsp;modifier</a>
                        </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="text-center">
        <nav class="text-center" style="margin: 0 auto">
            {{$Utilisateur->onEachSide(2)->links()}}
        </nav>
    </div>

</div>
@endsection
