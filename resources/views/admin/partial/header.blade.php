<header class="main-header">

        {{--<!-- Logo -->--}}
        <a href="{{ route('admin.indro.index') }}" class="logo">
            {{--<!-- mini logo for sidebar mini 50x50 pixels -->--}}
            <span class="logo-mini"><b>ECDO</b></span>
            <span class="logo-lg"><b>ECDO</b></span>
        </a>

        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">

                    <!-- Messages: style can be found in dropdown.less-->
                    <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-envelope-o"></i>
                            <span class="label label-success">{{ total_message() > 0 ? total_message() : '' }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header"> {{__('site.you_have') }} {{ total_message() }}  {{ __('site.messages')}} </li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    @if(total_message() > 0)
                                        @foreach(unread_message() as $message)
                                        <li><!-- start message -->
                                            <a href="{{ route('admin.contact.show',$message->id) }}">
                                              <h4>
                                                {{$message->name}}
                                                <small><i class="fa fa-clock-o"></i> {{ $message->created_at->diffForHumans() }}</small>
                                              </h4>
                                              <p>{{$message->subject}}</p>
                                            </a>
                                          </li>
                                          @endforeach
                                       @endif
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="{{ route('admin.contact.index') }}">See All Messages</a>
                            </li>
                        </ul>
                    </li>

                    {{--<!-- Notifications: style can be found in dropdown.less -->--}}


                    {{--<!-- User Account: style can be found in dropdown.less -->--}}
                    <li class="dropdown user user-menu">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{ asset('images/user/'.auth()->user()->image) }}" class="user-image" alt="User Image">
                            <span class="hidden-xs">{{ auth()->user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu">

                            {{--<!-- User image -->--}}
                            <li class="user-header">
                                <img src="{{ asset('images/user/'.auth()->user()->image) }}" class="img-circle" alt="User Image">

                                <p>
                                    {{ auth()->user()->name }}
                                </p>
                            </li>

                            {{--<!-- Menu Footer-->--}}
                            <li class="user-footer">


                                <a href="{{ route('logout') }}" class="btn btn-default btn-flat" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">@lang('site.logout')</a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>

                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>

    </header>