<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <ul class="sidebar-menu">
            <li class="header">@lang('menu.main_navigation')</li>
            <li @if(strpos(\Request::route()->getName(),'dashboard')) class="active" @endif>
                <a href="{{ route('admin.dashboard.index') }}">
                    <i class="fa fa-dashboard"></i> <span>@lang('menu.dashboard')</span>
                </a>
            </li>
            <li @if(strpos(\Request::route()->getName(),'users')) class="active" @endif>
                <a href="{{ route('admin.users.index') }}">
                    <i class="fa fa-users"></i> <span>@lang('menu.users')</span>
                </a>
            </li>

            <li @if(strpos(\Request::route()->getName(),'categories')) class="active" @endif>
                <a href="{{ route('admin.categories.index') }}"> 
                    <i class="fa fa-categories"></i> <span>@lang('menu.categories')</span>
                </a>
            </li>

            <li @if(strpos(\Request::route()->getName(),'articles')) class="active" @endif>
                <a href="{{ route('admin.articles.index') }}"> 
                    <i class="fa fa-articles"></i> <span>@lang('menu.articles')</span>
                </a>
            </li>

            <li @if(strpos(\Request::route()->getName(),'reviews')) class="active" @endif>
                <a href="{{ route('admin.reviews.index') }}"> 
                    <i class="fa fa-reviews"></i> <span>@lang('menu.reviews')</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>