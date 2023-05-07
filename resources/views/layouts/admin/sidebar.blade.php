  <!-- start: sidebar -->

  <style>
      .active-sidebar-module {
          background: #721172
      }
  </style>

  <div class="sidebar p-2 py-md-3 @@cardClass">
      <div class="container-fluid">
          <!-- sidebar: title-->
          <div class="title-text d-flex align-items-center mb-4 mt-1">
              <h4 class="sidebar-title mb-0 flex-grow-1"><span class="sm-txt">BUILD</span><span>ING 360</span></h4>
              <div class="dropdown morphing scale-left">
                  <a class="dropdown-toggle more-icon" href="#" role="button" data-bs-toggle="dropdown"><i
                          class="fa fa-ellipsis-h"></i></a>
                  <ul class="dropdown-menu shadow border-0 p-2 mt-2" data-bs-popper="none">
                      <li class="fw-bold px-2">Quick Actions</li>
                      <li>
                          <hr class="dropdown-divider">
                      </li>
                      <li><a class="dropdown-item" href="./landing/index.html" aria-current="page">Landing page</a></li>
                      <li><a class="dropdown-item" href="./inventory/index.html">Inventory</a></li>
                      <li><a class="dropdown-item" href="./ecommerce/index.html">eCommerce</a></li>
                      <li><a class="dropdown-item" href="./hrms/index.html">HRMS</a></li>
                      <li>
                          <hr class="dropdown-divider">
                      </li>
                      <li><a class="dropdown-item" href="./account-invoices.html">Invoices List</a></li>
                      <li><a class="dropdown-item" href="./account-create-invoices.html">Create Invoices</a></li>
                  </ul>
              </div>
          </div>
          <!-- sidebar: Create new -->
          <div class="create-new py-3 mb-2">
              <div class="d-flex">
                  <select class="form-select rounded-pill me-1">
                      <option selected>Select Project</option>
                      <option value="1">Luno University</option>
                      <option value="2">Book Manager</option>
                      <option value="3">Luno Sass App</option>
                  </select>
                  <button class="btn bg-primary text-white rounded-circle" data-bs-toggle="modal"
                      data-bs-target="#CreateNew" type="button"><i class="fa fa-plus"></i></button>
              </div>
          </div>
          <!-- sidebar: menu list -->
          <div class="main-menu flex-grow-1">
              <ul class="menu-list">
                  <li class="active-sidebar-module">
                      <a class="m-link active" href="{{ url('/home') }}">
                          <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor"
                              viewBox="0 0 16 16">
                              <path fill-rule="evenodd"
                                  d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                              <path class="fill-secondary" fill-rule="evenodd"
                                  d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                          </svg>
                          <span class="ms-2">My Dashboard</span>
                      </a>
                  </li>
                  <li class="collapsed">
                      <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-Applications" href="#">
                          <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor"
                              viewBox="0 0 16 16">
                              <path
                                  d="M5.5 2A3.5 3.5 0 0 0 2 5.5v5A3.5 3.5 0 0 0 5.5 14h5a3.5 3.5 0 0 0 3.5-3.5V8a.5.5 0 0 1 1 0v2.5a4.5 4.5 0 0 1-4.5 4.5h-5A4.5 4.5 0 0 1 1 10.5v-5A4.5 4.5 0 0 1 5.5 1H8a.5.5 0 0 1 0 1H5.5z" />
                              <path class="fill-secondary" d="M16 3a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                          </svg>
                          <span class="ms-2">Invoice</span>
                          <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                      </a>

                      <ul class="sub-menu collapse" id="menu-Applications">
                          @if (Auth::user()->type == 'ASSOCIATION' || Auth::user()->type == 'FLAT_OWNER')
                              <li><a class="ms-link" href="{{ url('invoice/create') }}">Create Invoice</a></li>
                          @endif
                          <li><a class="ms-link" href="{{ url('invoice') }}">List of Invoice</a></li>
                      </ul>
                  </li>
                  @if (Auth::user()->type == 'ASSOCIATION' || Auth::user()->type == 'FLAT_OWNER')
                      <li class="collapsed">
                          <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-Account" href="#">
                              <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor"
                                  viewBox="0 0 16 16">
                                  <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M2 1C1.46957 1 0.960859 1.21071 0.585786 1.58579C0.210714 1.96086 0 2.46957 0 3L0 13C0 13.5304 0.210714 14.0391 0.585786 14.4142C0.960859 14.7893 1.46957 15 2 15H14C14.5304 15 15.0391 14.7893 15.4142 14.4142C15.7893 14.0391 16 13.5304 16 13V3C16 2.46957 15.7893 1.96086 15.4142 1.58579C15.0391 1.21071 14.5304 1 14 1H2ZM1 3C1 2.73478 1.10536 2.48043 1.29289 2.29289C1.48043 2.10536 1.73478 2 2 2H14C14.2652 2 14.5196 2.10536 14.7071 2.29289C14.8946 2.48043 15 2.73478 15 3V13C15 13.2652 14.8946 13.5196 14.7071 13.7071C14.5196 13.8946 14.2652 14 14 14H2C1.73478 14 1.48043 13.8946 1.29289 13.7071C1.10536 13.5196 1 13.2652 1 13V3ZM2 5.5C2 5.36739 2.05268 5.24021 2.14645 5.14645C2.24021 5.05268 2.36739 5 2.5 5H6C6.13261 5 6.25979 5.05268 6.35355 5.14645C6.44732 5.24021 6.5 5.36739 6.5 5.5C6.5 5.63261 6.44732 5.75979 6.35355 5.85355C6.25979 5.94732 6.13261 6 6 6H2.5C2.36739 6 2.24021 5.94732 2.14645 5.85355C2.05268 5.75979 2 5.63261 2 5.5ZM2 8.5C2 8.36739 2.05268 8.24021 2.14645 8.14645C2.24021 8.05268 2.36739 8 2.5 8H6C6.13261 8 6.25979 8.05268 6.35355 8.14645C6.44732 8.24021 6.5 8.36739 6.5 8.5C6.5 8.63261 6.44732 8.75979 6.35355 8.85355C6.25979 8.94732 6.13261 9 6 9H2.5C2.36739 9 2.24021 8.94732 2.14645 8.85355C2.05268 8.75979 2 8.63261 2 8.5ZM2 10.5C2 10.3674 2.05268 10.2402 2.14645 10.1464C2.24021 10.0527 2.36739 10 2.5 10H6C6.13261 10 6.25979 10.0527 6.35355 10.1464C6.44732 10.2402 6.5 10.3674 6.5 10.5C6.5 10.6326 6.44732 10.7598 6.35355 10.8536C6.25979 10.9473 6.13261 11 6 11H2.5C2.36739 11 2.24021 10.9473 2.14645 10.8536C2.05268 10.7598 2 10.6326 2 10.5Z" />
                                  <path class="fill-secondary"
                                      d="M8.5 11C8.5 11 8 11 8 10.5C8 10 8.5 8.5 11 8.5C13.5 8.5 14 10 14 10.5C14 11 13.5 11 13.5 11H8.5ZM11 8C11.3978 8 11.7794 7.84196 12.0607 7.56066C12.342 7.27936 12.5 6.89782 12.5 6.5C12.5 6.10218 12.342 5.72064 12.0607 5.43934C11.7794 5.15804 11.3978 5 11 5C10.6022 5 10.2206 5.15804 9.93934 5.43934C9.65804 5.72064 9.5 6.10218 9.5 6.5C9.5 6.89782 9.65804 7.27936 9.93934 7.56066C10.2206 7.84196 10.6022 8 11 8V8Z" />
                              </svg>
                              <span class="ms-2">Receive Money</span>
                              <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                          </a>

                          <ul class="sub-menu collapse" id="menu-Account">
                              @if (Auth::user()->type == 'ASSOCIATION')
                                  <li><a class="ms-link" href="{{ url('money-receipt/create') }}">Receive Payment</a>
                                  </li>
                              @elseif(Auth::user()->type == 'FLAT_OWNER')
                                  <li><a class="ms-link"
                                          href="{{ url('money-receipt/create?user_type=FLAT_OWNER') }}">Receive
                                          Payment</a></li>
                              @endif
                              <li><a class="ms-link" href="{{ url('money-receipt') }}">Payment Voucher</a></li>
                          </ul>
                      </li>
                  @endif
                  @if (Auth::user()->type == 'ASSOCIATION' || Auth::user()->type == 'FLAT_OWNER')
                      <li class="collapsed">
                          <a class="m-link" data-bs-toggle="collapse" data-bs-target="#administration"
                              href="#">
                              <i class="bi bi-person-bounding-box"></i>
                              <span class="ms-2">Administration</span>
                              <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                          </a>

                          <ul class="sub-menu collapse" id="administration">
                              <li class="collapsed">
                                  <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu_User"
                                      href="#">
                                      <i class="bi bi-person-circle"></i>
                                      <span class="ms-2">User</span>
                                      <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                                  </a>

                                  <ul class="sub-menu collapse" id="menu_User">
                                      <li><a class="ms-link" href="{{ url('users/create') }}">Add User</a></li>
                                      <li><a class="ms-link" href="{{ url('users') }}">User List</a></li>

                                  </ul>
                              </li>


                              <li class="collapsed">
                                  <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu_Role"
                                      href="#">
                                      <i class="bi bi-person-check-fill"></i>
                                      <span class="ms-2">Role</span>
                                      <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                                  </a>

                                  <ul class="sub-menu collapse" id="menu_Role">
                                      <li><a class="ms-link" href="{{ url('roles/create') }}">Add Role</a></li>
                                      <li><a class="ms-link" href="{{ url('roles') }}">Role List</a></li>

                                  </ul>
                              </li>





                              <li class="collapsed">
                                  <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu_Permission"
                                      href="#">
                                      <i class="bi bi-person-lines-fill"></i>
                                      <span class="ms-2">Permission</span>
                                      <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                                  </a>

                                  <ul class="sub-menu collapse" id="menu_Permission">
                                      <li><a class="ms-link" href="{{ url('permissions/create') }}">Add
                                              Permission</a>
                                      </li>
                                      <li><a class="ms-link" href="{{ url('permissions') }}">Permission List</a></li>

                                  </ul>
                              </li>

                          </ul>
                      </li>
                  @endif
                  @if (Auth::user()->type == 'ASSOCIATION')
                      <li class="collapsed">
                          <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-Cashbook"
                              href="#">
                              <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor"
                                  viewBox="0 0 16 16">
                                  <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M2 1C1.46957 1 0.960859 1.21071 0.585786 1.58579C0.210714 1.96086 0 2.46957 0 3L0 13C0 13.5304 0.210714 14.0391 0.585786 14.4142C0.960859 14.7893 1.46957 15 2 15H14C14.5304 15 15.0391 14.7893 15.4142 14.4142C15.7893 14.0391 16 13.5304 16 13V3C16 2.46957 15.7893 1.96086 15.4142 1.58579C15.0391 1.21071 14.5304 1 14 1H2ZM1 3C1 2.73478 1.10536 2.48043 1.29289 2.29289C1.48043 2.10536 1.73478 2 2 2H14C14.2652 2 14.5196 2.10536 14.7071 2.29289C14.8946 2.48043 15 2.73478 15 3V13C15 13.2652 14.8946 13.5196 14.7071 13.7071C14.5196 13.8946 14.2652 14 14 14H2C1.73478 14 1.48043 13.8946 1.29289 13.7071C1.10536 13.5196 1 13.2652 1 13V3ZM2 5.5C2 5.36739 2.05268 5.24021 2.14645 5.14645C2.24021 5.05268 2.36739 5 2.5 5H6C6.13261 5 6.25979 5.05268 6.35355 5.14645C6.44732 5.24021 6.5 5.36739 6.5 5.5C6.5 5.63261 6.44732 5.75979 6.35355 5.85355C6.25979 5.94732 6.13261 6 6 6H2.5C2.36739 6 2.24021 5.94732 2.14645 5.85355C2.05268 5.75979 2 5.63261 2 5.5ZM2 8.5C2 8.36739 2.05268 8.24021 2.14645 8.14645C2.24021 8.05268 2.36739 8 2.5 8H6C6.13261 8 6.25979 8.05268 6.35355 8.14645C6.44732 8.24021 6.5 8.36739 6.5 8.5C6.5 8.63261 6.44732 8.75979 6.35355 8.85355C6.25979 8.94732 6.13261 9 6 9H2.5C2.36739 9 2.24021 8.94732 2.14645 8.85355C2.05268 8.75979 2 8.63261 2 8.5ZM2 10.5C2 10.3674 2.05268 10.2402 2.14645 10.1464C2.24021 10.0527 2.36739 10 2.5 10H6C6.13261 10 6.25979 10.0527 6.35355 10.1464C6.44732 10.2402 6.5 10.3674 6.5 10.5C6.5 10.6326 6.44732 10.7598 6.35355 10.8536C6.25979 10.9473 6.13261 11 6 11H2.5C2.36739 11 2.24021 10.9473 2.14645 10.8536C2.05268 10.7598 2 10.6326 2 10.5Z" />
                                  <path class="fill-secondary"
                                      d="M8.5 11C8.5 11 8 11 8 10.5C8 10 8.5 8.5 11 8.5C13.5 8.5 14 10 14 10.5C14 11 13.5 11 13.5 11H8.5ZM11 8C11.3978 8 11.7794 7.84196 12.0607 7.56066C12.342 7.27936 12.5 6.89782 12.5 6.5C12.5 6.10218 12.342 5.72064 12.0607 5.43934C11.7794 5.15804 11.3978 5 11 5C10.6022 5 10.2206 5.15804 9.93934 5.43934C9.65804 5.72064 9.5 6.10218 9.5 6.5C9.5 6.89782 9.65804 7.27936 9.93934 7.56066C10.2206 7.84196 10.6022 8 11 8V8Z" />
                              </svg>
                              <span class="ms-2">Cashbook</span>
                              <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                          </a>

                          <ul class="sub-menu collapse" id="menu-Cashbook">
                              <li><a class="ms-link" href="{{ url('accounts/create') }}">Add New Account</a></li>
                              <li><a class="ms-link" href="{{ url('accounts') }}">List of Account</a></li>
                              <li><a class="ms-link" href="{{ url('account/create-opening-balance') }}">Add New
                                      Opening
                                      Balance</a></li>
                              <li><a class="ms-link" href="{{ url('account-transfer/create') }}">Transfer Balance</a>
                              </li>
                              <li><a class="ms-link" href="{{ url('account-transfer') }}">Transfer History</a></li>
                              <li><a class="ms-link" href="{{ url('account/balance-statement') }}">Balance
                                      Statement</a>
                              </li>
                              <li><a class="ms-link" href="{{ url('account/non-invoice-income') }}">Non Invoice
                                      Amount</a></li>
                          </ul>
                      </li>
                  @endif
                  @if (Auth::user()->type == 'ASSOCIATION')
                      <li class="collapsed">
                          <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-Expenses"
                              href="#">
                              <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor"
                                  viewBox="0 0 16 16">
                                  <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M2 1C1.46957 1 0.960859 1.21071 0.585786 1.58579C0.210714 1.96086 0 2.46957 0 3L0 13C0 13.5304 0.210714 14.0391 0.585786 14.4142C0.960859 14.7893 1.46957 15 2 15H14C14.5304 15 15.0391 14.7893 15.4142 14.4142C15.7893 14.0391 16 13.5304 16 13V3C16 2.46957 15.7893 1.96086 15.4142 1.58579C15.0391 1.21071 14.5304 1 14 1H2ZM1 3C1 2.73478 1.10536 2.48043 1.29289 2.29289C1.48043 2.10536 1.73478 2 2 2H14C14.2652 2 14.5196 2.10536 14.7071 2.29289C14.8946 2.48043 15 2.73478 15 3V13C15 13.2652 14.8946 13.5196 14.7071 13.7071C14.5196 13.8946 14.2652 14 14 14H2C1.73478 14 1.48043 13.8946 1.29289 13.7071C1.10536 13.5196 1 13.2652 1 13V3ZM2 5.5C2 5.36739 2.05268 5.24021 2.14645 5.14645C2.24021 5.05268 2.36739 5 2.5 5H6C6.13261 5 6.25979 5.05268 6.35355 5.14645C6.44732 5.24021 6.5 5.36739 6.5 5.5C6.5 5.63261 6.44732 5.75979 6.35355 5.85355C6.25979 5.94732 6.13261 6 6 6H2.5C2.36739 6 2.24021 5.94732 2.14645 5.85355C2.05268 5.75979 2 5.63261 2 5.5ZM2 8.5C2 8.36739 2.05268 8.24021 2.14645 8.14645C2.24021 8.05268 2.36739 8 2.5 8H6C6.13261 8 6.25979 8.05268 6.35355 8.14645C6.44732 8.24021 6.5 8.36739 6.5 8.5C6.5 8.63261 6.44732 8.75979 6.35355 8.85355C6.25979 8.94732 6.13261 9 6 9H2.5C2.36739 9 2.24021 8.94732 2.14645 8.85355C2.05268 8.75979 2 8.63261 2 8.5ZM2 10.5C2 10.3674 2.05268 10.2402 2.14645 10.1464C2.24021 10.0527 2.36739 10 2.5 10H6C6.13261 10 6.25979 10.0527 6.35355 10.1464C6.44732 10.2402 6.5 10.3674 6.5 10.5C6.5 10.6326 6.44732 10.7598 6.35355 10.8536C6.25979 10.9473 6.13261 11 6 11H2.5C2.36739 11 2.24021 10.9473 2.14645 10.8536C2.05268 10.7598 2 10.6326 2 10.5Z" />
                                  <path class="fill-secondary"
                                      d="M8.5 11C8.5 11 8 11 8 10.5C8 10 8.5 8.5 11 8.5C13.5 8.5 14 10 14 10.5C14 11 13.5 11 13.5 11H8.5ZM11 8C11.3978 8 11.7794 7.84196 12.0607 7.56066C12.342 7.27936 12.5 6.89782 12.5 6.5C12.5 6.10218 12.342 5.72064 12.0607 5.43934C11.7794 5.15804 11.3978 5 11 5C10.6022 5 10.2206 5.15804 9.93934 5.43934C9.65804 5.72064 9.5 6.10218 9.5 6.5C9.5 6.89782 9.65804 7.27936 9.93934 7.56066C10.2206 7.84196 10.6022 8 11 8V8Z" />
                              </svg>
                              <span class="ms-2">Expenses</span>
                              <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                          </a>

                          <ul class="sub-menu collapse" id="menu-Expenses">
                              <li><a class="ms-link" href="{{ url('expenses/create') }}">Add New Expenses</a></li>
                              <li><a class="ms-link" href="{{ url('expenses') }}">List of Expenses</a></li>
                          </ul>
                      </li>
                  @endif

                  <li>
                      <a class="m-link active" href="{{ url('/home') }}">
                          <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor"
                              viewBox="0 0 16 16">
                              <path fill-rule="evenodd"
                                  d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                              <path class="fill-secondary" fill-rule="evenodd"
                                  d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                          </svg>
                          <span class="ms-2">Cheque Management</span>
                      </a>
                  </li>
                  @if (Auth::user()->type == 'ASSOCIATION')
                      <li class="collapsed">
                          <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-FlatOwner"
                              href="#">
                              <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor"
                                  viewBox="0 0 16 16">
                                  <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M2 1C1.46957 1 0.960859 1.21071 0.585786 1.58579C0.210714 1.96086 0 2.46957 0 3L0 13C0 13.5304 0.210714 14.0391 0.585786 14.4142C0.960859 14.7893 1.46957 15 2 15H14C14.5304 15 15.0391 14.7893 15.4142 14.4142C15.7893 14.0391 16 13.5304 16 13V3C16 2.46957 15.7893 1.96086 15.4142 1.58579C15.0391 1.21071 14.5304 1 14 1H2ZM1 3C1 2.73478 1.10536 2.48043 1.29289 2.29289C1.48043 2.10536 1.73478 2 2 2H14C14.2652 2 14.5196 2.10536 14.7071 2.29289C14.8946 2.48043 15 2.73478 15 3V13C15 13.2652 14.8946 13.5196 14.7071 13.7071C14.5196 13.8946 14.2652 14 14 14H2C1.73478 14 1.48043 13.8946 1.29289 13.7071C1.10536 13.5196 1 13.2652 1 13V3ZM2 5.5C2 5.36739 2.05268 5.24021 2.14645 5.14645C2.24021 5.05268 2.36739 5 2.5 5H6C6.13261 5 6.25979 5.05268 6.35355 5.14645C6.44732 5.24021 6.5 5.36739 6.5 5.5C6.5 5.63261 6.44732 5.75979 6.35355 5.85355C6.25979 5.94732 6.13261 6 6 6H2.5C2.36739 6 2.24021 5.94732 2.14645 5.85355C2.05268 5.75979 2 5.63261 2 5.5ZM2 8.5C2 8.36739 2.05268 8.24021 2.14645 8.14645C2.24021 8.05268 2.36739 8 2.5 8H6C6.13261 8 6.25979 8.05268 6.35355 8.14645C6.44732 8.24021 6.5 8.36739 6.5 8.5C6.5 8.63261 6.44732 8.75979 6.35355 8.85355C6.25979 8.94732 6.13261 9 6 9H2.5C2.36739 9 2.24021 8.94732 2.14645 8.85355C2.05268 8.75979 2 8.63261 2 8.5ZM2 10.5C2 10.3674 2.05268 10.2402 2.14645 10.1464C2.24021 10.0527 2.36739 10 2.5 10H6C6.13261 10 6.25979 10.0527 6.35355 10.1464C6.44732 10.2402 6.5 10.3674 6.5 10.5C6.5 10.6326 6.44732 10.7598 6.35355 10.8536C6.25979 10.9473 6.13261 11 6 11H2.5C2.36739 11 2.24021 10.9473 2.14645 10.8536C2.05268 10.7598 2 10.6326 2 10.5Z" />
                                  <path class="fill-secondary"
                                      d="M8.5 11C8.5 11 8 11 8 10.5C8 10 8.5 8.5 11 8.5C13.5 8.5 14 10 14 10.5C14 11 13.5 11 13.5 11H8.5ZM11 8C11.3978 8 11.7794 7.84196 12.0607 7.56066C12.342 7.27936 12.5 6.89782 12.5 6.5C12.5 6.10218 12.342 5.72064 12.0607 5.43934C11.7794 5.15804 11.3978 5 11 5C10.6022 5 10.2206 5.15804 9.93934 5.43934C9.65804 5.72064 9.5 6.10218 9.5 6.5C9.5 6.89782 9.65804 7.27936 9.93934 7.56066C10.2206 7.84196 10.6022 8 11 8V8Z" />
                              </svg>
                              <span class="ms-2">Flat Owner</span>
                              <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                          </a>

                          <ul class="sub-menu collapse" id="menu-FlatOwner">
                              @if (Auth::user()->type == 'ASSOCIATION')
                                  <li><a class="ms-link" href="{{ url('flat/create') }}">Assign Flat Owner</a></li>
                              @endif
                              <li><a class="ms-link" href="{{ url('flat-owners') }}">List of Flat Owner</a></li>


                          </ul>
                      </li>
                  @endif
                  @if (Auth::user()->type == 'FLAT_OWNER')
                      <li class="collapsed">
                          <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-Rentee" href="#">
                              <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor"
                                  viewBox="0 0 16 16">
                                  <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M2 1C1.46957 1 0.960859 1.21071 0.585786 1.58579C0.210714 1.96086 0 2.46957 0 3L0 13C0 13.5304 0.210714 14.0391 0.585786 14.4142C0.960859 14.7893 1.46957 15 2 15H14C14.5304 15 15.0391 14.7893 15.4142 14.4142C15.7893 14.0391 16 13.5304 16 13V3C16 2.46957 15.7893 1.96086 15.4142 1.58579C15.0391 1.21071 14.5304 1 14 1H2ZM1 3C1 2.73478 1.10536 2.48043 1.29289 2.29289C1.48043 2.10536 1.73478 2 2 2H14C14.2652 2 14.5196 2.10536 14.7071 2.29289C14.8946 2.48043 15 2.73478 15 3V13C15 13.2652 14.8946 13.5196 14.7071 13.7071C14.5196 13.8946 14.2652 14 14 14H2C1.73478 14 1.48043 13.8946 1.29289 13.7071C1.10536 13.5196 1 13.2652 1 13V3ZM2 5.5C2 5.36739 2.05268 5.24021 2.14645 5.14645C2.24021 5.05268 2.36739 5 2.5 5H6C6.13261 5 6.25979 5.05268 6.35355 5.14645C6.44732 5.24021 6.5 5.36739 6.5 5.5C6.5 5.63261 6.44732 5.75979 6.35355 5.85355C6.25979 5.94732 6.13261 6 6 6H2.5C2.36739 6 2.24021 5.94732 2.14645 5.85355C2.05268 5.75979 2 5.63261 2 5.5ZM2 8.5C2 8.36739 2.05268 8.24021 2.14645 8.14645C2.24021 8.05268 2.36739 8 2.5 8H6C6.13261 8 6.25979 8.05268 6.35355 8.14645C6.44732 8.24021 6.5 8.36739 6.5 8.5C6.5 8.63261 6.44732 8.75979 6.35355 8.85355C6.25979 8.94732 6.13261 9 6 9H2.5C2.36739 9 2.24021 8.94732 2.14645 8.85355C2.05268 8.75979 2 8.63261 2 8.5ZM2 10.5C2 10.3674 2.05268 10.2402 2.14645 10.1464C2.24021 10.0527 2.36739 10 2.5 10H6C6.13261 10 6.25979 10.0527 6.35355 10.1464C6.44732 10.2402 6.5 10.3674 6.5 10.5C6.5 10.6326 6.44732 10.7598 6.35355 10.8536C6.25979 10.9473 6.13261 11 6 11H2.5C2.36739 11 2.24021 10.9473 2.14645 10.8536C2.05268 10.7598 2 10.6326 2 10.5Z" />
                                  <path class="fill-secondary"
                                      d="M8.5 11C8.5 11 8 11 8 10.5C8 10 8.5 8.5 11 8.5C13.5 8.5 14 10 14 10.5C14 11 13.5 11 13.5 11H8.5ZM11 8C11.3978 8 11.7794 7.84196 12.0607 7.56066C12.342 7.27936 12.5 6.89782 12.5 6.5C12.5 6.10218 12.342 5.72064 12.0607 5.43934C11.7794 5.15804 11.3978 5 11 5C10.6022 5 10.2206 5.15804 9.93934 5.43934C9.65804 5.72064 9.5 6.10218 9.5 6.5C9.5 6.89782 9.65804 7.27936 9.93934 7.56066C10.2206 7.84196 10.6022 8 11 8V8Z" />
                              </svg>
                              <span class="ms-2">Rentee</span>
                              <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                          </a>

                          <ul class="sub-menu collapse" id="menu-Rentee">
                              <li><a class="ms-link" href="{{ url('rentee/create') }}">Assign Rentee</a></li>
                              <li><a class="ms-link" href="{{ url('rentee') }}">List of Rentee</a></li>
                          </ul>
                      </li>
                  @endif

                  <li class="collapsed">
                      <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-Payment" href="#">
                          <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor"
                              viewBox="0 0 16 16">
                              <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M2 1C1.46957 1 0.960859 1.21071 0.585786 1.58579C0.210714 1.96086 0 2.46957 0 3L0 13C0 13.5304 0.210714 14.0391 0.585786 14.4142C0.960859 14.7893 1.46957 15 2 15H14C14.5304 15 15.0391 14.7893 15.4142 14.4142C15.7893 14.0391 16 13.5304 16 13V3C16 2.46957 15.7893 1.96086 15.4142 1.58579C15.0391 1.21071 14.5304 1 14 1H2ZM1 3C1 2.73478 1.10536 2.48043 1.29289 2.29289C1.48043 2.10536 1.73478 2 2 2H14C14.2652 2 14.5196 2.10536 14.7071 2.29289C14.8946 2.48043 15 2.73478 15 3V13C15 13.2652 14.8946 13.5196 14.7071 13.7071C14.5196 13.8946 14.2652 14 14 14H2C1.73478 14 1.48043 13.8946 1.29289 13.7071C1.10536 13.5196 1 13.2652 1 13V3ZM2 5.5C2 5.36739 2.05268 5.24021 2.14645 5.14645C2.24021 5.05268 2.36739 5 2.5 5H6C6.13261 5 6.25979 5.05268 6.35355 5.14645C6.44732 5.24021 6.5 5.36739 6.5 5.5C6.5 5.63261 6.44732 5.75979 6.35355 5.85355C6.25979 5.94732 6.13261 6 6 6H2.5C2.36739 6 2.24021 5.94732 2.14645 5.85355C2.05268 5.75979 2 5.63261 2 5.5ZM2 8.5C2 8.36739 2.05268 8.24021 2.14645 8.14645C2.24021 8.05268 2.36739 8 2.5 8H6C6.13261 8 6.25979 8.05268 6.35355 8.14645C6.44732 8.24021 6.5 8.36739 6.5 8.5C6.5 8.63261 6.44732 8.75979 6.35355 8.85355C6.25979 8.94732 6.13261 9 6 9H2.5C2.36739 9 2.24021 8.94732 2.14645 8.85355C2.05268 8.75979 2 8.63261 2 8.5ZM2 10.5C2 10.3674 2.05268 10.2402 2.14645 10.1464C2.24021 10.0527 2.36739 10 2.5 10H6C6.13261 10 6.25979 10.0527 6.35355 10.1464C6.44732 10.2402 6.5 10.3674 6.5 10.5C6.5 10.6326 6.44732 10.7598 6.35355 10.8536C6.25979 10.9473 6.13261 11 6 11H2.5C2.36739 11 2.24021 10.9473 2.14645 10.8536C2.05268 10.7598 2 10.6326 2 10.5Z" />
                              <path class="fill-secondary"
                                  d="M8.5 11C8.5 11 8 11 8 10.5C8 10 8.5 8.5 11 8.5C13.5 8.5 14 10 14 10.5C14 11 13.5 11 13.5 11H8.5ZM11 8C11.3978 8 11.7794 7.84196 12.0607 7.56066C12.342 7.27936 12.5 6.89782 12.5 6.5C12.5 6.10218 12.342 5.72064 12.0607 5.43934C11.7794 5.15804 11.3978 5 11 5C10.6022 5 10.2206 5.15804 9.93934 5.43934C9.65804 5.72064 9.5 6.10218 9.5 6.5C9.5 6.89782 9.65804 7.27936 9.93934 7.56066C10.2206 7.84196 10.6022 8 11 8V8Z" />
                          </svg>
                          <span class="ms-2">Payment</span>
                          <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                      </a>

                      <ul class="sub-menu collapse" id="menu-Payment">
                          @if (Auth::user()->type == 'FLAT_OWNER')
                              <li><a class="ms-link" href="{{ url('flat-owner-payment/create') }}">Make Payment</a>
                              </li>
                              <li><a class="ms-link" href="{{ url('flat-owner-payment') }}">List of Payment</a></li>
                          @elseif(Auth::user()->type == 'RENTEE')
                              <li><a class="ms-link" href="{{ url('rentee-payment/create') }}">Make Payment</a></li>
                              <li><a class="ms-link" href="{{ url('rentee-payment') }}">List of Payment</a></li>
                          @endif
                          <li><a class="ms-link" href="{{ url('list-of-payment-request') }}">List of Payment
                                  Request</a></li>
                      </ul>
                  </li>

                  <li class="collapsed">
                      <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-Report" href="#">
                          <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor"
                              viewBox="0 0 16 16">
                              <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M2 1C1.46957 1 0.960859 1.21071 0.585786 1.58579C0.210714 1.96086 0 2.46957 0 3L0 13C0 13.5304 0.210714 14.0391 0.585786 14.4142C0.960859 14.7893 1.46957 15 2 15H14C14.5304 15 15.0391 14.7893 15.4142 14.4142C15.7893 14.0391 16 13.5304 16 13V3C16 2.46957 15.7893 1.96086 15.4142 1.58579C15.0391 1.21071 14.5304 1 14 1H2ZM1 3C1 2.73478 1.10536 2.48043 1.29289 2.29289C1.48043 2.10536 1.73478 2 2 2H14C14.2652 2 14.5196 2.10536 14.7071 2.29289C14.8946 2.48043 15 2.73478 15 3V13C15 13.2652 14.8946 13.5196 14.7071 13.7071C14.5196 13.8946 14.2652 14 14 14H2C1.73478 14 1.48043 13.8946 1.29289 13.7071C1.10536 13.5196 1 13.2652 1 13V3ZM2 5.5C2 5.36739 2.05268 5.24021 2.14645 5.14645C2.24021 5.05268 2.36739 5 2.5 5H6C6.13261 5 6.25979 5.05268 6.35355 5.14645C6.44732 5.24021 6.5 5.36739 6.5 5.5C6.5 5.63261 6.44732 5.75979 6.35355 5.85355C6.25979 5.94732 6.13261 6 6 6H2.5C2.36739 6 2.24021 5.94732 2.14645 5.85355C2.05268 5.75979 2 5.63261 2 5.5ZM2 8.5C2 8.36739 2.05268 8.24021 2.14645 8.14645C2.24021 8.05268 2.36739 8 2.5 8H6C6.13261 8 6.25979 8.05268 6.35355 8.14645C6.44732 8.24021 6.5 8.36739 6.5 8.5C6.5 8.63261 6.44732 8.75979 6.35355 8.85355C6.25979 8.94732 6.13261 9 6 9H2.5C2.36739 9 2.24021 8.94732 2.14645 8.85355C2.05268 8.75979 2 8.63261 2 8.5ZM2 10.5C2 10.3674 2.05268 10.2402 2.14645 10.1464C2.24021 10.0527 2.36739 10 2.5 10H6C6.13261 10 6.25979 10.0527 6.35355 10.1464C6.44732 10.2402 6.5 10.3674 6.5 10.5C6.5 10.6326 6.44732 10.7598 6.35355 10.8536C6.25979 10.9473 6.13261 11 6 11H2.5C2.36739 11 2.24021 10.9473 2.14645 10.8536C2.05268 10.7598 2 10.6326 2 10.5Z" />
                              <path class="fill-secondary"
                                  d="M8.5 11C8.5 11 8 11 8 10.5C8 10 8.5 8.5 11 8.5C13.5 8.5 14 10 14 10.5C14 11 13.5 11 13.5 11H8.5ZM11 8C11.3978 8 11.7794 7.84196 12.0607 7.56066C12.342 7.27936 12.5 6.89782 12.5 6.5C12.5 6.10218 12.342 5.72064 12.0607 5.43934C11.7794 5.15804 11.3978 5 11 5C10.6022 5 10.2206 5.15804 9.93934 5.43934C9.65804 5.72064 9.5 6.10218 9.5 6.5C9.5 6.89782 9.65804 7.27936 9.93934 7.56066C10.2206 7.84196 10.6022 8 11 8V8Z" />
                          </svg>
                          <span class="ms-2">Report</span>
                          <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                      </a>

                      <ul class="sub-menu collapse" id="menu-Report">

                          <span class="ms-2">Sales</span>
                          <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                          </a>
                          <ul class="sub-menu collapse" id="menu-Sales">
                              <li><a class="ms-link" href="{{ url('reports/date-wise-sales') }}">Date Wise Sales
                                      Report</a></li>
                              <li><a class="ms-link" href="{{ url('') }}">Date Wise total Sales</a></li>
                              <li><a class="ms-link" href="{{ url('') }}">Customer Wise Sales Report</a>
                              </li>
                              <li><a class="ms-link" href="{{ url('') }}">Details Sales Report</a></li>
                              <li><a class="ms-link" href="{{ url('') }}">Returned Report</a></li>
                          </ul>
                  </li>
                  <li class="collapsed">
                      <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-Purchase" href="#">

                          <span class="ms-2">Purchase</span>
                          <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                      </a>

                      <ul class="sub-menu collapse" id="menu-Purchase">
                          <li><a class="ms-link" href="{{ url('reports/date-wise-purchase') }}">Date Wise
                                  Purchase</a></li>
                          <li><a class="ms-link" href="{{ url('') }}">Supplier Wise Purchase </a></li>
                          <li><a class="ms-link" href="{{ url('') }}">Details Date Wise Purchase </a>
                          </li>
                          <li><a class="ms-link" href="{{ url('') }}">Date Wise Supplier </a></li>

                      </ul>
                  </li>
                  <li class="collapsed">
                      <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-client" href="#">

                          <span class="ms-2">Client</span>
                          <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                      </a>

                      <ul class="sub-menu collapse" id="menu-client">
                          <li><a class="ms-link" href="{{ url('reports/date-wise-client-ledger') }}">Client
                                  Ledger</a></li>

                      </ul>
                  </li>
                  <li class="collapsed">
                      <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-supplier" href="#">

                          <span class="ms-2">Supplier</span>
                          <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                      </a>

                      <ul class="sub-menu collapse" id="menu-supplier">
                          <li><a class="ms-link" href="{{ url('reports/date-wise-supplier-ledger') }}">Supplier
                                  Ledger</a>
                          </li>

                      </ul>
                  </li>
                  <li class="collapsed">
                      <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-payment" href="#">

                          <span class="ms-2">Payment</span>
                          <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                      </a>

                      <ul class="sub-menu collapse" id="menu-payment">
                          <li><a class="ms-link" href="{{ url('') }}">Payment Collection</a></li>

                      </ul>
                  </li>
                  <li class="collapsed">
                      <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-inventory" href="#">

                          <span class="ms-2">Inventory</span>
                          <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                      </a>

                      <ul class="sub-menu collapse" id="menu-inventory">
                          <li><a class="ms-link" href="{{ url('') }}">All Inventory Reports</a></li>
                          <li><a class="ms-link" href="{{ url('') }}">Item Wise</a></li>

                      </ul>
                  </li>
                  <li class="collapsed">
                      <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-expense" href="#">

                          <span class="ms-2">Expense</span>
                          <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                      </a>

                      <ul class="sub-menu collapse" id="menu-expense">
                          <li><a class="ms-link" href="{{ url('') }}">All Expense Reports</a></li>
                          <li><a class="ms-link" href="{{ url('') }}">Head Expense Reports</a></li>
                          <li><a class="ms-link" href="{{ url('') }}">Expense Reports</a></li>

                      </ul>
                  </li>
                  <li class="collapsed">
                      <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-summary" href="#">

                          <span class="ms-2">Summary</span>
                          <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                      </a>

                      <ul class="sub-menu collapse" id="menu-summary">
                          <li><a class="ms-link" href="{{ url('') }}">Daily Summary</a></li>

                      </ul>
                  </li>
                  <li class="collapsed">
                      <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-Logistict" href="#">

                          <span class="ms-2">Logistict</span>
                          <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                      </a>

                      <ul class="sub-menu collapse" id="menu-Logistict">
                          {{-- <li><a class="ms-link" href="{{url("")}}">Delivery Report</a></li>
                                  <li><a class="ms-link" href="{{url("")}}">Receive Report</a></li>
                                  <li><a class="ms-link" href="{{url("")}}">Details Report</a></li> --}}
                          <li><a class="ms-link" href="{{ url('delivery-men') }}">Delivery Man</a></li>
                          <li><a class="ms-link" href="{{ url('delivery-vehicles') }}">Delivery Vehicles</a>
                          </li>

                      </ul>
                  </li>
                  <li class="collapsed">
                      <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-Profitloss" href="#">

                          <span class="ms-2">Profit / loss</span>
                          <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                      </a>

                      <ul class="sub-menu collapse" id="menu-Profitloss">
                          <li><a class="ms-link" href="{{ url('reports/profit-loss') }}">Profit / loss</a>
                          </li>
                          <li><a class="ms-link" href="{{ url('') }}">Account Statement</a></li>

                      </ul>
                  </li>
              </ul>
              </li>
              @if (Auth::user()->type == 'ASSOCIATION')
                  <li class="collapsed">
                  <li class="collapsed">
                      <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu_Role" href="#">
                          <i class="bi bi-person-check-fill"></i>
                          <span class="ms-2">Payroll</span>
                          <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                      </a>

                      <ul class="sub-menu collapse" id="menu_Role">
                          <li><a class="ms-link" href="{{ url('payroll/create') }}">Create Payroll</a></li>
                          <li><a class="ms-link" href="{{ url('payroll') }}">Payroll List</a></li>

                      </ul>
                  </li>
                  </li>
              @endif
              <li class="collapsed">
                  <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-Settings" href="#">
                      <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor"
                          viewBox="0 0 16 16">
                          <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M2 1C1.46957 1 0.960859 1.21071 0.585786 1.58579C0.210714 1.96086 0 2.46957 0 3L0 13C0 13.5304 0.210714 14.0391 0.585786 14.4142C0.960859 14.7893 1.46957 15 2 15H14C14.5304 15 15.0391 14.7893 15.4142 14.4142C15.7893 14.0391 16 13.5304 16 13V3C16 2.46957 15.7893 1.96086 15.4142 1.58579C15.0391 1.21071 14.5304 1 14 1H2ZM1 3C1 2.73478 1.10536 2.48043 1.29289 2.29289C1.48043 2.10536 1.73478 2 2 2H14C14.2652 2 14.5196 2.10536 14.7071 2.29289C14.8946 2.48043 15 2.73478 15 3V13C15 13.2652 14.8946 13.5196 14.7071 13.7071C14.5196 13.8946 14.2652 14 14 14H2C1.73478 14 1.48043 13.8946 1.29289 13.7071C1.10536 13.5196 1 13.2652 1 13V3ZM2 5.5C2 5.36739 2.05268 5.24021 2.14645 5.14645C2.24021 5.05268 2.36739 5 2.5 5H6C6.13261 5 6.25979 5.05268 6.35355 5.14645C6.44732 5.24021 6.5 5.36739 6.5 5.5C6.5 5.63261 6.44732 5.75979 6.35355 5.85355C6.25979 5.94732 6.13261 6 6 6H2.5C2.36739 6 2.24021 5.94732 2.14645 5.85355C2.05268 5.75979 2 5.63261 2 5.5ZM2 8.5C2 8.36739 2.05268 8.24021 2.14645 8.14645C2.24021 8.05268 2.36739 8 2.5 8H6C6.13261 8 6.25979 8.05268 6.35355 8.14645C6.44732 8.24021 6.5 8.36739 6.5 8.5C6.5 8.63261 6.44732 8.75979 6.35355 8.85355C6.25979 8.94732 6.13261 9 6 9H2.5C2.36739 9 2.24021 8.94732 2.14645 8.85355C2.05268 8.75979 2 8.63261 2 8.5ZM2 10.5C2 10.3674 2.05268 10.2402 2.14645 10.1464C2.24021 10.0527 2.36739 10 2.5 10H6C6.13261 10 6.25979 10.0527 6.35355 10.1464C6.44732 10.2402 6.5 10.3674 6.5 10.5C6.5 10.6326 6.44732 10.7598 6.35355 10.8536C6.25979 10.9473 6.13261 11 6 11H2.5C2.36739 11 2.24021 10.9473 2.14645 10.8536C2.05268 10.7598 2 10.6326 2 10.5Z" />
                          <path class="fill-secondary"
                              d="M8.5 11C8.5 11 8 11 8 10.5C8 10 8.5 8.5 11 8.5C13.5 8.5 14 10 14 10.5C14 11 13.5 11 13.5 11H8.5ZM11 8C11.3978 8 11.7794 7.84196 12.0607 7.56066C12.342 7.27936 12.5 6.89782 12.5 6.5C12.5 6.10218 12.342 5.72064 12.0607 5.43934C11.7794 5.15804 11.3978 5 11 5C10.6022 5 10.2206 5.15804 9.93934 5.43934C9.65804 5.72064 9.5 6.10218 9.5 6.5C9.5 6.89782 9.65804 7.27936 9.93934 7.56066C10.2206 7.84196 10.6022 8 11 8V8Z" />
                      </svg>
                      <span class="ms-2">Settings</span>
                      <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                  </a>

                  <ul class="sub-menu collapse" id="menu-Settings">

                      <li><a class="ms-link ms-2" href="{{ url('building') }}"> Building </a></li>

                      <li><a class="ms-link ms-2" href="{{ url('flat') }}"> Flat </a></li>

                      <li class="collapsed">
                          <a class="m-link" data-bs-toggle="collapse" data-bs-target="#ExpenseHeadings"
                              href="#">

                              <span class="ms-2">Bill Items</span>
                              <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                          </a>

                          <ul class="sub-menu collapse" id="ExpenseHeadings">
                              <li><a class="ms-link" href="{{ url('billing-items/create') }}"> Add New Bill
                                      Item</a></li>
                              <li><a class="ms-link" href="{{ url('billing-items') }}"> List of Bill Item</a>
                              </li>

                          </ul>
                      </li>

                      <li class="collapsed">
                          <a class="m-link" data-bs-toggle="collapse" data-bs-target="#payrollExpense"
                              href="#">

                              <span class="ms-2">Payroll Expense Items</span>
                              <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                          </a>

                          <ul class="sub-menu collapse" id="payrollExpense">
                              <li><a class="ms-link" href="{{ url('payroll-expense-items/create') }}">Create</a>
                              </li>
                              <li><a class="ms-link" href="{{ url('payroll-expense-items') }}">List</a>
                              </li>

                          </ul>
                      </li>


                      <li class="collapsed">
                          <a class="m-link" data-bs-toggle="collapse" data-bs-target="#employee" href="#">

                              <span class="ms-2">Employee</span>
                              <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                          </a>

                          <ul class="sub-menu collapse" id="employee">
                              <li><a class="ms-link" href="{{ url('employee/create') }}">Create Employee</a>
                              </li>
                              <li><a class="ms-link" href="{{ url('employee') }}">List Of Employees</a>
                              </li>

                          </ul>
                      </li>


                      <li class="collapsed">
                          <a class="m-link" data-bs-toggle="collapse" data-bs-target="#ExpenseHeadings1"
                              href="#">

                              <span class="ms-2">Expense Headings</span>
                              <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                          </a>

                          <ul class="sub-menu collapse" id="ExpenseHeadings1">
                              <li><a class="ms-link" href="{{ url('expense-head/create') }}"> Add New Head</a>
                              </li>
                              <li><a class="ms-link" href="{{ url('expense-head') }}"> List of Head</a></li>
                              <li><a class="ms-link" href="{{ url('expense-sub-head/create') }}"> Add New Sub
                                      Head</a></li>
                              <li><a class="ms-link" href="{{ url('expense-sub-head') }}"> List of Sub Head</a>
                              </li>

                          </ul>
                      </li>
                      {{-- <li class="collapsed">
                              <a class="m-link" data-bs-toggle="collapse" data-bs-target="#ProductCategories"
                                  href="#">

                                  <span class="ms-2">Product Categories</span>
                                  <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                              </a>
                           
                              <ul class="sub-menu collapse" id="ProductCategories">
                                  <li><a class="ms-link" href="{{ url('product-category') }}"> List of Catagories</a>
                                  </li>
                                  <li><a class="ms-link" href="{{ url('product-category/create') }}"> Add New
                                          Catagory</a></li>

                              </ul>
                          </li>
                          <li class="collapsed">
                              <a class="m-link" data-bs-toggle="collapse" data-bs-target="#Warehouses"
                                  href="">

                                  <span class="ms-2">Warehouses</span>
                                  <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                              </a>
                              
                              <ul class="sub-menu collapse" id="Warehouses">
                                  <li><a class="ms-link" href="{{ url('warehouse') }}"> List of Warehouses</a></li>
                                  <li><a class="ms-link" href="{{ url('warehouse-branch-transfer') }}"> Warehouse
                                          Branch Transfer</a></li>

                              </ul>
                          </li>

                          <li class="collapsed">
                              <a class="m-link" data-bs-toggle="collapse" data-bs-target="#ProductSize"
                                  href="#">

                                  <span class="ms-2">Attributes</span>
                                  <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                              </a>
                              
                              <ul class="sub-menu collapse" id="ProductSize">
                                  <li><a class="ms-link" href="{{ url('attributes') }}"> List of Attributes</a></li>
                                  <li><a class="ms-link" href="{{ url('attributes/create') }}"> Add New
                                          Attributes</a></li>

                              </ul>
                          </li>
                          <li class="collapsed">
                              <a class="m-link" data-bs-toggle="collapse" data-bs-target="#Staff" href="#">

                                  <span class="ms-2">Staff</span>
                                  <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                              </a>
                              
                              <ul class="sub-menu collapse" id="Staff">
                                  <li><a class="ms-link" href="{{ url('staff') }}"> List of Staff</a></li>
                                  <li><a class="ms-link" href="{{ url('staff/create') }}"> Add New Staff</a></li>

                              </ul>
                          </li>
                          <li class="collapsed">
                              <a class="m-link" data-bs-toggle="collapse" data-bs-target="#Items" href="#">

                                  <span class="ms-2">Items</span>
                                  <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                              </a>
                              
                              <ul class="sub-menu collapse" id="Items">
                                  <li><a class="ms-link" href="{{ url('') }}"> List of Item</a></li>
                                  <li><a class="ms-link" href="{{ url('') }}"> Add New Item</a></li>

                              </ul>
                          </li>
                          <li class="collapsed">
                              <a class="m-link" data-bs-toggle="collapse" data-bs-target="#branch" href="#">

                                  <span class="ms-2">Branch</span>
                                  <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                              </a>
                              
                              <ul class="sub-menu collapse" id="branch">
                                  <li><a class="ms-link" href="{{ url('branch') }}"> List of Item</a></li>
                                  <li><a class="ms-link" href="{{ url('branch/create') }}"> Add New Item</a></li>

                              </ul>
                          </li>
                          <li><a class="ms-link ms-2" href="{{ url('') }}"> POS Configuration</a></li>
                          <li><a class="ms-link ms-2" href="{{ url('company-info') }}"> Company</a></li>
                          <li><a class="ms-link ms-2" href="{{ url('terms') }}"> Terms</a></li> --}}
              </li>

              </ul>
              </li>
              </ul>

          </div>

          <!-- sidebar: footer link -->
          <!-- sidebar: footer link -->
          <ul class="menu-list nav navbar-nav flex-row text-center menu-footer-link">
              <li class="nav-item flex-fill p-2">
                  <a class="d-inline-block w-100 color-400" href="#" data-bs-toggle="modal"
                      data-bs-target="#ScheduleModal" title="My Schedule">
                      <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor"
                          viewBox="0 0 16 16">
                          <path class="fill-secondary"
                              d="M10.854 8.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                          <path
                              d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z" />
                          <path class="fill-secondary"
                              d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z" />
                      </svg>
                  </a>
              </li>
              <li class="nav-item flex-fill p-2">
                  <a class="d-inline-block w-100 color-400" href="#" data-bs-toggle="modal"
                      data-bs-target="#MynotesModal" title="My notes">
                      <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor"
                          viewBox="0 0 16 16">
                          <path class="fill-secondary"
                              d="M1.5 0A1.5 1.5 0 0 0 0 1.5V13a1 1 0 0 0 1 1V1.5a.5.5 0 0 1 .5-.5H14a1 1 0 0 0-1-1H1.5z" />
                          <path
                              d="M3.5 2A1.5 1.5 0 0 0 2 3.5v11A1.5 1.5 0 0 0 3.5 16h6.086a1.5 1.5 0 0 0 1.06-.44l4.915-4.914A1.5 1.5 0 0 0 16 9.586V3.5A1.5 1.5 0 0 0 14.5 2h-11zM3 3.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 .5.5V9h-4.5A1.5 1.5 0 0 0 9 10.5V15H3.5a.5.5 0 0 1-.5-.5v-11zm7 11.293V10.5a.5.5 0 0 1 .5-.5h4.293L10 14.793z" />
                      </svg>
                  </a>
              </li>
              <li class="nav-item flex-fill p-2">
                  <a class="d-inline-block w-100 color-400" href="#" data-bs-toggle="modal"
                      data-bs-target="#RecentChat">
                      <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor"
                          viewBox="0 0 16 16">
                          <path
                              d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                          <path class="fill-secondary"
                              d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6zm0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
                      </svg>
                  </a>
              </li>
              <li class="nav-item flex-fill p-2">
                  <a class="d-inline-block w-100 color-400" href="./auth-signin.html" title="sign-out">
                      <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor"
                          viewBox="0 0 16 16">
                          <path d="M7.5 1v7h1V1h-1z" />
                          <path class="fill-secondary"
                              d="M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812z" />
                      </svg>
                  </a>
              </li>
          </ul>
      </div>
  </div>



  <!--  <div class="sidebar p-2 py-md-3 @@cardClass">
      <div class="container-fluid">
           sidebar: title
          <div class="title-text d-flex align-items-center mb-4 mt-1">
              <h4 class="sidebar-title mb-0 flex-grow-1"><span class="sm-txt">BUILD</span><span>ING 360</span></h4>

          </div>

           sidebar: menu list
          <div class="main-menu flex-grow-1">
              <ul class="menu-list">

                  <li>
                      <a class="m-link active" href="{{ url('/home') }}">
                          <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
                              <path fill-rule="evenodd"
                                  d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                              <path class="fill-secondary" fill-rule="evenodd"
                                  d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                          </svg>
                          <span class="ms-2">My Dashboard</span>
                      </a>
                  </li>
                  <li class="collapsed">
                      <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-Applications" href="#">
                          <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor"
                              viewBox="0 0 16 16">
                              <path
                                  d="M5.5 2A3.5 3.5 0 0 0 2 5.5v5A3.5 3.5 0 0 0 5.5 14h5a3.5 3.5 0 0 0 3.5-3.5V8a.5.5 0 0 1 1 0v2.5a4.5 4.5 0 0 1-4.5 4.5h-5A4.5 4.5 0 0 1 1 10.5v-5A4.5 4.5 0 0 1 5.5 1H8a.5.5 0 0 1 0 1H5.5z" />
                              <path class="fill-secondary" d="M16 3a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                          </svg>
                          <span class="ms-2">Invoice</span>
                          <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                      </a>
                       Menu: Sub menu ul
                      <ul class="sub-menu collapse" id="menu-Applications">
                          @if (Auth::user()->type == 'ASSOCIATION' || Auth::user()->type == 'FLAT_OWNER')
