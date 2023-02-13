<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {   //Verifica se un utente(id) è loggato o meno
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
        "name"=> "required|string|min:2",
        "description"=> "required|string|min:2",
        "user_id"=>  "required|string|min:2",
        "cover_img"=> "nullable|image",
        "github_link"=> "nullable|string|url"
            
        ];
    }
}
