<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">


</head>
<body>


<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<div class="container">

    <div class="row">
        <div class="col-5 text-center">
            {{--<img src="{{ url('storage/images/riat.png') }}" />--}}
            <img src="{{ Storage::disk('images')->url('riat.png') }}" width="35%" class=""/>
        </div>
        <div class="col-3 text-center">
            <h5 class="mt-4">
                DOCUMENTO DI TRASPORTO
            </h5>
            <br>
            D.P.R. N° 472 DEL 14/08/1966
        </div>
        <div class="col-4">
            <div class="row">
                <div class="col">N° PROGRESSIVO</div>
            </div>
            <div class="row">
                <div class="col"></div>
                <div class="col">161/22</div>
            </div>
            <div class="row">
                <div class="col">
                    <strong>DATA</strong>
                    <br>
                    {{ date('d/m/Y') }}
                </div>
                <div class="col">
                    <strong>COMMISSIONE</strong>
                </div>
            </div>

            <div class="row"></div>

            <div class="row">
                <div class="col">
                    A MEZZO<br>MITTENTE
                </div>
            </div>

        </div>

    </div> {{--prima row--}}

    <div class="row">
        <div class="col-3 p-2">
            DESTINATARIO
        </div>
        <div class="col-9 p-2">
            {{ $cliente->name }}
        </div>
    </div>

    <div class="row">
        <div class="col-3 p-2">
            VIA
        </div>
        <div class="col-9 p-2">
            {{ $cliente->indirizzo }}, {{ $cliente->civico }}
        </div>
    </div>

    <div class="row">
        <div class="col-3 p-2">
            CITTA'
        </div>
        <div class="col-5 p-2">
            {{ $cliente->citta }}
        </div>

        <div class="col-2 p-2">
            CAP
        </div>

        <div class="col-2 p-2">
            {{ $cliente->cap }}
        </div>
    </div> {{--fine seconda row--}}

    <div class="row">
        <div class="col-3 p-3">
            LUOGO DI DESTINAZIONE:
        </div>
        <div class="col-9 p-3">

        </div>
    </div>

    <div class="row">
        <div class="col-1">COD</div>
        <div class="col-1">Qt.</div>
        <div class="col-10">DESCRIZIONE DEI BENI</div>
    </div>

    @for ($i = 0; $i < 18; $i++)
        <div class="row beni">
            <div class="col-1">&nbsp;</div>
            <div class="col-1"></div>
            <div class="col-10"></div>
        </div>
    @endfor

    <div class="row">
        <div class="col-3">
            <div class="row">
                <div class="col">aspetto esteriore dei beni</div>
            </div>
            <div class="row">
                <div class="col">&nbsp;</div>
            </div>
        </div>
        <div class="col-3 border-start-0">
            <div class="row">
                <div class="col">causale del trasporto</div>
            </div>
            <div class="row">
                <div class="col">&nbsp;</div>
            </div>
        </div>
        <div class="col-3 border-start-0">
            <div class="row">
                <div class="col">n° colli</div>
            </div>
            <div class="row">
                <div class="col">&nbsp;</div>
            </div>
        </div>
        <div class="col-3 border-start-0">
            <div class="row">
                <div class="col">porto</div>
            </div>
            <div class="row">
                <div class="col">&nbsp;</div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-3">CONSEGNA A MEZZO:</div>
        <div class="col-6"></div>
        <div class="col-3">IL CONDUCENTE</div>
    </div>

    <div class="row">
        <div class="col-3 pt-1 pb-1">MITTENTE</div>
        <div class="col-3">{{ date('d/m/Y') }}</div>
        <div class="col-3"></div>
        <div class="col-3"></div>
    </div>

    <div class="row">
        <div class="col-3">DESTINATARIO</div>
        <div class="col-9"></div>
    </div>

    <div class="row">
        <div class="col-3">VETTORE</div>
        <div class="col-9"></div>
    </div>

    <div class="row note">
        <div class="col">NOTE: </div>
    </div>
    <div class="row">
        <div class="col">&nbsp;</div>
    </div>

    <div class="row">
        <div class="col-3  pb-4 pt-4">FIRMA DEL DESTINATARIO:</div>
        <div class="col-9  pb-4 pt-4"></div>
    </div>


    <button type="submit" class="btn btn-sm btn-success mt-3">Salva Dati</button>

</div> {{--container--}}
</body>
</html>

<style>
    div[class^='col']{
        border: 1px solid black;
    }
    .beni div{
        border-bottom: 1px dotted black;
    }
    .note div{

        border-bottom: 1px dotted black;
    }
</style>
