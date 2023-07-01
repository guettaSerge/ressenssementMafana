@extends('rootperefamille')
@section('content')
<div>
    <div id="listHeader">
        <div>
            <h2 class="text-center" style="font-size: 30px;">Liste des peres de familles</h2>
        </div>
        <div>
            <section class="contact-clean">
                <form method="get" action="/perefamille">
                    @csrf
                    <h2 class="text-center">Recherche Multicritere</h2>
                    <label class="form-label">nom</label>
                    <input class="form-control" name="nom" type="text">
                    <label class="form-label">prenom</label>
                    <input class="form-control" name="prenom" type="text">
                    <label class="form-label">date admission</label>
                    <input class="form-control" name="dateadmission" type="date">
                    <label class="form-label">profession</label>
                    <input class="form-control" name="nomprofession" type="texte">
                    <label class="form-label">tranobe</label>
                    <input class="form-control" name="nomtranobe" type="texte">
                    <label class="form-label">vallee</label>
                    <input class="form-control" name="nomvallee" type="texte">
                    <div class="text-center mb-3"><button class="btn btn-primary text-center" type="submit">Rechercher</button></div>
                </form>
            </section>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>nom</th>
                    <th>prenom</th>
                    <th>dateadmission</th>
                    <th>profession</th>
                    <th>tranobe</th>
                    <th>vallee</th>
                    <th>modifier</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($perefamille as $art)
                <tr>
                    <td>{{$art->id}}</td>
                    <td>{{$art->nom}}</td>
                    <td>{{$art->prenom}}</td>
                    <td>{{$art->dateadmission}}</td>
                    <td>{{$art->nomprofession}}</td>
                    <td>{{$art->nomtranobe}}</td>
                    <td>{{$art->nomvallee}}</td>
                    <td class="text-center" style="background: #ffffff;">
                        <a class="btn btn-success" href="/perefamille/edit?id={{$art->id}}">&nbsp;modifier</a>
                        </td>
                </tr>
            @endforeach
            </tbody>

        </table>
    </div>
    <div class="text-center">
        <nav class="text-center" style="margin: 0 auto">
            {{$perefamille->onEachSide(2)->links()}}
        </nav>
    </div>

</div>
@endsection
