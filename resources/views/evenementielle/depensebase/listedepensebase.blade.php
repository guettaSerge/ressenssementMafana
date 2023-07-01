@extends('rootdepensebase')
@section('content')
<div>
    <div id="listHeader">
        <div>
            <h2 class="text-center" style="font-size: 30px;">Liste des depensebases</h2>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>nom</th>
                    <th>tarif standart</th>
                    <th>tarif premium</th>
                    <th>modifier</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($depensebase as $art)
                <tr>
                    <td>{{$art->id}}</td>
                    <td>{{$art->nom}}</td>
                    <td>{{$art->tarifstandart}}</td>
                    <td>{{$art->tarifpremium}}</td>
                    <td class="text-center" style="background: #ffffff;">
                        <a class="btn btn-success" href="/depensebase/edit?id={{$art->id}}">&nbsp;modifier</a>
                        </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="text-center">
        <nav class="text-center" style="margin: 0 auto">
            {{$depensebase->onEachSide(2)->links()}}
        </nav>
    </div>

</div>
@endsection
