<?php

use CodeZero\LocalizedRoutes\LocaleConfig;

function getNextLanguage($currentLanguage, $locales): string
{
    $nextLocal = $currentLanguage;

    foreach ($locales as $locale) {
        if ($locale !== $currentLanguage) {
            $nextLocal = $locale;
        }
    }

    return $nextLocal;
}
