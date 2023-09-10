<div data-simplebar class="h-100">

                    <!-- User details -->

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title">Menu</li>

                            <li class="{{ Request::is('dashboard') ? 'mm-active': 'false' }}"> 
                                <a href="{{ route('dashboard') }}" class="waves-effect {{ Request::is('dashboard') ? 'active': 'false' }} ">
                                    <i class="ri-dashboard-line"></i>
                                    <!-- <span class="badge rounded-pill bg-success float-end">3</span> -->
                                    <span>Dashboard</span>
                                </a>
                            </li>


                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-community-line"></i>
                                    <span>Properties</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('pcategory') }}">Category</a></li>
                                    <li><a href="{{ route('property') }}">Property</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-user-2-line"></i>
                                    <span>Tenants</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('guarantor') }}">Guarantor</a></li>
                                    <li><a href="{{ route('tenant') }}">Tenants</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-service-line"></i>
                                    <span>Agreements</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('condition') }}">Conditions</a></li>
                                    <li><a href="{{ route('agreement') }}">Agreements</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-currency-line"></i>
                                    <span>Invoices & Payment</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('invoices.index') }}">Invoices</a></li>
                                    <li><a href="{{ route('rent.pay') }}">Rent Payment</a></li>
                                    <li><a href="{{ route('rent.Transactions') }}">Transaction</a></li>
                                    
                                </ul>
                            </li>

                         

                            <li class="menu-title">Settings</li>


                            <li class="{{ Request::is('users-list') ? 'mm-active': 'false' }}"> 
                                <a href="{{ route('users') }}" class="waves-effect {{ Request::is('users-list') ? 'active': 'false' }} ">
                                    <i class="ri-account-circle-line"></i>
                                    <!-- <span class="badge rounded-pill bg-success float-end">3</span> -->
                                    <span>Users</span>
                                </a>
                            </li>

                            <li class="{{ Request::is('roles-permissions') ? 'mm-active': 'false' }}"> 
                                <a href="{{ route('rolesP') }}" class="waves-effect {{ Request::is('roles-permissions') ? 'active': 'false' }} ">
                                    <i class="ri-fingerprint-2-line"></i>
                                    <!-- <span class="badge rounded-pill bg-success float-end">3</span> -->
                                    <span>Rols & Permissions</span>
                                </a>
                            </li>


                            <li class="{{ Request::is('company') ? 'mm-active': 'false' }}"> 
                                <a href="{{ route('company') }}" class="waves-effect {{ Request::is('company') ? 'active': 'false' }} ">
                                    <i class="ri-building-2-line"></i>
                                    <!-- <span class="badge rounded-pill bg-success float-end">3</span> -->
                                    <span>Company</span>
                                </a>
                            </li>


                          

    
                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>