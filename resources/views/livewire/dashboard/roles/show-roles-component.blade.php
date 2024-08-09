<div>
    @if (session()->has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @elseif (session()->has('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    <div class="card-content collapse show">
        <table class="table">
            <thead>
                <tr>
                    <th>Role Name</th>
                    <th>Can Create</th>
                    <th>Can Read</th>
                    <th>Can Update</th>
                    <th>Can Delete</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td>{{ $role->name_role }}</td>
                        <td>{{ $role->can_create ? 'Yes' : 'No' }}</td>
                        <td>{{ $role->can_read ? 'Yes' : 'No' }}</td>
                        <td>{{ $role->can_update ? 'Yes' : 'No' }}</td>
                        <td>{{ $role->can_delete ? 'Yes' : 'No' }}</td>
                        <td>
                            <button wire:click="editRole({{ $role->id }})" class="btn btn-sm btn-primary">Edit</button>
                            <button wire:click="deleteRole({{ $role->id }})" class="btn btn-sm btn-danger">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
