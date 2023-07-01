@extends('roottranobe')
@section('content')
<div>
    <div id="listHeader">
        <div>
            <h2 class="text-center" style="font-size: 30px;">Liste des tranobe</h2>
        </div>
        <section class="contact-clean">
            <form method="get" action="/tranobe">
                @csrf
                <h2 class="text-center">Recherche</h2>
                <input class="form-control" name="nom" type="text">
                <div class="text-center mb-3"><button class="btn btn-primary text-center" type="submit">Rechercher</button></div>
            </form>
        </section>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>nom</th>
                    <th>vallee</th>
                    <th>modifier</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tranobe as $art)
                <tr>
                    <td>{{$art->id}}</td>
                    <td>{{$art->nom}}</td>
                    <td>{{$art->nomvallee}}</td>
                    <td class="text-center" style="background: #ffffff;">
                        <a class="btn btn-success" href="/tranobe/edit?id={{$art->id}}">&nbsp;modifier</a>
                        </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="text-center">
        <nav class="text-center" style="margin: 0 auto">
            {{$tranobe->onEachSide(2)->links()}}
        </nav>
    </div>

</div>
@endsection
