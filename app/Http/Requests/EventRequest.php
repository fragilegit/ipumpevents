<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
// use App\Http\Requests\Request;

class EventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    // public $validator;
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules =  [
            'event_name' => 'required',
            'slug' => 'required|unique:events',
            'excerpt' => 'required',
            'description' => 'required',
            'published_at' => 'date_format:Y-m-d H:i:s',
            'category_id' => 'required',
            'event_image' => 'mimes:jpg,jpeg,bmp,png',
            'lat' => 'nullable',
            'lng' => 'nullable',
            
        ];
        if (empty($request->published_at)) {
            unset($rules['published_at']);
        }
        switch($this->method()){
            case 'PUT':
            case 'PATCH': 
                $rules['slug'] = 'required|unique:events,slug,' .$this->route('event');
                break;
        }

        return $rules;
    }
}
