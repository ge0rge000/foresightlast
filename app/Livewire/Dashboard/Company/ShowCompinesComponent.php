<?php
namespace App\Livewire\Dashboard\Company;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Company;
use Illuminate\Database\Eloquent\Builder;

class ShowCompinesComponent extends Component
{
    use WithPagination;

    public $searchTerm;

    public function updatingSearchTerm()
    {
        $this->resetPage();
    }

    public function deleteCompany($id)
    {
        $company = Company::find($id);

        if ($company) {
            $company->delete();
            session()->flash('success', 'تم مسح الشركه بنجاح');
        } else {
            session()->flash('error', 'لا توجد الشركة');
        }
    }

    public function render()
    {
        $searchTerm = '%' . $this->searchTerm . '%';

        $companies = Company::with(['activity', 'governorate', 'city', 'user'])
            ->where('name_company', 'like', $searchTerm)
            ->orWhereHas('activity', function (Builder $query) use ($searchTerm) {
                $query->where('name_of_activity', 'like', $searchTerm);
            })
            ->orWhereHas('governorate', function (Builder $query) use ($searchTerm) {
                $query->where('governorate_name_ar', 'like', $searchTerm);
            })
            ->orWhereHas('city', function (Builder $query) use ($searchTerm) {
                $query->where('city_name_ar', 'like', $searchTerm);
            })
            ->paginate(10);

        return view('livewire.dashboard.company.show-compines-component', ['companies' => $companies])->layout('layouts.admin');
    }
}
