@extends('home')
@section('content')
    <!-- start: page toolbar -->
    <div class="page-toolbar px-xl-4 px-sm-2 px-0 py-3">
        <div class="container-fluid">
            <div class="row g-3 mb-3 align-items-center">
                <div class="col">
                    <ol class="breadcrumb bg-transparent mb-0">
                        <li class="breadcrumb-item"><a class="text-secondary" href="{{ url('') }}}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item"><a class="text-secondary" href="{{ url('invoice') }}">Invoice</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create Invoice</li>
                    </ol>
                </div>
            </div> <!-- .row end -->
        </div>
    </div>
    <!-- start: page body -->
    <form class="row maskking-form" id="add_form">
        @csrf
        <div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
            <div class="container-fluid">
                <!-- Create invoice -->
                <div class="row g-3">
                    <div class="col-12">





                        <div class="card">
                            <div class="card-header">
                                <h6 class="card-title mb-0">BASIC INFORMATION</h6>
                            </div>
                            <div class="card-body">
                                <input type="hidden" name="invoice_type" id="invoice_type" value="<?php echo Auth::user()->type; ?>">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-12">
                                        <span class="float-label">
                                            <label for="warehouse">Select Building</label>
                                            <select class="form-control form-control-lg custom-select" name="building_id"
                                                id="building_id">
                                                @foreach ($buildings as $row)
                                                    {
                                                    <option value="{{ $row->id }}">{{ $row->building_name }}</option>
                                                @endforeach
                                            </select>
                                    </div>


                                    <div class="col-lg-3 col-sm-12">
                                        <span class="float-label">
                                            <label for="warehouse">Select Flat Owner</label>
                                            <input type="text" class="form-control form-control-lg" id="flatOwner"
                                                placeholder="Flat Owner" name="flat_owner_id">

                                            <input type="hidden" class="form-control form-control-lg"
                                                id="hidden_flat_owner_id" placeholder="Brnach" name="hidden_flat_owner_id"
                                                value=""> </span>
                                    </div>



                                    <div class="col-lg-4 col-sm-12">
                                        <span class="float-label">
                                            <label for="warehouse">Invoice No</label>
                                            <input type="text" class="form-control form-control-lg" id="invoice_no"
                                                placeholder="Invoice No" name="invoice_no" value="{{ rand() }}"
                                                readonly>
                                        </span>
                                    </div>

                                    <div class="col-lg-4 col-sm-12">
                                        <span class="float-label">
                                            <label for="invoice_date">Invoice Date</label>
                                            <input type="date" class="form-control form-control-lg" id="invoice_date"
                                                placeholder="Invoice Date" name="invoice_date" value="">
                                        </span>
                                    </div>



                                </div>


                            </div>
                        </div>
                        <br>
                        <div class="card print_invoice">
                            <div class="card-body">
                                <div class="card p-3">
                                    <div style="clear:both"></div>
                                    <?php
                                    $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                                    ?>
                                    <div style="clear:both"></div>
                                    <table class="items">
                                        <tbody>
                                            <tr>
                                                <th>Billing Item</th>
                                                <th>Description</th>
                                                <th>Month</th>
                                                <th style="width: 140px;">Charge</th>
                                                <th style="width: 140px;">Extras</th>
                                                <th style="width: 70px;">No of Month</th>
                                                <th style="width: 140px;">Unit Price</th>
                                            </tr>
                                            <div id="billingDetailsList">
                                                @php
                                                    $i = 0;
                                                @endphp
                                                @foreach ($billing_items as $row)
                                                    @php
                                                        $i++;
                                                    @endphp
                                                    <tr class="item-row billing-details-row">
                                                        <td class="item-name">
                                                            <div class="col-12">

                                                                <textarea name="billing_item_{{ $i }}" readonly>{{ $row->billing_item_name }}</textarea>
                                                                <input type="hidden"
                                                                    name="billing_item_id_{{ $i }}"
                                                                    value="{{ $row->id }}">
                                                            </div>
                                                        </td>
                                                        <td class="description">
                                                            <textarea name="billing_description_{{ $i }}"></textarea>
                                                        </td>

                                                        <td class="description">
                                                            <select class="form-control form-control-lg custom-select"
                                                                name="billing_month_{{ $i }}">
                                                                <?php
                                                       for ($m=0; $m<12; $m++) {
                                                       ?>
                                                                <option @if (date('m') == $m + 1) selected @endif>
                                                                    <?php echo $months[$m]; ?>
                                                                </option>

                                                                <?php }?>
                                                            </select>
                                                        </td>


                                                        <td>
                                                            <textarea class="cost billing-charge billing-charge-{{ $i }}" name="billing_charge_{{ $i }}">{{ $row->billing_item_charge }}</textarea>
                                                        </td>
                                                        <td>
                                                            <textarea class="cost billing-extras billing-extras-{{ $i }}" data-row="{{ $i }}"
                                                                name="billing_extras_{{ $i }}"></textarea>
                                                        </td>
                                                        <td>
                                                            <textarea class="qty billing-quantity billing-quantity-{{ $i }}"
                                                                name="billing_quantity_{{ $i }}" data-row="{{ $i }}"></textarea>
                                                        </td>
                                                        <td>
                                                            <textarea class="qty billing-single-total billing-total billing-total-{{ $i }}"
                                                                data-row="{{ $i }}" name="billing_total_{{ $i }}" readonly></textarea>
                                                        </td>
                                                        <input type="hidden" name="billing_rows[]"
                                                            value="{{ $i }}" />
                                                    </tr>
                                                @endforeach
                                            </div>
                                        </tbody>
                                    </table>


                                    <table>
                                        <tbody>
                                            <tr id="hiderow">
                                                <!--                                            {{-- <td colspan="5"><a id="addProductRow" class="addProductRow"
                                                    href="javascript:;" title="Add a row">Add a row</a></td> --}}-->
                                                <!--                                        </tr><tr id="hiderow">
                                                        <td colspan="5"><a id="addProductRow" class="addProductRow"
                                                                href="javascript:;" title="Add a row">Add a row</a></td>
                                                    </tr>--><br>
                                            <tr>

                                                <td colspan="10" width="80%"
                                                    class="total-line text-right invoice-subtotal"
                                                    style="text-align: right;border:0">Subtotal</td>
                                                <td class="total-value">

                                                    <input type="number" name="invoice_subtotal" id="invoiceSubTotal"
                                                        value="" readonly>
                                                </td>
                                            </tr>

                                            <tr>

                                                <td colspan="10" class="total-line" style="text-align: right;border:0">
                                                    Vat Rate(%)</td>
                                                <td class="total-value">
                                                    <input type="number" name="vat_rate" id="vat_rate" value="7.50"
                                                        readonly>
                                                </td>
                                            </tr>
                                            <tr>

                                                <td colspan="10" class="total-line" style="text-align: right;border:0">
                                                    Vat Amount(%)</td>
                                                <td class="total-value">
                                                    <input type="number" name="vat_amount" id="vat_amount"
                                                        value="" readonly>
                                                </td>
                                            </tr>

                                            <tr>

                                                <td colspan="10" class="total-line" style="text-align: right;border:0">
                                                    Overall Discount</td>
                                                <td class="total-value">
                                                    <input type="number" name="overall_discount" id="overall_discount"
                                                        value="">
                                                </td>
                                            </tr>
                                            <tr>

                                                <td colspan="10" class="total-line" style="text-align: right;border:0">
                                                    Grand Total</td>
                                                <td class="total-value">
                                                    <input type="number" name="grand_total" id="grand_total"
                                                        value="" readonly>
                                                </td>
                                            </tr>
                                            {{-- <tr>

                                            <td colspan="10" class="total-line" style="text-align: right;border:0">
                                                Payment Type</td>
                                            <td class="total-value">
                                                <span class="float-label">
                                                    <select class="form-control form-control-lg" id="payment_type"
                                                        name="payment_type">
                                                        <option selected disabled>Select Payment Type</option>

                                                        <option value="BANK">BANK</option>
                                                        <option value="CASH">CASH</option>
                                                        <option value="MOBILE_BANKING">MOBILE_BANKING</option>
                                                    </select>
                                                </span>
                                                <input type="hidden" id="hiddenAccId" name="expense_account">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="10" class="total-line" style="text-align: right;border:0">
                                                Account</td>
                                            <td class="total-value">
                                                <span class="float-label">
                                                    <select class="form-control form-control-lg" id="getAccount"
                                                        name="account">

                                                    </select>
                                                </span>
                                                <input type="hidden" id="hiddenAccId" name="expense_account">
                                            </td>
                                        </tr>


                                        <tr>

                                            <td colspan="10" class="total-line" style="text-align: right;border:0">
                                                Total Paying</td>
                                            <td class="total-value">
                                                <input type="number" name="paid_amount" id="paid_amount"
                                                    value="">
                                            </td>
                                        </tr> --}}

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>



                    <div class="col-12 text-center text-md-end" id="InvoiceButtonArea">
                        <button type="submit" class="btn btn-lg btn-primary"><i
                                class="fa fa-print me-2"></i>Payment</button>
                        <button type="button" class="btn btn-lg btn-secondary"><i class="fa fa-envelope me-2"></i>Send
                            PDF</button>
                    </div>

                    <div class="col-12 text-center text-md-end" id="InvoiceSkipButtonArea" style="display: none">
                        {{-- <a type="button" class="btn btn-lg btn-secondary"
                                href="{{ url('invoice/' . $invoiceNO) }}"><i class="fa fa-envelope me-2"></i>SKIP MONEY
                                RECEIPT</a> --}}
                    </div>







    </form>

    <div id='checkMoneyReceipt'></div>



    <script type="text/javascript">
        $(document).on('click', '.addProductRow', function() {
            var billing_row = document.querySelectorAll('.billing-details-row').length + 1;
            // alert(billing_row);
            var billing_content = ' <tr class="item-row billing-details-row">' +
                '<td class="item-name">' +
                ' <div class="delete-wpr"><a class="delete" href="javascript:;" title="Remove row">X Remove</a></div>' +
                '<div class="col-12">' +
                '<select class="form-control form-control-lg custom-select" name="billing_product_' + billing_row +
                '">' +
                '<option value="" disabled selected>Select Product</option> ' +

                '</select>' +
                '</div>' +
                '</td>' +
                '<td class="description">' +
                ' <textarea name="billing_description_' + billing_row + '"></textarea>' +
                ' </td>' +
                '<td class="description">' +
                ' <span class="float-label">' +
                ' <input type="text" class="form-control vendor vendor-data-' + billing_row +
                ' form-control-lg" data-row = "' + billing_row + '" id="vendorID" placeholder="Search Vendor">' +
                ' </span>' +
                ' <input type="hidden" class="vendor vendor-data-' + billing_row + '" id="hiddenVendorID_' +
                billing_row + '" data-row = "' + billing_row + '" name="billing_vendor_' + billing_row +
                '" value="">' +
                '  </td>' +
                ' <td><textarea class="cost" name="billing_cost_price_' + billing_row + '"></textarea></td>' +
                ' <td><textarea class="cost billing-unit-price billing-unit-price-' + billing_row + '" data-row="' +
                billing_row + '" name="billing_unit_price_' + billing_row + '"></textarea></td>' +
                ' <td><textarea class="qty billing-quantity billing-quantity-' + billing_row + '" data-row="' +
                billing_row + '" name="billing_quantity_' + billing_row + '"></textarea></td>' +
                '  <td><textarea class="qty billing-single-total billing-total billing-total-' + billing_row +
                '" data-row="' + billing_row + '" name="billing_total_' + billing_row +
                '" readonly></textarea></td>' +
                ' </tr>' +
                '<div style="clear:both"></div>' +
                '<span class="remove-flight-row"><i class="fa fa-times"></i></span>' +
                '<input type="hidden" name="billing_rows" value="' + billing_row + '" />' +
                '</div>';

            $('.items tr:last').after(billing_content);


        });

        $(document).on('click', '.delete-wpr', function() {
            $(this).parent().parent().remove();
        })
    </script>
    <script type="text/javascript">
        $(document).ready(function() {

            $(document).on('keyup', '.invoice-quantity', function() {
                var row_number = $(this).attr('data-row');
                // alert(row_number);
                $('.billing-total-' + row_number).val(Math.round(get_unit_total(row_number)));
                $('#invoiceSubTotal').val(Math.round(get_sub_total()));
                $('#invoiceNetTotal').val(Math.round(get_net_total()));
                $('#due_amount').val(Math.round(get_net_total()));
                $('#invoiceDue').text(Math.round(get_net_total()));
                $('#grand_total').val(Math.round(grandTotal()));
            });


            $(document).on('keyup', '.billing-extras', function() {
                var row_number = $(this).attr('data-row');
                // alert(row_number);
                $('.billing-total-' + row_number).val(Math.round(get_unit_total(row_number)));
                $('#invoiceSubTotal').val(Math.round(get_sub_total()));
                $('#invoiceNetTotal').val(Math.round(get_net_total()));
                $('#due_amount').val(Math.round(get_net_total()));
                $('#invoiceDue').text(Math.round(get_net_total()));
                // alert();
                $('#grand_total').val(grandTotal());

                // alert(grandTotal());
            });


            $('#flatOwner').autocomplete({
                html: true,
                source: function(request, response) {
                    $.ajax({
                        type: "GET",
                        url: "{{ url('flat-owner-name-search') }}",
                        dataType: "json",
                        data: {
                            q: request.term,
                        },
                        success: function(data) {
                            response(data.data);
                        }
                    });
                },
                select: function(event, ui) {
                    $(this).val(ui.item.label);
                    $('#hidden_flat_owner_id').val(ui.item.value);
                    // $('#remaining').val(ui.item.remain);
                    return false;
                },
                minLength: 1,
                open: function() {
                    $(this).removeClass("ui-corner-all").addClass("ui-corner-top");
                },
                close: function() {
                    if ($('#hidden_flat_owner_id').val() == '') {
                        $(this).val('');
                        $('#hidden_flat_owner_id').val('');
                        // alert();
                    }
                    $(this).removeClass("ui-corner-top").addClass("ui-corner-all");
                }
            });
            $(document).on('keyup', '.billing-charge', function() {
                var row_number = $(this).attr('data-row');
                $('.billing-total-' + row_number).val(Math.round(get_unit_total(row_number)));
                $('#invoiceSubTotal').val(Math.round(get_sub_total()));
                $('#invoiceNetTotal').val(Math.round(get_net_total()));
                $('#due_amount').val(Math.round(get_net_total()));
                $('#invoiceDue').text(Math.round(get_net_total()));
                $('#grand_total').val(Math.round(grandTotal()));
            });
            $(document).on('blur', '.billing-quantity', function() {
                var row_number = $(this).attr('data-row');
                $('.billing-total-' + row_number).val(Math.round(get_unit_total(row_number)));
                $('#invoiceSubTotal').val(Math.round(get_sub_total()));
                $('#invoiceNetTotal').val(Math.round(get_net_total()));
                $('#due_amount').val(Math.round(get_net_total()));
                $('#invoiceDue').text(Math.round(get_net_total()));
                $('#grand_total').val(Math.round(grandTotal()));
                // alert(grandTotal());
                // if (final_output > 0 && final_output != 0) {
                //     if (final_output > final_stock) {
                //         alert('Quantity is exceeded the stock limit');
                //         $('.qty_get').val(1);
                //     } else {
                //         $('.discount_get').val(0);
                //         $('.total_price_quantity_' + billing_row).val(Math.round(get_purchase_total(
                //             billing_row)));
                //         var new_billing_row = $(this).attr('data-row');
                //         var vat_rate = $('#vat_rate').val();
                //         var vat_amount = $('#vat_amount').val();
                //         $('.with_discount_' + new_billing_row).val(Math.round(get_grand_total(
                //             new_billing_row)));
                //         $('#invoiceSubTotal').val(get_sub_total());
                //         $('#productDiscount').val(Math.round(total_unit_price() - get_sub_total()));
                //         $('#vat_amount').val(Math.round(get_sub_total() * (vat_rate / 100)));
                //         $('#grand_total').val(Math.round((get_sub_total() * (vat_rate / 100)) +
                //             get_sub_total()));
                //     }
                // } else {
                //     alert('Quantity cannot be 0 or below 0');
                //     $('.qty_get').val('');
                // }
            });
            $(document).on('keyup', '.item_price', function() {
                var billing_row = $(this).attr('data-row');
                $('#paid_amount').val(0);
                $('#changed_amount').val(0);
                $('.discount_get').val(0);
                $('.total_price_quantity_' + billing_row).val(Math.round(get_purchase_total(billing_row)));
                var new_billing_row = $(this).attr('data-row');
                var vat_rate = $('#vat_rate').val();
                var vat_amount = $('#vat_amount').val();
                $('.with_discount_' + new_billing_row).val(Math.round(get_grand_total(new_billing_row)));
                $('#invoiceSubTotal').val(Math.round(get_sub_total()));
                $('#productDiscount').val(Math.round(total_unit_price() - get_sub_total()));
                $('#vat_amount').val(Math.round(get_sub_total() * (vat_rate / 100)));
                $('#grand_total').val(Math.round((get_sub_total() * (vat_rate / 100)) + get_sub_total()));
            });
            $(document).on('keyup', '.invoice-discount', function() {
                $('#invoiceNetTotal').val(Math.round(get_net_total()));
                $('#due_amount').val(Math.round(get_net_total()));
                $('#invoiceDue').text(Math.round(get_net_total()));
            });
            $(document).on('click', '.delete', function() {
                $("#add_form").trigger('reset');
            });
            $(document).on('keyup', '.discount_get', function() {
                var new_billing_row = $(this).attr('data-row');
                var vat_rate = $('#vat_rate').val();
                var vat_amount = $('#vat_amount').val();
                $('.with_discount_' + new_billing_row).val(Math.round(get_grand_total(new_billing_row)));
                $('#invoiceSubTotal').val(Math.round(get_sub_total()));
                $('#productDiscount').val(Math.round(total_unit_price() - get_sub_total()));
                $('#vat_amount').val(Math.round(get_sub_total() * (vat_rate / 100)));
                $('#grand_total').val(Math.round((get_sub_total() * (vat_rate / 100)) + get_sub_total()));
                //alert(get_grand_total(new_billing_row));
            });
            $(document).on('keyup', '#overall_discount', function() {
                var overall_discount = $(this).val();
                var vat_rate = $('#vat_rate').val();
                var vat_amount = $('#vat_amount').val();
                //var paid_amount = $('#paid_amount').val();
                //var grand_total = $('#grand_total').val();
                //$('#changed_amount').val(paid_amount - grand_total);
                $('#grand_total').val(grandTotal());
            });
            $(document).on('keyup', '#paid_amount', function() {
                var paid_amount = $('#paid_amount').val();
                var grand_total = $('#grand_total').val();
                $('#changed_amount').val(Math.round(paid_amount - grand_total));
            });
        });

        function get_unit_total(row_number) {
            var charge = $('.billing-charge-' + row_number).val();

            charge = charge.replace(/\,/g, '');
            charge = parseInt(charge, 10);
            var chargeR = parseInt(charge) || 0;

            // alert()


            var extras = $('.billing-extras-' + row_number).val();

            // alert(unitPrice);
            extras = extras.replace(/\,/g, '');
            extras = parseInt(extras, 10);
            var extrasR = parseInt(extras) || 0;


            var billingQnty = $('.billing-quantity-' + row_number).val();
            billingQnty = billingQnty.replace(/\,/g, '');
            billingQnty = parseInt(billingQnty, 10);
            var billingQntyR = parseInt(billingQnty) || 0;
            if (billingQntyR) {
                var totalPrice = (parseInt(chargeR) + parseInt(extrasR)) * parseInt(billingQntyR);
            } else {
                var totalPrice = (parseInt(chargeR) + parseInt(extrasR));
            }

            // alert(parseInt(chargeR) + parseInt(extrasR));
            return parseInt(totalPrice);
        }

        function get_sub_total() {
            var inputs_product_total = $('.billing-single-total');
            var unitPrice = 0;
            for (var i = 0; i < inputs_product_total.length; i++) {
                var getValue = $(inputs_product_total[i]).val();
                var num = getValue.replace(/\,/g, '');
                num = parseInt(num, 10);
                if (!isNaN(num)) {
                    unitPrice += num;
                }
            }
            return parseInt(unitPrice);
        }

        function total_unit_price() {
            var inputs_product_total = $('.total_unit_price');
            var unitPrice = 0;
            for (var i = 0; i < inputs_product_total.length; i++) {
                var getValue = $(inputs_product_total[i]).val();
                var num = getValue.replace(/\,/g, '');
                num = parseInt(num, 10);
                if (!isNaN(num)) {
                    unitPrice += num;
                }
            }
            return parseInt(unitPrice);
        }

        function get_net_total() {
            var inputs_product_total = $('.billing-single-total');
            var unitPrice = 0;
            for (var i = 0; i < inputs_product_total.length; i++) {
                var getValue = $(inputs_product_total[i]).val();
                var num = getValue.replace(/\,/g, '');
                num = parseInt(num, 10);
                if (!isNaN(num)) {
                    unitPrice += num;
                }
            }
            return parseInt(unitPrice);
            // var invoiceDiscount = $('#overall_discount').val();
            // // alert(invoiceDiscount);
            // invoiceDiscount = invoiceDiscount.replace(/\,/g, '');
            // invoiceDiscount = parseInt(invoiceDiscount, 10);
            // var invoiceDiscountR = parseInt(invoiceDiscount) || 0;
            // var netTotal = parseInt(unitPrice) - invoiceDiscountR;
            // return parseInt(netTotal);
        }


        var billing_row = document.querySelectorAll('.billing-details-row').length + 1;


        var new_billing_row = document.querySelectorAll('.billing-details-row').length + 1;

        function grandTotal() {

            let netTotal = get_sub_total();

            let vat_amount = $('#vat_amount').val();
            // alert(vat_amount);

            var invoiceDiscount = $('#overall_discount').val();
            // alert(invoiceDiscount);
            invoiceDiscount = invoiceDiscount.replace(/\,/g, '');
            invoiceDiscount = parseInt(invoiceDiscount, 10);
            var invoiceDiscountR = parseInt(invoiceDiscount) || 0;

            let grandTotal = (netTotal + vat_amount) - invoiceDiscountR;
            return grandTotal;
            // return get_sub_total;
        }

        $("#add_form").submit(function(e) {
            e.preventDefault();
            $(".loader").show();
            $(".error_msg").html('');
            var data = new FormData($('#add_form')[0]);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "POST",
                url: "{{ url('invoice') }}",
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data, textStatus, jqXHR) {
                     window.location.href = "{{ url('invoice') }}";
                    // alert(data);
                    // $('#InvoiceButtonArea').hide();
                    // $('#InvoiceSkipButtonArea').show();
                    //$('#checkMoneyReceipt').html(data);
                }
            }).done(function() {
                $("#success_msg").html("Data Saved Successfully");
                window.location.href = "{{ url('invoice') }}";
                // location.reload();
            }).fail(function(data, textStatus, jqXHR) {
                $(".loader").hide();
                var json_data = JSON.parse(data.responseText);
                $.each(json_data.errors, function(key, value) {
                    $("#" + key).after(
                        "<span class='error_msg' style='color: red;font-weigh: 600'>" + value +
                        "</span>");
                });
            });
            $(".loader").hide();
        });
    </script>
@endsection
