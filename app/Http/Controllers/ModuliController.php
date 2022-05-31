<?php

namespace App\Http\Controllers;

use App\Http\Traits\PdfTrait;
use App\Models\Cliente;
use App\Models\Modulo;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use PDF;

class ModuliController extends Controller
{

    use PdfTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $moduli = Modulo::paginate(10);

        return view('moduli.index', compact('moduli'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Modulo  $modulo
     * @return \Illuminate\Http\Response
     */
    public function show(Modulo $modulo)
    {
        return view('moduli.show', compact('modulo'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Modulo  $modulo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Modulo $modulo)
    {
        $modulo->delete();

        toastSuccess('Modulo Disattivato');

        return  redirect()->route('moduli.index');
    }

    public function nuovo()
    {

        $clienti = Cliente::all();
        $moduli = Modulo::all();
        return view('moduli.nuovo', compact('clienti','moduli'));
    }

    public function genera(Request $request)
    {
        $validated = $request->validate([
            "cliente" => 'required|exists:clienti,id',
            "modulo" => 'required||exists:moduli,id'
        ]);

        $modulo = Modulo::find($request->modulo);
        $cliente = Cliente::find($request->cliente);

        return view("moduli.templates.".$modulo->template, compact('cliente','modulo'));
    }


    /**
     * @return void
     *
     * Salvo il modulo compilato e procedo alla generazione del pdf
     */
    public function salva_modulo_compilato(Request $request)
    {

        dd($request->toArray());

    }

    public function pdf(Request $request)
    {

        $modulo_bp = '222.pdf';
        $pdf_template_path = storage_path().'/app/public/template/'.$modulo_bp;
        $result_directory = Storage::disk('pdf')->path('');
        $pdf = new \mikehaertl\pdftk\Pdf($pdf_template_path,
        [
            'command' => '/usr/local/bin/pdftk',
            'useExec' => true,
        ]);
        $pdf->tempDir = storage_path().'/app/public/pdf/temp';
        $pdf->fillForm(['COD' => '4', "QTRow1" => "343"])
            ->needAppearances();

        if ($err = $pdf->getError()) {
            return $err;
        }
        $pdf->saveAs(storage_path().'/app/public/pdf/filled.pdf');
        $pdf->send();

        $content = file_get_contents( (string) $pdf->getTmpFile() );


        dd($content);

        $res = $this->CompilaBP(1);

        $res = json_decode($res, true);

        $nome_file = implode('/', array_slice(explode('/', $res['file_bp']), -1));





        /*$cliente = Cliente::find($request->cliente);
        $data = [
            'cliente' => $cliente
        ];

        $pdf = PDF::loadView('moduli.templates.intervento-tecnico-html', $data);

        return $pdf->download('tutsmake.pdf');*/
    }

    public function view_pdf()
    {

        $cliente = Cliente::all()->first();
        $data = [
            'cliente' => $cliente
        ];
        return view('moduli.templates.intervento-tecnico-html', $data);
    }
}
