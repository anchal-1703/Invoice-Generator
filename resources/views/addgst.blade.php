@extends('layout.app')

@section('content')
<div class="container-fluid overflow-scroll">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title font-weight-bold"> CREATE GST BILL </h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!--Include alert file-->
                    @include('alert')

                    <h4 class="header-title text-uppercase">Invoice Basic Info</h4>
                    <hr>
                    <form action="{{ route('create-gst-bill') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label>Party</label>
                                    <select class="form-control border-bottom" name="party_id" id="validationCustom01">
                                        <option value="">Please select</option>
                                        @foreach($parties as $party)
                                        <option value="{{ $party->id }}">{{ $party->full_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label>Invoice Date</label>
                                    <input type="date" name="invoice_date" class="form-control border-bottom" id="invoice_date">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label>Invoice Number</label>
                                    <input type="text" name="invoice_no" class="form-control border-bottom" id="validationCustom02" placeholder="Enter Invoice number" value="">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <h4 class="header-title text-uppercase">Item Details</h4>
                                <hr>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8 border p-1 text-center">
                                <b>DESCRIPTIONS</b>
                            </div>
                            <div class="col-md-4 border p-1 text-center">
                                <b>TOTAL AMOUNT</b>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-8 border p-2">
                                <input class="form-control" name="item_description" />
                            </div>
                            <div class="col-md-4 border p-2">
                                <input class="form-control" type="text" name="total_amount" id="totalAmountInput" oninput="calculateNetAmount()">
                            </div>
                        </div>

                        <div class="row mt-0">
                            <div class="col-md-3">
                                <label>CGST (%)</label>
                                <input type="text" class="form-control border-bottom" placeholder="CGST Rate" name="cgst_rate" id="cgst" oninput="calculateNetAmount()">
                                <span class="float-right gststyle" id="cgstDisplay">0</span>
                                <input type="hidden" id="cgstAmount" name="cgst_amount" value="0">
                            </div>

                            <div class="col-md-3">
                                <label>SGST (%)</label>
                                <input type="text" class="form-control border-bottom" placeholder="SGST Rate" name="sgst_rate" id="sgst" oninput="calculateNetAmount()">
                                <span class="float-right gststyle" id="sgstDisplay">0</span>
                                <input type="hidden" id="sgstAmount" name="sgst_amount" value="0">
                            </div>

                            <div class="col-md-3">
                                <label>IGST (%)</label>
                                <input type="text" class="form-control border-bottom" placeholder="IGST Rate" name="igst_rate" id="igst" oninput="calculateNetAmount()">
                                <span class="float-right gststyle" id="igstDisplay">0</span>
                                <input type="hidden" id="igstAmount" name="igst_amount" value="0">
                            </div>

                            <div class="col-md-3">
                                <ul style="list-style: none;float: right;">
                                    <li>
                                        <b>Total Amount:</b> ₹ <span type="text" id="totalAmountDisplay">0</span>
                                    </li>
                                    <li>
                                        <b>Tax:</b> ₹ <span type="text" id="taxDisplay">0</span>
                                        <input type="hidden" value="0" name="tax_amount" id="taxAmount">
                                    </li>
                                    <li>
                                        <b>Net Amount:</b> ₹ <span type="text" id="netAmountDisplay">0</span>
                                        <input type="hidden" value="0" name="net_amount" id="netAmount">
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label>Party</label>
                                    <select class="form-control border-bottom" name="payment_method" id="validationCustom01">
                                        <option value="">Please select</option>
                                        
                                        <option value="UPI Payment">UPI Payment</option>
                                        <option value="Cash Payment">Cash Payment</option>
                                        <option value="Credit/Debit card">Credit/Debit card</option>
                                      
                                    </select>
                                </div>
                            </div>

                        <div class="col md-8">
                                                 
                                <div class="form-group">    
                                <label>Declaration</label>                               
                                    <input type="text" style="height: 50px;" name="declaration" class="form-control border-bottom" id="validationCustom05" placeholder="Declaration" value="We hereby solemnly affirm that the above information is correct to the best of my knowledge and belief. I/We shall be severally responsible for violation of CGST Rules and liable for action, if any, due to non-issuance of e-Invoice.
                                    <b>Disclaimer</b>
                                    Taxpayers are advised to verify their eligibility criteria and category of exemption before filing the above declaration. Any discrepancy in the declaration form will be liable for action as per the provisions of the CGST Act and the Rules/Notifications specified therein. GSTN shall not be responsible for any incorrect information provided or declared by the taxpayer for non-issuance of e-Invoice.">
                                </div>
                                
                                <button type="submit" class="btn btn-primary float-right mb-2">SUBMIT</button>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection