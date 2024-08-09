<?php

namespace App\Livewire\Dashboard\Sales;

use Livewire\Component;
use App\Models\User;

class EditSalesmanComponent extends Component
{
    public $userId, $name, $email, $password, $number_of_phone, $can_create, $can_read, $can_update, $can_delete;

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $this->userId,
            'number_of_phone' => 'required|string|max:255',
            'can_create' => 'required|boolean',
            'can_read' => 'required|boolean',
            'can_update' => 'required|boolean',
            'can_delete' => 'required|boolean',
        ];
    }

    public function mount($id)
    {
        $user = User::findOrFail($id);
        $this->userId = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->number_of_phone = $user->number_of_phone;
        $this->can_create = $user->can_create;
        $this->can_read = $user->can_read;
        $this->can_update = $user->can_update;
        $this->can_delete = $user->can_delete;
    }

    public function submitForm()
    {
        $this->validate();

        $user = User::findOrFail($this->userId);
        $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'number_of_phone' => $this->number_of_phone,
            'password' => bcrypt($this->password),
            'can_create' => $this->can_create,
            'can_read' => $this->can_read,
            'can_update' => $this->can_update,
            'can_delete' => $this->can_delete,
        ]);

        session()->flash('success', 'تم تعديل بيانات موظف');
        return redirect()->route('show_sales');
    }

    public function render()
    {
        return view('livewire.dashboard.sales.edit-salesman-component')->layout('layouts.admin');
    }
}

