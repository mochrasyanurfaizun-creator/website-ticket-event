<x-app-layout>
    <x-slot name="title">TIXLY — Find Your Next Event</x-slot>

    @include('components.hero', ['featuredEvents' => $featuredEvents])
    @include('components.stats')
    @include('components.featured-events', ['events' => $featuredEvents])
    @include('components.trending', ['trendingEvent' => $trendingEvent])

</x-app-layout>