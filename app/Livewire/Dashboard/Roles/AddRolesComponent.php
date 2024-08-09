<?php

namespace App\Livewire\Dashboard\Roles;

use Livewire\Component;
use App\Models\Role;

class AddRolesComponent extends Component
{

    public $roleName;
    public $canCreate = false;
    public $canRead = false;
    public $canUpdate = false;
    public $canDelete = false;

    protected $rules = [
        'roleName' => 'required|string|max:255',
        'canCreate' => 'boolean',
        'canRead' => 'boolean',
        'canUpdate' => 'boolean',
        'canDelete' => 'boolean',
    ];

    public function addRole()
    {
        $this->validate();

        Role::create([
            'name_role' => $this->roleName,
            'can_create' => $this->canCreate,
            'can_read' => $this->canRead,
            'can_update' => $this->canUpdate,
            'can_delete' => $this->canDelete,
        ]);

        session()->flash('success', 'Role added successfully!');
    }
    public function render()
    {
        return view('livewire.dashboard.roles.add-roles-component')->layout('layouts.admin');
    }
}
