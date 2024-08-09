<?php

namespace App\Livewire\Dashboard\Activity;

use Livewire\Component;
use App\Models\Activity;

class EditActivityComponent extends Component
{
    public $name_of_activity;
    public $activity_id; // For editing purposes

    protected $rules = [
        'name_of_activity' => 'required|string|max:255',
    ];

    public function mount($activityId)
    {
        $this->activity_id = $activityId;
        $activity = Activity::findOrFail($activityId);
        $this->name_of_activity = $activity->name_of_activity;
    }

    public function submitForm()
    {
        $this->validate();

        // Check if activity name already exists but not for the current activity
        $existingActivity = Activity::where('name_of_activity', $this->name_of_activity)
            ->where('id', '!=', $this->activity_id)
            ->first();

        if ($existingActivity) {
            session()->flash('error', 'النشاط متواجد');
            return;
        }

        $activity = Activity::findOrFail($this->activity_id);
        $activity->update([
            'name_of_activity' => $this->name_of_activity,
        ]);

        session()->flash('success', 'تم تحديث النشاط بنجاح');

        return redirect()->route('show_activity');
    }

    public function render()
    {
        return view('livewire.dashboard.activity.edit-activity-component')->layout('layouts.admin');
    }
}