<li><a class="ms-link" href="{{ url('invoice/create') }}">Create Invoice</a></li>
@endif
                          <li><a class="ms-link" href="{{ url('invoice') }}">List of Invoice</a></li>
                      </ul>
                  </li>
                  @if (Auth::user()->type == 'ASSOCIATION' || Auth::user()->type == 'FLAT_OWNER')
<li class="collapsed">
                      <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-Account" href="#">
                          <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor"
                              viewBox="0 0 16 16">
                              <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M2 1C1.46957 1 0.960859 1.21071 0.585786 1.58579C0.210714 1.96086 0 2.46957 0 3L0 13C0 13.5304 0.210714 14.0391 0.585786 14.4142C0.960859 14.7893 1.46957 15 2 15H14C14.5304 15 15.0391 14.7893 15.4142 14.4142C15.7893 14.0391 16 13.5304 16 13V3C16 2.46957 15.7893 1.96086 15.4142 1.58579C15.0391 1.21071 14.5304 1 14 1H2ZM1 3C1 2.73478 1.10536 2.48043 1.29289 2.29289C1.48043 2.10536 1.73478 2 2 2H14C14.2652 2 14.5196 2.10536 14.7071 2.29289C14.8946 2.48043 15 2.73478 15 3V13C15 13.2652 14.8946 13.5196 14.7071 13.7071C14.5196 13.8946 14.2652 14 14 14H2C1.73478 14 1.48043 13.8946 1.29289 13.7071C1.10536 13.5196 1 13.2652 1 13V3ZM2 5.5C2 5.36739 2.05268 5.24021 2.14645 5.14645C2.24021 5.05268 2.36739 5 2.5 5H6C6.13261 5 6.25979 5.05268 6.35355 5.14645C6.44732 5.24021 6.5 5.36739 6.5 5.5C6.5 5.63261 6.44732 5.75979 6.35355 5.85355C6.25979 5.94732 6.13261 6 6 6H2.5C2.36739 6 2.24021 5.94732 2.14645 5.85355C2.05268 5.75979 2 5.63261 2 5.5ZM2 8.5C2 8.36739 2.05268 8.24021 2.14645 8.14645C2.24021 8.05268 2.36739 8 2.5 8H6C6.13261 8 6.25979 8.05268 6.35355 8.14645C6.44732 8.24021 6.5 8.36739 6.5 8.5C6.5 8.63261 6.44732 8.75979 6.35355 8.85355C6.25979 8.94732 6.13261 9 6 9H2.5C2.36739 9 2.24021 8.94732 2.14645 8.85355C2.05268 8.75979 2 8.63261 2 8.5ZM2 10.5C2 10.3674 2.05268 10.2402 2.14645 10.1464C2.24021 10.0527 2.36739 10 2.5 10H6C6.13261 10 6.25979 10.0527 6.35355 10.1464C6.44732 10.2402 6.5 10.3674 6.5 10.5C6.5 10.6326 6.44732 10.7598 6.35355 10.8536C6.25979 10.9473 6.13261 11 6 11H2.5C2.36739 11 2.24021 10.9473 2.14645 10.8536C2.05268 10.7598 2 10.6326 2 10.5Z" />
                              <path class="fill-secondary"
                                  d="M8.5 11C8.5 11 8 11 8 10.5C8 10 8.5 8.5 11 8.5C13.5 8.5 14 10 14 10.5C14 11 13.5 11 13.5 11H8.5ZM11 8C11.3978 8 11.7794 7.84196 12.0607 7.56066C12.342 7.27936 12.5 6.89782 12.5 6.5C12.5 6.10218 12.342 5.72064 12.0607 5.43934C11.7794 5.15804 11.3978 5 11 5C10.6022 5 10.2206 5.15804 9.93934 5.43934C9.65804 5.72064 9.5 6.10218 9.5 6.5C9.5 6.89782 9.65804 7.27936 9.93934 7.56066C10.2206 7.84196 10.6022 8 11 8V8Z" />
                          </svg>
                          <span class="ms-2">Receive Money</span>
                          <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                      </a>
                       Menu: Sub menu ul
                      <ul class="sub-menu collapse" id="menu-Account">
                        @if (Auth::user()->type == 'ASSOCIATION')
