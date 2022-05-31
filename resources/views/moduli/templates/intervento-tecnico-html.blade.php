<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



</head>
<body>

<table style="width: 100%; border: 1px solid black; font-size: 8">

    <tr>
        <td style="width:10%">1</td>
        <td style="width:10%">2</td>
        <td style="width:10%">3</td>
        <td style="width:10%">4</td>
        <td style="width:10%">5</td>
        <td style="width:10%">6</td>
        <td style="width:10%">7</td>
        <td style="width:10%">8</td>
        <td style="width:10%">9</td>
        <td style="width:10%">10</td>

    </tr>
    <tr>
        <td colspan="4" rowspan="6" style="text-align: center">
            {{--<img src="{{ url('storage/images/riat.png') }}" />--}}
            <img src="{{ Storage::disk('images')->url('riat.png') }}" width="35%" class=""/>
            <br>
            Via CARDINALE BORROMEO, 4
            <br>
            90142 PALERMO
            TEL 091540774
            amministrazione@riatsrls.it
        </td>

        <td colspan="2" rowspan="6" style="text-align: center">
            <h5 class="mt-4">
                DOCUMENTO DI TRASPORTO
            </h5>
            <br>
            D.P.R. N° 472 DEL 14/08/1966
        </td>
    </tr>

    {{--TERZA COLONNA--}}
    <tr style="height: 20%">
        <td colspan="4">
            <div style="height: 60px; overflow:hidden;">
                N° PROGRESSIVO
            </div>
        </td>
    </tr>
    <tr style="height: 20%">
        <td colspan="2">&nbsp;</td>
        <td colspan="2">161/22</td>
    </tr>
    <tr style="height: 20%">
        <td colspan="2">
            <div style="height: 70px; overflow:hidden;">
                <strong>DATA</strong>
                <br>
                {{ date('d/m/Y') }}
            </div>
        </td>
        <td colspan="2">
            <strong>COMMISSIONE</strong>
        </td>
    </tr>
    <tr style="height: 20%">
        <td colspan="4">&nbsp;</td>
    </tr>
    <tr style="height: 20%">
        <td colspan="4">
            <div style="height: 50px; overflow:hidden;">
                A MEZZO<br>MITTENTE
            </div>
        </td>
    </tr>
    {{--FINE TERZA COLONNA--}}
</table>


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

</table> {{--container--}}
</body>
</html>

<style>
    div[class^='col'], td{
        border: 1px solid black;
    }
    .beni div{
        border-bottom: 1px dotted black;
    }
    .note div{

        border-bottom: 1px dotted black;
    }
</style>
