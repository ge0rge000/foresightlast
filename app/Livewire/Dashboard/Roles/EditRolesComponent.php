<?php

namespace App\Livewire\Dashboard\Roles;

use Livewire\Component;
use App\Models\Role;

class EditRolesComponent extends Component
{public $roleId;
    public $roleName;
    public $canCreate;
    public $canRead;
    public $canUpdate;
    public $canDelete;

    protected $rules = [
        'roleName' => 'required|string|max:255',
        'canCreate' => 'boolean',
        'canRead' => 'boolean',
        'canUpdate' => 'boolean',
        'canDelete' => 'boolean',
    ];

    public function mount($roleId)
    {
        $role = Role::findOrFail($roleId);
        $this->roleId = $role->id;
        $this->roleName = $role->name;
        $this->canCreate = $role->can_create;
        $this->canRead = $role->can_read;
        $this->canUpdate = $role->can_update;
        $this->canDelete = $role->can_delete;
    }

    public function updateRole()
    {
        $this->validate();

        $role = Role::findOrFail($this->roleId);
        $role->update([
            'name' => $this->roleName,
            'can_create' => $this->canCreate,
            'can_read' => $this->canRead,
            'can_update' => $this->canUpdate,
            'can_delete' => $this->canDelete,
        ]);

        session()->flash('success', 'Role updated successfully!');
    }
    public function render()
    {
        return view('livewire.dashboard.roles.edit-roles-component')->layout('layouts.admin');
    }
}