<li><a class="ms-link" href="{{ url('money-receipt/create') }}">Receive Payment</a></li>
@elseif(Auth::user()->type == 'FLAT_OWNER')
<li><a class="ms-link" href="{{ url('money-receipt/create?user_type=FLAT_OWNER') }}">Receive Payment</a></li>
@endif
                          <li><a class="ms-link" href="{{ url('money-receipt') }}">Payment Voucher</a></li>
                      </ul>
                  </li>
@endif
                  @if (Auth::user()->type == 'ASSOCIATION' || Auth::user()->type == 'FLAT_OWNER')
<li class="collapsed">
                      <a class="m-link" data-bs-toggle="collapse" data-bs-target="#administration" href="#">
                          <i class="bi bi-person-bounding-box"></i>
                          <span class="ms-2">Administration</span>
                          <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                      </a>
                       Menu: Sub menu ul
                      <ul class="sub-menu collapse" id="administration">
                          <li class="collapsed">
                              <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu_User" href="#">
                                  <i class="bi bi-person-circle"></i>
                                  <span class="ms-2">User</span>
                                  <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                              </a>
                               Menu: Sub menu ul
                              <ul class="sub-menu collapse" id="menu_User">
                                  <li><a class="ms-link" href="{{ url('users/create') }}">Add User</a></li>
                                  <li><a class="ms-link" href="{{ url('users') }}">User List</a></li>

                              </ul>
                          </li>


                          <li class="collapsed">
                              <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu_Role" href="#">
                                  <i class="bi bi-person-check-fill"></i>
                                  <span class="ms-2">Role</span>
                                  <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                              </a>
                               Menu: Sub menu ul
                              <ul class="sub-menu collapse" id="menu_Role">
                                  <li><a class="ms-link" href="{{ url('roles/create') }}">Add Role</a></li>
                                  <li><a class="ms-link" href="{{ url('roles') }}">Role List</a></li>

                              </ul>
                          </li>





                          <li class="collapsed">
                              <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu_Permission"
                                  href="#">
                                  <i class="bi bi-person-lines-fill"></i>
                                  <span class="ms-2">Permission</span>
                                  <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                              </a>
                               Menu: Sub menu ul
                              <ul class="sub-menu collapse" id="menu_Permission">
                                  <li><a class="ms-link" href="{{ url('permissions/create') }}">Add Permission</a>
                                  </li>
                                  <li><a class="ms-link" href="{{ url('permissions') }}">Permission List</a></li>

                              </ul>
                          </li>

                      </ul>
                  </li>
