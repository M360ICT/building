@extends('home')
@section('content')

<style>
    span.select2.select2-container.select2-container--default{
        width: 450px !important;
    }
    .hide{
        display: none;
    }
    #valid-msg{
        color: green;
    }
    #error-msg{
        color: red;
    }
</style>
<div class="container">
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Add Payment</h4>
            
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form id="add_form" autocomplete="off">
                <div class="row">
         
<h3>Your Due Amount is TK. {{get_flat_owner_current_balance_by_flat_owner_id(Auth::user()->id)}}</h3>
<br>
<br>
<br>
        <div class="col-lg-3 col-sm-12">
                                        <span class="float-label">
                                            <label for="exampleFormControlSelect1">Select Invoice</label>
                                            <select class="form-control form-control-lg" id="invoice_id"
                                                name="invoice_id">
                                                <option disabled selected>Select Invoice</option>
                                                @foreach($invoices as $row)
                                                <option value="{{$row->id}}">{{$row->invoice_no}}</option>
                                                @endforeach
                                            </select>
                                        </span>
                                        <input type="hidden" id="hiddenAccId" name="expense_account">
                                    </div>
                                <div class="col-lg-3 col-sm-12">
                                        <span class="float-label">
                                            <label for="warehouse">Amount to pay</label>
                                            <input type="text" class="form-control form-control-lg" id="amount"
                                                placeholder="Enter Amount" name="amount">

                                            <input type="hidden" class="form-control form-control-lg" id="hidden_flat_owner_id"
                                                placeholder="Brnach" name="hidden_flat_owner_id" value="{{Auth::user()->id}}"> </span>
                                    </div>

<br>
<br>
                <button class="btn btn-primary btn-lg btn-block" id="sslczPayBtn"
                        token="if you have any token validation"
                        postdata="your javascript arrays or objects which requires in backend"
                        order="If you already have the transaction generated for current order"
                        endpoint="{{ url('/pay-via-ajax') }}"> Pay Now
                </button>

                <br>
                <br>
                <br>

                <button type="button" id="add_btn" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    
    
</div>
</div>
<!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>-->


<!-- If you want to use the popup integration, -->
<script>
    
    $('#payment_amount').keyup(function(){
     var obj = {};
    obj.amount = $('#amount').val();
    $('#sslczPayBtn').prop('postdata', obj);   
    });
</script>
   <script>
    (function (window, document) {
        var loader = function () {
            var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
            script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7);
            tag.parentNode.insertBefore(script, tag);
        };

        window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
    })(window, document);
</script>
<script>
    $("#add_btn").click(function (){
        $('.loader').show();
        $(".error_msg").html('');
        var data = new FormData($('#add_form')[0]);
        
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: "POST",
            url: "{{url("flat-owner-payment")}}",
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data, textStatus, jqXHR) {
                
            }
        }).done(function() {
            $("#success_msg").html("Data Save Successfully");
            window.location.href = "{{ url('list-of-payment-request')}}";
            // window.location.reload();
        }).fail(function(data, textStatus, jqXHR) {
            var json_data = JSON.parse(data.responseText);
            $.each(json_data.errors, function(key, value){
                $("#" + key).after("<span class='error_msg' style='color: red;font-weigh: 600'>" + value + "</span>");
            });
        });
       $('.loader').hide(); 
    });
  </script>


@endsection


