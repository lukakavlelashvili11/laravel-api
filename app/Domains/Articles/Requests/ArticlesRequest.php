<?php

namespace App\Domains\Articles\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticlesRequest extends FormRequest
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
        return [
            "sort" => "nullable|string|in:view_count,comment_count,created_at",
            "order" => "nullable|string|in:asc,desc",
            "limit" => "nullable|integer",
            "paginate" => "nullable|integer",
            "page" => "required_if:paginate,!==,null|integer"
        ];
    }
}
