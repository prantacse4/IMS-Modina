



<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
with font-awesome or any other icon font library -->
        <li class="nav-item has-treeview">
            <a href="{{ route('admin.dashboard') }}" class="nav-link ">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li>



        <li class="nav-item has-treeview ">
        <a href="#" class="nav-link ">
                <i class="fas fa-box-open nav-icon"></i>
                <p>
                    Product
                    <i class="fas fa-angle-left right "></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('admin.product') }}" class="nav-link ">
                        <i class="fa fa-share nav-icon"></i>
                        <p>Product Item</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.category') }}" class="nav-link">
                        <i class="fa fa-share nav-icon"></i>
                        <p>Product Category</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.unit') }}" class="nav-link">
                        <i class="fa fa-share nav-icon"></i>
                        <p>Product Unit</p>
                    </a>
                </li>
            </ul>
        </li>


        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="fas fa-city nav-icon "></i>
                <p>
                    Company
                    <i class="fas fa-angle-left right "></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('admin.company') }}" class="nav-link">
                        <i class="fa fa-share nav-icon"></i>
                        <p>View Company</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.addcompany') }}" class="nav-link ">
                        <i class="fa fa-share nav-icon"></i>
                        <p>Add Company</p>
                    </a>
                </li>

            </ul>
        </li>



        <li class="nav-item has-treeview">
            <a href="#" class="nav-link ">
                <i class="fas fa-store nav-icon"></i>
                <p>
                    Showroom
                    <i class="fas fa-angle-left right "></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('admin.showroom') }}" class="nav-link ">
                        <i class="fa fa-share nav-icon"></i>
                        <p>View Showroom</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.addshowroom') }}" class="nav-link ">
                        <i class="fa fa-share nav-icon"></i>
                        <p>Add Showroom</p>
                    </a>
                </li>

            </ul>
            </li>




            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="fas fa-file-invoice-dollar nav-icon"></i>
                    <p>
                        Payment
                        <i class="fas fa-angle-left right "></i>
                    </p>
                </a>
                <ul class="nav nav-treeview ">
                    <li class="nav-item">
                        <a href="{{ route('admin.payment') }}" class="nav-link">
                            <i class="fa fa-share nav-icon"></i>
                            <p>To Company</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.dealerpayment') }}" class="nav-link ">
                            <i class="fa fa-share nav-icon"></i>
                            <p>By Dealer</p>
                        </a>
                    </li>

                </ul>
            </li>



            <li class="nav-item has-treeview ">
                <a href="#" class="nav-link ">
                    <i class="fas fa-user-plus nav-icon"></i>
                    <p>
                        Dealer
                        <i class="fas fa-angle-left right "></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.dealer') }}" class="nav-link ">
                            <i class="fa fa-share nav-icon"></i>
                            <p>View Dealer</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.adddealer') }}" class="nav-link ">
                            <i class="fa fa-share nav-icon"></i>
                            <p>Add Dealer</p>
                        </a>
                    </li>

                </ul>
            </li>



            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="fas fa-shopping-bag nav-icon"></i>
                    <p>
                        Purchase
                        <i class="fas fa-angle-left right "></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.purchase') }}" class="nav-link ">
                            <i class="fa fa-share nav-icon"></i>
                            <p>Purchase</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.purchaseproduct') }}" class="nav-link">
                            <i class="fa fa-share nav-icon"></i>
                            <p>Purchase Product</p>
                        </a>
                    </li>
                </ul>
            </li>






            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="fab fa-shopify nav-icon"></i>
                    <p>
                        Sale
                        <i class="fas fa-angle-left right "></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.sale') }}" class="nav-link ">
                            <i class="fa fa-share nav-icon"></i>
                            <p>Sale</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.saleproduct') }}" class="nav-link">
                            <i class="fa fa-share nav-icon"></i>
                            <p>Sale Product</p>
                        </a>
                    </li>
                </ul>
            </li>





            <li class="nav-item has-treeview menu-open">
                <a href="#" class="nav-link active">
                    <i class="fas fa-user-tie nav-icon"></i>
                    <p>
                        Employee
                        <i class="fas fa-angle-left right "></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.employee') }}" class="nav-link active">
                            <i class="fa fa-share nav-icon"></i>
                            <p>Employee</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.addemployee') }}" class="nav-link">
                            <i class="fa fa-share nav-icon"></i>
                            <p>Add Employee</p>
                        </a>
                    </li>
                </ul>
            </li>




            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="fas fa-donate nav-icon"></i>
                    <p>
                        Salary
                        <i class="fas fa-angle-left right "></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.salary') }}" class="nav-link ">
                            <i class="fa fa-share nav-icon"></i>
                            <p>Salary</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.addsalary') }}" class="nav-link">
                            <i class="fa fa-share nav-icon"></i>
                            <p>Add Salary</p>
                        </a>
                    </li>
                </ul>
            </li>





            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="fas fa-funnel-dollar nav-icon"></i>
                    <p>
                        Expenses
                        <i class="fas fa-angle-left right "></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.expense') }}" class="nav-link ">
                            <i class="fa fa-share nav-icon"></i>
                            <p>Expenses</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.addexpense') }}" class="nav-link">
                            <i class="fa fa-share nav-icon"></i>
                            <p>Add Expenses</p>
                        </a>
                    </li>
                </ul>
            </li>





            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="fas fa-house-damage nav-icon"></i>
                    <p>
                        Damage Adjustment
                        <i class="fas fa-angle-left right "></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.adjustment') }}" class="nav-link ">
                            <i class="fa fa-share nav-icon"></i>
                            <p>Adjustments</p>
                        </a>
                    </li>

                </ul>
            </li>




            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="fas fa-hand-holding-usd nav-icon"></i>
                    <p>
                        Refund
                        <i class="fas fa-angle-left right "></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.refund') }}" class="nav-link ">
                            <i class="fa fa-share nav-icon"></i>
                            <p>Refund</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.refundtocompany') }}" class="nav-link">
                            <i class="fa fa-share nav-icon"></i>
                            <p>To Company</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.refundbydealer') }}" class="nav-link">
                            <i class="fa fa-share nav-icon"></i>
                            <p>By Dealer</p>
                        </a>
                    </li>

                </ul>
            </li>



            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="fas fa-chart-line nav-icon"></i>
                    <p>
                        Report
                        <i class="fas fa-angle-left right "></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.reportproduct') }}" class="nav-link ">
                            <i class="fa fa-share nav-icon"></i>
                            <p>Products</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.reportpayment') }}" class="nav-link">
                            <i class="fa fa-share nav-icon"></i>
                            <p>Payments</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.reportprofit') }}" class="nav-link">
                            <i class="fa fa-share nav-icon"></i>
                            <p>Profits</p>
                        </a>
                    </li>

                </ul>
            </li>


        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="fa fa-id-badge nav-icon"></i>
                <p>
                    Admins
                    <i class="fas fa-angle-left right "></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('admin.profile') }}" class="nav-link">
                        <i class="fa fa-share nav-icon"></i>
                        <p>Profile</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.admin') }}" class="nav-link">
                        <i class="fa fa-share nav-icon"></i>
                        <p>Admins</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.addadmin') }}" class="nav-link">
                        <i class="fa fa-share nav-icon"></i>
                        <p>Add Admin</p>
                    </a>
                </li>
            </ul>
        </li>



        <li class="nav-item">
            <a href="#" class="nav-link ">
                <i class="fa fa-power-off nav-icon logout"></i>
                <p>
                    Logout
                </p>
            </a>
        </li>







    </ul>
</nav>
<!-- /.sidebar-menu -->







