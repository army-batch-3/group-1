<div class="sidebar" data-color="white" data-active-color="danger">
    <div class="logo">
        <a href="#" class="simple-text logo-mini">
            <div class="logo-image-small">
                <img src="{{ asset('paper') }}/img/logisticsicon.png">
            </div>
        </a>
        <a href="#" class="simple-text logo-normal">
            Logistics
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="{{ $elementActive == 'dashboard' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'dashboard') }}">
                    <i class="nc-icon nc-bank"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            {{-- <li class="{{ $elementActive == 'user' || $elementActive == 'profile' ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="true" href="#laravelExamples">
                    <i class="nc-icon"><img src="{{ asset('paper/img/laravel.svg') }}"></i>
                    <p>
                        {{ __('Laravel examples') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse show" id="laravelExamples">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'profile' ? 'active' : '' }}">
                            <a href="{{ route('profile.edit') }}">
                                <span class="sidebar-mini-icon">{{ __('UP') }}</span>
                                <span class="sidebar-normal">{{ __(' User Profile ') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'user' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'user') }}">
                                <span class="sidebar-mini-icon">{{ __('U') }}</span>
                                <span class="sidebar-normal">{{ __(' User Management ') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li> --}}
            <li class="{{ $elementActive == 'users' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'users') }}">
                    <i class="fa fa-users"></i>
                    <p>{{ __('Users') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'transportations' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'transportations') }}">
                    <i class="nc-icon nc-bus-front-12"></i>
                    <p>{{ __('Transportations') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'suppliers' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'suppliers') }}">
                    <i class="nc-icon nc-box"></i>
                    <p>{{ __('Suppliers') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'warehouse' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'warehouse') }}">
                    <i class="nc-icon nc-shop"></i>
                    <p>{{ __('Warehouse') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'assets' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'assets') }}">
                    <i class="nc-icon nc-single-02"></i>
                    <p>{{ __('Assests') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'employees' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'employees') }}">
                    <i class="nc-icon nc-badge"></i>
                    <p>{{ __('Employees') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'reports' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'reports') }}">
                    <i class="nc-icon nc-single-copy-04"></i>
                    <p>{{ __('Reports') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'fleet' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'fleet') }}">
                    <i class="nc-icon nc-credit-card"></i>
                    <p>{{ __('Fleet') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>
