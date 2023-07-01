@extends('rootlieu')
@section('content')
<div>
    <div id="listHeader">
        <div>
            <h2 class="text-center" style="font-size: 30px;">Fiche d'Artiste</h2>
        </div>
        <div class="text-center">
            <img  style="width: 400px;height: 400px;" src="/{{$artiste->photo}}" alt="">
        </div>
        <div class="p-5 mb-4 bg-light round-3">
            <div class="container-fluid py-5">
                <h3 class="display-5 text-center fw-bold" style="font-size: 30px;">{{$artiste->nom}}</h3>
                <div>
                    <section class="contact-clean" style="width: 500px;margin: 0 auto;">
                        <div class="elementFiche">
                            <h5 style="font-size: 20px;margin-left: 20%;">tarif:{{$artiste->tarif}}</h5>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection

