<div class="nk-sidebar nk-sidebar-fixed " data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-sidebar-brand">
            <a href="html/index.html" class="logo-link nk-sidebar-logo">
                <img class="logo-light logo-img" src="{{ asset('admin/uploads/img/'. getSetting('logo')) }}" srcset="{{ asset('admin/uploads/img/'. getSetting('logo')) }}" alt="logo">
                <img class="logo-dark logo-img" src="{{ asset('admin/uploads/img/'. getSetting('logo')) }}" srcset="{{ asset('admin/uploads/img/'. getSetting('logo')) }}" alt="logo-dark">
            </a>
        </div>
        <div class="nk-menu-trigger mr-n2">
            <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
        </div>
    </div><!-- .nk-sidebar-element -->
    <div class="nk-sidebar-element">
        <div class="nk-sidebar-body" data-simplebar>
            <div class="nk-sidebar-content">
                <div class="nk-sidebar-menu">
                    <ul class="nk-menu">
                        @foreach(request()->menus as $menuGroup)
                            @if (count($menuGroup->menu) > 0)
                                <li class="nk-menu-heading">
                                    <h6 class="overline-title text-primary-alt">{{ $menuGroup->name }}</h6>
                                </li><!-- .nk-menu-item -->
                            @endif
                            @foreach ($menuGroup->menu as $menu)
                                @if (count($menu->submenu) > 0)
                                        <?php
                                            $permission = [];
                                            foreach($menu->submenu as $sm){
                                                $permission[] = 'read-'. explode('/', $sm->url)[2];
                                            }
                                        ?>

                                        @canany($permission)
                                        <li class="nk-menu-item has-sub">
                                            <a href="#" class="nk-menu-link nk-menu-toggle">
                                                <span class="nk-menu-icon"><em class="{{ $menu->icon }}"></em></span>
                                                <span class="nk-menu-text">{{ $menu->title }}</span>
                                            </a>
                                            <ul class="nk-menu-sub">
                                                @foreach ($menu->submenu as $submenu)
                                                    @can('read-' . explode('/', $submenu->url)[2])
                                                        <li class="nk-menu-item">
                                                            <a href="{{ $submenu->url }}" class="nk-menu-link ajaxAction"><span class="nk-menu-text">{{ $submenu->title }}</span></a>
                                                        </li>
                                                    @endcan
                                                @endforeach
                                            </ul><!-- .nk-menu-sub -->
                                        </li><!-- .nk-menu-item -->
                                        @endcanany
                                    @else
                                        @if($menu->url !== '#')
                                            @can('read-' . explode('/', $menu->url)[2])
                                            <li class="nk-menu-item">
                                                <a href="{{ $menu->url }}" class="nk-menu-link ajaxAction">
                                                    <span class="nk-menu-icon"><em class="{{ $menu->icon }}"></em></span>
                                                    <span class="nk-menu-text">{{ $menu->title }}</span>
                                                </a>
                                            </li>
                                            @endcan
                                        @endif
                                @endif
                            @endforeach
                        @endforeach
                    </ul><!-- .nk-menu -->
                </div><!-- .nk-sidebar-menu -->
                <div class="nk-sidebar-footer">
                    <ul class="nk-menu nk-menu-footer">
                        <li class="nk-menu-item">
                            <a href="#" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-help-alt"></em></span>
                                <span class="nk-menu-text">Support</span>
                            </a>
                        </li>
                        <li class="nk-menu-item ml-auto">
                            <div class="dropup">
                                <a href="#" class="nk-menu-link dropdown-indicator has-indicator" data-toggle="dropdown" data-offset="0,10">
                                    <span class="nk-menu-icon"><em class="icon ni ni-globe"></em></span>
                                    <span class="nk-menu-text">English</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                    <ul class="language-list">
                                        <li>
                                            <a href="#" class="language-item">
                                                <img src="{{ asset('admin/assets/images/flags/english.png') }}" alt="" class="language-flag">
                                                <span class="language-name">English</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="language-item">
                                                <img src="{{ asset('admin/assets/images/flags/spanish.png') }}" alt="" class="language-flag">
                                                <span class="language-name">Español</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="language-item">
                                                <img src="{{ asset('admin/assets/images/flags/french.png') }}" alt="" class="language-flag">
                                                <span class="language-name">Français</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="language-item">
                                                <img src="{{ asset('admin/assets/images/flags/turkey.png') }}" alt="" class="language-flag">
                                                <span class="language-name">Türkçe</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul><!-- .nk-footer-menu -->
                </div><!-- .nk-sidebar-footer -->
            </div><!-- .nk-sidebar-content -->
        </div><!-- .nk-sidebar-body -->
    </div><!-- .nk-sidebar-element -->
</div>
