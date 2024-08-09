<?php
namespace App\Livewire\Dashboard\Following;

use Livewire\Component;
use App\Models\Following;
use App\Models\User;
use App\Models\ContactPerson;
use App\Models\ClientResponse;
use App\Models\Company;
use Auth;

class AddFollowingComponent extends Component
{
    public $person_id, $response_id, $comments, $selected_comapny, $typefollow = 'visit', $time_calling_date, $time_calling_time;

    public function submitForm()
    {
        $this->validate([
            'person_id' => 'required',
            'response_id' => 'required',
            'comments' => 'nullable|string',
            'typefollow' => 'required|in:visit,call',
            'time_calling_date' => 'nullable',
            'time_calling_time' => 'nullable',
        ]);


Following::create([
    'user_id' => Auth::user()->id,
    'person_id' => $this->person_id,
    'response_id' => $this->response_id,
    'comments' => $this->comments,
    'typefollow' => $this->typefollow,
    'time_calling' => $this->time_calling_time,
    'date_calling' => $this->time_calling_date,
]);


        return redirect()->route('show_following');
    }

    public function render()
    {
        $users = User::all();
        $persons = ContactPerson::where('company_id', $this->selected_comapny)->get();
        $responses = ClientResponse::all();
        $compaines = Company::all();

        return view('livewire.dashboard.following.add-following-component', compact('users', 'persons', 'responses', 'compaines'))->layout('layouts.admin');
    }
}
