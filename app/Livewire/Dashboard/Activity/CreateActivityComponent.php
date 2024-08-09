<?php

namespace App\Livewire\Dashboard\Activity;

use Livewire\Component;
use App\Models\Activity;

class CreateActivityComponent extends Component
{
    public $name_of_activity;

    protected $rules = [
        'name_of_activity' => 'required|string|max:255',
    ];

    public function submitForm()
    {
        $this->validate();

        // Check if activity name already exists
        $existingActivity = Activity::where('name_of_activity', $this->name_of_activity)->first();

        if ($existingActivity) {
            session()->flash('error', 'النشاط متواجد');
            return;
        }

        
        Activity::create([
            'name_of_activity' => $this->name_of_activity,
        ]);

        session()->flash('success', 'تم اضافه نشاط بنجاح');

        return redirect()->route('show_activity');
    }

    public function render()
    {
        return view('livewire.dashboard.activity.create-activity-component')->layout('layouts.admin');
    }
}
