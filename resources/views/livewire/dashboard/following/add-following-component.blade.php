<div>
    @livewireScripts
    <div class="card-content collapse show">
        <div class="card-body">
            <form wire:submit.prevent="submitForm" class="form">
                <div class="form-body">
                    <h4 class="form-section"><i class="ft-user"></i> إضافة متابعة</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="selected_companies">الشركات</label>
                                <select id="selected_companies" class="form-control" wire:model.live="selected_comapny">
                                    <option value="" >اختر شركه</option>
                                    @foreach($compaines as $company)
                                        <option value="{{ $company->id }}">{{ $company->name_company }}</option>
                                    @endforeach
                                </select>
                                @error('selectedCompanies') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="person_id">الشخص</label>
                                <select id="person_id" class="form-control" wire:model="person_id">
                                    <option value="" selected >اختر الشخص</option>
                                    @foreach($persons as $person)
                                        <option value="{{ $person->id }}">{{ $person->name }}</option>
                                    @endforeach
                                </select>
                                @error('person_id') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="typefollow">نوع المتابعة</label>
                                <select id="typefollow" class="form-control" wire:model="typefollow">
                                    <option value="" selected >اختر نوع المتابعه</option>
                                    <option value="visit">زيارة</option>
                                    <option value="call">مكالمة</option>
                                </select>
                                @error('typefollow') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="time_calling_date">تاريخ الاتصال</label>
                                <input type="date" id="time_calling_date" class="form-control" wire:model="time_calling_date">
                                @error('time_calling_date') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="time_calling_time">وقت الاتصال</label>
                                <input type="time" id="time_calling_time" class="form-control" wire:model="time_calling_time">
                                @error('time_calling_time') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="comments">التعليقات</label>
                                <textarea id="comments" class="form-control" placeholder="التعليقات" wire:model="comments"></textarea>
                                @error('comments') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
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
