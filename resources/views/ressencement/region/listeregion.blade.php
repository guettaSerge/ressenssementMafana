@extends('rootregion')
@section('content')
<div>
    <div id="listHeader">
        <div>
            <h2 class="text-center" style="font-size: 30px;">Liste des regions</h2>
        </div>
    </div>
    <section class="contact-clean">
        <form method="get" action="/region">
            @csrf
            <h2 class="text-center">Recherche</h2>
            <label class="form-label">nom</label>
            <input class="form-control" name="nom" type="text">
            <div class="text-center mb-3"><button class="btn btn-primary text-center" type="submit">Rechercher</button></div>
        </form>
    </section>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>nom</th>
                    <th>modifier</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($region as $art)
                <tr>
                    <td>{{$art->id}}</td>
                    <td>{{$art->nom}}</td>
                    <td class="text-center" style="background: #ffffff;">
                        <a class="btn btn-success" href="/region/edit?id={{$art->id}}">&nbsp;modifier</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="text-center">
        <nav class="text-center" style="margin: 0 auto">
            {{$region->onEachSide(2)->links()}}
        </nav>
    </div>

</div>
@endsection
