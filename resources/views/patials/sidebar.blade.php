<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">

        <a class="sidebar-brand" href="#">
            <span class="align-middle">OceanGate</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Pages
            </li>

            <li class="sidebar-item active">
                <a class="sidebar-link" href="{{ route('admin.home') }}">
                    <i class="fa fa-tachometer" aria-hidden="true"></i><span class="align-middle">Home Page</span>
                </a>
            </li>

            <li class="sidebar-item active">
                <a class="sidebar-link" href="{{ route('category.list') }}">
                    <i class="fa fa-bars" aria-hidden="true"></i><span class="align-middle">Category</span>
                </a>
            </li>

            <li class="sidebar-item active">
                <a class="sidebar-link" href="{{ route('product.list') }}">
                    <i class="fa fa-cubes" aria-hidden="true"></i><span class="align-middle">Product</span>
                </a>
            </li>

            <li class="sidebar-item active">
                <a class="sidebar-link" href="{{ route('order.list') }}">
                    <i class="fa fa-shopping-basket" aria-hidden="true"></i><span class="align-middle">Order</span>
                </a>
            </li>


            <li class="sidebar-header">
                Users
            </li>

            <li class="sidebar-item active">
                <a class="sidebar-link" href="{{ route('admin.list') }}">
                    <i class="fa fa-address-card" aria-hidden="true"></i><span class="align-middle">Admins</span>
                </a>
            </li>

            <li class="sidebar-item active">
                <a class="sidebar-link" href="{{ route('customer.list') }}">
                    <i class="fa fa-user-circle" aria-hidden="true"></i><span class="align-middle">Customers</span>
                </a>
            </li>


            <li class="sidebar-header">
                Statistic
            </li>
            <li class="sidebar-item active">
                <a class="sidebar-link" href="{{ route('statistic.proselling') }}">
                    <i class="fa fa-cart-plus" aria-hidden="true"></i><span class="align-middle">Selling</span>
                </a>
            </li>
            <li class="sidebar-item active">
                <a class="sidebar-link" href="{{ route('statistic.saleday') }}">
                    <i class="fa fa-area-chart" aria-hidden="true"></i><span class="align-middle">Revenue</span>
                </a>
            </li>
        </ul>


    </div>
</nav>
