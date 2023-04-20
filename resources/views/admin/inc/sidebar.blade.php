<div id="sidebar-menu">
    <!-- Left Menu Start -->
    <ul class="metismenu list-unstyled" id="side-menu">
        <li class="menu-title" key="t-menu">Menu</li>


        <li class="menu-title" key="t-menu">Web Contents</li>

        {{-- categorie --}}
        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="bx bx-home-circle"></i>
                <span key="t-categorie">categorie</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('categories.index') }}" key="t-list">All categorie</a></li>
                <li><a href="{{ route('categories.create') }}" key="t-create">Create categorie</a></li>

            </ul>
        </li>
        {{-- End - service --}}
        {{-- service --}}
        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="bx bx-home-circle"></i>
                <span key="t-service">Service</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('services.index') }}" key="t-list">All Service</a></li>
                <li><a href="{{ route('services.create') }}" key="t-create">Create Service</a></li>

            </ul>
        </li>
        {{-- End - service --}}



        {{-- start - blog --}}
        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="bx bx-home-circle"></i>
                <span key="t-blog">Blog</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('blogs.index') }}" key="t-list">All Blog</a></li>
                <li><a href="{{ route('blogs.create') }}" key="t-create">Create Blog</a></li>

            </ul>
        </li>
        {{-- End - blog --}}
        {{-- start - website-content --}}
        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="bx bx-home-circle"></i>
                <span key="t-hero">Website Content</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('about.edit', 1) }}" key="t-list">About Us</a></li>
                <li><a href="{{ route('contact.edit', 1) }}" key="t-list">Contact Info</a></li>
                <li><a href="{{ route('general.edit', 1) }}" key="t-list">General Setting</a></li>

            </ul>

        </li>
        {{-- End - website-content --}}
    </ul>
</div>
