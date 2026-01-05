<!DOCTYPE html>
<html
    @if (Config::get('app.locale') == 'ar') lang="ar" data-textdirection="rtl" @else  lang="en" data-textdirection="ltr" @endif>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>{!! $salary->month !!} / {!! $salary->year !!}</title>


    <style>
        <link href="https://fonts.cdnfonts.com/css/arial" rel="stylesheet">body {
            font-family: 'Arial', sans-serif;
        }

        .form-box {
            max-width: 800px;
            margin: auto;
            font-size: 9px;
            line-height: 24px;
            font-family: 'Arial', sans-serif;
        }

        .form-box table {
            width: 100%;
            line-height: inherit;
            text-align: right;
        }

        .form-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .form-box table tr td {
            text-align: left;
        }

        .form-box table tr.top table td {
            padding-bottom: 20px;
        }

        .form-box table tr.top table td.title {
            font-size: 20px;
            line-height: 45px;
            color: #333;
        }

        .form-box table tr.information table td {
            padding-bottom: 40px;
        }

        .form-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .form-box table tr.details td {
            padding-bottom: 20px;
        }

        .form-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .form-box table tr.item.last td {
            border-bottom: none;
        }

        .form-box table tr.total td {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .form-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .form-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .rtl {
            direction: rtl;
            /* font-family: 'almarai', sans-serif; */
        }

        .rtl table {
            text-align: right;
        }

        .rtl table tr td {
            text-align: right;
        }

        @page {
            header: page-header;
            footer: page-footer;
        }


        @media print {
            body {
                font-family: 'Arial', sans-serif;
                /* Other print-specific styles */
            }
        }

        @media print {
            @page {
                margin: 7mm 0mm;
                /* Sets a 25mm margin on all four sides of the printed page */
            }
        }
    </style>




</head>

<body>




    <div class="form-box {{ config('app.locale') == 'ar' ? 'rtl' : '' }}">

        <img src="{!! $header !!}" style="margin-top: -25px">
        <br /><br />
        <div style="font-size: 12px; font-weight: bolder">

        </div>

        <table>

            <tr>
                <td>
                    <table style="margin: 40px auto;">
                        <tr>
                            <td>
                                التاريخ : 1/4/2026
                            </td>
                        </tr>
                        <tr>
                            <td width="80%">
                                السيد المدير العام للجمعية: د/ عبد الجليل عبد الحميد غراب
                            </td>
                            <td width="20%">
                                المحترم
                            </td>


                        </tr>
                    </table>
                </td>
            </tr>

        </table>


        <div style="text-align: center ; line-height: 35px; font-size: 30px; background-color: #ddd;height: 50px;">
            موضوع / صرف رواتب الموظفين
        </div>

        <p style="  font-size: 20px; line-height: 30px;">
            يرجى صرف رواتب العاملين لدينا من ضمن مشروع تعزيز الصمود النفسي من حساب الجمعية الفرعي بالدولار في بنك القدس
            الى حسابات الموظفين التالية اسمائهم عن شهر {!! $salary->month !!} للعام {!! $salary->year !!} .
        </p>

        {{-- data --}}
        <br /><br /><br />
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>{!! __('employees.employee_id') !!}</th>
                    <th>{!! __('employees.personal_id') !!}</th>
                    <th>{!! __('employees.basic_salary') !!}</th>
                    <th>{!! __('salaries.actual_salary') !!}</th>
                </tr>
            </thead>
            <tbody>


                @foreach ($employeeSalary as $index => $row)
                    <tr>

                        <td>{!! $loop->iteration !!}</td>
                        <td>
                            <label>{!! $row->EmployeeShortName() !!}</label>
                        </td>
                        <td>
                            <label>{!! $row->personal_id !!}</label>
                        </td>
                        <td>
                            <label>{!! $row->pivot->basic_salary !!}</label>
                        </td>
                        <td>
                            <label>{!! $row->pivot->amount !!}</label>
                        </td>

                    </tr>
                @endforeach



            </tbody>
        </table>



        {{-- footer --}}


        {{-- <br /><br /><br /><br />
        <img src="{!! $footer !!}"> --}}

    </div>

</body>
