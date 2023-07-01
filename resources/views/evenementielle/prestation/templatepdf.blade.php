<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>design evaluation p13</title>
    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/fonts/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/Contact-Form-Clean.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/Footer-Clean.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/styles.css')}}">
</head>

<body class="text-center">

<div id="contenu">
    <div>
        <h1>{{$prestation->titre }}</h1>
        <h4>Temps: {{$prestation->getDate() }} </h4>
    </div>
    @foreach($prestation->lieu as $l)
    <div style="height: 500px;"><img style="width: 992px;height: 300px;" src="\{{$l->photo}}">

        <div style="height: 200px;">
            <div>
                <h3>Lieu:{{$l->nom}}</h3>
                <h5 class="text-center">Taf normal: {{$l->tarifplacenormal}}</h5>
                <h5 class="text-center">reservation: {{$l->tarifplacereserve}}</h5>
                <h5 class="text-center">vip: {{$l->tarifplacevip}}</h5>
            </div>
        </div>
    </div>
    @endforeach
    <div>
        <h1>les artistes</h1>
    </div>
    <div class="card-group">
        @foreach ($prestation->artiste as $art )
        <div class="card"><img class="card-img-top w-100 d-block" src="/{{$art->photo}}">
            <div class="card-body">
                <h4 class="card-title">Nom: {{$art->nom}}</h4>
            </div>
        </div>
        @endforeach
    </div>

</div>
    <button id="bouttonPDF" type="submit" class="btn btn-primary">EXPORTER EN PDF</button>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.debug.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.min.js"></script>
    <script >
        window.addEventListener('load', function() {
            var genererPDF=function(){
                var elementHTML = document.querySelector("#contenu");
                var doc = new jsPDF();
                html2canvas(elementHTML).then(function (canvas){
                    var imageData=canvas.toDataURL('image/png');
                    doc.addImage(imageData,'PNG',10,10,190,240);
                    doc.save('pdf.pdf');
                });
            }
            document.getElementById("bouttonPDF").addEventListener("click",genererPDF);
        });

    </script>
    <script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
</body>

</html>
