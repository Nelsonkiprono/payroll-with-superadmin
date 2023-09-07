@extends('layouts.main_hr')
@section('xara_cbs')
    @include('partials.breadcrumbs')
    <style>
        th td {
            padding: 15px;
            background: #eee;
            border-bottom: 1px solid #fff;
        }

        tfoot td {
            background: 0 0;
            border-bottom: none;
            white-space: nowrap;
            text-align: right;
            padding: 10px 20px;
            font-size: 1.2em;

        }

        th {
            font-size: 20px;
        }
    </style>
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="overflow-auto"
                                         style="position: relative; padding: 15px; min-height: 680px">
                                        <div class="col-sm-12"
                                             style="margin-bottom: 20px; border-bottom: 1px solid #0d6efd">
                                            <div style="text-align: right">
                                                <h2 class="text-info">{{\App\Models\Organization::first()->name}}</h2>
                                                <h6 class="text-gray">{{\App\Models\Organization::first()->phone}}</h6>
                                                <h6 class="text-gray">{{\App\Models\Organization::first()->address}}</h6>
                                                <h6 class="text-gray">{{\App\Models\Organization::first()->website}}</h6>
                                            </div>
                                        </div>
                                        <table
                                            style="width: 100%; border-collapse: collapse;border-spacing: 0;margin-bottom: 20px"
                                            id="myTable">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>License Name</th>
                                                <th>Receipt No</th>
                                                <th>No Of Users</th>
                                                <th>Total Days + Trial</th>
                                                <th>Amount Paid</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $count = 1?>
                                            @forelse($transaction as $tra)
                                                {{$tra['module']['name']}}
                                                <tr style="border-bottom: 1px solid black">
                                                    <td>{{$count++}}</td>
                                                    <td>{{$tra['module']['name']}}</td>
                                                    <td>{{$tra['MpesaReceiptNumber']}}</td>
                                                    <td>{{$tra['module']['user_count']}}</td>
                                                    <td>{{$tra['module']['interval_count'] + $transaction[0]['module']['trial_days']}}</td>
                                                    <td class="total">{{$tra['Amount']}}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="5" class="flex align-items-center">
                                                        <center>
                                                            <svg width="154" height="110" viewBox="0 0 154 110"
                                                                 fill="#4e37b2" xmlns="http://www.w3.org/2000/svg"
                                                                 class="mt-5 mb-4">
                                                                <g clip-path="url(#clip0)">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                          d="M33.4784 93.2609C33.4784 94.5809 32.4071 95.6522 31.0871 95.6522C29.7671 95.6522 28.6958 94.5809 28.6958 93.2609C28.6958 91.9409 29.7671 90.8696 31.0871 90.8696C32.4071 90.8696 33.4784 91.9409 33.4784 93.2609Z"
                                                                          class="fill-primary-500"></path>
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                          d="M78.913 93.2609C78.913 94.5809 77.8417 95.6522 76.5217 95.6522C75.2017 95.6522 74.1304 94.5809 74.1304 93.2609C74.1304 91.9409 75.2017 90.8696 76.5217 90.8696C77.8417 90.8696 78.913 91.9409 78.913 93.2609Z"
                                                                          class="fill-primary-500"></path>
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                          d="M124.348 93.2609C124.348 94.5809 123.277 95.6522 121.957 95.6522C120.637 95.6522 119.565 94.5809 119.565 93.2609C119.565 91.9409 120.637 90.8696 121.957 90.8696C123.277 90.8696 124.348 91.9409 124.348 93.2609Z"
                                                                          class="fill-primary-500"></path>
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                          d="M148.261 54.9999C149.578 54.9999 150.652 56.0736 150.652 57.3913V83.6956C150.652 87.658 147.441 90.8695 143.478 90.8695H137.352V93.2608H143.478C148.761 93.2608 153.043 88.978 153.043 83.6956V57.3913C153.043 54.7489 150.903 52.6086 148.261 52.6086H4.78261C2.14022 52.6086 0 54.7489 0 57.3913V83.6956C0 88.978 4.28283 93.2608 9.56522 93.2608H15.4478V90.8695H9.56522C5.60283 90.8695 2.3913 87.658 2.3913 83.6956V57.3913C2.3913 56.0713 3.46261 54.9999 4.78261 54.9999H148.261ZM106.243 90.8695H91.7113L92.1011 93.2608H106.145L106.243 90.8695ZM60.8946 90.8695H46.5587L46.4607 93.2608H60.6985L60.8946 90.8695Z"
                                                                          class="fill-gray-600"></path>
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                          d="M38.2611 45.4348H23.9133C22.5933 45.4348 21.522 46.5061 21.522 47.8261V52.6087C21.522 53.9287 22.5933 55 23.9133 55H38.2611C39.5811 55 40.6524 53.9287 40.6524 52.6087V47.8261C40.6524 46.5061 39.5811 45.4348 38.2611 45.4348ZM23.9133 52.6087H38.2611V47.8261H23.9133V52.6087Z"
                                                                          class="fill-gray-600"></path>
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                          d="M28.6957 62.174C28.6957 63.494 27.6244 64.5653 26.3044 64.5653C24.9844 64.5653 23.9131 63.494 23.9131 62.174C23.9131 60.854 24.9844 59.7827 26.3044 59.7827C27.6244 59.7827 28.6957 60.854 28.6957 62.174Z"
                                                                          class="fill-primary-500"></path>
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                          d="M38.2606 62.174C38.2606 63.494 37.1893 64.5653 35.8693 64.5653C34.5493 64.5653 33.478 63.494 33.478 62.174C33.478 60.854 34.5493 59.7827 35.8693 59.7827C37.1893 59.7827 38.2606 60.854 38.2606 62.174Z"
                                                                          class="fill-primary-500"></path>
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                          d="M59.7826 64.5653H45.4348C44.1195 64.5653 43.0435 63.4892 43.0435 62.174C43.0435 60.8588 44.1195 59.7827 45.4348 59.7827H59.7826C61.0978 59.7827 62.1739 60.8588 62.1739 62.174C62.1739 63.4892 61.0978 64.5653 59.7826 64.5653Z"
                                                                          class="fill-primary-500"></path>
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                          d="M101.793 40.0497L118.533 11.354L119.982 13.6162L104.754 39.722L101.793 40.0497Z"
                                                                          class="fill-primary-500"></path>
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                          d="M110.163 40.0496L124.556 15.3761L127.383 15.2781L112.973 39.9826L110.163 40.0496Z"
                                                                          class="fill-primary-500"></path>
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                          d="M74.1304 7.17402H119.565V4.78271H74.1304V7.17402Z"
                                                                          class="fill-primary-500"></path>
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                          d="M74.1304 14.3478H119.565V11.9565H74.1304V14.3478Z"
                                                                          class="fill-primary-500"></path>
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                          d="M71.7389 2.3913V16.7391H50.2172C48.8996 16.7391 47.8259 15.6654 47.8259 14.3478V11.9565H45.4346V14.3478C45.4346 16.9902 47.5748 19.1304 50.2172 19.1304H74.1302V0H50.2172C47.5748 0 45.4346 2.14022 45.4346 4.78261V7.17391H47.8259V4.78261C47.8259 3.465 48.8996 2.3913 50.2172 2.3913H71.7389Z"
                                                                          class="fill-gray-600"></path>
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                          d="M124.348 2.39136C120.385 2.39136 117.174 5.60288 117.174 9.56527C117.174 13.5277 120.385 16.7392 124.348 16.7392C128.31 16.7392 131.522 13.5277 131.522 9.56527C131.522 5.60288 128.31 2.39136 124.348 2.39136ZM124.348 4.78266C126.985 4.78266 129.13 6.92766 129.13 9.56527C129.13 12.2029 126.985 14.3479 124.348 14.3479C121.71 14.3479 119.565 12.2029 119.565 9.56527C119.565 6.92766 121.71 4.78266 124.348 4.78266Z"
                                                                          class="fill-gray-600"></path>
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                          d="M108.902 38.261C98.1965 38.261 89.1358 45.2986 86.0869 55.0001H131.718C128.669 45.2986 119.608 38.261 108.902 38.261ZM108.902 40.6523C117.219 40.6523 124.608 45.3416 128.191 52.6088H89.6141C93.1963 45.3416 100.585 40.6523 108.902 40.6523Z"
                                                                          class="fill-gray-600"></path>
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                          d="M31.0868 76.5217C21.842 76.5217 14.3477 84.0161 14.3477 93.2609C14.3477 102.506 21.842 110 31.0868 110C40.3316 110 47.8259 102.506 47.8259 93.2609C47.8259 84.0161 40.3316 76.5217 31.0868 76.5217ZM31.0868 78.913C38.9972 78.913 45.4346 85.3504 45.4346 93.2609C45.4346 101.171 38.9972 107.609 31.0868 107.609C23.1764 107.609 16.739 101.171 16.739 93.2609C16.739 85.3504 23.1764 78.913 31.0868 78.913Z"
                                                                          class="fill-gray-600"></path>
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                          d="M121.956 76.5217C112.712 76.5217 105.217 84.0161 105.217 93.2609C105.217 102.506 112.712 110 121.956 110C131.201 110 138.696 102.506 138.696 93.2609C138.696 84.0161 131.201 76.5217 121.956 76.5217ZM121.956 78.913C129.867 78.913 136.304 85.3504 136.304 93.2609C136.304 101.171 129.867 107.609 121.956 107.609C114.046 107.609 107.609 101.171 107.609 93.2609C107.609 85.3504 114.046 78.913 121.956 78.913Z"
                                                                          class="fill-gray-600"></path>
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                          d="M76.5218 76.5217C67.2771 76.5217 59.7827 84.0161 59.7827 93.2609C59.7827 102.506 67.2771 110 76.5218 110C85.7666 110 93.261 102.506 93.261 93.2609C93.261 84.0161 85.7666 76.5217 76.5218 76.5217ZM76.5218 78.913C84.4323 78.913 90.8697 85.3504 90.8697 93.2609C90.8697 101.171 84.4323 107.609 76.5218 107.609C68.6114 107.609 62.174 101.171 62.174 93.2609C62.174 85.3504 68.6114 78.913 76.5218 78.913Z"
                                                                          class="fill-gray-600"></path>
                                                                </g>
                                                                <defs>
                                                                    <clipPath id="clip0">
                                                                        <rect width="153.043" height="110"
                                                                              fill="white"></rect>
                                                                    </clipPath>
                                                                </defs>
                                                            </svg>
                                                            <div class="mt-2"><label class="font-medium">No Transactions
                                                                    yet!</label></div>
                                                            <div class="mt-2"><label class="text-gray-500">This
                                                                    section will contain the list of invoices for
                                                                    <strong></strong>.</label>
                                                            </div>
                                                        </center>
                                                    </td>
                                                </tr>
                                            @endforelse
                                            </tbody>
                                            <tfoot style="border-top: 1px solid #0d6efd">
                                            <tr>
                                                <td colspan="2"></td>
                                                <td colspan="4">
                                                    <h1>Total Paid</h1>
                                                </td>
                                                <td>
                                                    <h1>
                                                    </h1>
                                                </td>
                                            </tr>
                                            <tr style="border-bottom: 2px solid #721313;">
                                                <td colspan="2"></td>
                                                <td colspan="4">
                                                    <h1>Balance</h1>
                                                </td>
                                                <td>
                                                    <h1>
                                                        @if(sizeof($transaction)===0)
                                                        @else
                                                            {{$transaction[0]['module']['price']-$transaction[0]['Amount']}}
                                                        @endif
                                                    </h1>
                                                </td>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        var table = document.getElementById('myTable');
        var rows = table.rows;
        var total = 0;
        var cell;
        for (var i = 1, iLen = rows.length - 1; i < iLen; i++) {
            cell = rows[i].cells[5].textContent
            // console.log(cell);
            if (rows[i].cells.length === 6) {
                total += Number(cell)
                console.log(total);
            }
        }
    </script>
@endsection
