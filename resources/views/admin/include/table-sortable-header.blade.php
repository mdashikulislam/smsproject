<a wire:click.prevent="sortByColumn('{{@$name}}')" href="">
    {{@$title}}
    @if ($sortBy === @$name)
        @if ($orderBy === 'ASC')
            <i class="fas fa-arrow-up"></i>
        @else
            <i class="fas fa-arrow-down"></i>
        @endif
    @endif
</a>
