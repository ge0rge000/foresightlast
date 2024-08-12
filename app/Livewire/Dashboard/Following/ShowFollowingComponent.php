<?php

namespace App\Livewire\Dashboard\Following;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Following;
use Illuminate\Database\Eloquent\Builder; // Make sure to import the correct Builder


class ShowFollowingComponent extends Component
{
    use WithPagination;

    public $followings;
    public $searchTerm = ''; // Add search term property
    public $translatedSearchTerm;

    public function updatingSearchTerm()
    {
        $this->resetPage(); // Reset to the first page when search term changes
    }

    public function deleteFollowing($id)
    {
        Following::find($id)->delete();
        $this->resetPage(); // Reset to the first page after deletion
    }

    public function render()
    {
        $searchTerm = '%' . $this->searchTerm . '%';
        $searchTermTranslations = [
            'مكالمة' => 'call',
            'زياره' => 'visit'
        ];

        $this->translatedSearchTerm = $searchTermTranslations[$this->searchTerm] ?? $this->searchTerm;
$followinsgs = Following::with(['user', 'contactPerson',  'contactPerson.company'])
    ->where(
        function (Builder $query) use ($searchTerm) {
        $query->whereHas('user', function (Builder $query) use ($searchTerm) {

            $query->where('name', 'like', $searchTerm);
        })
        ->orWhereHas('contactPerson', function (Builder $query) use ($searchTerm) {
            $query->where('name', 'like', $searchTerm)
                  ->orWhere('mobile_number', 'like', $searchTerm)
                  ->orWhere('second_mobile_number', 'like', $searchTerm)
                  ->orWhere('address', 'like', $searchTerm)
                  ->orWhereHas('company', function (Builder $query) use ($searchTerm) {
                      $query->where('name_company', 'like', $searchTerm);
                  });
        })

        ->orWhere('typefollow', 'like', "%{$this->translatedSearchTerm}%");
    })
    ->get();



        return view('livewire.dashboard.following.show-following-component',compact('followinsgs'))->layout('layouts.admin');
    }
}
