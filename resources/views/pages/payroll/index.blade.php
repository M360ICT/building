@extends('home')
@section('content')
    @inject('employee_info', 'App\Models\Configuration\Employee')
    <!-- start: page body -->
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h3>List of Payroll Expense Items</h3>

                        <div class="col text-md-end">
                            <a class="btn btn-primary" href="{{ url('payroll/create') }}"><i class="fa fa-list me-2"></i>
                                Add Payroll</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="myTable" class="table display dataTable table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Employee</th>
                                    <th>Payment Date</th>
                                    <th>Method</th>
                                    <th>Amount</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($item as $row)
                                    <tr>
                                        <td class="sorting">{{ $loop->index + 1 }}</td>
                                        <td class="sorting">{{ $employee_info->getEmployeeName($row->payroll_employee_id) }}
                                        </td>
                                        <td class="sorting">{{ $row->payroll_date }}</td>
                                        <td class="sorting">{{ $row->payroll_account_method }}</td>
                                        <td class="sorting">{{ $row->payroll_subtotal }}</td>
                                        <td>
                                            <button class="btn btn-sm btn-danger"
                                                onclick="deleteItems({{ $row->id }})">Delete</button>

                                            <a href="{{ 'payroll/' . $row->id }}" class="btn btn-sm btn-warning">View</a>
                                            <a href="{{ 'payroll/' . $row->id . '/' . 'edit' }}"
                                                class="btn btn-sm btn-info">Edit</a>

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function deleteItems(params) {
            var isConfirm = confirm('Are You Sure!');
            if (isConfirm) {
                $('.loader').show();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'DELETE',
                    url: "payroll" + '/' + params,
                    success: function(data) {
                        location.reload();
                    }
                }).done(function() {
                    $("#success_msg").html("Data Save Successfully");
                }).fail(function(data, textStatus, jqXHR) {
                    $('.loader').hide();
                    var json_data = JSON.parse(data.responseText);
                    $.each(json_data.errors, function(key, value) {
                        $("#" + key).after(
                            "<span class='error_msg' style='color: red;font-weigh: 600'>" +
                            value +
                            "</span>");
                    });
                });
            } else {
                $('.loader').hide();
            }
        }
    </script>
@endsection
