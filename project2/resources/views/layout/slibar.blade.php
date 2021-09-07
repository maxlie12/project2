<div class="sidebar" data-active-color="red" data-background-color="black"
    data-image="{{ asset('assets') }}/img/sidebar-1.jpg">
    <!--
        Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
        Tip 2: you can also add an image using data-image tag
        Tip 3: you can change the color of the sidebar with data-background-color="white | black"
    -->
    <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
            MeoMeo
        </a>
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
            maxlie12
        </a>
    </div>
    <div class="sidebar-wrapper">
        <div class="user">
            <div class="photo">
                <img src="" />
            </div>
            <div class="info">
                <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                    <span>
                        Quản lý
                        <b class="caret"></b>
                    </span>
                </a>
                <div class="clearfix"></div>
                <div class="collapse" id="collapseExample">
                    <ul class="nav">
                        <li>
                            <a href="#">
                                <span class="sidebar-mini"> MP </span>
                                <span class="sidebar-normal"> My Profile </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="sidebar-mini"> EP </span>
                                <span class="sidebar-normal"> Edit Profile </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="sidebar-mini"> S </span>
                                <span class="sidebar-normal"> Settings </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav">
            <li class="{{ Request::is('/') ? 'active' : '' }}">
                <a href=" {{ route('dashboard') }}">
                    <i class="material-icons">dashboard</i>
                    <p> Dashboard </p>
                </a>
            </li>
            <li>
                <a data-toggle="collapse" href="#mapsExamples">
                    <i class="material-icons">table</i>
                    <p> thống kê
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="mapsExamples">
                    <ul class="nav">
                        <li class="{{ Request::is('list') ? 'active' : '' }}">
                            <a href=" {{ route('list.index') }}">
                                <i class="material-icons">notifications</i>
                                <p> Thống kê sách cho từng lớp</p>
                            </a>
                        </li>
                        <li class="{{ Request::is('NotGotBook') ? 'active' : '' }}">
                            <a href="{{ route('listStudentNotGot.index') }}">
                                <i class="material-icons">notifications</i>
                                <span class="sidebar-normal"> thống kê sv chưa nhận sách </span>
                            </a>
                        </li>
                        <li class="{{ Request::is('Unregistered') ? 'active' : '' }}">
                            <a href="{{ route('listStudentUnregistered.index') }}">
                                <i class="material-icons">notifications</i>
                                <span class="sidebar-normal"> hống kê sv chưa đky sách </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="{{ Request::is('grade') ? 'active' : '' }}">
                <a href=" {{ route('grade.index') }}">
                    <i class="material-icons">timeline</i>
                    <p> Quan ly Grade </p>
                </a>
            </li>
            <li class="{{ Request::is('student') ? 'active' : '' }}">
                <a href=" {{ route('student.index') }}">
                    <i class="material-icons">timeline</i>
                    <p> Quan ly Student </p>
                </a>
            </li>
            <li class="{{ Request::is('course') ? 'active' : '' }}">
                <a href=" {{ route('course.index') }}">
                    <i class="material-icons">timeline</i>
                    <p> Quan ly Course </p>
                </a>
            </li>
            <li class="{{ Request::is('book') ? 'active' : '' }}">
                <a href="{{ route('book.index') }}">
                    <i class=" material-icons">book</i>
                    <p> Quan ly Book </p>
                </a>
            </li>

            <li class="{{ Request::is('subject') ? 'active' : '' }} ">
                <a href="{{ route('subject.index') }}">
                    <i class="material-icons">date_range</i>
                    <p> Quan ly Subject </p>
                </a>
            </li>

            <li class="{{ Request::is('bill') ? 'active' : '' }} ">
                <a href="{{ route('bill.index') }}">
                    <i class="material-icons">date_range</i>
                    <p> Quan ly Bill </p>
                </a>
            </li>

        </ul>
    </div>
</div>
