<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlbumRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'album.album_name' => 'required|string|max:50',
            'album.album_memo' => 'required|string|max:1000',
        ];
    }
}
