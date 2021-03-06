<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image" style="background-color: #fff; border-radius: 50%;">
                <img src="{{ asset('assets/img/1707088.png') }}" class="img-circle bg-white" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ auth('manage')->user()->first_name . ' ' . auth('manage')->user()->last_name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> @lang('admin.Online')</a>
            </div>
        </div>
        <!-- search form -->
        {{-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="@lang('admin.Search')...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form> --}}
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">@lang('admin.MAIN NAVIGATION')</li>
            <li class="{{ url()->current() == route('manage.homepage') ? 'active' : '' }}">
                <a href="{{ route('manage.homepage') }}">
                    <i class="fa fa-dashboard"></i> <span>@lang('admin.Dashboard')</span>
                </a>
            </li>
            <li class="{{ url()->current() == route('manage.category') ? 'active' : '' }}">
                <a href="{{ route('manage.category') }}">
                    <i class="fa fa-files-o"></i>
                    <span>@lang('admin.Categories')</span>
                    <span class="pull-right-container">
                        <small
                            class="label bg-gray pull-right">{{ @$statistics['total_category'] ? $statistics['total_category'] : 0 }}</small>
                    </span>
                </a>
            </li>
            {{-- <li class="{{ url()->current() == route('manage.sell') ? 'active' : '' }}">
                <a href="{{ route('manage.sell') }}">
                    <i class="fa fa-shopping-bag"></i> <span>@lang('admin.Sell')</span>
                    <span class="pull-right-container">
            </span>
                </a>
            </li> --}}
            <li class="{{ url()->current() == route('manage.product') ? 'active' : '' }}">
                <a href="{{ route('manage.product') }}">
                    <i class="fa fa-th"></i> <span>@lang('admin.Products')</span>
                    <span class="pull-right-container">
                        <small
                            class="label pull-right bg-gray">{{ $statistics['total_product'] ? $statistics['total_product'] : 0 }}</small>
                    </span>
                </a>
            </li>
            <li class="{{ url()->current() == route('manage.city') ? 'active' : '' }}">
                <a href="{{ route('manage.city') }}">
                    <i class="fa fa-building"></i> <span>????h??rl??r</span>
                </a>
            </li>
            {{-- <li class="{{ url()->current() == route('manage.supplier') ? 'active' : '' }}">
                <a href="{{ route('manage.supplier') }}">
                    <i class="fa fa-male"></i> <span>@lang('admin.Suppliers')</span>
                    <span class="pull-right-container">
              <small class="label pull-right bg-gray">{{ @$statistics['total_supplier'] ? $statistics['total_supplier'] : 0 }}</small>
            </span>
                </a>
            </li> --}}
            <li class="{{ url()->current() == route('manage.brand') ? 'active' : '' }}">
                <a href="{{ route('manage.brand') }}">
                    <i class="fa fa-briefcase"></i> <span>@lang('admin.Brands')</span>
                    <span class="pull-right-container">
                        <small
                            class="label pull-right bg-gray">{{ @$statistics['total_brand'] ? $statistics['total_brand'] : 0 }}</small>
                    </span>
                </a>
            </li>
            {{-- <li class="{{ url()->current() == route('manage.tag') ? 'active' : '' }}">
                <a href="{{ route('manage.tag') }}">
                    <i class="fa fa-tags"></i> <span>@lang('admin.Tags')</span>
                    <span class="pull-right-container">
              <small class="label pull-right bg-gray">{{ @$statistics['total_tag'] ? $statistics['total_tag'] : 0 }}</small>
            </span>
                </a>
            </li> --}}
            <li class="{{ url()->current() == route('manage.color') ? 'active' : '' }}">
                <a href="{{ route('manage.color') }}">
                    <i class="fa fa-code" aria-hidden="true"></i>
                    <span>R??ngl??r</span>
                </a>
            </li>
            <li class="{{ url()->current() == route('manage.size') ? 'active' : '' }}">
                <a href="{{ route('manage.size') }}">
                    <i class="fa fa-code" aria-hidden="true"></i>
                    <span>??l????l??r</span>
                </a>
            </li>
            {{-- <li class="{{ url()->current() == route('manage.measurement') ? 'active' : '' }}">
                <a href="{{ route('manage.measurement') }}">
                    <i class="fa fa-code" aria-hidden="true"></i>
                    <span>??l???? vahidl??ri</span>
                </a>
            </li> --}}
            <li class="{{ url()->current() == route('manage.user') ? 'active' : '' }}">
                <a href="{{ route('manage.user') }}">
                    <i class="fa fa-users"></i> <span>@lang('admin.Users')</span>
                    <span class="pull-right-container">
                        <small
                            class="label pull-right bg-gray">{{ @$statistics['total_user'] ? $statistics['total_user'] : 0 }}</small>
                    </span>
                </a>
            </li>
            <li class="{{ url()->current() == route('manage.admin') ? 'active' : '' }}">
                <a href="{{ route('manage.admin') }}">
                    <i class="fa fa-user-md"></i> <span>@lang('admin.Admins')</span>
                    <span class="pull-right-container">
                        <small
                            class="label pull-right bg-gray">{{ @$statistics['total_admin'] ? $statistics['total_admin'] : 0 }}</small>
                    </span>
                </a>
            </li>

            <li class="{{ url()->current() == route('manage.order') ? 'active' : '' }}">
                <a href="{{ route('manage.order') }}">
                    <i class="fa fa-shopping-cart"></i> <span>@lang('admin.Orders')</span>
                    <span class="pull-right-container">
                        <small
                            class="label pull-right bg-gray">{{ @$statistics['total_order'] ? $statistics['total_order'] : 0 }}</small>
                    </span>
                </a>
            </li>
            <li class="{{ url()->current() == route('manage.return') ? 'active' : '' }}">
                <a href="{{ route('manage.return') }}">
                    <i class="fa fa-cart-arrow-down"></i> <span>Qaytarma</span>
                    <span class="pull-right-container">
                        <small
                            class="label pull-right bg-gray">{{ @$statistics['total_return'] ? $statistics['total_return'] : 0 }}</small>
                    </span>
                </a>
            </li>
            <li class="{{ url()->current() == route('manage.slider') ? 'active' : '' }}">
                <a href="{{ route('manage.slider') }}">
                    <i class="fa fa-slideshare"></i> <span>@lang('admin.Sliders')</span>
                    <span class="pull-right-container">
                        <small
                            class="label pull-right bg-gray">{{ @$statistics['total_slider'] ? $statistics['total_slider'] : 0 }}</small>
                    </span>
                </a>
            </li>
            <li class="{{ url()->current() == route('manage.company') ? 'active' : '' }}">
                <a href="{{ route('manage.company') }}">
                    <i class="fa fa-podcast"></i> <span>Kompaniyalar</span>
                </a>
            </li>
            <li
                class="treeview {{ url()->current() == route('manage.banner', 'top') || url()->current() == route('manage.banner', 'center') || url()->current() == route('manage.banner', 'bottom') ? 'active' : '' }}">
                <a href="#"><i class="fa fa-picture-o"></i> <span>@lang('admin.Banners')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ url()->current() == route('manage.banner', 'top') ? 'active' : '' }}"><a
                            href="{{ route('manage.banner', 'top') }}">??st</a></li>
                    <li class="{{ url()->current() == route('manage.banner', 'center') ? 'active' : '' }}"><a
                            href="{{ route('manage.banner', 'center') }}">M??rk??z</a></li>
                    {{-- <li class="{{ url()->current() == route('manage.banner', 'bottom') ? 'active' : '' }}"><a
                            href="{{ route('manage.banner', 'bottom') }}">Alt</a></li> --}}
                </ul>
            </li>
            <li class="{{ url()->current() == route('manage.review') ? 'active' : '' }}">
                <a href="{{ route('manage.review') }}">
                    <i class="fa fa-comments"></i> <span>R??yl??r</span>
                    <span class="pull-right-container">
                        <small
                            class="label pull-right bg-gray">{{ @$statistics['total_reviews'] ? $statistics['total_reviews'] : 0 }}</small>
                    </span>
                </a>
            </li>
            <li class="{{ url()->current() == route('manage.envelope') ? 'active' : '' }}">
                <a href="{{ route('manage.envelope') }}">
                    <i class="fa fa-envelope"></i> <span>Mesajlar</span>
                    <span class="pull-right-container">
                        <small
                            class="label pull-right bg-gray">{{ @$statistics['total_messages'] ? $statistics['total_messages'] : 0 }}</small>
                    </span>
                </a>
            </li>
            {{-- <li class="{{ url()->current() == route('manage.services') ? 'active' : '' }}">
                <a href="{{ route('manage.services') }}">
                    <i class="fa fa-handshake-o" aria-hidden="true"></i> <span>Xidm??tl??r</span>
                </a>
            </li> --}}
            <li class="{{ url()->current() == route('manage.info') ? 'active' : '' }}">
                <a href="{{ route('manage.info') }}">
                    <i class="fa fa-info-circle"></i> <span>Veb Sayt Info</span>
                </a>
            </li>
            <li class="{{ url()->current() == route('manage.about') ? 'active' : '' }}">
                <a href="{{ route('manage.about') }}">
                    <i class="fa fa-globe"></i> <span>Haqq??m??zda</span>
                </a>
            </li>

            <li class="{{ url()->current() == route('manage.terms') ? 'active' : '' }}">
                <a href="{{ route('manage.terms') }}">
                    <i class="fa fa-users"></i> <span>??stifad????i ????rtl??ri</span>
                </a>
            </li>
            <li class="{{ url()->current() == route('manage.privacy') ? 'active' : '' }}">
                <a href="{{ route('manage.privacy') }}">
                    <i class="fa fa-user-secret"></i> <span>M??xfilik siyas??ti</span>
                </a>
            </li>
            <li class="{{ url()->current() == route('manage.shipping_return') ? 'active' : '' }}">
                <a href="{{ route('manage.shipping_return') }}">
                    <i class="fa fa-truck"></i> <span>G??nd??rm?? v?? Qaytarma</span>
                </a>
            </li>
            <li class="{{ url()->current() == route('manage.apikey') ? 'active' : '' }}">
                <a href="{{ route('manage.apikey') }}">
                    <i class="fa fa-key"></i><span>API</span>
                </a>
            </li>
            <li class="{{ url()->current() == route('manage.xml_import') ? 'active' : '' }}">
                <a href="{{ route('manage.xml_import') }}">
                    <i class="fa fa-download"></i><span>XML Import</span>
                </a>
            </li>
            <li class="{{ url()->current() == route('manage.logs') ? 'active' : '' }}">
                <a href="{{ route('manage.logs') }}">
                    <i class="fa fa-exclamation-circle"></i><span>Logs</span>
                </a>
            </li>

            <li class="header">@lang('admin.ORDERS')</li>
            <li><a href="#"><i class="fa fa-circle-o text-red"></i> @lang('admin.Pending') <span
                class="pull-right-container"> <small
                    class="label pull-right bg-blue">{{ @$statistics['total_order_yohbr'] ? $statistics['total_order_yohbr'] : 0 }}</small></span></a>
            </li>
            <li><a href="#"><i class="fa fa-circle-o text-fuchsia"></i> @lang('admin.Payment approved') <span
                        class="pull-right-container"> <small
                            class="label pull-right bg-fuchsia">{{ @$statistics['total_payment_approved'] ? $statistics['total_payment_approved'] : 0 }}</small></span></a>
            </li>
            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> @lang('admin.Cargoed') <span
                        class="pull-right-container"> <small
                            class="label pull-right bg-yellow">{{ @$statistics['total_order_cargoed'] ? $statistics['total_order_cargoed'] : 0 }}</small></span></a>
            </li>

            <li><a href="#"><i class="fa fa-circle-o text-green"></i> @lang('admin.Order completed') <span
                        class="pull-right-container"> <small
                            class="label pull-right bg-green">{{ @$statistics['total_order_completed'] ? $statistics['total_order_completed'] : 0 }}</small></span></a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
