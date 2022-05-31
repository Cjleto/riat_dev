<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateSettingsRequest;
use App\Models\Image;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SettingsController extends Controller
{
    public function index()
    {

        $sezione = request()->route('sezione');

        $settings = Setting::where('sezione', $sezione)->orderBy('ordine')->get();

        /*$v_settings = [];
        foreach ($settings as $setting){
            $v_settings[$setting->key] = $setting->value;

        }*/

        return view('admin.gestione_homepage.index', compact('settings','sezione'));
    }

    public function update(Request $request, Setting $setting)
    {

        if(!$setting){

            toastError("Setting $request->key Non trovato","Errore");
            return redirect()->back()->withErrors([
                "Setting $request->key Non trovato"
            ]);
        }

        if($setting->validazione){
            $validated = $request->validate([
                $setting->key => $setting->validazione
            ]);
        }

        $valore = $request->{$setting->key};

        if($request->hasFile($setting->key)){
            // TODO implementare caricamento allegati che non siano immagini, leggo lse la chiave contiene la parola image

            $image = Image::create([
                'image' => $validated[$setting->key]->getClientOriginalName()
            ]);
            $image->makeThumbnail(); //This handles uploading image and storing it's thumbnail

            $valore = $image->image;
        }

        $setting->value = $valore;
        $setting->save();

        Cache::flush();

        toastSuccess("Setting $request->key modificato","Operazione Completata");
        return redirect()->back();
    }
}
