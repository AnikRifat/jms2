<div id="sidebar-menu">
    <!-- Left Menu Start -->
    <ul class="metismenu list-unstyled" id="side-menu">
        <li class="menu-title" key="t-menu">Menu</li>


        <li class="menu-title" key="t-menu">Web Contents</li>

        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="bx bx-home-circle"></i>
                <span key="t-Shop">users</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('users.index') }}" key="t-list">All users</a></li>
                <li><a href="{{ route('users.student') }}" key="t-list">student</a></li>
                <li><a href="{{ route('users.student.confirmation') }}" key="t-list">student confirmation</a></li>
                <li><a href="{{ route('users.teacher') }}" key="t-list">teacher</a></li>
                <li><a href="{{ route('users.teacher.confirmation') }}" key="t-list">teacher confirmation</a></li>


            </ul>
        </li>

        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="bx bx-home-circle"></i>
                <span key="t-Shop">Orders</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('orders.index') }}" key="t-list">All Orders</a></li>
                <li><a href="{{ route('orders.product') }}" key="t-list">Product</a></li>
                <li><a href="{{ route('orders.course') }}" key="t-list">Course</a></li>

            </ul>
        </li>
        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="bx bx-home-circle"></i>
                <span key="t-Shop">Reports</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('profit.index') }}" key="t-list">Profit mergin</a></li>


            </ul>
        </li>
        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="bx bx-home-circle"></i>
                <span key="t-Shop">Courses</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('durations.index') }}" key="t-list">Timelines</a></li>
                <li><a href="{{ route('courses.all') }}" key="t-list">All Courses</a></li>

            </ul>
        </li>

        {{-- Shop --}}
        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="bx bx-home-circle"></i>
                <span key="t-Shop">Shop</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('products.index') }}" key="t-list">All Shop</a></li>
                <li><a href="{{ route('products.create') }}" key="t-create">Create Shop</a></li>

            </ul>
        </li>
        {{-- End - Category --}}
        {{-- Category --}}
        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="bx bx-home-circle"></i>
                <span key="t-Category">Category</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('categories.index') }}" key="t-list">All Category</a></li>
                <li><a href="{{ route('categories.create') }}" key="t-create">Create Category</a></li>

            </ul>
        </li>
        {{-- End - Category --}}
        {{-- subject --}}
        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="bx bx-home-circle"></i>
                <span key="t-subject">Subject</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('subjects.index') }}" key="t-list">All Subject</a></li>
                <li><a href="{{ route('subjects.create') }}" key="t-create">Create Subject</a></li>

            </ul>
        </li>
        {{-- End - subject --}}



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