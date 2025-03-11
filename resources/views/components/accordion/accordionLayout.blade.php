@props(['tournament'])

<section class="accordion mt-3" id="roundsAccordion">
    @foreach ($tournament->rounds as $round)
    <x-accordion.item :round="$round" :tournament="$tournament"></x-accordion.item>
    @endforeach
</section>