@endif
                  @if (Auth::user()->type == 'ASSOCIATION')
<li class="collapsed">
                      <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-Cashbook" href="#">
                          <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor"
                              viewBox="0 0 16 16">
                              <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M2 1C1.46957 1 0.960859 1.21071 0.585786 1.58579C0.210714 1.96086 0 2.46957 0 3L0 13C0 13.5304 0.210714 14.0391 0.585786 14.4142C0.960859 14.7893 1.46957 15 2 15H14C14.5304 15 15.0391 14.7893 15.4142 14.4142C15.7893 14.0391 16 13.5304 16 13V3C16 2.46957 15.7893 1.96086 15.4142 1.58579C15.0391 1.21071 14.5304 1 14 1H2ZM1 3C1 2.73478 1.10536 2.48043 1.29289 2.29289C1.48043 2.10536 1.73478 2 2 2H14C14.2652 2 14.5196 2.10536 14.7071 2.29289C14.8946 2.48043 15 2.73478 15 3V13C15 13.2652 14.8946 13.5196 14.7071 13.7071C14.5196 13.8946 14.2652 14 14 14H2C1.73478 14 1.48043 13.8946 1.29289 13.7071C1.10536 13.5196 1 13.2652 1 13V3ZM2 5.5C2 5.36739 2.05268 5.24021 2.14645 5.14645C2.24021 5.05268 2.36739 5 2.5 5H6C6.13261 5 6.25979 5.05268 6.35355 5.14645C6.44732 5.24021 6.5 5.36739 6.5 5.5C6.5 5.63261 6.44732 5.75979 6.35355 5.85355C6.25979 5.94732 6.13261 6 6 6H2.5C2.36739 6 2.24021 5.94732 2.14645 5.85355C2.05268 5.75979 2 5.63261 2 5.5ZM2 8.5C2 8.36739 2.05268 8.24021 2.14645 8.14645C2.24021 8.05268 2.36739 8 2.5 8H6C6.13261 8 6.25979 8.05268 6.35355 8.14645C6.44732 8.24021 6.5 8.36739 6.5 8.5C6.5 8.63261 6.44732 8.75979 6.35355 8.85355C6.25979 8.94732 6.13261 9 6 9H2.5C2.36739 9 2.24021 8.94732 2.14645 8.85355C2.05268 8.75979 2 8.63261 2 8.5ZM2 10.5C2 10.3674 2.05268 10.2402 2.14645 10.1464C2.24021 10.0527 2.36739 10 2.5 10H6C6.13261 10 6.25979 10.0527 6.35355 10.1464C6.44732 10.2402 6.5 10.3674 6.5 10.5C6.5 10.6326 6.44732 10.7598 6.35355 10.8536C6.25979 10.9473 6.13261 11 6 11H2.5C2.36739 11 2.24021 10.9473 2.14645 10.8536C2.05268 10.7598 2 10.6326 2 10.5Z" />
                              <path class="fill-secondary"
                                  d="M8.5 11C8.5 11 8 11 8 10.5C8 10 8.5 8.5 11 8.5C13.5 8.5 14 10 14 10.5C14 11 13.5 11 13.5 11H8.5ZM11 8C11.3978 8 11.7794 7.84196 12.0607 7.56066C12.342 7.27936 12.5 6.89782 12.5 6.5C12.5 6.10218 12.342 5.72064 12.0607 5.43934C11.7794 5.15804 11.3978 5 11 5C10.6022 5 10.2206 5.15804 9.93934 5.43934C9.65804 5.72064 9.5 6.10218 9.5 6.5C9.5 6.89782 9.65804 7.27936 9.93934 7.56066C10.2206 7.84196 10.6022 8 11 8V8Z" />
                          </svg>
                          <span class="ms-2">Cashbook</span>
                          <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                      </a>
                       Menu: Sub menu ul
                      <ul class="sub-menu collapse" id="menu-Cashbook">
                          <li><a class="ms-link" href="{{ url('accounts/create') }}">Add New Account</a></li>
                          <li><a class="ms-link" href="{{ url('accounts') }}">List of Account</a></li>
                          <li><a class="ms-link" href="{{ url('account/create-opening-balance') }}">Add New Opening
                                  Balance</a></li>
                          <li><a class="ms-link" href="{{ url('account-transfer/create') }}">Transfer Balance</a>
                          </li>
                          <li><a class="ms-link" href="{{ url('account-transfer') }}">Transfer History</a></li>
                          <li><a class="ms-link" href="{{ url('account/balance-statement') }}">Balance Statement</a>
                          </li>
                          <li><a class="ms-link" href="{{ url('account/non-invoice-income') }}">Non Invoice
                                  Amount</a></li>
                      </ul>
                  </li>
