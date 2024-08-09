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
    <div class="card-body">
        <form wire:submit.prevent="addRole" class="form">
            <div class="form-body">
                <h4 class="form-section"><i class="ft-activity"></i> Add Role</h4>
                <div class="form-group">
                    <label for="roleName">Role Name</label>
                    <input type="text" id="roleName" class="form-control" wire:model="roleName">
                    @error('roleName') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="form-group">
                <label><input type="checkbox" wire:model="canCreate"> Can Create</label>
            </div>

            <div class="form-group">
                <label><input type="checkbox" wire:model="canRead"> Can Read</label>
            </div>

            <div class="form-group">
                <label><input type="checkbox" wire:model="canUpdate"> Can Update</label>
            </div>

            <div class="form-group">
                <label><input type="checkbox" wire:model="canDelete"> Can Delete</label>
            </div>

            <div class="form-actions">
                <button type="button" class="btn btn-warning mr-1">
                    <i class="ft-x"></i> Cancel
                </button>
                <button type="submit" class="btn btn-primary">
                    <i class="la la-check-square-o"></i> Add Role
                </button>
            </div>
        </form>
    </div>
</div>

</div>
