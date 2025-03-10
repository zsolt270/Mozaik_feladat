@props(['tournaments'])

<section class="mt-5 d-flex justify-content-center gap-5 flex-wrap">
    @foreach ($tournaments as $tournament)
    <x-cards.card :name="$tournament['name']" :game="$tournament['game']" :date="$tournament['date']"
        :country="$tournament['country']" :address="$tournament['address']" :tournamentId="$tournament['id']">
    </x-cards.card>
    @endforeach
</section>
<div class="mt-4">
    {{$tournaments->links()}}
</div>