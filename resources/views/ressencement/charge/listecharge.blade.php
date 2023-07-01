@extends('rootcharge')
@section('content')
<div>
    <div id="listHeader">
        <div>
            <h2 class="text-center" style="font-size: 30px;">Liste des charges</h2>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>nom parrain</th>
                    <th>prenom parrain</th>
                    <th>nom charge</th>
                    <th>prenom charge</th>
                    <th>modifier</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($charge as $art)
                <tr>
                    <td>{{$art->id}}</td>
                    <td>{{$art->nomparain}}</td>
                    <td>{{$art->prenomparain}}</td>
                    <td>{{$art->nomcharge}}</td>
                    <td>{{$art->prenomcharge}}</td>
                    <td class="text-center" style="background: #ffffff;">
                        <a class="btn btn-success" href="/charge/edit?id={{$art->id}}">&nbsp;modifier</a>
                        </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="text-center">
        <nav class="text-center" style="margin: 0 auto">
            {{$charge->onEachSide(2)->links()}}
        </nav>
    </div>

</div>
@endsection
