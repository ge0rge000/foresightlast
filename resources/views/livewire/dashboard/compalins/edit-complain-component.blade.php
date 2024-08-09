<div>
    @livewireScripts
    <div class="card-content collapse show">
        <div class="card-body">
            <form wire:submit.prevent="submitForm" class="form">
                <div class="form-body">
                    <h4 class="form-section"><i class="ft-user"></i> تعديل شكوى</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name_complain">اسم الشكوى</label>
                                <input type="text" id="name_complain" class="form-control" wire:model="name_complain">
                                @error('name_complain') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="number_of_person">رقم موبايل الشاكي </label>
                                <input type="text" id="number_of_person" class="form-control" wire:model="number_of_person">
                                @error('number_of_person') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="compain">الشكوى</label>
                                <textarea id="compain" class="form-control" placeholder="الشكوى" wire:model="compain"></textarea>
                                @error('compain') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="recieve_order_id">طلب الاستلام</label>
                                <select id="recieve_order_id" class="form-control" wire:model="recieve_order_id">
                                    <option value="" selected>اختر طلب الاستلام</option>
                                    @foreach($receiveOrders as $receiveOrder)
                                        <option value="{{ $receiveOrder->id }}">{{ $receiveOrder->order_number }}</option>
                                    @endforeach
                                </select>
                                @error('recieve_order_id') <span class="text-danger">{{ $message }}</span> @enderror
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
