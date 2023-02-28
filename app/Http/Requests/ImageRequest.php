<?php

namespace App\Http\Requests;

use App\Models\Image;
use Illuminate\Foundation\Http\FormRequest;

class ImageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        if ($this->method() == 'PUT')
            return ['title' => 'required'];

        return [
            'file' => 'required|image',
            'title' => 'nullable'
        ];
    }

    public function getData()
    {
        $data = $this->validated() + [
            'user_id' => 1
        ];

        if ($this->hasFile('file')) {
            $folder_path = Image::makeDayDirectory();
            $data['file'] = $this->file->store($folder_path);
            $data['dimension'] = Image::getDimensions($data['file']);
        }

        return $data;
    }
}
