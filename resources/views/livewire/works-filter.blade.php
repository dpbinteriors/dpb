<div>
    <section class="our-works-area py-120">
        <div class="container position-relative">
            <div class="d-flex justify-content-between flex-wrap align-items-center">
                <div class="text-start flex-1">
                    <p class="works-title">Our <span>Works</span></p>

                </div>
                <ul class="d-flex gap-4">
                    <li>
                        <a wire:click="filterCategory('all')"
                                class="{{ $category === 'all' ? 'active' : '' }}">
                            All Projects
                        </a>
                    </li>
                    @foreach($worksCategories as $cat)
                        <li>
                            <a wire:click="filterCategory('{{ $cat->id }}')"
                                    class="{{ $category == $cat->id ? 'active' : '' }}">
                                {{ $cat->title }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>



            <div class="row mt-5 pt-5">
                @if($works->count() > 0)
                    @foreach($works as $work)
                        <div wire:key="work-{{ $work->id }}" class="col-md-4 mb-4">
                            <a href="" class="">
                                <div class="card works-card h-100">
                                    <img src="{{ asset('storage/' . $work->image_path) }}" class="card-img-top" alt="Interior">
                                    <div class="card-body">
                                        <p class="category">{{ $work->category->title }}</p>
                                        <h5 class="card-title">{{ $work->title }}</h5>
                                        <p class="card-text">{{ $work->caption }}</p>
                                    </div>
                                    <div class="card-footer">
                                        <span class="style">{{ $work->style }}</span>
                                        <span class="type">{{$work->tag}}</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @else
                    <div class="col-12">
                        <div class="alert alert-warning">
                            No works found for this category.
                        </div>
                    </div>
                @endif
            </div>

            <div class="mt-5">
                {{ $works->links() }}
            </div>
        </div>
    </section>

    @push('scripts')
        <script>
            document.addEventListener('livewire:initialized', function () {
                console.log('Livewire initialized');
            });

            document.addEventListener('livewire:navigated', function () {
                console.log('Livewire component updated');
            });
        </script>
        @livewireScripts

    @endpush
</div>
