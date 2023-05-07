@extends('home')
@section('content')
    <!-- start: page body -->
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h3>List of Cheque Request</h3>
                        <input type="text" id="user_type" value="{{ Auth::user()->type }}">

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
                                    <th>money_reciept_id</th>
                                    <th>Invoice Id</th>
                                    <th>Invoice No</th>
                                    <th>Cheque No</th>
                                    <th>Withdraw Date</th>
                                    <th>Note</th>
                                    <th>Flat Owner</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($cheque as $item)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $item->money_reciept_id }}</td>
                                        <td>{{ $item->invoice_id }}</td>
                                        <td>{{ get_invoice_by_invoice_id($item->invoice_id)->invoice_no }}</td>
                                        <td>{{ $item->cheque_no }}</td>
                                        <td>{{ $item->withdraw_date }}</td>
                                        <td>{{ $item->note }}</td>
                                        @if (Auth::user()->type == 'ASSOCIATION')
                                            <td>{{ get_user_name_by_user_id($item->flat_owner_id) }}</td>
                                        @endif
                                        @if (Auth::user()->type == 'FLAT_OWNER')
                                            <td>{{ $item->rentee_id }}</td>
                                        @endif
                                        <td>
                                            @if ($item->money_reciept_status == 'PENDING')
                                                <button type="button" class="btn btn-primary withdraw"
                                                    data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                    money_reciept_id="{{ $item->money_reciept_id }}">
                                                    DEPOSIT
                                                </button>
                                            @else
                                                <button type="button" disabled class="btn btn-primary withdraw"
                                                    data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                    money_reciept_id="{{ $item->money_reciept_id }}">
                                                    DEPOSITED
                                                </button>
                                            @endif

                                        </td>
                                    </tr>
                                @endforeach



                            </tbody>
                        </table>
                        <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6">
                            <div class="card text-center p-2">
                                <div class="card-body">

                                    <!-- Button trigger modal -->


                                    <!-- Modal -->

                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                            <div class="modal-content text-start">
                                                <div class="modal-body custom_scroll p-lg-5">
                                                    <div class="row g-2">
                                                        <div class="col-12 mb-4">
                                                            <h4>Deposit</h4>
                                                        </div>
                                                        <form id="add_form">
                                                            <input type="hidden" id="payment_id" name="payment_id"
                                                                value="">


                                                            <input type="text" id="money_reciept_val"
                                                                name="money_reciept_val" value="">
                                                            <div class="col-lg-6 col-md-6">
                                                                <div class="form-floating">
                                                                    <select class="form-select" name="account"
                                                                        id="account">
                                                                        <option selected hidden>Select Account To Deposit
                                                                        </option>
                                                                        @foreach ($accounts as $accounts)
                                                                            <option value="{{ $accounts->id }}">
                                                                                {{ $accounts->account_name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                    <label>Select Account</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 mt-2">
                                                                <button class="btn btn-lg btn-secondary text-uppercase"
                                                                    type="button" data-bs-dismiss="modal">Close</button>
                                                                <button class="btn btn-lg btn-primary text-uppercase"
                                                                    type="button" id="meow">Save Status</button>
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


        $('.withdraw').click(function(e) {
            e.preventDefault();
            let money_reciept_id = $(this).attr('money_reciept_id');
            $('#money_reciept_val').val(money_reciept_id);

            alert(money_reciept_id);

        });

        // $('#add_form').submit(function() {
        //     var isConfirm = confirm('Are You Sure!');
        //     if (isConfirm) {
        //         $('.loader').show();
        //         //        alert();
        //         var data = new FormData($('#add_form')[0]);
        //         $.ajax({
        //             headers: {
        //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //             },
        //             type: 'JSON',
        //             method: "POST",
        //             url: "payment/approve-payment-request",
        //             data: data,
        //             cache: false,
        //             contentType: false,
        //             processData: false,
        //             success: function(data) {
        //                 location.reload();
        //             }
        //         }).done(function() {
        //             $("#success_msg").html("Data Save Successfully");
        //         }).fail(function(data, textStatus, jqXHR) {
        //             $('.loader').hide();
        //             var json_data = JSON.parse(data.responseText);
        //             $.each(json_data.errors, function(key, value) {
        //                 $("#" + key).after(
        //                     "<span class='error_msg' style='color: red;font-weigh: 600'>" +
        //                     value +
        //                     "</span>");
        //             });
        //         });
        //     } else {
        //         $('.loader').hide();
        //     }
        //     $('.loader').hide();
        // });
        $('#meow').click(function() {
            var isConfirm = confirm('Are You Sure!');
            if (isConfirm) {
                $('.loader').show();
                //        alert();
                var money_reciept_val = $('#money_reciept_val').val();
                var account = $('#account :selected').val();
                var user_type = $('#user_type').val();
                alert();
                $.ajax({
                    method: "GET",
                    url: "{{ url('cheque-management-flat') }}/" + money_reciept_val + '/' + account,
                    success: function(data) {
                        alert(data);
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
