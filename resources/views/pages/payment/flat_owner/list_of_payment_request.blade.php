@extends('home')
@section('content')
    <!-- start: page body -->
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h3>List of Payment Request</h3>

                        <!--                    <div class="col text-md-end">
                                            <a class="btn btn-primary" href="{{ url('flat/create') }}"><i class="fa fa-list me-2"></i>
                                                Add Flat</a>
                                        </div>-->
                    </div>
                    <div class="card-body">
                        <table id="myTable" class="table display dataTable table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Flat Owner</th>
                                    <th>Rentee</th>
                                    <th>Invoice No</th>
                                    <th>Amount</th>
                                    <th>Approval</th>
                                    <th>Date</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $row)
                                    @php
                                        $user = '';
                                        if ($row->rentee_id) {
                                            $user = get_user_by_user_id($row->rentee_id);
                                        }
                                        if ($row->flat_owner_id) {
                                            $user = get_user_by_user_id($row->flat_owner_id);
                                        }
                                        if ($row->invoice_id) {
                                            $invoice = get_invoice_by_invoice_id($row->invoice_id);
                                            if (count([$invoice]) > 0) {
                                                $invoice_no = $invoice[0]->invoice_no;
                                            } else {
                                                $invoice_no = '';
                                            }
                                        }
                                    @endphp
                                    <tr>
                                        <td class="sorting">{{ $loop->index + 1 }}</td>
                                        <td class="sorting">
                                            @if ($row->flat_owner_id)
                                                {{ $user[0]->name }}
                                            @endif
                                        </td>
                                        <td class="sorting">
                                            @if ($row->rentee_id)
                                                {{ $user[0]->name }}
                                            @endif
                                        </td>
                                        <td class="sorting">{{ $invoice_no }}</td>
                                        <td class="sorting">{{ $row->amount }}</td>
                                        <td class="sorting">{{ $row->verification_status }}</td>
                                        <td class="sorting">{{ $row->date }}</td>
                                        <td class="sorting">
                                            @if (Auth::user()->type == 'FLAT_OWNER' && $row->rentee_id != '')
                                                <!-- start: Request a Quote -->
                                                <button data-row="{{ $row->id }}"
                                                    onclick="approvePayment('{{ $row->id }}')"
                                                    class="btn btn-primary px-4 text-uppercase" type="button">
                                                    Verify Payment</button>
                                            @elseif(Auth::user()->type == 'ASSOCIATION' && $row->flat_owner_id != '')
                                                <button data-row="{{ $row->id }}"
                                                    onclick="approvePayment('{{ $row->id }}')"
                                                    class="btn btn-primary px-4 text-uppercase" type="button">
                                                    Verify Payment</button>
                                            @endif
                                            <!--                                    <a href="{{ 'flat/' . $row->id . '/' . 'edit' }}"
                                                           class="btn btn-sm btn-primary">Edit</a>-->

                                            <!--                                    <a href="{{ 'billing-items/' . $row->id }}"
                                                           class="btn btn-sm btn-info">View</a>-->


                                            <!--                                    <button class="btn btn-sm btn-warning"
                                                                onclick="deleteItems({{ $row->id }})">Delete</button>               -->
                                            <!--<button class="btn btn-sm btn-warning"
                            onclick="verifyItems({{ $row->id }})">Verify</button>-->
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6">
                            <div class="card text-center p-2">
                                <div class="card-body">


                                    <div class="modal fade" id="RequestQuote" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                            <div class="modal-content text-start">
                                                <div class="modal-body custom_scroll p-lg-5">
                                                    <div class="row g-2">
                                                        <div class="col-12 mb-4">
                                                            <h4>Payment Request</h4>
                                                        </div>
                                                        <form id="add_form">
                                                            <input type="hidden" id="payment_id" name="payment_id"
                                                                value="">
                                                            <div class="col-lg-6 col-md-6">
                                                                <div class="form-floating">
                                                                    <select class="form-select" name="verification_status"
                                                                        id="verification_status">
                                                                        <option selected hidden>Approved</option>
                                                                        <option>Declined</option>
                                                                        <option>Processing</option>
                                                                    </select>
                                                                    <label>Select Status</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <button class="btn btn-lg btn-secondary text-uppercase"
                                                                    type="button" data-bs-dismiss="modal">Close</button>
                                                                <button class="btn btn-lg btn-primary text-uppercase"
                                                                    type="submit">Save Status</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function approvePayment(params) {

            $('.loader').show();
            $('#payment_id').val(params);
            $('#RequestQuote').modal('show');
            $('.loader').hide();


        }

        $('#add_form').submit(function() {
            var isConfirm = confirm('Are You Sure!');
            if (isConfirm) {
                $('.loader').show();
                //        alert();
                var data = new FormData($('#add_form')[0]);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'JSON',
                    method: "POST",
                    url: "payment/approve-payment-request",
                    data: data,
                    cache: false,
                    contentType: false,
                    processData: false,
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
            $('.loader').hide();
        });

        function deleteItems(params) {
            var isConfirm = confirm('Are You Sure!');
            if (isConfirm) {
                $('.loader').show();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'DELETE',
                    url: "flat" + '/' + params,
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
