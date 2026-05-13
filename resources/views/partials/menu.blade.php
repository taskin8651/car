<aside id="sidebar">

    {{-- BRAND --}}
    <div class="sidebar-brand">
        <div class="brand-area">
            <div class="brand-icon">
                <i class="fas fa-bolt"></i>
            </div>

            <span class="brand-text">
                {{ trans('panel.site_title') }}
            </span>
        </div>
    </div>

    {{-- USER MINI CARD --}}
    <div class="user-info">
        <div class="user-avatar">
            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
        </div>

        <div class="user-meta">
            <p class="user-name">{{ auth()->user()->name }}</p>
            <p class="user-role">Administrator</p>
        </div>
    </div>

    {{-- NAV --}}
    <nav class="sidebar-nav">

        <p class="sidebar-section-title nav-label">Main</p>

        {{-- Dashboard --}}
        <a href="{{ route('admin.home') }}"
           data-tooltip="Dashboard"
           class="nav-link {{ request()->routeIs('admin.home') ? 'active' : '' }}">
            <i class="fas fa-chart-pie nav-icon"></i>
            <span class="nav-label">{{ trans('global.dashboard') }}</span>
        </a>

        {{-- HOMEPAGE MANAGEMENT GROUP --}}
@can('home_hero_slide_access')
    @php
        $homeActive = request()->is('admin/home-hero-slides*')
            || request()->is('admin/testimonials*');
    @endphp

    <div x-data="{ open: {{ $homeActive ? 'true' : 'false' }} }">
        <button type="button"
                @click="open = !open"
                data-tooltip="Homepage"
                class="nav-link nav-group-btn {{ $homeActive ? 'active' : '' }}">
            <div class="nav-group-left">
                <i class="fas fa-home nav-icon"></i>
                <span class="nav-label">Homepage Management</span>
            </div>
            <i class="fas fa-chevron-right chevron"
               :style="open ? 'transform:rotate(90deg)' : ''"></i>
        </button>

        <div class="submenu"
             x-show="open"
             x-transition:enter="transition ease-out duration-150"
             x-transition:enter-start="opacity-0 -translate-y-1"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-100"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-1">

            @can('home_hero_slide_access')
                <a href="{{ route('admin.home-hero-slides.index') }}"
                   class="sub-link {{ request()->is('admin/home-hero-slides*') ? 'active' : '' }}">
                    <i class="fas fa-images"></i>
                    Hero Slides
                </a>
            @endcan

            @can('testimonial_access')
                <a href="{{ route('admin.testimonials.index') }}"
                   class="sub-link {{ request()->is('admin/testimonials*') ? 'active' : '' }}">
                    <i class="fas fa-comment-dots"></i>
                    Testimonials
                </a>
            @endcan
        </div>
    </div>
@endcan

        {{-- USER MANAGEMENT GROUP --}}
        @can('user_management_access')
            @php
                $umActive = request()->is('admin/permissions*')
                    || request()->is('admin/roles*')
                    || request()->is('admin/users*')
                    || request()->is('admin/audit-logs*');
            @endphp

            <div x-data="{ open: {{ $umActive ? 'true' : 'false' }} }">

                <button type="button"
                        @click="open = !open"
                        data-tooltip="Users"
                        class="nav-link nav-group-btn {{ $umActive ? 'active' : '' }}">

                    <div class="nav-group-left">
                        <i class="fas fa-users nav-icon"></i>
                        <span class="nav-label">{{ trans('cruds.userManagement.title') }}</span>
                    </div>

                    <i class="fas fa-chevron-right chevron"
                       :style="open ? 'transform:rotate(90deg)' : ''"></i>
                </button>

                <div class="submenu"
                     x-show="open"
                     x-transition:enter="transition ease-out duration-150"
                     x-transition:enter-start="opacity-0 -translate-y-1"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     x-transition:leave="transition ease-in duration-100"
                     x-transition:leave-start="opacity-100 translate-y-0"
                     x-transition:leave-end="opacity-0 -translate-y-1">

                    @can('permission_access')
                        <a href="{{ route('admin.permissions.index') }}"
                           class="sub-link {{ request()->is('admin/permissions*') ? 'active' : '' }}">
                            <i class="fas fa-key"></i>
                            {{ trans('cruds.permission.title') }}
                        </a>
                    @endcan

                    @can('role_access')
                        <a href="{{ route('admin.roles.index') }}"
                           class="sub-link {{ request()->is('admin/roles*') ? 'active' : '' }}">
                            <i class="fas fa-shield-alt"></i>
                            {{ trans('cruds.role.title') }}
                        </a>
                    @endcan

                    @can('user_access')
                        <a href="{{ route('admin.users.index') }}"
                           class="sub-link {{ request()->is('admin/users*') ? 'active' : '' }}">
                            <i class="fas fa-user-circle"></i>
                            {{ trans('cruds.user.title') }}
                        </a>
                    @endcan

                    @can('audit_log_access')
                        <a href="{{ route('admin.audit-logs.index') }}"
                           class="sub-link {{ request()->is('admin/audit-logs*') ? 'active' : '' }}">
                            <i class="fas fa-history"></i>
                            {{ trans('cruds.auditLog.title') }}
                        </a>
                    @endcan

                </div>
            </div>
        @endcan

        {{-- ABOUT MANAGEMENT GROUP --}}
