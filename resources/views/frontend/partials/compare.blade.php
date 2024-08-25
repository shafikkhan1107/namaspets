<a href="{{ route('compare') }}" class="d-flex align-items-center text-reset">
    <i class="la la-random la-2x opacity-80"></i>
    <span class="flex-grow-1 ml-1">
        @if(Session::has('compare'))
            <span class="badge badge-primary badge-inline badge-pill">{{ count(Session::get('compare'))}}2</span>
        @else
            <span class="badge badge-primary badge-inline badge-pill">0</span>
        @endif
        <span class="nav-box-text d-none d-xl-block opacity-70">{{translate('Compare')}}2</span>
    </span>
</a>