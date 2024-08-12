<?php

namespace App\Livewire\Dashboard\Following;

use Livewire\Component;
use App\Models\Following;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class TodayFollowing extends Component
{
    public $searchTerm = '';

    public function render()
    {
        $searchTerm = '%' . $this->searchTerm . '%';

        $todaysFollowings = Following::with(['user', 'contactPerson',  'contactPerson.company'])
            ->whereDate('date_calling', Carbon::today())
            ->where(function (Builder $query) use ($searchTerm) {
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
                });
            })
            ->paginate(10);

        return view('livewire.dashboard.following.today-following', [
            'todaysFollowings' => $todaysFollowings
        ])->layout('layouts.admin');
    }
}