@endif
                  @if (Auth::user()->type == 'ASSOCIATION')
<li class="collapsed">
                      <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-Expenses" href="#">
                          <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor"
                              viewBox="0 0 16 16">
                              <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M2 1C1.46957 1 0.960859 1.21071 0.585786 1.58579C0.210714 1.96086 0 2.46957 0 3L0 13C0 13.5304 0.210714 14.0391 0.585786 14.4142C0.960859 14.7893 1.46957 15 2 15H14C14.5304 15 15.0391 14.7893 15.4142 14.4142C15.7893 14.0391 16 13.5304 16 13V3C16 2.46957 15.7893 1.96086 15.4142 1.58579C15.0391 1.21071 14.5304 1 14 1H2ZM1 3C1 2.73478 1.10536 2.48043 1.29289 2.29289C1.48043 2.10536 1.73478 2 2 2H14C14.2652 2 14.5196 2.10536 14.7071 2.29289C14.8946 2.48043 15 2.73478 15 3V13C15 13.2652 14.8946 13.5196 14.7071 13.7071C14.5196 13.8946 14.2652 14 14 14H2C1.73478 14 1.48043 13.8946 1.29289 13.7071C1.10536 13.5196 1 13.2652 1 13V3ZM2 5.5C2 5.36739 2.05268 5.24021 2.14645 5.14645C2.24021 5.05268 2.36739 5 2.5 5H6C6.13261 5 6.25979 5.05268 6.35355 5.14645C6.44732 5.24021 6.5 5.36739 6.5 5.5C6.5 5.63261 6.44732 5.75979 6.35355 5.85355C6.25979 5.94732 6.13261 6 6 6H2.5C2.36739 6 2.24021 5.94732 2.14645 5.85355C2.05268 5.75979 2 5.63261 2 5.5ZM2 8.5C2 8.36739 2.05268 8.24021 2.14645 8.14645C2.24021 8.05268 2.36739 8 2.5 8H6C6.13261 8 6.25979 8.05268 6.35355 8.14645C6.44732 8.24021 6.5 8.36739 6.5 8.5C6.5 8.63261 6.44732 8.75979 6.35355 8.85355C6.25979 8.94732 6.13261 9 6 9H2.5C2.36739 9 2.24021 8.94732 2.14645 8.85355C2.05268 8.75979 2 8.63261 2 8.5ZM2 10.5C2 10.3674 2.05268 10.2402 2.14645 10.1464C2.24021 10.0527 2.36739 10 2.5 10H6C6.13261 10 6.25979 10.0527 6.35355 10.1464C6.44732 10.2402 6.5 10.3674 6.5 10.5C6.5 10.6326 6.44732 10.7598 6.35355 10.8536C6.25979 10.9473 6.13261 11 6 11H2.5C2.36739 11 2.24021 10.9473 2.14645 10.8536C2.05268 10.7598 2 10.6326 2 10.5Z" />
                              <path class="fill-secondary"
                                  d="M8.5 11C8.5 11 8 11 8 10.5C8 10 8.5 8.5 11 8.5C13.5 8.5 14 10 14 10.5C14 11 13.5 11 13.5 11H8.5ZM11 8C11.3978 8 11.7794 7.84196 12.0607 7.56066C12.342 7.27936 12.5 6.89782 12.5 6.5C12.5 6.10218 12.342 5.72064 12.0607 5.43934C11.7794 5.15804 11.3978 5 11 5C10.6022 5 10.2206 5.15804 9.93934 5.43934C9.65804 5.72064 9.5 6.10218 9.5 6.5C9.5 6.89782 9.65804 7.27936 9.93934 7.56066C10.2206 7.84196 10.6022 8 11 8V8Z" />
                          </svg>
                          <span class="ms-2">Expenses</span>
                          <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                      </a>
                       Menu: Sub menu ul
                      <ul class="sub-menu collapse" id="menu-Expenses">
                          <li><a class="ms-link" href="{{ url('expenses/create') }}">Add New Expenses</a></li>
                          <li><a class="ms-link" href="{{ url('expenses') }}">List of Expenses</a></li>
                      </ul>
                  </li>
