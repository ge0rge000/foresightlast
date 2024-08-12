<?php

namespace App\Livewire\Dashboard\Following;

use Livewire\Component;
use App\Models\Following;
use App\Models\User;
use App\Models\ContactPerson;
use App\Models\ClientResponse;
use App\Models\Company;
use Auth;

class EditFollowingComponent extends Component
{
    public $followingId;
    public $user_id, $person_id, $comments, $selected_comapny, $typefollow, $time_calling_date, $time_calling_time;

    public function mount($id)
    {

        $following = Following::find($id);
        $this->followingId = $following->id;
        $this->user_id = $following->user_id;
        $this->person_id = $following->person_id;
        $this->comments = $following->comments;
        $this->selected_comapny = $following->contactPerson->company_id;
        $this->typefollow = $following->typefollow;
        $this->time_calling_date =$following->date_calling;
        $this->time_calling_time=$following->time_calling;



    }

    public function submitForm()
    {
        $this->validate([
            'user_id' => 'required',
            'person_id' => 'required',
            'comments' => 'nullable|string',
            'typefollow' => 'required|in:visit,call',
            'time_calling_date' => 'nullable',
            'time_calling_time' => 'nullable',
        ]);


        $following = Following::find($this->followingId);
        $following->update([
            'user_id' => Auth::user()->id,
            'person_id' => $this->person_id,
            'comments' => $this->comments,
            'typefollow' => $this->typefollow,
            'time_calling' => $this->time_calling_time,
            'date_calling' =>$this->time_calling_date,
        ]);

        return redirect()->route('show_following');
    }

    public function render()
    {
        $users = User::all();
        $persons = ContactPerson::where('company_id', $this->selected_comapny)->get();
        $responses = ClientResponse::all();
        $compaines = Company::all();

        return view('livewire.dashboard.following.edit-following-component', compact('users', 'persons',  'compaines'))->layout('layouts.admin');
    }
}

