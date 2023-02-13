<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
          //Verifica se un utente(id) è loggato o meno
        //Se non ho un id loggato non mi fa vedere le pagine dentro admin
        if(!Auth::id()){
            return false;
        }


        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "name"=> "required|string|min:3",
            "description"=> "required|string|min:10",
            "cover_img"=> "nullable|image",
            "github_link"=> "nullable|string|url",
            // exists controlla sulla tabella tecnologies,
            // che nella colonna id ci sia qualcuno con l'id ricevuto
            //  tramite il valore di category_id
            "technologies" => "nullable|array|exists:tags,id"
        ];
    }
}