@can('about_company_access')
    @php
        $aboutActive = request()->is('admin/about-companies*')
            || request()->is('admin/about-missions*')
            || request()->is('admin/about-specialization-cards*');
    @endphp

    <div x-data="{ open: {{ $aboutActive ? 'true' : 'false' }} }">

        <button type="button"
                @click="open = !open"
                data-tooltip="About"
                class="nav-link nav-group-btn {{ $aboutActive ? 'active' : '' }}">

            <div class="nav-group-left">
                <i class="fas fa-building nav-icon"></i>
                <span class="nav-label">About Management</span>
            </div>

            <i class="fas fa-chevron-right chevron"
               :style="open ? 'transform:rotate(90deg)' : ''"></i>
        </button>

        <div class="submenu"
             x-show="open"
             x-transition:enter="transition ease-out duration-150"
             x-transition:enter-start="opacity-0 -translate-y-1"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-100"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-1">

            @can('about_company_access')
                <a href="{{ route('admin.about-companies.index') }}"
                   class="sub-link {{ request()->is('admin/about-companies*') ? 'active' : '' }}">
                    <i class="fas fa-building"></i>
                    Company Intro
                </a>
            @endcan

            @can('about_mission_access')
                <a href="{{ route('admin.about-missions.index') }}"
                   class="sub-link {{ request()->is('admin/about-missions*') ? 'active' : '' }}">
                    <i class="fas fa-bullseye"></i>
                    Business Mission
                </a>
            @endcan

            @can('about_specialization_card_access')
                <a href="{{ route('admin.about-specialization-cards.index') }}"
                   class="sub-link {{ request()->is('admin/about-specialization-cards*') ? 'active' : '' }}">
                    <i class="fas fa-car"></i>
                    Specialization Cards
                </a>
            @endcan

        </div>
    </div>
@endcan

        {{-- CARS MANAGEMENT --}}
@can('car_access')
    @php
        $carsActive = request()->is('admin/cars*')
            || request()->is('admin/car-enquiries*')
            || request()->is('admin/booking-enquiries*');
    @endphp

    <div x-data="{ open: {{ $carsActive ? 'true' : 'false' }} }">
        <button type="button"
                @click="open = !open"
                data-tooltip="Cars"
                class="nav-link nav-group-btn {{ $carsActive ? 'active' : '' }}">
            <div class="nav-group-left">
                <i class="fas fa-car-side nav-icon"></i>
                <span class="nav-label">Cars Management</span>
            </div>
            <i class="fas fa-chevron-right chevron"
               :style="open ? 'transform:rotate(90deg)' : ''"></i>
        </button>

        <div class="submenu"
             x-show="open"
             x-transition:enter="transition ease-out duration-150"
             x-transition:enter-start="opacity-0 -translate-y-1"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-100"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-1">

            <a href="{{ route('admin.cars.index') }}"
               class="sub-link {{ request()->is('admin/cars*') ? 'active' : '' }}">
                <i class="fas fa-car"></i>
                Cars
            </a>

            @can('car_enquiry_access')
                <a href="{{ route('admin.car-enquiries.index') }}"
                   class="sub-link {{ request()->is('admin/car-enquiries*') ? 'active' : '' }}">
                    <i class="fas fa-calendar-check"></i>
                    Car Enquiries
                </a>
            @endcan

            @can('booking_enquiry_access')
                <a href="{{ route('admin.booking-enquiries.index') }}"
                   class="sub-link {{ request()->is('admin/booking-enquiries*') ? 'active' : '' }}">
                    <i class="fas fa-clipboard-list"></i>
                    Booking Enquiries
                </a>
            @endcan
        </div>
    </div>