@endif
                  @if (Auth::user()->type == 'ASSOCIATION')
<li class="collapsed">
                      <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-FlatOwner" href="#">
                          <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor"
                              viewBox="0 0 16 16">
                              <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M2 1C1.46957 1 0.960859 1.21071 0.585786 1.58579C0.210714 1.96086 0 2.46957 0 3L0 13C0 13.5304 0.210714 14.0391 0.585786 14.4142C0.960859 14.7893 1.46957 15 2 15H14C14.5304 15 15.0391 14.7893 15.4142 14.4142C15.7893 14.0391 16 13.5304 16 13V3C16 2.46957 15.7893 1.96086 15.4142 1.58579C15.0391 1.21071 14.5304 1 14 1H2ZM1 3C1 2.73478 1.10536 2.48043 1.29289 2.29289C1.48043 2.10536 1.73478 2 2 2H14C14.2652 2 14.5196 2.10536 14.7071 2.29289C14.8946 2.48043 15 2.73478 15 3V13C15 13.2652 14.8946 13.5196 14.7071 13.7071C14.5196 13.8946 14.2652 14 14 14H2C1.73478 14 1.48043 13.8946 1.29289 13.7071C1.10536 13.5196 1 13.2652 1 13V3ZM2 5.5C2 5.36739 2.05268 5.24021 2.14645 5.14645C2.24021 5.05268 2.36739 5 2.5 5H6C6.13261 5 6.25979 5.05268 6.35355 5.14645C6.44732 5.24021 6.5 5.36739 6.5 5.5C6.5 5.63261 6.44732 5.75979 6.35355 5.85355C6.25979 5.94732 6.13261 6 6 6H2.5C2.36739 6 2.24021 5.94732 2.14645 5.85355C2.05268 5.75979 2 5.63261 2 5.5ZM2 8.5C2 8.36739 2.05268 8.24021 2.14645 8.14645C2.24021 8.05268 2.36739 8 2.5 8H6C6.13261 8 6.25979 8.05268 6.35355 8.14645C6.44732 8.24021 6.5 8.36739 6.5 8.5C6.5 8.63261 6.44732 8.75979 6.35355 8.85355C6.25979 8.94732 6.13261 9 6 9H2.5C2.36739 9 2.24021 8.94732 2.14645 8.85355C2.05268 8.75979 2 8.63261 2 8.5ZM2 10.5C2 10.3674 2.05268 10.2402 2.14645 10.1464C2.24021 10.0527 2.36739 10 2.5 10H6C6.13261 10 6.25979 10.0527 6.35355 10.1464C6.44732 10.2402 6.5 10.3674 6.5 10.5C6.5 10.6326 6.44732 10.7598 6.35355 10.8536C6.25979 10.9473 6.13261 11 6 11H2.5C2.36739 11 2.24021 10.9473 2.14645 10.8536C2.05268 10.7598 2 10.6326 2 10.5Z" />
                              <path class="fill-secondary"
                                  d="M8.5 11C8.5 11 8 11 8 10.5C8 10 8.5 8.5 11 8.5C13.5 8.5 14 10 14 10.5C14 11 13.5 11 13.5 11H8.5ZM11 8C11.3978 8 11.7794 7.84196 12.0607 7.56066C12.342 7.27936 12.5 6.89782 12.5 6.5C12.5 6.10218 12.342 5.72064 12.0607 5.43934C11.7794 5.15804 11.3978 5 11 5C10.6022 5 10.2206 5.15804 9.93934 5.43934C9.65804 5.72064 9.5 6.10218 9.5 6.5C9.5 6.89782 9.65804 7.27936 9.93934 7.56066C10.2206 7.84196 10.6022 8 11 8V8Z" />
                          </svg>
                          <span class="ms-2">Flat Owner</span>
                          <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                      </a>
                       Menu: Sub menu ul
                      <ul class="sub-menu collapse" id="menu-FlatOwner">
                          @if (Auth::user()->type == 'ASSOCIATION')
<li><a class="ms-link" href="{{ url('flat/create') }}">Assign Flat Owner</a></li>
@endif
                          <li><a class="ms-link" href="{{ url('flat-owners') }}">List of Flat Owner</a></li>
                         

                      </ul>
                  </li>
@endif
                  @if (Auth::user()->type == 'FLAT_OWNER')
<li class="collapsed">
                      <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-Rentee" href="#">
                          <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor"
                              viewBox="0 0 16 16">
                              <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M2 1C1.46957 1 0.960859 1.21071 0.585786 1.58579C0.210714 1.96086 0 2.46957 0 3L0 13C0 13.5304 0.210714 14.0391 0.585786 14.4142C0.960859 14.7893 1.46957 15 2 15H14C14.5304 15 15.0391 14.7893 15.4142 14.4142C15.7893 14.0391 16 13.5304 16 13V3C16 2.46957 15.7893 1.96086 15.4142 1.58579C15.0391 1.21071 14.5304 1 14 1H2ZM1 3C1 2.73478 1.10536 2.48043 1.29289 2.29289C1.48043 2.10536 1.73478 2 2 2H14C14.2652 2 14.5196 2.10536 14.7071 2.29289C14.8946 2.48043 15 2.73478 15 3V13C15 13.2652 14.8946 13.5196 14.7071 13.7071C14.5196 13.8946 14.2652 14 14 14H2C1.73478 14 1.48043 13.8946 1.29289 13.7071C1.10536 13.5196 1 13.2652 1 13V3ZM2 5.5C2 5.36739 2.05268 5.24021 2.14645 5.14645C2.24021 5.05268 2.36739 5 2.5 5H6C6.13261 5 6.25979 5.05268 6.35355 5.14645C6.44732 5.24021 6.5 5.36739 6.5 5.5C6.5 5.63261 6.44732 5.75979 6.35355 5.85355C6.25979 5.94732 6.13261 6 6 6H2.5C2.36739 6 2.24021 5.94732 2.14645 5.85355C2.05268 5.75979 2 5.63261 2 5.5ZM2 8.5C2 8.36739 2.05268 8.24021 2.14645 8.14645C2.24021 8.05268 2.36739 8 2.5 8H6C6.13261 8 6.25979 8.05268 6.35355 8.14645C6.44732 8.24021 6.5 8.36739 6.5 8.5C6.5 8.63261 6.44732 8.75979 6.35355 8.85355C6.25979 8.94732 6.13261 9 6 9H2.5C2.36739 9 2.24021 8.94732 2.14645 8.85355C2.05268 8.75979 2 8.63261 2 8.5ZM2 10.5C2 10.3674 2.05268 10.2402 2.14645 10.1464C2.24021 10.0527 2.36739 10 2.5 10H6C6.13261 10 6.25979 10.0527 6.35355 10.1464C6.44732 10.2402 6.5 10.3674 6.5 10.5C6.5 10.6326 6.44732 10.7598 6.35355 10.8536C6.25979 10.9473 6.13261 11 6 11H2.5C2.36739 11 2.24021 10.9473 2.14645 10.8536C2.05268 10.7598 2 10.6326 2 10.5Z" />
                              <path class="fill-secondary"
                                  d="M8.5 11C8.5 11 8 11 8 10.5C8 10 8.5 8.5 11 8.5C13.5 8.5 14 10 14 10.5C14 11 13.5 11 13.5 11H8.5ZM11 8C11.3978 8 11.7794 7.84196 12.0607 7.56066C12.342 7.27936 12.5 6.89782 12.5 6.5C12.5 6.10218 12.342 5.72064 12.0607 5.43934C11.7794 5.15804 11.3978 5 11 5C10.6022 5 10.2206 5.15804 9.93934 5.43934C9.65804 5.72064 9.5 6.10218 9.5 6.5C9.5 6.89782 9.65804 7.27936 9.93934 7.56066C10.2206 7.84196 10.6022 8 11 8V8Z" />
                          </svg>
                          <span class="ms-2">Rentee</span>
                          <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                      </a>
                       Menu: Sub menu ul
                      <ul class="sub-menu collapse" id="menu-Rentee">
                          <li><a class="ms-link" href="{{ url('rentee/create') }}">Assign Rentee</a></li>
                          <li><a class="ms-link" href="{{ url('rentee') }}">List of Rentee</a></li>
                      </ul>
                  </li>
