<x-app-layout>
    <x-slot name="header">
        <x-header heading="Tickets">
            <x-slot name="actions">
                <a href="{{ route('tickets.orders.index') }}"><x-primary-button>Ticket verkaufen</x-primary-button></a>
                <a href="{{ route('tickets.products.index') }}"><x-secondary-button>Ticket Produkte
                        verwalten</x-secondary-button></a>
            </x-slot>
        </x-header>
    </x-slot>
    <x-body>
        <x-body-box>
            Work in Progress!
        </x-body-box>

        <x-body-box>

            <div class="relative mb-4">
                <h3 class="mb-2 font-semibold">Ticketverkäufe nach Veranstaltung</h3>
                <x-charts.event-ticket-sales :ticketSalesPerEvent="$ticketSalesPerEvent" chartId="ticket-sales-per-event" />
            </div>
        </x-body-box>
        <x-body-box>
            <div class="relative">
                <h3 class="mb-2 font-semibold">Ticketverkäufe nach Tag</h3>
                <x-charts.daily-ticket-sales :ticketSalesPerDay="$ticketSalesPerDay" chartId="ticket-sales-per-day" />
            </div>
        </x-body-box>

        <x-body-box>
            <div class="relative">
                <h3 class="mb-2 font-semibold">Ticketverkäufe nach Gateway</h3>
                <x-charts.ticket-sales-by-gateway :ticketSalesPerGateway="$ticketSalesPerGateway" chartId="ticket-sales-per-gateway" />
            </div>
        </x-body-box>


        <x-body-box>
            <h3 class="mb-2 font-semibold">Verkaufte Tickets</h3>
            <div class="flex flex-col gap-2">
                @forelse($events as $event)
                    <a href="{{ route('tickets.event.analytics', ['event' => $event]) }}">
                        <div class="flex items-center justify-between rounded bg-slate-100 p-4">
                            <p><strong class="font-semibold">{{ $event->name }}</strong> <br> {{ $event->dateString() }}
                            </p>
                            <p>{{ $event->tickets->count() }}</p>
                        </div>
                    </a>
                @empty
                @endforelse
            </div>

        </x-body-box>



    </x-body>
</x-app-layout>
