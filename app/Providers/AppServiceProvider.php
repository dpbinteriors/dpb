<?php

namespace App\Providers;

use App\Models\Address;
use App\Models\Category;
use App\Models\CategoryType;
use App\Models\CommunicationForm;
use App\Models\LegalPage;
use App\Models\SocialMediaLink;
use Artesaos\SEOTools\Facades\OpenGraph;
use Illuminate\Database\Eloquent\Builder;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\SEOTools;
use Illuminate\Support\Facades\URL;

use BezhanSalleh\FilamentLanguageSwitch\LanguageSwitch;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        URL::forceScheme('https');

        LanguageSwitch::configureUsing(function (LanguageSwitch $switch) {
            $switch
                ->locales(['ar', 'en', 'fr']); // also accepts a closure
        });

        Blueprint::macro('commonRecordFields', function () {
            $this->boolean('is_published')->default(true);
            $this->dateTime('publish_at')->nullable()->useCurrent();
            $this->dateTime('publish_until')->nullable();
            $this->foreignId('created_by')->constrained('users')->restrictOnDelete();
            $this->foreignId('updated_by')->constrained('users')->restrictOnDelete();
            $this->timestamps();
        });

        Builder::macro('orderByWithLang', function ($field, $order = 'asc', $locale = null) {
            if (
                method_exists($this->model, 'getTranslations') &&
                in_array($field, $this->model->translatable)
            ) {
                $locale = $locale ?? app()->getLocale();
                $this->query->orderByRaw("$field->'$.$locale' $order");
            } else {
                $this->query->orderBy($field, $order);
            }
            return $this;
        });

        $appUrl = env('APP_URL');

        SEOTools::macro('webPage', function (string $title, string $description, string $url = null, $image = null) use ($appUrl) {
            // If url not exist set appUrl to url
            SEOMeta::setTitle($title);
            SEOMeta::setDescription($description);
            SEOMeta::setCanonical(Url::current() ?? $appUrl);
            OpenGraph::setDescription($description);
            OpenGraph::setTitle($title);
            OpenGraph::setUrl(Url::current() ?? $appUrl);
            OpenGraph::addProperty('type', 'webpage');
            OpenGraph::addImage($image ?? Vite::asset('resources/images/logo.svg'));
        });

        // If social media link table exist


        View::composer(['includes._header', 'includes._footer','contact'], function ($view) {
            if (Schema::hasTable('social_media_links')) {
                $socialMediaLinks = SocialMediaLink::all();
                $view->with('socialMediaLinks', $socialMediaLinks);
            }

            if (Schema::hasTable('categories')) {
                $productCategoryTypeId = CategoryType::where('key', 'PRODUCT')->first()?->id;
                $productCategories = Category::where('category_type_id', $productCategoryTypeId)->where('connected_category_id', null)->where('is_published', true)->orderBy('position')->get();
                $view->with('productCategories', $productCategories);
            }

            if (Schema::hasTable('categories')) {
                $documentCategoryTypeId = CategoryType::where('key', 'DOCUMENT')->first()?->id;
                $documentCategories = Category::where('category_type_id', $documentCategoryTypeId)->where('connected_category_id', null)->where('is_published', true)->orderBy('position')->get();
                $view->with('documentCategories', $documentCategories);
            }

            if (Schema::hasTable('categories') && Schema::hasTable('applications')) {
                $applicationCategoryTypeId = CategoryType::where('key', 'APPLICATION')->first()?->id;
                $applicationCategories = Category::where('category_type_id', $applicationCategoryTypeId)->where('connected_category_id', null)->where('is_published', true)->orderBy('position')->get();
                $view->with('applicationCategories', $applicationCategories);
            }

            if (Schema::hasTable('categories') && Schema::hasTable('products')) {
                $productCategoryTypeId = CategoryType::where('key', 'PRODUCT')->first()?->id;
                $productCategories = Category::where('category_type_id', $productCategoryTypeId)->where('connected_category_id', null)->where('is_published', true)->orderBy('position')->get();
                $view->with('productCategories', $productCategories);
            }

            if (Schema::hasTable('legal_pages')) {
                $legalPages = LegalPage::all();
                $view->with('legalPages', $legalPages);
            }

            if (Schema::hasTable('addresses')) {
                $featuredAddress = Address::first();
                $view->with('featuredAddress', $featuredAddress);
            }
            if (Schema::hasTable('addresses')) {
                $addresses = Address::all();
                $view->with('addresses', $addresses);
            }
        });


    }
}