@endif

                  <li class="collapsed">
                      <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-Payment" href="#">
                          <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor"
                              viewBox="0 0 16 16">
                              <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M2 1C1.46957 1 0.960859 1.21071 0.585786 1.58579C0.210714 1.96086 0 2.46957 0 3L0 13C0 13.5304 0.210714 14.0391 0.585786 14.4142C0.960859 14.7893 1.46957 15 2 15H14C14.5304 15 15.0391 14.7893 15.4142 14.4142C15.7893 14.0391 16 13.5304 16 13V3C16 2.46957 15.7893 1.96086 15.4142 1.58579C15.0391 1.21071 14.5304 1 14 1H2ZM1 3C1 2.73478 1.10536 2.48043 1.29289 2.29289C1.48043 2.10536 1.73478 2 2 2H14C14.2652 2 14.5196 2.10536 14.7071 2.29289C14.8946 2.48043 15 2.73478 15 3V13C15 13.2652 14.8946 13.5196 14.7071 13.7071C14.5196 13.8946 14.2652 14 14 14H2C1.73478 14 1.48043 13.8946 1.29289 13.7071C1.10536 13.5196 1 13.2652 1 13V3ZM2 5.5C2 5.36739 2.05268 5.24021 2.14645 5.14645C2.24021 5.05268 2.36739 5 2.5 5H6C6.13261 5 6.25979 5.05268 6.35355 5.14645C6.44732 5.24021 6.5 5.36739 6.5 5.5C6.5 5.63261 6.44732 5.75979 6.35355 5.85355C6.25979 5.94732 6.13261 6 6 6H2.5C2.36739 6 2.24021 5.94732 2.14645 5.85355C2.05268 5.75979 2 5.63261 2 5.5ZM2 8.5C2 8.36739 2.05268 8.24021 2.14645 8.14645C2.24021 8.05268 2.36739 8 2.5 8H6C6.13261 8 6.25979 8.05268 6.35355 8.14645C6.44732 8.24021 6.5 8.36739 6.5 8.5C6.5 8.63261 6.44732 8.75979 6.35355 8.85355C6.25979 8.94732 6.13261 9 6 9H2.5C2.36739 9 2.24021 8.94732 2.14645 8.85355C2.05268 8.75979 2 8.63261 2 8.5ZM2 10.5C2 10.3674 2.05268 10.2402 2.14645 10.1464C2.24021 10.0527 2.36739 10 2.5 10H6C6.13261 10 6.25979 10.0527 6.35355 10.1464C6.44732 10.2402 6.5 10.3674 6.5 10.5C6.5 10.6326 6.44732 10.7598 6.35355 10.8536C6.25979 10.9473 6.13261 11 6 11H2.5C2.36739 11 2.24021 10.9473 2.14645 10.8536C2.05268 10.7598 2 10.6326 2 10.5Z" />
                              <path class="fill-secondary"
                                  d="M8.5 11C8.5 11 8 11 8 10.5C8 10 8.5 8.5 11 8.5C13.5 8.5 14 10 14 10.5C14 11 13.5 11 13.5 11H8.5ZM11 8C11.3978 8 11.7794 7.84196 12.0607 7.56066C12.342 7.27936 12.5 6.89782 12.5 6.5C12.5 6.10218 12.342 5.72064 12.0607 5.43934C11.7794 5.15804 11.3978 5 11 5C10.6022 5 10.2206 5.15804 9.93934 5.43934C9.65804 5.72064 9.5 6.10218 9.5 6.5C9.5 6.89782 9.65804 7.27936 9.93934 7.56066C10.2206 7.84196 10.6022 8 11 8V8Z" />
                          </svg>
                          <span class="ms-2">Payment</span>
                          <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                      </a>
                       Menu: Sub menu ul
                      <ul class="sub-menu collapse" id="menu-Payment">
                          @if (Auth::user()->type == 'FLAT_OWNER')
<li><a class="ms-link" href="{{ url('flat-owner-payment/create') }}">Make Payment</a>
                              </li>
                              <li><a class="ms-link" href="{{ url('flat-owner-payment') }}">List of Payment</a></li>
@elseif(Auth::user()->type == 'RENTEE')
<li><a class="ms-link" href="{{ url('rentee-payment/create') }}">Make Payment</a></li>
                              <li><a class="ms-link" href="{{ url('rentee-payment') }}">List of Payment</a></li>
@endif
                          <li><a class="ms-link" href="{{ url('list-of-payment-request') }}">List of Payment
                                  Request</a></li>
                      </ul>
                  </li>

                  <li class="collapsed">
                      <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-Report" href="#">
                          <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor"
                              viewBox="0 0 16 16">
                              <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M2 1C1.46957 1 0.960859 1.21071 0.585786 1.58579C0.210714 1.96086 0 2.46957 0 3L0 13C0 13.5304 0.210714 14.0391 0.585786 14.4142C0.960859 14.7893 1.46957 15 2 15H14C14.5304 15 15.0391 14.7893 15.4142 14.4142C15.7893 14.0391 16 13.5304 16 13V3C16 2.46957 15.7893 1.96086 15.4142 1.58579C15.0391 1.21071 14.5304 1 14 1H2ZM1 3C1 2.73478 1.10536 2.48043 1.29289 2.29289C1.48043 2.10536 1.73478 2 2 2H14C14.2652 2 14.5196 2.10536 14.7071 2.29289C14.8946 2.48043 15 2.73478 15 3V13C15 13.2652 14.8946 13.5196 14.7071 13.7071C14.5196 13.8946 14.2652 14 14 14H2C1.73478 14 1.48043 13.8946 1.29289 13.7071C1.10536 13.5196 1 13.2652 1 13V3ZM2 5.5C2 5.36739 2.05268 5.24021 2.14645 5.14645C2.24021 5.05268 2.36739 5 2.5 5H6C6.13261 5 6.25979 5.05268 6.35355 5.14645C6.44732 5.24021 6.5 5.36739 6.5 5.5C6.5 5.63261 6.44732 5.75979 6.35355 5.85355C6.25979 5.94732 6.13261 6 6 6H2.5C2.36739 6 2.24021 5.94732 2.14645 5.85355C2.05268 5.75979 2 5.63261 2 5.5ZM2 8.5C2 8.36739 2.05268 8.24021 2.14645 8.14645C2.24021 8.05268 2.36739 8 2.5 8H6C6.13261 8 6.25979 8.05268 6.35355 8.14645C6.44732 8.24021 6.5 8.36739 6.5 8.5C6.5 8.63261 6.44732 8.75979 6.35355 8.85355C6.25979 8.94732 6.13261 9 6 9H2.5C2.36739 9 2.24021 8.94732 2.14645 8.85355C2.05268 8.75979 2 8.63261 2 8.5ZM2 10.5C2 10.3674 2.05268 10.2402 2.14645 10.1464C2.24021 10.0527 2.36739 10 2.5 10H6C6.13261 10 6.25979 10.0527 6.35355 10.1464C6.44732 10.2402 6.5 10.3674 6.5 10.5C6.5 10.6326 6.44732 10.7598 6.35355 10.8536C6.25979 10.9473 6.13261 11 6 11H2.5C2.36739 11 2.24021 10.9473 2.14645 10.8536C2.05268 10.7598 2 10.6326 2 10.5Z" />
                              <path class="fill-secondary"
                                  d="M8.5 11C8.5 11 8 11 8 10.5C8 10 8.5 8.5 11 8.5C13.5 8.5 14 10 14 10.5C14 11 13.5 11 13.5 11H8.5ZM11 8C11.3978 8 11.7794 7.84196 12.0607 7.56066C12.342 7.27936 12.5 6.89782 12.5 6.5C12.5 6.10218 12.342 5.72064 12.0607 5.43934C11.7794 5.15804 11.3978 5 11 5C10.6022 5 10.2206 5.15804 9.93934 5.43934C9.65804 5.72064 9.5 6.10218 9.5 6.5C9.5 6.89782 9.65804 7.27936 9.93934 7.56066C10.2206 7.84196 10.6022 8 11 8V8Z" />
                          </svg>
                          <span class="ms-2">Report</span>
                          <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                      </a>
                       Menu: Sub menu ul
                      <ul class="sub-menu collapse" id="menu-Report">
                          <li><a class="ms-link ms-2" href="{{ url('reports/date-wise-transfer') }}">Date Wise
                                  Transfers report</a></li>
                          <li><a class="ms-link" data-bs-toggle="collapse" data-bs-target="#menu-Sales"
                                  href="#">

                                  <span class="ms-2">Sales</span>
                                  <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                              </a>
                              <ul class="sub-menu collapse" id="menu-Sales">
                                  <li><a class="ms-link" href="{{ url('reports/date-wise-sales') }}">Date Wise Sales
                                          Report</a></li>
                                  <li><a class="ms-link" href="{{ url('') }}">Date Wise total Sales</a></li>
                                  <li><a class="ms-link" href="{{ url('') }}">Customer Wise Sales Report</a>
                                  </li>
                                  <li><a class="ms-link" href="{{ url('') }}">Details Sales Report</a></li>
                                  <li><a class="ms-link" href="{{ url('') }}">Returned Report</a></li>
                              </ul>
                          </li>
                          <li class="collapsed">
                              <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-Purchase"
                                  href="#">

                                  <span class="ms-2">Purchase</span>
                                  <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                              </a>
                               Menu: Sub menu ul
                              <ul class="sub-menu collapse" id="menu-Purchase">
                                  <li><a class="ms-link" href="{{ url('reports/date-wise-purchase') }}">Date Wise
                                          Purchase</a></li>
                                  <li><a class="ms-link" href="{{ url('') }}">Supplier Wise Purchase </a></li>
                                  <li><a class="ms-link" href="{{ url('') }}">Details Date Wise Purchase </a>
                                  </li>
                                  <li><a class="ms-link" href="{{ url('') }}">Date Wise Supplier </a></li>

                              </ul>
                          </li>
                          <li class="collapsed">
                              <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-client"
                                  href="#">

                                  <span class="ms-2">Client</span>
                                  <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                              </a>
                               Menu: Sub menu ul
                              <ul class="sub-menu collapse" id="menu-client">
                                  <li><a class="ms-link" href="{{ url('reports/date-wise-client-ledger') }}">Client
                                          Ledger</a></li>

                              </ul>
                          </li>
                          <li class="collapsed">
                              <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-supplier"
                                  href="#">

                                  <span class="ms-2">Supplier</span>
                                  <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                              </a>
                               Menu: Sub menu ul
                              <ul class="sub-menu collapse" id="menu-supplier">
                                  <li><a class="ms-link"
                                          href="{{ url('reports/date-wise-supplier-ledger') }}">Supplier Ledger</a>
                                  </li>

                              </ul>
                          </li>
                          <li class="collapsed">
                              <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-payment"
                                  href="#">

                                  <span class="ms-2">Payment</span>
                                  <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                              </a>
                               Menu: Sub menu ul
                              <ul class="sub-menu collapse" id="menu-payment">
                                  <li><a class="ms-link" href="{{ url('') }}">Payment Collection</a></li>

                              </ul>
                          </li>
                          <li class="collapsed">
                              <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-inventory"
                                  href="#">

                                  <span class="ms-2">Inventory</span>
                                  <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                              </a>
                               Menu: Sub menu ul
                              <ul class="sub-menu collapse" id="menu-inventory">
                                  <li><a class="ms-link" href="{{ url('') }}">All Inventory Reports</a></li>
                                  <li><a class="ms-link" href="{{ url('') }}">Item Wise</a></li>

                              </ul>
                          </li>
                          <li class="collapsed">
                              <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-expense"
                                  href="#">

                                  <span class="ms-2">Expense</span>
                                  <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                              </a>
                               Menu: Sub menu ul
                              <ul class="sub-menu collapse" id="menu-expense">
                                  <li><a class="ms-link" href="{{ url('') }}">All Expense Reports</a></li>
                                  <li><a class="ms-link" href="{{ url('') }}">Head Expense Reports</a></li>
                                  <li><a class="ms-link" href="{{ url('') }}">Expense Reports</a></li>

                              </ul>
                          </li>
                          <li class="collapsed">
                              <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-summary"
                                  href="#">

                                  <span class="ms-2">Summary</span>
                                  <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                              </a>
                               Menu: Sub menu ul
                              <ul class="sub-menu collapse" id="menu-summary">
                                  <li><a class="ms-link" href="{{ url('') }}">Daily Summary</a></li>

                              </ul>
                          </li>
                          <li class="collapsed">
                              <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-Logistict"
                                  href="#">

                                  <span class="ms-2">Logistict</span>
                                  <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                              </a>
                               Menu: Sub menu ul
                              <ul class="sub-menu collapse" id="menu-Logistict">
                                  {{-- <li><a class="ms-link" href="{{url("")}}">Delivery Report</a></li>
                                  <li><a class="ms-link" href="{{url("")}}">Receive Report</a></li>
                                  <li><a class="ms-link" href="{{url("")}}">Details Report</a></li> --}}
                                  <li><a class="ms-link" href="{{ url('delivery-men') }}">Delivery Man</a></li>
                                  <li><a class="ms-link" href="{{ url('delivery-vehicles') }}">Delivery Vehicles</a>
                                  </li>

                              </ul>
                          </li>
                          <li class="collapsed">
                              <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-Profitloss"
                                  href="#">

                                  <span class="ms-2">Profit / loss</span>
                                  <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                              </a>
                               Menu: Sub menu ul
                              <ul class="sub-menu collapse" id="menu-Profitloss">
                                  <li><a class="ms-link" href="{{ url('reports/profit-loss') }}">Profit / loss</a>
                                  </li>
                                  <li><a class="ms-link" href="{{ url('') }}">Account Statement</a></li>

                              </ul>
                          </li>
                      </ul>
                  </li>
                  @if (Auth::user()->type == 'ASSOCIATION')
