<?php
namespace App\Http\Requests;

use App\Enums\Blockchain;
use App\Enums\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

final class UpdateDropRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'id'                 => ['required'],
            'projectName'        => ['required', 'string', 'max:25'],
            'projectDescription' => ['required', 'string', 'max:750'],
            'blockchain'         => ['required', Rule::in(Blockchain::values())],
            'inlineRadioOptions' => ['required', Rule::in(Category::values())],
            'dropDate'           => ['nullable', 'string'],
            'roadmap'            => ['nullable', 'string', 'max:2000'],
            'mintPrice'          => ['nullable', 'string'],
            'royality'           => ['required', 'string'],
            'supply'             => ['required', 'string'],
            'teamAmount'         => ['required', 'string'],
            'twitterName'        => ['required', 'string'],
            'discordLink'        => ['required', 'string'],
            'websiteLink'        => ['required', 'string'],
        ];
    }
}
