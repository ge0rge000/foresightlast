<div>
    <style>
        body {
            direction: rtl;
            text-align: right;
        }

        .vertical-table {
            width: 100%;
            direction: rtl;
            text-align: right;
        }

        .vertical-table th,
        .vertical-table td {
            text-align: right;
            padding: 5px;
            border-bottom: 1px solid #ddd;
        }

        .vertical-table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .brand-logoo {
            display: block;
            margin: 20px auto;
            max-width: 150px;
            border-radius: 16px;
        }

        @media print {
            .no-print {
                display: none;
            }
            .vertical-table {
                direction: rtl;
                text-align: right;
            }
            .vertical-table th,
            .vertical-table td {
                text-align: right;
                padding: 5px;
                border-bottom: 1px solid #ddd;
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

    <div class="card-content collapse show">
        <div class="card-body">
            <h4 class="form-section"><i class="ft-activity"></i> تفاصيل الاوردر</h4>
            <button onclick="printreciveorder()" class="btn btn-primary mb-3 no-print">طباعة اذن الاستلام </button>

            <div class="text-center">
                <img class="brand-logoo" alt="Foresight Egypt" src="{{ asset('photos/logo.jpg') }}">
            </div>

            <div class="table-responsive">
                <table class="table table-bordered vertical-table">
                    <tbody>

                        <tr>
                            <th> رقم الاوردر</th>
                            <td>{{ $receiveOrder->id }}</td>
                        </tr>
                        <tr>
                            <th>المستلم</th>
                            <td>{{ $receiveOrder->user->name }}</td>
                        </tr>
                        <tr>
                            <th>البيان</th>
                            <td>{{ $receiveOrder->indicator_equipment->name }}</td>
                        </tr>
                        <tr>
                            <th>تعليق</th>
                            <td>{{ $receiveOrder->comment }}</td>
                        </tr>
                        <tr>
                            <th>السيريال</th>
                            <td>{{ $receiveOrder->serial }}</td>
                        </tr>
                        <tr>
                            <th>النوع</th>
                            <td>{{ $receiveOrder->type_tool->name }}</td>
                        </tr>
                        <tr>
                            <th>البراند</th>
                            <td>{{ $receiveOrder->Brand->name }}</td>
                        </tr>
                        <tr>
                            <th>المعدة</th>
                            <td>{{ $receiveOrder->equipment->name }}</td>
                        </tr>
                        <tr>
                            <th>اسم الشركه</th>
                            <td>{{ $receiveOrder->company->name_company }}</td>
                        </tr>
                        <tr>
                            <th>اسم الشخص</th>
                            <td>{{ $receiveOrder->name_person }}</td>
                        </tr>
                        <tr>
                            <th>رقم الشخص</th>
                            <td>{{ $receiveOrder->number_person }}</td>
                        </tr>
                        <tr>
                            <th>اسم شخص المستلم</th>
                            <td>{{ $receiveOrder->person_receive }}</td>
                        </tr>

                        <tr>
                            <th>رقم شخص آخر</th>
                            <td>{{ $receiveOrder->another_number_person }}</td>
                        </tr>
                        <tr>
                            <th>الحالة</th>
                            <td>{{ $receiveOrder->case_status == "Receive" ? 'لم يتم تسليم' : 'تم تسليم' }}</td>
                        </tr>
                        <tr>
                            <th>الضمان</th>
                            <td>{{ $receiveOrder->guarantee_status == "1" ? 'يوجد ضمان' : 'لا يوجد ضمان' }}</td>
                        </tr>
                        <tr>
                            <th> تاريخ الاستلام</th>
                            <td>{{ $receiveOrder->created_at }}</td>
                        </tr>
                        <tr>
                            <th> تاريخ التسليم</th>
                            <td>{{ $receiveOrder->updated_at }}</td>
                        </tr>
                        <tr>
                            <th>الامضاء</th>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <iframe id="printIframe" style="display:none;"></iframe>

    <script>
        function printreciveorder() {
            var table = document.querySelector(".vertical-table").outerHTML;
            var logo = '<img class="brand-logoo" alt="Foresight Egypt" src="{{ asset('photos/logo.jpg') }}">';
            var iframe = document.getElementById("printIframe");
            var doc = iframe.contentDocument || iframe.contentWindow.document;
            doc.open();
            doc.write('<html lang="ar" dir="rtl"><head><title>Print</title><style>@media print { .no-print { display: none; } .vertical-table { width: 100%; direction: rtl; text-align: right; } .vertical-table th, .vertical-table td { text-align: right; padding: 5px; border-bottom: 1px solid #ddd; } .brand-logoo { display: block; margin: 20px auto; max-width: 150px; border-radius: 16px;}}</style></head><body>' + logo + table + '</body></html>');
            doc.close();
            iframe.contentWindow.focus();
            iframe.contentWindow.print();
        }
    </script>
</div>
