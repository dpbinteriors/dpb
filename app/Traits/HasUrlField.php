<?php

namespace App\Traits;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;

trait HasUrlField
{
    public static function bootHasUrlField()
    {
        // updating created_by and updated_by when model is created
        static::creating(function ($model) {
            $model->setUrlColumn();
        });

        // updating updated_by when model is updated
        static::updating(function ($model) {
            $model->setUrlColumn();
        });

    }

    public function setUrlColumn()
    {
        $urlField = self::$urlField ?? 'title';
        $translatedUrlFields = self::createUrlTranslations($this->getTranslations($urlField));

        $this->slug = $translatedUrlFields;

        $this->save;
    }

    private static function createUrlTranslations($urlBaseFields)
    {
        $urlFieldTranslations = [];
        $supportedLanguages = filament('spatie-laravel-translatable')->getDefaultLocales();

        $defaultLanguage = config('app.default_locale');

        foreach ($supportedLanguages as $key => $value) {
            $supportedLang = $supportedLanguages[$key];

            if (isset($urlBaseFields[$supportedLang])) {
                $urlFieldTranslations[$supportedLang] = Str::slug($urlBaseFields[$supportedLang]);
            } else {
                $urlFieldTranslations[$supportedLang] = Str::slug($urlBaseFields[$defaultLanguage]);
            }
        }
        return $urlFieldTranslations;
    }

    public function getUrl($lang = null)
    {
        $lang = $lang ?? App::getLocale();
        return self::getTranslation('slug', $lang, false);
    }
}
