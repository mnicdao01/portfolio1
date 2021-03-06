<nav class="navbar navbar-default">
              <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="#">My Blog</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <ul class="nav navbar-nav">
                    <li class="active"><a href="/">Home <span class="sr-only">(current)</span></a></li>
                    <li><a href="/about">About</a></li>
                    <li><a href="/contact">Contact Us</a></li>

                  </ul>

                  <ul class="nav navbar-nav navbar-right">
                    @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                     <li class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                                        {{ Auth::user()->name }} <span class="caret"></span>
                                                    </a>

                                                    <ul class="dropdown-menu" role="menu">


                                                        <li>
                                                            <a href="{{ route('posts.index') }}"> Posts</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('categories.index') }}"> Categories</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('tags.index') }}"> Tags</a>
                                                        </li>
                                                        <li class="separator"></li>
                                                        <li>
                                                            <a href="{{ url('/logout') }}"
                                                                  onclick="event.preventDefault();
                                                                  document.getElementById('logout-form').submit();">
                                                                    Logout
                                                            </a>

                                                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                                                  {{ csrf_field() }}
                                                             </form>
                                                        </li>
                                                    </ul>
                                                </li>
                                            @endif
                  </ul>
                </div><!-- /.navbar-collapse -->
              </div><!-- /.container-fluid -->
            </nav>