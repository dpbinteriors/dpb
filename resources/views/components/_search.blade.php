<div x-data="app" x-cloak>
    <div class="w-full relative">
        <input
            type="search" x-model="term" x-debounce @keyup="search"

            class="w-full text-blue-400 rounded-[6px] placeholder:text-gray-500 bg-gray-300  px-[14px] py-[12px]"
            placeholder="{!! __('Aramak istediğiniz ürünü yazın') !!}" autofocus/>
        <img src="{{Vite::asset('resources/images/icons/search_icon.svg')}}" alt="Search Icon"
             class="absolute right-[12px] top-1/2 -translate-y-1/2">
    </div>
    {{--Results--}}
    <div class="w-full rounded-[12px] bg-gray-300 mt-[12px] max-h-[350px] overflow-scroll" class="min-h-[5px]">
        <div role="status" class="max-w-sm animate-pulse" x-show="loading">
            <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700 w-48 ml-4 px-[25px] my-[15px]"></div>
        </div>
        <div x-show="!noResults && results?.length && !loading">
            <template x-for="result in results">
                <a :href="result.url"
                   class="w-full h-[37px] bg-gray-300 hover:bg-gray-100 rounded-md justify-start items-center gap-2.5 inline-flex px-[14px] py-[32px]">
                    <div class="py-1.5 flex-col justify-start items-center inline-flex">
                        <div x-show="result.supplier_image_path !== null">
                            <img :src="result.supplier_image_path" class="w-auto h-[25px] rounded-md"
                                 :alt="result.snippet"/>
                        </div>
                    </div>
                    <div class="grow shrink basis-0 flex-col justify-center items-start inline-flex overflow-hidden">
                        <div class="self-stretch text-cyan-600 text-sm font-light font-['JUST Sans'] leading-tight"
                             x-text="result.snippet"></div>
                    </div>
                    <div class="w-5 h-5 relative">
                        <img src="{{Vite::asset('resources/images/icons/arrow_right.svg')}}" alt="Forward Icon">
                    </div>
                </a>
            </template>
        </div>

        {{--    <div x-data="app" x-cloak>--}}
        {{--        <input type="search" x-model="term" x-debounce @keydown="search">--}}

        {{--        <div x-show="noResults">--}}
        {{--            <p>--}}
        {{--                Sorry, but there were no results.--}}
        {{--            </p>--}}
        {{--        </div>--}}
        {{--        <div x-show="results">--}}
        {{--            <h2>Results</h2>--}}
        {{--            <p>--}}
        {{--                There were <span x-text="totalHits"></span> total matches. Returning the first <span--}}
        {{--                    x-text="resultsPerPage"></span> results:--}}
        {{--            </p>--}}
        {{--            <template x-for="result in results">--}}
        {{--                <div>--}}

        {{--                    <p>--}}
        {{--                        <img :src="result.supplier_image_path" alt="">--}}
        {{--                        <a :href="result.url"><span x-text="result.title"></span></a> (posted <span--}}
        {{--                            x-text="result.date"></span>)--}}
        {{--                    </p>--}}
        {{--                    <p class="snippet" x-html="result.snippet"></p>--}}
        {{--                </div>--}}
        {{--            </template>--}}
        {{--        </div>--}}
        {{--    </div>--}}
    </div>
    <div
        class="w-full inline-flex lg:flex-row flex-col justify-between items-center  px-[14px] py-[32px]  bg-gray-300 rounded-[12px]"
        x-show="noResults">
        <p> Aradığınız ürüne dair bir sonuç bulunamadı.</p>
        <div></div>
        <a href="" class="button button-secondary mt-[34px] lg:mt-0">Tüm Ürünleri İncele</a>
    </div>
</div>

<style>
    input[type="search"]::-webkit-search-decoration,
    input[type="search"]::-webkit-search-cancel-button,
    input[type="search"]::-webkit-search-results-button,
    input[type="search"]::-webkit-search-results-decoration {
        -webkit-appearance: none;
    }
</style>


<script>
    const appId = '{{env('ALGOLIA_APP_ID')}}';
    const apiKey = '{{env('ALGOLIA_SEARCH_KEY')}}';
    const indexName = 'products';


    document.addEventListener('alpine:init', () => {
        Alpine.data('app', () => ({
            init() {
                let client = algoliasearch(appId, apiKey);
                this.index = client.initIndex(indexName);
                this.searchReady = true;
            },

            loading: false,
            index: null,
            term: '',
            clear: false,
            autocomplete: false,
            searchReady: false,
            noResults: false,
            results: null,
            totalHits: null,
            resultsPerPage: null,
            currentLang: '{{app()->getLocale()}}',
            async search() {
                this.loading = false;
                if (this.term === '') {
                    this.results = [];
                    return;
                }
                if (this.term.length < 3) {
                    this.results = [];
                    return;
                }
                this.loading = true;
                this.noResults = false;

//          let rawResults = await this.index.search(this.term);
                let rawResults = await this.index.search(this.term);
                this.loading = false;
                if (rawResults.nbHits === 0) {
                    this.noResults = true;

                    return;
                }
                this.totalHits = rawResults.nbHits;
                this.resultsPerPage = rawResults.hitsPerPage;
                this.loading = false;
                this.results = rawResults.hits.map(h => {
                    h.snippet = h.title?.[this.currentLang];
                    h.url = h.url?.[this.currentLang];
                    return h;
                });
            }
        }))
    });
</script>
