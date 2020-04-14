@php
    $user = Auth::user();
@endphp
<!-- Navbar-->
<header class="app-header"><a class="app-header__logo" href="{{ route('admin.dashboard') }}">ADMIN PANEL</a>
    <!-- Sidebar toggle button-->
    <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">
        <!--Notification Menu-->
        <li class="dropdown">
            <a class="app-nav__item" href="#" style="text-decoration: none" data-toggle="dropdown" aria-label="Show notifications">
                <i class="fa fa-bell-o fa-lg"></i> 
                @if ($user->unreadNotifications->count() > 0)
                    <div class="badge badge-danger">
                        {{ $user->unreadNotifications->count() }}
                    </div>
                @endif
            </a>
            <ul class="app-notification dropdown-menu dropdown-menu-right">
                <li class="app-notification__title">{{ $user->unreadNotifications->count() }} pemberitahuan baru</li>
                <div class="app-notification__content">
                    @foreach ($user->notifications as $n)
                        @php
                            $data = $n->data
                        @endphp
                        @if ($n->read_at !== null)
                            <li>
                                <a onclick="markAsRead(event)" data-id="{{ $n->id }}" data-url="{{ $data['url'] }}" class="app-notification__item" href="#">
                                    <span class="app-notification__icon">
                                        <span class="fa-stack fa-lg">
                                            <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                            <i class="fa fa-envelope fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </span>
                                    <div>
                                        <p class="app-notification__message" style="color: #999;">{{ $data['title'] }}</p>
                                        <p class="app-notification__meta">{{ $n->created_at->diffForHumans() }}</p>
                                    </div>
                                </a>
                            </li>
                        @else 
                            <li>
                                <a onclick="markAsRead(event)" data-id="{{ $n->id }}" data-url="{{ $data['url'] }}" class="app-notification__item" href="#">
                                    <span class="app-notification__icon">
                                        <span class="fa-stack fa-lg">
                                            <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                            <i class="fa fa-envelope fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </span>
                                    <div>
                                        <p class="app-notification__message" style="color: black; font-weight: bold">{{ $data['title'] }}</p>
                                        <p class="app-notification__meta">{{ $n->created_at->diffForHumans() }}</p>
                                    </div>
                                </a>
                            </li>
                        @endif
                    @endforeach
                </div>
                </div>
                <li class="app-notification__footer">
                    <a href="#" style="text-decoration: none" onclick="markAllAsRead(event)">Tandai semua untuk di baca.</a>
                </li>
            </ul>
        </li>
        <!-- User Menu-->
        <li class="dropdown">
            <a class="app-nav__item" href="#" data-toggle="dropdown" style="text-decoration: none" aria-label="Open Profile Menu">
                <i class="fa fa-user fa-lg"></i>
            </a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
                <li>
                    <a class="dropdown-item" href="{{ route('admin.logout') }}">
                        <i class="fa fa-sign-out fa-lg"></i> Logout
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</header>

@section('script')
    <script>
        function markAsRead(e) {
            e.stopPropagation();
            var a = e.target.parentElement.parentElement;
            var id = $(a).attr('data-id')
            var url = $(a).attr('data-url')
            var base_url = {!! json_encode(url('/')) !!}
            var mark_url = base_url+'/mark-as-read/'+id;
            $.get(mark_url);
            setTimeout(() => {
                location.href = url;
            }, 1000);
        }

        function markAllAsRead(e) {
            e.stopPropagation();
            $.get('{{ route('mark.all.as.read') }}');
            setTimeout(() => {
                location.reload();
            }, 1000);
        }
    </script>
@endsection