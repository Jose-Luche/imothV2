<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul class="metismenu" id="side-menu">

                <li class="menu-title">Navigation</li>
                <li>
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="fa fa-home"></i>
                        <span> Dashboard</span>
                    </a>

                </li>
                <li>
                    <a href="javascript: void(0);">
                        <i class="fa fa-building"></i>
                        <span>Companies </span>
                        <span class="fa fa-chevron-down pull-right"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="{{ route('admin.companies') }}">Companies</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.companies.create') }}">New Company</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);">
                        <i class="fa fa-car"></i>
                        <span> Motor Insurance </span>
                        <span class="fa fa-chevron-down pull-right"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="{{ route('admin.comprehensive') }}">Comprehensive Covers</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.thirdParty') }}">Third Party Covers</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);">
                        <i class="fa fa-trademark"></i>
                        <span>Non Motor Insurance</span>
                        <span class="fa fa-chevron-down pull-right"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="{{ route('admin.health') }}">Health Insurance</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.home') }}">Home Insurance</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.travel') }}">Travel Insurance</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.business') }}">Business Insurance</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.life') }}">Life Insurance</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.bidBonds') }}">Bid Bonds</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.performanceBonds') }}">Performance Bonds</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.attachment') }}">Attachment</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.personalAccident') }}">Personal Accident</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.lastExpense') }}">Last Expense</a>
                        </li>

                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);">
                        <i class="fa fa-file-word-o"></i>
                        <span>GI Limits/Clauses</span>
                        <span class="fa fa-chevron-down pull-right"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="{{ route('admin.limits.motor.list') }}">Motor Limits</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.limits.nonmotor.list') }}">Non Motor Limits</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('admin.payments') }}">
                        <i class="fa fa-dollar"></i>
                        <span>Payments</span>
{{--                        <span class="fa fa-users pull-right"></span>--}}
                    </a>
                </li>

                <li>
                    <a href="{{ route('view.enquiries') }}">
                        <i class="fa fa-dollar"></i>
                        <span>Enquiries</span>
{{--                        <span class="fa fa-users pull-right"></span>--}}
                    </a>
                </li>


                <li>
                    <a href="javascript: void(0);">
                        <i class="fa fa-money-check"></i>
                        <span> Blog </span>
                        <span class="fa fa-chevron-down pull-right"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="{{ route('admin.blogs') }}">Blog List</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.blog.create') }}">New Blog</a>
                        </li>
                    </ul>
                </li>


                <li>
                    <a href="javascript: void(0);">
                        <i class="fa fa-inbox"></i>
                        <span> Requests </span>
                        <span class="fa fa-chevron-down pull-right"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="{{ route('admin.reports.motor') }}">Motor Insurance</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.reports.motorCircle') }}">Motor Bike Insurance</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.reports.corporate') }}">Corporate Insurance</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.reports.accidents') }}">Personal Accidents Insurance</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.reports.life') }}">Life Insurance</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.reports.health') }}">Health Insurance</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.reports.bidBond') }}">Bid Bond Insurance</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.reports.performance') }}">Performance Bond Insurance</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.reports.indemnity') }}">Personal Indemnity Insurance</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.reports.business') }}">Business Insurance</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.reports.home') }}">Home Insurance</a>
                        </li>

                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);">
                        <i class="fa fa-users"></i>
                        <span> User Management </span>
                        <span class="fa fa-chevron-down pull-right"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="{{ route('admin.users.create') }}">New User</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.users') }}">Users List</a>
                        </li>

                    </ul>
                </li>

            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->
</div>
