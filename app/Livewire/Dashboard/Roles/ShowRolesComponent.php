<?php

namespace App\Livewire\Dashboard\Roles;

use Livewire\Component;
use App\Models\Role;
class ShowRolesComponent extends Component
{
    public $roles;

    public function mount()
    {
        $this->roles = Role::all();
    }
    public function deleteRole($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        $this->loadRoles();
        session()->flash('success', 'Role deleted successfully.');
    }

    public function render()
    {
        return view('livewire.dashboard.roles.show-roles-component', [
            'roles' => $this->roles
        ])->layout('layouts.admin');
    }
}
