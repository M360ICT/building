@extends('homeone')
@section('content')
@inject('dashboard','App\Models\Dashboard\Dashboard')
<?php
$abc = $dashboard->get_today_profit();
// echo '<pre>';print_r($abc);die;
?>
<!--<div class="page-toolbar px-xl-4 px-sm-2 px-0 py-3">
    <div class="container-fluid">
        <div class="row g-3 mb-3 align-items-center">
            <div class="col">
                <ol class="breadcrumb bg-transparent mb-0">
                    <li class="breadcrumb-item"><a class="text-secondary" href="index.html">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
            </div>
        </div>  .row end 
        <div class="row align-items-center">
            <div class="col">
                <h1 class="fs-5 color-900 mt-1 mb-0">Welcome back, {{Auth::user()->name}}!</h1>
                <small class="text-muted">You have 12 new messages and 7 new notifications.</small>
            </div>
            <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-7 col-sm-12 mt-2 mt-md-0">
                <div>Building 360 Logo Here</div>
                 daterange picker 
                <div class="input-group">
                    <input class="form-control" type="text" name="daterange">
                    <button class="btn btn-secondary" type="button" data-bs-toggle="tooltip" title="Send Report"><i
                            class="fa fa-envelope"></i></button>
                    <button class="btn btn-secondary" type="button" data-bs-toggle="tooltip" title="Download Reports"><i
                            class="fa fa-download"></i></button>
                    <button class="btn btn-secondary" type="button" data-bs-toggle="tooltip" title="Generate PDF"><i
                            class="fa fa-file-pdf-o"></i></button>
                    <button class="btn btn-secondary" type="button" data-bs-toggle="tooltip" title="Share Dashboard"><i
                            class="fa fa-share-alt"></i></button>
                </div>
           
      
            </div>
        </div>  .row end 
    </div>
</div>
 start: page body 
