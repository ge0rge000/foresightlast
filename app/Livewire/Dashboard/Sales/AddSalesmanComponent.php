<?php
namespace App\Livewire\Dashboard\Sales;

use Livewire\Component;
use App\Models\User;

class AddSalesmanComponent extends Component
{
    public $name, $email, $password, $number_of_phone;
    public $can_create = 0, $can_read = 0, $can_update = 0, $can_delete = 0;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string',
        'number_of_phone' => 'required|string|max:255',
        'can_create' => 'required|boolean',
        'can_read' => 'required|boolean',
        'can_update' => 'required|boolean',
        'can_delete' => 'required|boolean',
    ];
  
    public function submitForm()
    {
        $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'number_of_phone' => $this->number_of_phone,
            'can_create' => $this->can_create,
            'can_read' => $this->can_read,
            'can_update' => $this->can_update,
            'can_delete' => $this->can_delete,
        ]);

        session()->flash('success', 'تمت إضافة المندوب بنجاح.');
        return redirect()->route('show_sales');
    }

    public function render()
    {
        return view('livewire.dashboard.sales.add-salesman-component')->layout('layouts.admin');
    }
}

