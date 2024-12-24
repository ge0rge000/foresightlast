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

            .brand-logoo {
                display: block;
                margin: 20px auto;
                max-width: 150px;
                border-radius: 16px;
            }
        }
    </style>

    <div class="card-content collapse show">
        <div class="card-body">
            <h4 class="form-section"><i class="ft-user"></i> تفاصيل الشكوى</h4>

            <!-- Print Button -->
            <button onclick="printreciveorder()" class="btn btn-primary mb-3 no-print">طباعة</button>

            <!-- Logo -->
            <div class="text-center">
                <img class="brand-logoo" alt="Foresight Egypt" src="{{ asset('photos/logo.jpg') }}">
            </div>

            <!-- Table -->
            <div class="table-responsive">
                <table class="table table-bordered vertical-table">
                    <tbody>
                        <tr>
                            <th>اسم الشاكي</th>
                            <td>{{ $complain->name_complain }}</td>
                        </tr>
                        <tr>
                            <th>رقم موبايل الشاكي</th>
                            <td>{{ $complain->number_of_person }}</td>
                        </tr>
                        <tr>
                            <th>الشركه التابعه</th>
                            <td>{{ $complain->receiveOrder->company->name_company }}</td>
                        </tr>
                        <tr>
                            <th>البيان</th>
                            <td>{{ $complain->receiveOrder->indicator_equipment->name }}</td>
                        </tr>
                        <tr>
                            <th>النوع</th>
                            <td>{{ $complain->receiveOrder->type_tool->name }}</td>
                        </tr>
                        <tr>
                            <th>الماركه</th>
                            <td>{{ $complain->receiveOrder->Brand->name }}</td>
                        </tr>
                        <tr>
                            <th>المعده</th>
                            <td>{{ $complain->receiveOrder->equipment->name }}</td>
                        </tr>
                        <tr>
                            <th>الشكوى</th>
                            <td>{{ $complain->compain }}</td>
                        </tr>
                        <tr>
                            <th>رد شكوي</th>
                            <td>{{ $complain->reaction_complain }}</td>
                        </tr>
                        <tr>
                            <th> تاريخ استلام الشكوي </th>
                            <td>{{ $complain->created_at }}</td>
                        </tr>
                        <tr>
                            <th> تاريخ رد الشكوي </th>
                            <td>{{ $complain->date_reaction }}</td>
                        </tr>
                        <tr>
                            <th>المستخدم</th>
                            <td>{{ $complain->user->name }}</td>
                        </tr>
                        <tr>
                            <th>طلب الاستلام</th>
                            <td>{{ $complain->receiveOrder->id }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Hidden iframe for printing -->
    <iframe id="printIframe" style="display:none;"></iframe>

    <script>
        function printreciveorder() {
            // Get the table and logo content
            var table = document.querySelector(".vertical-table").outerHTML;
            var logo = '<img class="brand-logoo" alt="Foresight Egypt" src="{{ asset('photos/logo.jpg') }}">';

            // Reference the iframe for printing
            var iframe = document.getElementById("printIframe");
            var doc = iframe.contentDocument || iframe.contentWindow.document;

            // Write the content to the iframe
            doc.open();
            doc.write(`
                <html lang="ar" dir="rtl">
                <head>
                    <title>Print</title>
                    <style>
                        @media print {
                            .no-print { display: none; }
                            .vertical-table { width: 100%; direction: rtl; text-align: right; }
                            .vertical-table th, .vertical-table td { text-align: right; padding: 5px; border-bottom: 1px solid #ddd; }
                            .brand-logoo { display: block; margin: 20px auto; max-width: 150px; border-radius: 16px; }
                        }
                        body { font-family: Arial, sans-serif; direction: rtl; text-align: right; }
                    </style>
                </head>
                <body>
                    ${logo}
                    ${table}
                </body>
                </html>
            `);
            doc.close();

            // Trigger the print
            iframe.contentWindow.focus();
            iframe.contentWindow.print();
        }
    </script>
</div>
