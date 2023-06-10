<ul class="navbar-nav">
    <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#!">Motor Insurance</a>
        <ul class="dropdown-menu">
            <li class="nav-item"><a class="dropdown-item" href="{{ route('front.comprehensive.index') }}">Comprehensive Insurance</a></li>
            <li class="nav-item"><a class="dropdown-item" href="{{ route('front.third.index') }}">Third Party Insurance</a></li>
        </ul>
    </li>
    <li class="nav-item"><a class="nav-link" href="{{ route('front.bond.index') }}">Bid Bods</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('front.attachment.index') }}">Attachment Insurance</a></li>
</ul>
