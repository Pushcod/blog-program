<div class="">
    @foreach ( $categories as $category )
        <x-category-list :data="$category" />
    @endforeach
</div><!-- End .row -->
