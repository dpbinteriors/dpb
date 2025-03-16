<?php

namespace App\Livewire;

use App\Models\Works;
use App\Models\WorksCategories;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Log;

class WorksFilter extends Component
{
    use WithPagination;

    public $category = 'all';
    public $worksCategories;

    // Pagination temasını Bootstrap olarak ayarlayalım

    public function mount()
    {
        $this->worksCategories = WorksCategories::all();
    }

    public function render()
    {
        $query = Works::with('category');

        // Log kaydı ekleyelim
        Log::info('Current category filter: ' . $this->category);

        if ($this->category !== 'all') {
            $query->where('category_id', $this->category);
        }

        $works = $query->paginate(10);

        return view('livewire.works-filter', [
            'works' => $works,
            'worksCategories' => $this->worksCategories
        ]);
    }

    public function filterCategory($category)
    {
        // Log kaydı ekleyelim
        Log::info('Filtering by category: ' . $category);

        $this->category = $category;
        $this->resetPage();
    }

    // Debug için
    public function updated($name, $value)
    {
        Log::info("Property {$name} updated to: {$value}");
    }
}
