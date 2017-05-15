<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'GET':
            case 'DELETE':
            {
                return [];
            }

            case 'POST':
            {
                return [
                    'name' => 'required',
                    'author' => 'required',
                    'stock' => 'required',
                    'ori_stock' => 'required',
                    'genre_list' => 'required',
                    'image' => 'required|image|max:2048'
                ];
            }        

            case 'PUT':
            case 'PATCH':
            {
                return [
                    'name' => 'required',
                    'author' => 'required',
                    'stock' => 'required',
                    'ori_stock' => 'required',
                    'image' => 'image|max:2048'
                ];
            }
            
            default:break;
        }

        
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama wajib diisi',
            'author.required' => 'Author wajib diisi',
            'stock.required' => 'Stock sekarang wajib diisi',
            'ori_stock.required' => 'Stock awal wajib diisi',
            'genre_list.required' => 'Genre wajib diisi',
            'image.required' => 'Gambar cover belum diisi',
            'image.image' => 'File harus gambar',
            'image.max' => 'Ukuran file maksimal 2MB'
        ];
    }
}