<div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
    <div class="container-fluid">
        <div class="row g-3 row-deck">
            <div class="col-lg-8 col-md-12">
                <div class="row g-3">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body d-flex align-items-center">
                                <div class="avatar lg rounded-circle no-thumbnail"><i
                                        class="fa fa-shopping-cart fa-lg"></i></div>
                                <div class="flex-fill ms-3 text-truncate">
                                    <div class="text-muted">Today Sales</div>
                                    <h5 class="mb-0">TK. {{$dashboard->get_today_sales()}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body d-flex align-items-center">
                                <div class="avatar lg rounded-circle no-thumbnail"><i
                                        class="fa fa-credit-card fa-lg"></i></div>
                                <div class="flex-fill ms-3 text-truncate">
                                    <div class="text-muted">Today Expense</div>
                                    <h5 class="mb-0">Tk. {{$dashboard->get_today_expense()}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body d-flex align-items-center">
                                <div class="avatar lg rounded-circle no-thumbnail"><i
                                        class="fa fa-credit-card fa-lg"></i></div>
                                <div class="flex-fill ms-3 text-truncate">
                                    <div class="text-muted">Today Sales Profit</div>
                                    <h5 class="mb-0">TK. {{$dashboard->get_today_sales_profit()}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="card-title m-0">Sales Statistics</h6>
                                <div class="dropdown morphing scale-left">
                                    <a href="#" class="card-fullscreen" data-bs-toggle="tooltip"
                                        title="Card Full-Screen"><i class="icon-size-fullscreen"></i></a>
                                    <a href="#" class="more-icon dropdown-toggle" data-bs-toggle="dropdown"
                                        aria-expanded="false"><i class="fa fa-ellipsis-h"></i></a>
                                    <ul class="dropdown-menu shadow border-0 p-2">
                                        <li><a class="dropdown-item" href="#">File Info</a></li>
                                        <li><a class="dropdown-item" href="#">Copy to</a></li>
                                        <li><a class="dropdown-item" href="#">Move to</a></li>
                                        <li><a class="dropdown-item" href="#">Rename</a></li>
                                        <li><a class="dropdown-item" href="#">Block</a></li>
                                        <li><a class="dropdown-item" href="#">Delete</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="ac-line-transparent" id="apex-NetSales"></div>
                            </div>
                        </div>  .card end 
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title m-0">Your Balance
                        <br>
                        <br>
                        TK. {{get_current_user_balance()}}
                        </h6>
                        <div class="dropdown morphing scale-left">
                            <a href="#" class="card-fullscreen" data-bs-toggle="tooltip" title="Card Full-Screen"><i
                                    class="icon-size-fullscreen"></i></a>
                            <a href="#" class="more-icon dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false"><i class="fa fa-ellipsis-h"></i></a>
                            <ul class="dropdown-menu shadow border-0 p-2">
                                <li><a class="dropdown-item" href="#">File Info</a></li>
                                <li><a class="dropdown-item" href="#">Copy to</a></li>
                                <li><a class="dropdown-item" href="#">Move to</a></li>
                                <li><a class="dropdown-item" href="#">Rename</a></li>
                                <li><a class="dropdown-item" href="#">Block</a></li>
                                <li><a class="dropdown-item" href="#">Delete</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="bg-secondary text-light p-4 d-flex flex-wrap text-center">
                        <div class="px-2 flex-fill">
                            <span class="small">Sales</span>
                            <h5 class="mb-0">TK. {{$dashboard->get_this_month_sales()}}</h5>
                        </div>
                        <div class="px-2 flex-fill">
                            <span class="small">Expense</span>
                            <h5 class="mb-0">TK. {{$dashboard->get_this_month_expense()}}</h5>
                        </div>
                        <div class="px-2 flex-fill">
                            <span class="small">Profit</span>
                            <h5 class="mb-0">TK. {{$dashboard->get_this_month_expense()}}</h5>
                        </div>
                        <div class="px-2 flex-fill">
                            <span class="small">Last Sale</span>
                            <h5 class="mb-0">150</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="apex-Tickets"></div>
                    </div>
                </div>  .card end 
            </div>
            
            
            
                  <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body d-flex align-items-center">
                                <div class="avatar lg rounded-circle no-thumbnail"><i
                                        class="fa fa-shopping-cart fa-lg"></i></div>
                                <div class="flex-fill ms-3 text-truncate">
                                    <div class="text-muted">This Month Sales</div>
                                    <h5 class="mb-0">TK. {{$dashboard->get_this_month_sales()}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body d-flex align-items-center">
                                <div class="avatar lg rounded-circle no-thumbnail"><i
                                        class="fa fa-credit-card fa-lg"></i></div>
                                <div class="flex-fill ms-3 text-truncate">
                                    <div class="text-muted">This Month Expense</div>
                                    <h5 class="mb-0">Tk. {{$dashboard->get_this_month_expense()}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body d-flex align-items-center">
                                <div class="avatar lg rounded-circle no-thumbnail"><i
                                        class="fa fa-credit-card fa-lg"></i></div>
                                <div class="flex-fill ms-3 text-truncate">
                                    <div class="text-muted">This Month Sales Profit</div>
                                    <h5 class="mb-0">TK. {{$dashboard->get_this_month_sales_profit()}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body d-flex align-items-center">
                                <div class="avatar lg rounded-circle no-thumbnail"><i
                                        class="fa fa-credit-card fa-lg"></i></div>
                                <div class="flex-fill ms-3 text-truncate">
                                    <div class="text-muted">This Month Net Profit</div>
                                    <h5 class="mb-0">TK. {{$dashboard->get_this_month_net_profit()}}</h5>
                                </div>
                                
                            </div>
                        </div>
                    </div>
            
            
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title m-0">Eventchamp Speakers</h6>
                        <div class="dropdown morphing scale-left">
                            <a href="#" class="card-fullscreen" data-bs-toggle="tooltip" title="Card Full-Screen"><i
                                    class="icon-size-fullscreen"></i></a>
                            <a href="#" class="more-icon dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false"><i class="fa fa-ellipsis-h"></i></a>
                            <ul class="dropdown-menu shadow border-0 p-2">
                                <li><a class="dropdown-item" href="#">File Info</a></li>
                                <li><a class="dropdown-item" href="#">Copy to</a></li>
                                <li><a class="dropdown-item" href="#">Move to</a></li>
                                <li><a class="dropdown-item" href="#">Rename</a></li>
                                <li><a class="dropdown-item" href="#">Block</a></li>
                                <li><a class="dropdown-item" href="#">Delete</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex">
                            <img class="avatar rounded-circle" src="{{url("public/assets")}}/img/xs/avatar2.jpg" alt="">
                            <div class="flex-fill ms-3">
                                <div class="h6 mb-0"><span>Chris Fox</span></div>
                                <small class="text-muted">UI UX Designer - NY USA</small>
                            </div>
                        </div>
                        <div class="d-flex mt-4">
                            <img class="avatar rounded-circle" src="{{url("public/assets")}}/img/xs/avatar1.jpg" alt="">
                            <div class="flex-fill ms-3">
                                <div class="h6 mb-0"><span>Joge Lucky</span></div>
                                <small class="text-muted">UI UX Designer - NY USA</small>
                            </div>
                        </div>
                        <div class="d-flex mt-4">
                            <img class="avatar rounded-circle" src="{{url("public/assets")}}/img/xs/avatar3.jpg" alt="">
                            <div class="flex-fill ms-3">
                                <div class="h6 mb-0"><span>Alexander</span></div>
                                <small class="text-muted">React Developer - NY USA</small>
                            </div>
                        </div>
                        <div class="d-flex mt-4">
                            <img class="avatar rounded-circle" src="{{url("public/assets")}}/img/xs/avatar8.jpg" alt="">
                            <div class="flex-fill ms-3">
                                <div class="h6 mb-0"><span>Robert</span></div>
                                <small class="text-muted">Angular Master - NY USA</small>
                            </div>
                        </div>
                        <div class="d-flex mt-4">
                            <img class="avatar rounded-circle" src="{{url("public/assets")}}/img/xs/avatar6.jpg" alt="">
                            <div class="flex-fill ms-3">
                                <div class="h6 mb-0"><span>Nellie</span></div>
                                <small class="text-muted">UI UX Designer - NY USA</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title mb-0">Recent Sells</h6>
                        <div class="dropdown morphing scale-left">
                            <a href="#" class="card-fullscreen" data-bs-toggle="tooltip" title="Card Full-Screen"><i
                                    class="icon-size-fullscreen"></i></a>
                            <a href="#" class="more-icon dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false"><i class="fa fa-ellipsis-h"></i></a>
                            <ul class="dropdown-menu shadow border-0 p-2">
                                <li><a class="dropdown-item" href="#">File Info</a></li>
                                <li><a class="dropdown-item" href="#">Copy to</a></li>
                                <li><a class="dropdown-item" href="#">Move to</a></li>
                                <li><a class="dropdown-item" href="#">Rename</a></li>
                                <li><a class="dropdown-item" href="#">Block</a></li>
                                <li><a class="dropdown-item" href="#">Delete</a></li>
                            </ul>
                        </div>
                    </div>
                    <table id="myDataTable_no_filter" class="table align-middle mb-0 card-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Peoples</th>
                                <th>Venues</th>
                                <th>Seat</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>A0098</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{url("public/assets")}}/img/xs/avatar1.jpg"
                                            class="rounded-circle sm avatar" alt="">
                                        <div class="ms-2 mb-0">Marshall Nichols</div>
                                    </div>
                                </td>
                                <td>123 6th St. Melbourne, FL 32904</td>
                                <td>X1</td>
                                <td>
                                    <button type="button" class="btn btn-link btn-sm text-muted"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Send Video"><i
                                            class="fa fa-envelope"></i></button>
                                    <button type="button" class="btn btn-link btn-sm text-muted"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Download"><i
                                            class="fa fa-download"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>A0088</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{url("public/assets")}}/img/xs/avatar2.jpg"
                                            class="rounded-circle sm avatar" alt="">
                                        <div class="ms-2 mb-0">Nellie Maxwell</div>
                                    </div>
                                </td>
                                <td>4 Shirley Ave. West Chicago, IL 60185</td>
                                <td>X1</td>
                                <td>
                                    <button type="button" class="btn btn-link btn-sm text-muted"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Send Video"><i
                                            class="fa fa-envelope"></i></button>
                                    <button type="button" class="btn btn-link btn-sm text-muted"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Download"><i
                                            class="fa fa-download"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>A0067</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{url("public/assets")}}/img/xs/avatar3.jpg"
                                            class="rounded-circle sm avatar" alt="">
                                        <div class="ms-2 mb-0">Chris Fox</div>
                                    </div>
                                </td>
                                <td>70 Bowman St. South Windsor, CT 06074</td>
                                <td>X2</td>
                                <td>
                                    <button type="button" class="btn btn-link btn-sm text-muted"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Send Video"><i
                                            class="fa fa-envelope"></i></button>
                                    <button type="button" class="btn btn-link btn-sm text-muted"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Download"><i
                                            class="fa fa-download"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>A0045</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{url("public/assets")}}/img/xs/avatar1.jpg"
                                            class="rounded-circle sm avatar" alt="">
                                        <div class="ms-2 mb-0">Marshall Nichols</div>
                                    </div>
                                </td>
                                <td>123 6th St. Melbourne, FL 32904</td>
                                <td>X1</td>
                                <td>
                                    <button type="button" class="btn btn-link btn-sm text-muted"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Send Video"><i
                                            class="fa fa-envelope"></i></button>
                                    <button type="button" class="btn btn-link btn-sm text-muted"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Download"><i
                                            class="fa fa-download"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>A0067</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{url("public/assets")}}/img/xs/avatar8.jpg"
                                            class="rounded-circle sm avatar" alt="">
                                        <div class="ms-2 mb-0">Chris Fox</div>
                                    </div>
                                </td>
                                <td>70 Bowman St. South Windsor, CT 06074</td>
                                <td>X2</td>
                                <td>
                                    <button type="button" class="btn btn-link btn-sm text-muted"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Send Video"><i
                                            class="fa fa-envelope"></i></button>
                                    <button type="button" class="btn btn-link btn-sm text-muted"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Download"><i
                                            class="fa fa-download"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>  .card end 
            </div>
        </div>  .row end 
    </div>
</div>-->
    <!-- start: page body -->
    <div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
      <div class="container-fluid">
        <div class="row g-3 row-deck">
          <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-7">
            <div class="card border-0 bg-transparent">
              <div class="row g-3 row-deck">
                <div class="col-lg-3 col-md-6 col-sm-6">
                  <div class="card">
                    <div class="card-body">
                      <span class="text-uppercase">YOUR BALANCE</span>
                      <h4 class="mb-0 mt-2">TK. {{get_current_user_balance()}}</h4>
                      <small class="text-muted">Analytics for all transactions</small>
                    </div>
                    <div id="apexspark1"></div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                  <div class="card">
                    <div class="card-body">
                      <span class="text-uppercase">BOUNCE RATE</span>
                      <h4 class="mb-0 mt-2">10K</h4>
                      <small class="text-muted">Analytics for last week</small>
                    </div>
                    <div id="apexspark2"></div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                  <div class="card">
                    <div class="card-body">
                      <span class="text-uppercase">GOAL COMPLETIONS</span>
                      <h4 class="mb-0 mt-2">$1,22,500</h4>
                      <small class="text-muted">Analytics for last week</small>
                    </div>
                    <div id="apexspark3"></div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                  <div class="card bg-secondary text-light">
                    <div class="card-body">
                      <h4 class="mb-0">Hey {{Auth::user()->name}}, you're doing great.</h4>
                      <p>Start using our team and project management tools in your next project.</p>
                      <button class="btn px-4 text-uppercase bg-white" type="button">Documentation</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-5">
            <div class="card text-center wellcome-back" style="background-position: 100% 100%;background-size: 360px auto; background-repeat: no-repeat; background-image:url('./assets/img/hero-img1.svg')">
              <div class="card-body">
                <h4 class="card-title mt-4">Wellcome Back, {{Auth::user()->name}}!!</h4>
                <p class="card-text fs-6 mb-4">If you are going to use a passage of Lorem Ipsum, you need to be sure anything embarrassing.</p>
                <button class="btn btn-lg bg-secondary text-light text-uppercase" type="button">Update now</button>
              </div>
            </div>
          </div>
          <div class="col-xxl-9 col-xl-8 col-lg-8 col-md-12">
            <div class="card">
              <div class="card-header">
                <h6 class="card-title m-0">Audience Overview</h6>
                <div class="dropdown morphing scale-left">
                  <a href="#" class="card-fullscreen" data-bs-toggle="tooltip" title="Card Full-Screen"><i class="icon-size-fullscreen"></i></a>
                  <a href="#" class="more-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-h"></i></a>
                  <ul class="dropdown-menu shadow border-0 p-2">
                    <li><a class="dropdown-item" href="#">File Info</a></li>
                    <li><a class="dropdown-item" href="#">Copy to</a></li>
                    <li><a class="dropdown-item" href="#">Move to</a></li>
                    <li><a class="dropdown-item" href="#">Rename</a></li>
                    <li><a class="dropdown-item" href="#">Block</a></li>
                    <li><a class="dropdown-item" href="#">Delete</a></li>
                  </ul>
                </div>
              </div>
              <div class="card-body pt-0">
                <div class="px-4 py-3 d-flex flex-row align-items-center bg-light rounded-4">
                  <div>
                    <h6 class="mb-0 fw-bold">$3,056</h6>
                    <small class="text-muted">Rate</small>
                  </div>
                  <div class="ms-lg-5 ms-md-4 ms-3">
                    <h6 class="mb-0 fw-bold">$1,998</h6>
                    <small class="text-muted">Value</small>
                  </div>
                  <div class="d-none d-sm-block ms-auto">
                    <div class="btn-group" role="group">
                      <input type="radio" class="btn-check" name="btnradio" id="btnradio1">
                      <label class="btn btn-secondary" for="btnradio1">Week</label>
                      <input type="radio" class="btn-check" name="btnradio" id="btnradio2">
                      <label class="btn btn-secondary" for="btnradio2">Month</label>
                      <input type="radio" class="btn-check" name="btnradio" id="btnradio3" checked="">
                      <label class="btn btn-secondary" for="btnradio3">Year</label>
                    </div>
                  </div>
                </div>
                <div id="apex-AudienceOverview"></div>
              </div>
            </div>
          </div>
          <div class="col-xxl-3 col-xl-6 col-lg-12 col-md-6">
            <div class="row g-3 row-deck">
              <div class="col-xxl-12 col-xl-12 col-md-6 col-sm-6">
                <div class="card">
                  <div class="card-body">
                    <h6 class="card-title d-flex justify-content-between align-items-center">Connection Request<span class="badge bg-primary">20 min ago</span></h6>
                    <div class="d-flex align-items-center my-4">
                      <img class="avatar xl rounded" src="./assets/img/profile_av.png" alt="">
                      <div class="flex-fill ms-3">
                        <div class="h5 mb-1">Hossein Shams</div>
                        <span class="text-muted">21 mutual connections</span>
                        <span class="text-muted">Senior Go Developer at Facebook</span>
                      </div>
                    </div>
                    <div class="d-flex">
                      <a href="#" class="btn mx-1 btn-light-primary flex-grow-1"><i class="fa fa-check me-2"></i>Accept</a>
                      <a href="#" class="btn mx-1 btn-light-danger flex-grow-1"><i class="fa fa-close me-2"></i>Ignore</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xxl-12 col-xl-12 col-md-6 col-sm-6">
                <div class="card">
                  <div class="card-body d-flex align-items-center">
                    <i class="fa fa-google fa-2x"></i>
                    <div class="ms-3">
                      <h5 class="mb-0">Google Calendar</h5>
                    </div>
                  </div>
                  <div class="card-body">
                    <p class="text-muted">See your teams availability while scheduling meeting and interviews. <a href="#">Learn more...</a></p>
                    <div class="btn-group mt-3">
                      <input type="radio" class="btn-check" name="gc-btnradio" id="gc-btnradio1" checked="">
                      <label class="btn btn-outline-primary" for="gc-btnradio1">Enabled</label>
                      <input type="radio" class="btn-check" name="gc-btnradio" id="gc-btnradio2">
                      <label class="btn btn-outline-primary" for="gc-btnradio2">Disabled</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xxl-3 col-xl-6 col-lg-4 col-md-6">
            <div class="card">
              <div class="card-header">
                <h6 class="card-title mb-0">Sessions by Device</h6>
              </div>
              <div class="card-body">
                <div class="bg-light rounded-4 d-flex text-center">
                  <div class="p-2 flex-fill">
                    <span class="text-muted">Desktop</span>
                    <h5>1.08K</h5>
                    <small class="text-success"><i class="fa fa-angle-up"></i> 1.03%</small>
                  </div>
                  <div class="p-2 flex-fill">
                    <span class="text-muted">Mobile</span>
                    <h5>3.20K</h5>
                    <small class="text-danger"><i class="fa fa-angle-down"></i> 1.63%</small>
                  </div>
                  <div class="p-2 flex-fill">
                    <span class="text-muted">Tablet</span>
                    <h5>8.18K</h5>
                    <small class="text-success"><i class="fa fa-angle-up"></i> 4.33%</small>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div id="apex-SessionsbyDevice"></div>
              </div>
            </div>
          </div>
          <div class="col-xxl-6 col-xl-12 col-lg-8 col-md-12">
            <div class="card">
              <div class="card-header">
                <h6 class="card-title m-0">Social Media Traffic</h6>
                <div class="dropdown morphing scale-left">
                  <button class="btn btn-sm btn-link text-muted d-none d-sm-inline-block" type="button"><i class="fa fa-download"></i></button>
                  <button class="btn btn-sm btn-link text-muted d-none d-sm-inline-block" type="button"><i class="fa fa-external-link"></i></button>
                  <a href="#" class="more-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-h"></i></a>
                  <ul class="dropdown-menu shadow border-0 p-2">
                    <li><a class="dropdown-item" href="#">File Info</a></li>
                    <li><a class="dropdown-item" href="#">Copy to</a></li>
                    <li><a class="dropdown-item" href="#">Move to</a></li>
                    <li><a class="dropdown-item" href="#">Rename</a></li>
                    <li><a class="dropdown-item" href="#">Block</a></li>
                    <li><a class="dropdown-item" href="#">Delete</a></li>
                  </ul>
                </div>
              </div>
              <div class="card-body">
                <div id="apex-SocialMediaTraffic"></div>
              </div>
            </div>
          </div>
        </div> <!-- .row end -->
      </div>
    </div>
@endsection