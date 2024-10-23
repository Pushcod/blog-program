@props(['data'])
    <ul class="links">
        <li class="item-lead"><a href="{{ route('page.articles',$data->id) }}">{{ $data->name }}</a></li>
    </ul><!-- End .menu-vertical -->