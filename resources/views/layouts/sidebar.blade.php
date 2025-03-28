 <div id="layoutSidenav_nav">
                <nav class="sidenav shadow-right sidenav-light">
                    <div class="sidenav-menu">
                        <div class="nav accordion" id="accordionSidenav">
                            <!-- Sidenav Menu Heading (Account)-->
                            <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                            <div class="sidenav-menu-heading d-sm-none">Account</div>
                            <!-- Sidenav Link (Alerts)-->
                            <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                            <a class="nav-link d-sm-none" href="#!">
                                <div class="nav-link-icon"><i data-feather="bell"></i></div>
                                Alerts
                                <span class="badge badge-warning-soft text-warning ml-auto">4 New!</span>
                            </a>
                            <!-- Sidenav Link (Messages)-->
                            <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                            <a class="nav-link d-sm-none" href="#!">
                                <div class="nav-link-icon"><i data-feather="mail"></i></div>
                                Messages
                                <span class="badge badge-success-soft text-success ml-auto">2 New!</span>
                            </a>
                         
                            <div class="collapse" id="collapseUtilities" data-parent="#accordionSidenav">
                                <nav class="sidenav-menu-nested nav">
                                    <a class="nav-link" href="animations.html">Animations</a>
                                    <a class="nav-link" href="background.html">Background</a>
                                    <a class="nav-link" href="borders.html">Borders</a>
                                    <a class="nav-link" href="lift.html">Lift</a>
                                    <a class="nav-link" href="shadows.html">Shadows</a>
                                    <a class="nav-link" href="typography.html">Typography</a>
                                </nav>
                            </div>
                            <!-- Sidenav Heading (Addons)-->
                            <div class="sidenav-menu-heading">Plugins</div>
                            <!-- Sidenav Link (Products)-->
                            <a class="nav-link" href="{{ route('products.index') }}">
                                <div class="nav-link-icon"></div>
                                Productos
                            </a>
                            <!-- Sidenav Link (Categories)-->
                            <a class="nav-link" href="{{ route('categories.index') }}">
                                <div class="nav-link-icon"></div>
                                Categorias
                            </a>
                            <!-- Sidenav Link (Providers)-->
                            <a class="nav-link" href="{{ route('providers.index') }}">
                                <div class="nav-link-icon"></div>
                                Proveedores
                            </a>
                            <!-- Sidenav Link (Clients)-->
                            <a class="nav-link" href="{{ route('clients.index') }}">
                                <div class="nav-link-icon"></div>
                                Clientes
                            </a>
                            <!-- Sidenav Link (Ventas)-->
                            <a class="nav-link" href="{{ route('sales.index') }}">
                                <div class="nav-link-icon"></div>
                                Ventas
                            </a>
                            <!-- Sidenav Link (Purchses)-->
                            <a class="nav-link" href="{{ route('purchases.index') }}">
                                <div class="nav-link-icon"></div>
                                Compras
                            </a>
                             <!-- Sidenav Link (Users)-->
                            <a class="nav-link" href="{{ route('users.index') }}">
                                <div class="nav-link-icon"></div>
                                Usuarios
                            </a>
                        </div>
                    </div>
                    <!-- Sidenav Footer-->
                    <div class="sidenav-footer">
                        <div class="sidenav-footer-content">
                            <div class="sidenav-footer-subtitle">Logged in as:</div>
                            <div class="sidenav-footer-title">Valerie Luna</div>
                        </div>
                    </div>
                </nav>
            </div>