<li class="collapsed">
                  <li class="collapsed">
                      <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu_Role" href="#">
                          <i class="bi bi-person-check-fill"></i>
                          <span class="ms-2">Payroll</span>
                          <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                      </a>
                       Menu: Sub menu ul
                      <ul class="sub-menu collapse" id="menu_Role">
                          <li><a class="ms-link" href="{{ url('payroll/create') }}">Create Payroll</a></li>
                          <li><a class="ms-link" href="{{ url('payroll') }}">Payroll List</a></li>

                      </ul>
                  </li>
                  </li>
@endif
                  <li class="collapsed">
                      <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-Settings" href="#">
                          <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor"
                              viewBox="0 0 16 16">
                              <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M2 1C1.46957 1 0.960859 1.21071 0.585786 1.58579C0.210714 1.96086 0 2.46957 0 3L0 13C0 13.5304 0.210714 14.0391 0.585786 14.4142C0.960859 14.7893 1.46957 15 2 15H14C14.5304 15 15.0391 14.7893 15.4142 14.4142C15.7893 14.0391 16 13.5304 16 13V3C16 2.46957 15.7893 1.96086 15.4142 1.58579C15.0391 1.21071 14.5304 1 14 1H2ZM1 3C1 2.73478 1.10536 2.48043 1.29289 2.29289C1.48043 2.10536 1.73478 2 2 2H14C14.2652 2 14.5196 2.10536 14.7071 2.29289C14.8946 2.48043 15 2.73478 15 3V13C15 13.2652 14.8946 13.5196 14.7071 13.7071C14.5196 13.8946 14.2652 14 14 14H2C1.73478 14 1.48043 13.8946 1.29289 13.7071C1.10536 13.5196 1 13.2652 1 13V3ZM2 5.5C2 5.36739 2.05268 5.24021 2.14645 5.14645C2.24021 5.05268 2.36739 5 2.5 5H6C6.13261 5 6.25979 5.05268 6.35355 5.14645C6.44732 5.24021 6.5 5.36739 6.5 5.5C6.5 5.63261 6.44732 5.75979 6.35355 5.85355C6.25979 5.94732 6.13261 6 6 6H2.5C2.36739 6 2.24021 5.94732 2.14645 5.85355C2.05268 5.75979 2 5.63261 2 5.5ZM2 8.5C2 8.36739 2.05268 8.24021 2.14645 8.14645C2.24021 8.05268 2.36739 8 2.5 8H6C6.13261 8 6.25979 8.05268 6.35355 8.14645C6.44732 8.24021 6.5 8.36739 6.5 8.5C6.5 8.63261 6.44732 8.75979 6.35355 8.85355C6.25979 8.94732 6.13261 9 6 9H2.5C2.36739 9 2.24021 8.94732 2.14645 8.85355C2.05268 8.75979 2 8.63261 2 8.5ZM2 10.5C2 10.3674 2.05268 10.2402 2.14645 10.1464C2.24021 10.0527 2.36739 10 2.5 10H6C6.13261 10 6.25979 10.0527 6.35355 10.1464C6.44732 10.2402 6.5 10.3674 6.5 10.5C6.5 10.6326 6.44732 10.7598 6.35355 10.8536C6.25979 10.9473 6.13261 11 6 11H2.5C2.36739 11 2.24021 10.9473 2.14645 10.8536C2.05268 10.7598 2 10.6326 2 10.5Z" />
                              <path class="fill-secondary"
                                  d="M8.5 11C8.5 11 8 11 8 10.5C8 10 8.5 8.5 11 8.5C13.5 8.5 14 10 14 10.5C14 11 13.5 11 13.5 11H8.5ZM11 8C11.3978 8 11.7794 7.84196 12.0607 7.56066C12.342 7.27936 12.5 6.89782 12.5 6.5C12.5 6.10218 12.342 5.72064 12.0607 5.43934C11.7794 5.15804 11.3978 5 11 5C10.6022 5 10.2206 5.15804 9.93934 5.43934C9.65804 5.72064 9.5 6.10218 9.5 6.5C9.5 6.89782 9.65804 7.27936 9.93934 7.56066C10.2206 7.84196 10.6022 8 11 8V8Z" />
                          </svg>
                          <span class="ms-2">Settings</span>
                          <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                      </a>
                       Menu: Sub menu ul
                      <ul class="sub-menu collapse" id="menu-Settings">

                          <li><a class="ms-link ms-2" href="{{ url('building') }}"> Building </a></li>

                          <li><a class="ms-link ms-2" href="{{ url('flat') }}"> Flat </a></li>

                          <li class="collapsed">
                              <a class="m-link" data-bs-toggle="collapse" data-bs-target="#ExpenseHeadings"
                                  href="#">

                                  <span class="ms-2">Bill Items</span>
                                  <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                              </a>
                               Menu: Sub menu ul
                              <ul class="sub-menu collapse" id="ExpenseHeadings">
                                  <li><a class="ms-link" href="{{ url('billing-items/create') }}"> Add New Bill
                                          Item</a></li>
                                  <li><a class="ms-link" href="{{ url('billing-items') }}"> List of Bill Item</a>
                                  </li>

                              </ul>
                          </li>

                          <li class="collapsed">
                              <a class="m-link" data-bs-toggle="collapse" data-bs-target="#payrollExpense"
                                  href="#">

                                  <span class="ms-2">Payroll Expense Items</span>
                                  <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                              </a>
                               Menu: Sub menu ul
                              <ul class="sub-menu collapse" id="payrollExpense">
                                  <li><a class="ms-link" href="{{ url('payroll-expense-items/create') }}">Create</a>
                                  </li>
                                  <li><a class="ms-link" href="{{ url('payroll-expense-items') }}">List</a>
                                  </li>

                              </ul>
                          </li>


                          <li class="collapsed">
                              <a class="m-link" data-bs-toggle="collapse" data-bs-target="#employee" href="#">

                                  <span class="ms-2">Employee</span>
                                  <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                              </a>
                               Menu: Sub menu ul
                              <ul class="sub-menu collapse" id="employee">
                                  <li><a class="ms-link" href="{{ url('employee/create') }}">Create Employee</a>
                                  </li>
                                  <li><a class="ms-link" href="{{ url('employee') }}">List Of Employees</a>
                                  </li>

                              </ul>
                          </li>


                          <li class="collapsed">
                              <a class="m-link" data-bs-toggle="collapse" data-bs-target="#ExpenseHeadingsnew"
                                  href="#">

                                  <span class="ms-2">Expense Headings</span>
                                  <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                              </a>
                               Menu: Sub menu ul
                              <ul class="sub-menu collapse" id="ExpenseHeadings">
                                  <li><a class="ms-link" href="{{ url('expense-head/create') }}"> Add New Head</a>
                                  </li>
                                  <li><a class="ms-link" href="{{ url('expense-head') }}"> List of Head</a></li>
                                  <li><a class="ms-link" href="{{ url('expense-sub-head/create') }}"> Add New Sub
                                          Head</a></li>
                                  <li><a class="ms-link" href="{{ url('expense-sub-head') }}"> List of Sub Head</a>
                                  </li>

                              </ul>
                          </li>
                          {{--   
                          <li class="collapsed">
                              <a class="m-link" data-bs-toggle="collapse" data-bs-target="#ProductCategories"
                                  href="#">

                                  <span class="ms-2">Product Categories</span>
                                  <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                              </a>
                               Menu: Sub menu ul 
                              <ul class="sub-menu collapse" id="ProductCategories">
                                  <li><a class="ms-link" href="{{ url('product-category') }}"> List of Catagories</a>
                                  </li>
                                  <li><a class="ms-link" href="{{ url('product-category/create') }}"> Add New
                                          Catagory</a></li>

                              </ul>
                          </li>
                          <li class="collapsed">
                              <a class="m-link" data-bs-toggle="collapse" data-bs-target="#Warehouses"
                                  href="">

                                  <span class="ms-2">Warehouses</span>
                                  <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                              </a>
                               Menu: Sub menu ul 
                              <ul class="sub-menu collapse" id="Warehouses">
                                  <li><a class="ms-link" href="{{ url('warehouse') }}"> List of Warehouses</a></li>
                                  <li><a class="ms-link" href="{{ url('warehouse-branch-transfer') }}"> Warehouse
                                          Branch Transfer</a></li>

                              </ul>
                          </li>

                          <li class="collapsed">
                              <a class="m-link" data-bs-toggle="collapse" data-bs-target="#ProductSize"
                                  href="#">

                                  <span class="ms-2">Attributes</span>
                                  <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                              </a>
                               Menu: Sub menu ul 
                              <ul class="sub-menu collapse" id="ProductSize">
                                  <li><a class="ms-link" href="{{ url('attributes') }}"> List of Attributes</a></li>
                                  <li><a class="ms-link" href="{{ url('attributes/create') }}"> Add New
                                          Attributes</a></li>

                              </ul>
                          </li>
                          <li class="collapsed">
                              <a class="m-link" data-bs-toggle="collapse" data-bs-target="#Staff" href="#">

                                  <span class="ms-2">Staff</span>
                                  <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                              </a>
                               Menu: Sub menu ul 
                              <ul class="sub-menu collapse" id="Staff">
                                  <li><a class="ms-link" href="{{ url('staff') }}"> List of Staff</a></li>
                                  <li><a class="ms-link" href="{{ url('staff/create') }}"> Add New Staff</a></li>

                              </ul>
                          </li>
                          <li class="collapsed">
                              <a class="m-link" data-bs-toggle="collapse" data-bs-target="#Items" href="#">

                                  <span class="ms-2">Items</span>
                                  <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                              </a>
                               Menu: Sub menu ul 
                              <ul class="sub-menu collapse" id="Items">
                                  <li><a class="ms-link" href="{{ url('') }}"> List of Item</a></li>
                                  <li><a class="ms-link" href="{{ url('') }}"> Add New Item</a></li>

                              </ul>
                          </li>
                          <li class="collapsed">
                              <a class="m-link" data-bs-toggle="collapse" data-bs-target="#branch" href="#">

                                  <span class="ms-2">Branch</span>
                                  <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                              </a>
                               Menu: Sub menu ul 
                              <ul class="sub-menu collapse" id="branch">
                                  <li><a class="ms-link" href="{{ url('branch') }}"> List of Item</a></li>
                                  <li><a class="ms-link" href="{{ url('branch/create') }}"> Add New Item</a></li>

                              </ul>
                          </li>
                          <li><a class="ms-link ms-2" href="{{ url('') }}"> POS Configuration</a></li>
                          <li><a class="ms-link ms-2" href="{{ url('company-info') }}"> Company</a></li>
                          <li><a class="ms-link ms-2" href="{{ url('terms') }}"> Terms</a></li> --}}
                  </li>

              </ul>
              </li>









              </ul>

          </div>
           sidebar: footer link

      </div>
  </div>-->
