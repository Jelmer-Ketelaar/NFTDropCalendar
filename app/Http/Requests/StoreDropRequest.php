<?php
namespace App\Http\Requests;

use App\Enums\Blockchain;
use App\Enums\Category;
use App\Enums\PromotionLevel;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

final class StoreDropRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'projectName'        => ['required', 'string', 'max:25'],
            'projectDescription' => ['required', 'string', 'max:750'],
            'blockchain'         => ['required', Rule::in(Blockchain::values())],
            'inlineRadioOptions' => ['required', Rule::in(Category::values())],
            'dropDate'           => ['required', 'string'],
            'roadmap'            => ['nullable', 'string', 'max:2000'],
            'mintPrice'          => ['nullable', 'string'],
            'royality'           => ['required', 'string'],
            'supply'             => ['required', 'string'],
            'teamAmount'         => ['required', 'string'],
            'twitterName'        => ['required', 'string'],
            'discordLink'        => ['required', 'string'],
            'websiteLink'        => ['required', 'string'],
            'emailContact'       => ['required', 'email', 'max:70'],
            'traits'             => ['nullable', 'string'],
            'promotionBox'       => ['nullable', Rule::in(PromotionLevel::values())],
            'thumbnail'          => ['required', 'image', 'mimes:jpeg,png,gif,webp', 'max:10240'],
        ];
    }
}
