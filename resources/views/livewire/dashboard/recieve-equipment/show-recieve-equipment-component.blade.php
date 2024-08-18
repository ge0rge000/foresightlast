<div>
    <style>
        body {
            direction: rtl;
            text-align: right;
        }

        table {
            width: 100%;
            direction: rtl;
            text-align: right;
        }

        th,
        td {
            text-align: right;
        }

        @media print {
            .no-print {
                display: none;
            }
            table {
                direction: rtl;
                text-align: right;
            }
            th,
            td {
                text-align: right;
            }
        }
    </style>
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="row mb-3">
        <div class="col-md-12">
            <label for="searchTerm">بحث</label>
            <input type="text" id="searchTerm" class="form-control" placeholder="بحث باسم المعده اوسيريال المعده او اسم شركه او اسم الشخص الذي سلم المعده او رقم شخص اخر او اسم الشخص المستبم او السيريال" wire:model.live.debounce.500ms="searchTerm">
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="created_at">تاريخ الاستلام</label>
            <input type="date" id="created_at" class="form-control" placeholder="تاريخ الاستلام" wire:model.live.debounce.500ms="searchTerm">
        </div>
        <div class="col-md-6">
            <label for="date_recieve">تاريخ التسليم</label>
            <input type="date" id="date_recieve" class="form-control" placeholder="تاريخ التسليم" wire:model.live.debounce.500ms="searchTerm">
        </div>


    </div>



    <div class="card-content collapse show">
        <div class="card-body">
            <h4 class="form-section"><i class="ft-activity"></i> قائمة أوامر الاستلام</h4>
            <button onclick="printTable()" class="btn btn-primary mb-3 no-print">طباعة الجدول</button>
            <div class="table-responsive">
                <table class="table" id="receiveOrdersTable" dir="rtl">
                    <thead class="thead-dark">

                        <tr>
                            <th>رقم</th>
                            <th>المستلم</th>
                            <th>المعدة</th>
                            <th>البراند</th>
                            <th>البيان</th>
                            <th>تعليق</th>
                            <th>النوع</th>
                            <th>السيريال</th>
                            <th>اسم الشركه</th>
                            <th>اسم الشخص</th>
                            <th>  اسم شخص المستلم</th>
                            <th>رقم الشخص</th>
                            <th>رقم شخص آخر</th>
                            <th>الحالة</th>
                            <th>الضمان</th>
                            <th class="no-print">الإجراءات</th>
                            <th class="no-print">طباعه</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($receiveOrders as $key => $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->user->name }}</td>
                                <td>{{ $order->equipment->name }}</td>
                                <td>{{ $order->Brand->name }}</td>
                                <td>{{ $order->indicator_equipment->name }}</td>
                                <td>{{ $order->comment }}</td>

                                <td>{{ $order->type_tool->name }}</td>
                                <td>{{ $order->serial }}</td>
                                <td>{{ $order->company->name_company }}</td>
                                <td>{{ $order->name_person }}</td>
                                <td>{{ $order->person_receive }}</td>
                                <td>{{ $order->number_person }}</td>
                                <td>{{ $order->another_number_person }}</td>
                                <td>
                                    {{ $order->case_status == "Receive" ? 'لم يتم تسليم' : 'تم تسليم' }}
                                    <button wire:click="toggleCaseStatus({{ $order->id }})" id="{{ $order->id }}" class="btn btn-secondary btn-sm no-print">
                                        <i class="las la-exchange-alt"></i>
                                    </button>
                                </td>
                                <td>
                                    {{ $order->guarantee_status == "1" ? 'يوجد ضمان' : 'لا يوجد ضمان' }}
                                    <button wire:click="toggleGuarantee({{ $order->id }})" id="{{ $order->id }}" class="btn btn-info btn-sm no-print">
                                        <i class="las la-sync-alt"></i>
                                    </button>
                                </td>
                                <td class="no-print">
                                    @if(Auth::user()->can_update==1)
                                        <a href="{{ route('edit-receive-equipment', $order->id) }}" class="btn btn-warning no-print">تعديل</a>
                                    @endif
                                    @if(Auth::user()->can_delete==1)
                                        <button wire:click="delete({{ $order->id }})" class="btn btn-danger no-print">حذف</button>
                                    @endif
                                </td>
                                <td class="no-print">
                                    <a href="{{ route('print_order', $order->id) }}" class="btn btn-info no-print">طباعه</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>

    </div>
    <iframe id="printIframe" style="display:none;"></iframe>

<style>
    @media print {
        .no-print {
            display: none;
        }
    }
</style>

<script>
    function printTable() {
        var table = document.getElementById("receiveOrdersTable").outerHTML;
        var iframe = document.getElementById("printIframe");
        var doc = iframe.contentDocument || iframe.contentWindow.document;
        doc.open();
        doc.write('<html><head><title>Print</title><style>@media print { .no-print { display: none; } table { direction: rtl; }}</style></head><body>' + table + '</body></html>');
        doc.close();
        iframe.contentWindow.focus();
        iframe.contentWindow.print();
    }
</script>

</div>

