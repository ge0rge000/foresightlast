<div>
    <div class="card-content collapse show">
        <div class="card-body">
            <form wire:submit.prevent="submitForm" class="form">
                <div class="form-body">
                    <h4 class="form-section"><i class="ft-user"></i> معلومات الشركة</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name_company">اسم الشركة</label>
                                <input type="text" id="name_company" class="form-control" placeholder="اسم الشركة"
                                       wire:model="name_company">
                                @error('name_company') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="activity_company">النشاط</label>
                                <select id="activity_company" class="form-control" wire:model="activity_company">
                                    <option value="" selected >اختر النشاط</option>
                                    @foreach($activities as $activity)
                                        <option value="{{ $activity->id }}">{{ $activity->name_of_activity }}</option>
                                    @endforeach
                                </select>
                                @error('activity_company') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="governorate_id">المحافظة</label>
                                <select id="governorate_id" class="form-control" wire:model="governorate_id">
                                    <option value="" selected >اختر المحافظة</option>
                                    @foreach($governorates as $governorate)
                                        <option value="{{ $governorate->id }}">{{ $governorate->governorate_name_ar }}</option>
                                    @endforeach
                                </select>
                                @error('governorate_id') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="city_id">المدينة</label>
                                <select id="city_id" class="form-control" wire:model="city_id">
                                    <option value="" selected >اختر المدينة</option>
                                    @foreach($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->city_name_ar }}</option>
                                    @endforeach
                                </select>
                                @error('city_id') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address">العنوان</label>
                        <input type="text" id="address" class="form-control" placeholder="العنوان" wire:model="address">
                        @error('address') <span class="text-danger">{{ $message }}</span> @enderror
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
