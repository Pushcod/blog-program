<header id="header">
    <h1><a href="/">Блог для иванов</a></h1>
    {{-- <nav class="links">
        <ul class="text-black">
            <li><a href="#">Lorem</a></li>
            <li><a href="#">Ipsum</a></li>
            <li><a href="#">Feugiat</a></li>
            <li><a href="#">Tempus</a></li>
            <li><a href="#">Adipiscing</a></li>
        </ul>
    </nav> --}}
    <nav class="main">
        <ul>
            {{-- <li class="search">
                <a class="fa-search" href="#search">Search</a>
                <form id="search" method="get" action="#">
                    <input type="text" name="query" placeholder="Search" />
                </form>
            </li> --}}
            <li class="menu">
                <a class="fa-bars" href="#menu">Menu</a>
            </li>
        </ul>
    </nav>
</header>
<section id="menu">

    <!-- Search -->
        {{-- <section>
            <form class="search" method="get" action="#">
                <input type="text" name="query" placeholder="Search" />
            </form>
        </section> --}}
        <section class="">
            <div class="mb-5">
                <livewire:articles.articles-sort />
            </div>
        </section>
    <!-- Links -->
        <section>
            <h2>Категории</h2>
            <livewire:category.category-list />
        </section>

    {{-- <!-- Actions -->
        <section>
            <ul class="actions vertical">
                <li><a href="#" class="button big fit">Log In</a></li>
            </ul>
        </section> --}}

</section>