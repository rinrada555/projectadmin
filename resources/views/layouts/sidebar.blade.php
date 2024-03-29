<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav mt-2">
                            <a class="nav-link" href="{{ route('dashboard') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                <i class="fas fa-user mr-2"></i>
                                <span>เปิดงานซ่อม</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                <i class="fas fa-user mr-2"></i>
                                <span>งานเข้าซ่อม</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('appointments') }}">
                                <i class="fas fa-user mr-2"></i>
                                <span>ลูกค้าขอนัดหมาย</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('technicains') }}">
                                <i class="fas fa-user mr-2"></i>
                                <span>ข้อมูลช่าง</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('car_parts') }}">
                                <i class="fas fa-user mr-2"></i>
                                <span>คลังอะไหล่</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('promotions') }}">
                                <i class="fas fa-user mr-2"></i>
                                <span>จัดการโปรโมชัน</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('claims') }}">
                                <i class="fas fa-user mr-2"></i>
                                <span>ประกันสินค้า/บริการ</span></a>
                            </li>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                เอกสาร
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                                <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                            ใบกำกับภาษี
                                        </a>
                                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                            ใบรับรถ
                                        </a>
                                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                            ใบประกันบริการ
                                        </a>
                                    </nav>
                                </div>
                            
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                รายงาน
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>





