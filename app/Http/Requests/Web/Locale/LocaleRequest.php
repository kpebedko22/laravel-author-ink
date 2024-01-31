<?php

namespace App\Http\Requests\Web\Locale;

use App\Managers\Web\LocaleManager;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LocaleRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'locale' => ['required', 'string', Rule::in(LocaleManager::getAvailableLocales())],
        ];
    }

    public function getLang(): string
    {
        return $this->validated('locale');
    }
}
