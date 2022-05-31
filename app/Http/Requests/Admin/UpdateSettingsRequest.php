<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'sezione' => 'required',
            'link_facebook' => 'sometimes|url',
            'link_twitter' => 'sometimes|url',
            'link_instagram' => 'sometimes|url',
            'image' => 'sometimes',
            'titolo' => 'sometimes',
            'sottotitolo' => 'sometimes',
            'descrizione' => 'sometimes',
            'testo_tasto' => 'sometimes',
            'link_testo_tasto' => 'sometimes',
            'features_1' => 'sometimes',
            'features_2' => 'sometimes',
            'features_3' => 'sometimes',
            'features_4' => 'sometimes',
            'features_1_titolo' => 'sometimes',
            'features_2_titolo' => 'sometimes',
            'features_3_titolo' => 'sometimes',
            'features_4_titolo' => 'sometimes',
        ];
    }
}
