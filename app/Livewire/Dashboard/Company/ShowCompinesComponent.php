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

        // Check if a search term is provided
        if (!empty($this->searchTerm)) {
            // Retrieve all matching records without pagination
            $companies = Company::with(['activity', 'governorate', 'city', 'user', 'response'])
                ->where('name_company', 'like', $searchTerm)
                ->orWhere('classification', 'like', $searchTerm)
                ->orWhere('address', 'like', $searchTerm)
                ->orWhereHas('activity', function (Builder $query) use ($searchTerm) {
                    $query->where('name_of_activity', 'like', $searchTerm);
                })
                ->orWhereHas('governorate', function (Builder $query) use ($searchTerm) {
                    $query->where('governorate_name_ar', 'like', $searchTerm);
                })
                ->orWhereHas('city', function (Builder $query) use ($searchTerm) {
                    $query->where('city_name_ar', 'like', $searchTerm);
                })
                ->orWhereHas('response', function (Builder $query) use ($searchTerm) {
                    $query->where('type_response', 'like', $searchTerm);
                })
                ->get(); // Use get() to retrieve all records
        } else {
            // Use pagination if no search term is provided
            $companies = Company::with(['activity', 'governorate', 'city', 'user', 'response'])
                ->paginate(10);
        }

        return view('livewire.dashboard.company.show-compines-component', ['companies' => $companies])
            ->layout('layouts.admin');
    }

}