@endcan

        {{-- GALLERY MANAGEMENT --}}
@can('gallery_item_access')
    <a href="{{ route('admin.gallery-items.index') }}"
       data-tooltip="Gallery"
       class="nav-link {{ request()->is('admin/gallery-items*') ? 'active' : '' }}">
        <i class="fas fa-images nav-icon"></i>
        <span class="nav-label">Gallery Management</span>
    </a>
@endcan

        {{-- SERVICES MANAGEMENT GROUP --}}
@can('service_intro_access')
    @php
        $servicesActive = request()->is('admin/service-intros*')
            || request()->is('admin/service-highlights*')
            || request()->is('admin/service-cards*');
    @endphp

    <div x-data="{ open: {{ $servicesActive ? 'true' : 'false' }} }">

        <button type="button"
                @click="open = !open"
                data-tooltip="Services"
                class="nav-link nav-group-btn {{ $servicesActive ? 'active' : '' }}">

            <div class="nav-group-left">
                <i class="fas fa-concierge-bell nav-icon"></i>
                <span class="nav-label">Services Management</span>
            </div>

            <i class="fas fa-chevron-right chevron"
               :style="open ? 'transform:rotate(90deg)' : ''"></i>
        </button>

        <div class="submenu"
             x-show="open"
             x-transition:enter="transition ease-out duration-150"
             x-transition:enter-start="opacity-0 -translate-y-1"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-100"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-1">

            @can('service_intro_access')
                <a href="{{ route('admin.service-intros.index') }}"
                   class="sub-link {{ request()->is('admin/service-intros*') ? 'active' : '' }}">
                    <i class="fas fa-info-circle"></i>
                    Services Intro
                </a>
            @endcan

            @can('service_card_access')
                <a href="{{ route('admin.service-cards.index') }}"
                   class="sub-link {{ request()->is('admin/service-cards*') ? 'active' : '' }}">
                    <i class="fas fa-th-large"></i>
                    Service Cards
                </a>
            @endcan

            @can('service_highlight_access')
                <a href="{{ route('admin.service-highlights.index') }}"
                   class="sub-link {{ request()->is('admin/service-highlights*') ? 'active' : '' }}">
                    <i class="fas fa-star"></i>
                    Service Highlight
                </a>
            @endcan

        </div>
    </div>
@endcan

        <div class="nav-divider"></div>

        <p class="sidebar-section-title compact nav-label">Account</p>

        {{-- Change Password --}}
        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <a href="{{ route('profile.password.edit') }}"
                   data-tooltip="Password"
                   class="nav-link {{ request()->is('profile/password*') ? 'active' : '' }}">
                    <i class="fas fa-key nav-icon"></i>
                    <span class="nav-label">{{ trans('global.change_password') }}</span>
                </a>
            @endcan
        @endif

        {{-- Settings --}}
        <a href="#"
           data-tooltip="Settings"
           class="nav-link">
            <i class="fas fa-cog nav-icon"></i>
            <span class="nav-label">Settings</span>
        </a>

    </nav>

    {{-- LOGOUT --}}
    <div class="sidebar-footer">
        <a href="#"
           onclick="event.preventDefault(); document.getElementById('logoutform').submit();"
           data-tooltip="Logout"
           class="nav-link logout-link">
            <i class="fas fa-sign-out-alt nav-icon"></i>
            <span class="nav-label">{{ trans('global.logout') }}</span>
        </a>
    </div>

</aside>
