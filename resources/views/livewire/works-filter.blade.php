<section class="our-works-area py-120">
    <div class="container position-relative">
        <div class="d-flex justify-content-between flex-wrap align-items-center works-title-area position-relative mb-4">
            <div class="text-start flex-1">
                <p class="works-title">Our <span>Works</span></p>
            </div>
            <ul class="d-flex gap-3 list-unstyled" id="categoryFilter">
                <li><a class="  filter-btn active" data-filter="all">All Projects</a></li>
                @foreach($worksCategories as $cat)
                    <li>
                        <a class="  filter-btn" data-filter="{{ $cat->id }}">
                            {{ $cat->title }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="row mt-4" id="worksContainer">
            @foreach($works as $work)
                <div class="col-md-4 mb-4 work-item" data-category="{{ $work->category->id }}">
                    <a href="{{ route('works-detail', ['slug' => $work->slug]) }}">
                        <div class="card works-card h-100">
                            <img src="{{ asset('storage/' . $work->image_path) }}" class="card-img-top" alt="Interior">
                            <div class="card-body">
                                <p class="category">{{ $work->category->title }}</p>
                                <h5 class="card-title">{{ $work->title }}</h5>
                                <p class="card-text">{{ $work->caption }}</p>
                            </div>
                            <div class="card-footer">
                                <span class="style">{{ $work->style }}</span>
                                <span class="type">{{ $work->tag }}</span>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        const buttons = document.querySelectorAll(".filter-btn");
        const items = document.querySelectorAll(".work-item");

        buttons.forEach(btn => {
            btn.addEventListener("click", function () {
                // Aktif butonu güncelle
                buttons.forEach(b => b.classList.remove("active"));
                this.classList.add("active");

                const filterValue = this.getAttribute("data-filter");

                items.forEach(item => {
                    const itemCategory = item.getAttribute("data-category");

                    if (filterValue === "all" || itemCategory === filterValue) {
                        item.style.display = "block";
                    } else {
                        item.style.display = "none";
                    }
                });
            });
        });
    });
</script>
