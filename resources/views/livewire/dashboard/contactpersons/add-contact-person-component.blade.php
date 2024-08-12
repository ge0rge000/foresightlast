<!-- resources/views/livewire/dashboard/contactpersons/add-contact-person-component.blade.php -->
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
                    <h4 class="form-section"><i class="ft-user"></i> معلومات الشخص</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">اسم الشخص</label>
                                <input type="text" id="name" class="form-control" placeholder="اسم الشخص" wire:model="name">
                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mobile_number">رقم الموبايل</label>
                                <input type="text" id="mobile_number" class="form-control" placeholder="رقم الموبايل" wire:model="mobile_number">
                                @error('mobile_number') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="second_mobile_number">رقم الموبايل الثاني</label>
                                <input type="text" id="second_mobile_number" class="form-control" placeholder="رقم الموبايل الثاني"
                                wire:model="second_mobile_number">
                                @error('second_mobile_number') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address">العنوان</label>
                                <input type="text" id="address" class="form-control" placeholder="العنوان" wire:model="address">
                                @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="second_mobile_number"> </label>
                                <input type="text" id="second_mobile_number" class="form-control" placeholder="وظيفه"
                                wire:model="job">
                                @error('job') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                    </div>
                    {{-- <div wire:ignore>
                        <select class="form-control" id="select2" multiple>
                            <option value="">Select Option</option>
                            @foreach($series as $item)
                                <option value="{{ $item }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </div> --}}
                    <div class="form-group"  >
                        <label for="selected_companies">الشركات</label>
                        <select id="selected_companies" class="form-control" wire:model="selectedCompany">
                            <option value="" >اختر شركه</option>
                            @foreach($companies as $company)
                                <option value="{{ $company->id }}">{{ $company->name_company }}</option>
                            @endforeach
                        </select>
                        @error('selectedCompanies') <span class="text-danger">{{ $message }}</span> @enderror
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
    {{-- @push('js')
    <script>
        $(document).ready(function () {
            $('#select2').select2();
            $('#select2').on('change', function (e) {
                var data = $('#select2').select2("val");
            @this.set('selected', data);
            });
        });
    </script>

@endpush --}}

    @push('js')
        <script>
            document.ready(function () {
                $('#selected_companies').select2();
                $('#selected_companies').on('change', function (e) {
                    var data = $('#selected_companies').val();
                    @this.set('selectedCompanies', data);
                });
            });
        </script>
    @endpush
</div>
