{{-- Show all expenses type list --}}
<div class="form-group my-2 col-xs-12 col-sm-12 col-md-4">
    <input type="search" class="form-control rounded-0 " wire:model="search">
</div>
<div class="table-responsive">
    <table class="table align-middle table-striped border">
        <thead>
            @foreach ($headers as $header)
                <th class="py-1 table-header text-white">{{ $header }}</th>
            @endforeach
        </thead>
        <tbody>
            {{ $slot }}
        </tbody>
        <tfoot>
            @foreach ($headers as $header)
                <th class="py-1 table-header text-white">{{ $header }}</th>
            @endforeach
        </tfoot>
    </table>
</div>
