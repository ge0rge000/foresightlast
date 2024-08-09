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
            <form wire:submit.prevent="submitForm" class="form">
                <div class="form-body">
                    <h4 class="form-section"><i class="ft-activity"></i> إضافة مندوب مبيعات</h4>
                    <div class="form-group">
                        <label for="name">اسم المندوب</label>
                        <input type="text" id="name" class="form-control" wire:model="name">
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">البريد الإلكتروني</label>
                        <input type="email" id="email" class="form-control" wire:model="email">
                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">كلمة المرور</label>
                        <input type="password" id="password" class="form-control" wire:model="password">
                        @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="number_of_phone">رقم الهاتف</label>
                        <input type="text" id="number_of_phone" class="form-control" wire:model="number_of_phone">
                        @error('number_of_phone') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="can_create">إمكانية الإنشاء</label>
                        <input type="checkbox" id="can_create" wire:model="can_create">
                        @error('can_create') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="can_read">إمكانية القراءة</label>
                        <input type="checkbox" id="can_read" wire:model="can_read">
                        @error('can_read') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="can_update">إمكانية التعديل</label>
                        <input type="checkbox" id="can_update" wire:model="can_update">
                        @error('can_update') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="can_delete">إمكانية الحذف</label>
                        <input type="checkbox" id="can_delete" wire:model="can_delete">
                        @error('can_delete') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-actions">
                 <!-- In your Blade template -->
                 <button type="button" onclick="goBack()" class="btn btn-warning mr-1">
                    <i class="ft-x"></i> إلغاء
                </button>
                <script>
                    function goBack() {
                        window.history.back();
                    }
                </script>


                    <button type="submit" class="btn btn-primary">
                        <i class="la la-check-square-o"></i> حفظ
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
