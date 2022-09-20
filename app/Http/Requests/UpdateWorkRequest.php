<?php

namespace App\Http\Requests;

use App\Models\Work;
use Illuminate\Foundation\Http\FormRequest;

class UpdateWorkRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'slug' => 'required',
            'description' => 'nullable',
            'content' => 'nullable',
            'year_start' => 'nullable',
            'year_end' => 'nullable',
            'client_id' => 'nullable',
        ];
    }

    /**
     * Save the resource
     *
     * @return mixed
     */
    public function save()
    {
        $work = $this->route('work');

        $work->update($this->validated());

        return $work;
    }
}
