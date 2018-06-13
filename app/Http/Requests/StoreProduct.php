<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreProduct extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(Auth::check()){
          return true;
        }
        else {
          return false;
        }

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'title' => 'required|min:5|max:50',
          'about' => 'required|min:15',
          'per_hour' => 'required|numeric',
          'per_day' => 'required|numeric',
          'category' => 'required|numeric',
      ];
    }
}
