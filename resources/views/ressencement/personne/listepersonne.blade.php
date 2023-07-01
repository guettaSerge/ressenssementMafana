@extends('rootpersonne')
@section('content')
<div>
    <div id="listHeader">
        <div>
            <h2 class="text-center" style="font-size: 30px;">Liste des personnes</h2>
        </div>
        <div>
            <section class="contact-clean">
                <form method="get" action="/personne">
                    @csrf
                    <h2 class="text-center">Recherche Multicritere</h2>
                    <label class="form-label">nom</label>
                    <input class="form-control" name="nom" type="text">
                    <label class="form-label">prenom</label>
                    <input class="form-control" name="prenom" type="text">
                    <label class="form-label">datenaissance</label>
                    <input class="form-control" name="datenaissance" type="date">
                    <label class="form-label">genre</label>
                    <select name="idgenre" class="form-control">
                        @foreach ($genre as $item)
                            <option value="{{$item->id}}">{{$item->nom}}</option>
                        @endforeach
                    </select>
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
                    <th>date de naissance</th>
                    <th>genre</th>
                    <th>modifier</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($personne as $art)
                <tr>
                    <td>{{$art->id}}</td>
                    <td>{{$art->nom}}</td>
                    <td>{{$art->prenom}}</td>
                    <td>{{$art->datenaissance}}</td>
                    <td>{{$art->genre}}</td>
                    <td class="text-center" style="background: #ffffff;">
                        <a class="btn btn-success" href="/personne/edit?id={{$art->id}}">&nbsp;modifier</a>
                        </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="text-center">
        <nav class="text-center" style="margin: 0 auto">
            {{$personne->onEachSide(1)->links()}}
        </nav>
    </div>

</div>
@endsection
