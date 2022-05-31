<?php
    namespace App\Http\Traits;

    use App\Models\BuonoPilotaggio;
    use App\Models\OrdineIntroito;
    use Illuminate\Support\Facades\Config;
    use ZipArchive;
    use Illuminate\Support\Facades\Storage;


    trait PdfTrait {

        function CompilaBP ($id_bp)
        {
            // INIZIALIZZO I PERCORSI E COSTANTI
            $modulo_bp = '222.pdf';
            $pdf_template_path = storage_path().'/app/public/template/'.$modulo_bp;

            $pdf_template_path = storage_path().'/app/public/template/'.$modulo_bp;
            $result_directory = Storage::disk('pdf')->path('');
            /*$result_directory = './storage/papers/documents/';*/


            $path_firme = './storage/firme_bp/';

            // CONNESSIONE AL DB
            /*$link = mysqli_connect(Config::get('database.connections.mysql.host'),Config::get('database.connections.mysql.username'),Config::get('database.connections.mysql.password'),Config::get('database.connections.mysql.database'));

            if (!$link) {
                $vResult['file_bp'] = '';
                $vResult['msg'] = 'IMPOSSIBILE CONNETTERSI AL DB '.mysqli_connect_errno();
                $vResult['error'] = true;
                return json_encode($vResult);
                exit;
            }*/


            // RACCOLGO I VALORI DA INSERIRE NEL BP DENTRO UN ARRAY DA USARE PER LA GENERAZIONE DEL XFDF
            /*foreach ($row_BP as $key => $value) {
                ${$key} = $value;
                $data[$key] = $value;
            }*/

            $data['COD'] = 'NOOOOOOOMMME AJKSHA';
            $data['QTRow1'] = 'VIAAAAAAA spodifpos i';

            // CREO IL FILE XFDF
            $xfdf = $this->createXFDF($pdf_template_path, $data);


            if(!is_dir($result_directory.$id_bp))
            {
                system("mkdir ".$result_directory.$id_bp);
                system("chmod 777 ".$result_directory.$id_bp);
            }
            $result_directory .= $id_bp.'/';


            $xfdf_file = 'BP_'.$id_bp.'.xfdf';
            $xfdf_file_path = $result_directory.$xfdf_file;

            // SCRIVO IL FILE XFDF
            if( $fp = fopen( $xfdf_file_path, 'w' ) )
            {
                fwrite( $fp, $xfdf, strlen( $xfdf ) );
            }
            fclose($fp);


            // COMPILAZIONE DEL PDF EDITABILE

            $pdftk = '/usr/local/bin/pdftk';
            $file_bp = substr( $xfdf_file_path, 0, -4 ) . 'pdf';
            $command = "$pdftk $pdf_template_path fill_form $xfdf_file_path output $file_bp flatten";

            // ESEGUO IL COMANDO
            exec( $command, $output, $ret );

            // ELIMINO IL FILE XFDF
            /*if( $fp = fopen( $xfdf_file_path, 'w' ) )
            {
                unlink($xfdf_file_path);
            }
            fclose($fp);*/


            // COPIO IL FILE PNG FIRMA DEL PILOTA
            /*$tmp_fp_s = $path_firme.$firma_pilota;
            $tmp_fp_d = $result_directory.$firma_pilota;
            $command = "cp $tmp_fp_s $tmp_fp_d";
            // ESEGUO IL COMANDO DI CONVERSIONE
            exec( $command, $output, $ret );*/

            // COPIO IL FILE PNG FIRMA DEL COMANDANTE
            /*$tmp_fc_s = $path_firme.$firma_comandante;
            $tmp_fc_d = $result_directory.$firma_comandante;
            $command = "cp $tmp_fc_s $tmp_fc_d";
            // ESEGUO IL COMANDO DI CONVERSIONE
            exec( $command, $output, $ret );*/



            // CONVERTO IN PDF LA FIRMA DEL PILOTA
           /* $pdf_firma_pilota = $result_directory.substr( $firma_pilota, 0, -4 ) . '.pdf';
            $command = "convert $tmp_fp_d $pdf_firma_pilota";
            // ESEGUO IL COMANDO DI CONVERSIONE
            exec( $command, $output, $ret );*/

            // CONVERTO IN PDF LA FIRMA DEL COMANDANTE
            /*$pdf_firma_comandante = $result_directory.substr( $firma_comandante, 0, -4 ) . '.pdf';
            $command = "convert $tmp_fc_d $pdf_firma_comandante";
            // ESEGUO IL COMANDO DI CONVERSIONE
            exec( $command, $output, $ret );*/



            // CREO IL PDF A4 CON LA FIRMA DEL PILOTA PER TIMBRARE IL BP
            /*$timbro_finale_pilota = $result_directory."timbro_finale_pilota.pdf";
            $command = "pdfjam --paper 'a4paper' --scale 0.3 --offset '-4.5cm -10.5cm' --outfile $timbro_finale_pilota $pdf_firma_pilota";
            // ESEGUO IL COMANDO DI CONVERSIONE
            exec( $command, $output, $ret );*/

            // CREO IL PDF A4 CON LA FIRMA DEL COMANDANTE PER TIMBRARE IL BP
            /*$timbro_finale_comandante = $result_directory."timbro_finale_comandante.pdf";
            $command = "pdfjam --paper 'a4paper' --scale 0.3 --offset '4.2cm -10.5cm' --outfile $timbro_finale_comandante $pdf_firma_comandante";
            // ESEGUO IL COMANDO DI CONVERSIONE
            exec( $command, $output, $ret );*/



            // TIMBRO IL BP CON LA FIRMA DEL PILOTA
            /*$tmp_bp_fp = $result_directory."bp_fp.pdf";
            $command = "$pdftk $file_bp stamp $timbro_finale_pilota output $tmp_bp_fp";
            // ESEGUO IL COMANDO DI CONVERSIONE
            exec( $command, $output, $ret );*/

            // TIMBRO IL BP CON LA FIRMA DEL COMANDANTE
            /*$file_bp_signed = str_replace('.pdf', '_signed.pdf', $file_bp);
            $command = "$pdftk $tmp_bp_fp stamp $timbro_finale_comandante output $file_bp_signed";
            // ESEGUO IL COMANDO DI CONVERSIONE
            exec( $command, $output, $ret );*/

            /*if(is_file($file_bp_signed))*/
            if(is_file($file_bp))
            {
                /*unlink($tmp_bp_fp);
                unlink($timbro_finale_pilota);
                unlink($timbro_finale_comandante);
                unlink($pdf_firma_comandante);
                unlink($pdf_firma_pilota);
                unlink($tmp_fc_d);
                unlink($tmp_fp_d);*/
                //unlink($file_bp);
                $vResult['file_bp'] = $file_bp;
                $vResult['msg'] = 'file created';
                $vResult['error'] = false;
            }
            else
            {
                $vResult['file_bp'] = '3';
                $vResult['msg'] = 'file not created';
                $vResult['error'] = true;
            }


            return json_encode($vResult);
        }

        function createXFDF( $file, $info, $enc='UTF-8' )
        {
            $data = '<?xml version="1.0" encoding="'.$enc.'"?>' . "\n" .
                '<xfdf xmlns="http://ns.adobe.com/xfdf/" xml:space="preserve">' . "\n" .
                '<fields>' . "\n";
            foreach( $info as $field => $val )
            {
                $data .= '<field name="' . $field . '">' . "\n";
                if( is_array( $val ) )
                {
                    foreach( $val as $opt )
                        $data .= '<value>' .
                            htmlentities( $opt, ENT_COMPAT, $enc ) .
                            '</value>' . "\n";
                }
                else
                {
                    $data .= '<value>' .
                        htmlentities( $val, ENT_COMPAT, $enc ) .
                        '</value>' . "\n";
                }
                $data .= '</field>' . "\n";
            }
            $data .= '</fields>' . "\n" .'<ids original="' . md5( $file ) . '" modified="' .time() . '" />' . "\n" .
                '<f href="' . $file . '" />' . "\n" .'</xfdf>' . "\n";
            return $data;
        }

    }
