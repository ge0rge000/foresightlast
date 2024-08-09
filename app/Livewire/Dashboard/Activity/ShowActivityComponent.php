<?php

namespace App\Livewire\Dashboard\Activity;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Activity;

class ShowActivityComponent extends Component
{
    use WithPagination;

    public $searchTerm;

    public function updatingSearchTerm()
    {
        $this->resetPage();
    }

    public function deleteactivity($id)
    {
        $activity = Activity::find($id);

        if ($activity) {
            $activity->delete();
            session()->flash('success', 'تم مسح النشاط بنجاح');
        } else {
            session()->flash('error', 'لا يوجد النشاط');
        }
    }

    public function render()
    {
        $searchTerm = '%' . $this->searchTerm . '%';

        $activities = Activity::where('name_of_activity', 'like', $searchTerm)->paginate(10);

        return view('livewire.dashboard.activity.show-activity-component', ['activities' => $activities])->layout('layouts.admin');
    }
}
