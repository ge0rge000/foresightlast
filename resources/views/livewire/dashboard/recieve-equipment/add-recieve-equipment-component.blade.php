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

                    <h4 class="form-section"><i class="ft-activity"></i> إضافة معدة وأمر استلام</h4>
                    <div class="form-group">
                        <label for="indicator_equipment_id">البيان </label>
                        <select id="indicator_equipment_id" class="form-control" wire:model="indicator_equipment_id">
                            <option value="">اختر البيان </option>
                            @foreach($indicatorEquipments as $indicatorEquipment)
                                <option value="{{ $indicatorEquipment->id }}">{{ $indicatorEquipment->name }}</option>
                            @endforeach
                        </select>
                        @error('indicator_equipment_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="equipment_name">تعليق </label>
                        <input type="text" id="serial" class="form-control" wire:model="comment">
                        @error('comment') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <labبel for="type_tool_id">نوع </labبel التجاريةel>
                        <select id="type_tool_id" class="form-control" wire:model="type_tool_id">
                            <option value="">اختر نوع </option>
                            @foreach($typeTools as $typeTool)
                                <option value="{{ $typeTool->id }}">{{ $typeTool->name }}</option>
                            @endforeach
                        </select>
                        @error('type_tool_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="brand_id">الماركه </label>
                        <select id="brand_id" class="form-control" wire:model="brand_id">
                            <option value="">اختر الماركه </option>
                            @foreach($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                        @error('brand_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="company_id">المعده</label>
                        <select id="company_id" class="form-control" wire:model="equipment_id">
                            <option value="">اختر المعده</option>
                            @foreach($Equipments as $Equipment)
                                <option value="{{ $Equipment->id }}">{{ $Equipment->name }}</option>
                            @endforeach
                        </select>
                        @error('equipment_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="work_excute">تنفيذ العمل</label>
                        <input type="text" id="work_excute" class="form-control" wire:model="work_excute">
                        @error('work_excute') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="equipment_name">سيريال المعدة</label>
                        <input type="text" id="serial" class="form-control" wire:model="serial">
                        @error('serial') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="company_id">الشركات</label>
                        <select id="company_id" class="form-control" wire:model="company_id">
                            <option value="">اختر شركه</option>
                            @foreach($companies as $company)
                                <option value="{{ $company->id }}">{{ $company->name_company }}</option>
                            @endforeach
                        </select>
                        @error('company_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="name_person">اسم الشخص</label>
                        <input type="text" id="name_person" class="form-control" wire:model="name_person">
                        @error('name_person') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="number_person">رقم شخص  المسلم</label>
                        <input type="text" id="number_person" class="form-control" wire:model="number_person">
                        @error('number_person') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="name_person">اسم الشخص المستلم</label>
                        <input type="text" id="person_receive" class="form-control" wire:model="person_receive">
                        @error('name_person') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="another_number_person">رقم الشخص المستلم </label>
                        <input type="text" id="another_number_person" class="form-control" wire:model="another_number_person">
                        @error('another_number_person') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="date_recieve">تاريخ تسليم المعده </label>
                        <input type="date" name="date_recieve" id="date_recieve" class="form-control"  wire:model="date_recieve">
                    </div>
                </div>
                <div class="form-actions">
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
