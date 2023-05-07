@extends('home')
@section('content')
    @inject('employee_info', 'App\Models\Configuration\Employee')
    <!-- start: page body -->
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="container mt-5 mb-5">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-center lh-1 mb-2">
                                <h6 class="fw-bold text-info">Payslip</h6> <span class="fw-normal ">Payment
                                    slip for
                                    {{ \Carbon\Carbon::parse($data->payroll_date)->format('d M Y') }}
                                </span>
                            </div>
                            {{-- <div class="d-flex justify-content-end"> <span>Building:</span> </div> --}}
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div> <span class="fw-bolder">To</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div> <span class="fw-bolder">Employee Phone:</span> <small
                                                    class="ms-3">{{ $employee_info->getEmployeeNumber($data->payroll_employee_id) }}</small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div> <span class="fw-bolder">Employee Name:</span>
                                                <span class="ms-3">
                                                    {{ $employee_info->getEmployeeName($data->payroll_employee_id) }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div> <span class="fw-bolder">Mode of Pay</span> <small
                                                    class="ms-3">BANK</small> </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div> <span class="fw-bolder">Payment Date</span> <small
                                                    class="ms-3">{{ $data->payroll_date }}</small> </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div> <span class="fw-bolder">Ac No.</span> <small
                                                    class="ms-3">*******0701</small> </div>
                                        </div>
                                    </div>
                                </div>
                                <table class="mt-4 table table-bordered">
                                    <thead class="bg-dark text-white">
                                        <tr>
                                            <th scope="col" class="text-white">Earnings</th>
                                            <th scope="col" class="text-white">Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">Salary</th>
                                            <td>{{ $data->salary }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Food Bill</th>
                                            <td>{{ $data->food_bill }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Bonus</th>
                                            <td>{{ $data->bonus }}</td>

                                        </tr>
                                        <tr>
                                            <th scope="row">Commision</th>
                                            <td>{{ $data->commision }}</td>

                                        </tr>
                                        <tr>
                                            <th scope="row">Festifal Bonus</th>
                                            <td>{{ $data->festifal_bonus }}</td>

                                        </tr>
                                        <tr>
                                            <th scope="row">TA</th>
                                            <td>{{ $data->TA }}</td>

                                        </tr>
                                        <tr>
                                            <th scope="row">Advance</th>
                                            <td>{{ $data->advance }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-danger">Deduction</th>
                                            <td>{{ $data->deduction }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-danger">Deduction Reason</th>
                                            <td>{{ $data->deduction_reasons }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-info">
                                            <td class="text-info">Total</td>
                                            </th>
                                        </tr>
                                        <tr class="border-top">
                                            <td>Total Deductions</td>
                                            <td>{{ $data->deduction }}</td>
                                        </tr>
                                        <tr class="border-top">
                                            <th scope="row">Total</th>
                                            <td>{{ $data->payroll_subtotal }}</td>
                                        </tr>

                                    </tbody>

                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-4"> <br> <span class="fw-bold">Net Pay :
                                        {{ $data->payroll_subtotal }}</span> </div>
                                {{-- <div class="border col-md-8">
                                    <div class="d-flex flex-column"> <span>In Words</span> <span>Twenty Five thousand nine
                                            hundred seventy only</span> </div>
                                </div> --}}
                            </div>

                            <div class="d-flex justify-content-end">
                                <div class="d-flex flex-column mt-2"> <span class="fw-bolder">For Employee</span>
                                    <span class="mt-4">Authorised Signatory</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script></script>
@endsection
