<x-app-layout>
    <x-slot name="header">
        <x-header heading="Ticketbestellung #{{$order->id}}">
            <x-slot name="beforeHeading">
                <a href="{{ route('tickets.orders.index') }}"><x-icon name="chevron-left"></x-icon></a>
            </x-slot>
            <x-slot name="actions">
                <a href="{{ route('tickets.orders.download', ['ticketOrder' => $order]) }}"><x-primary-button>Tickets herunterladen</x-primary-button></a>
            </x-slot>
        </x-header>
    </x-slot>
    <x-body>
        <x-body-box>
            <h3 class="mb-2 font-semibold text-lg">Bestelldaten</h3>
            <p>Bestellung erstellt von {{ $order->user->name }} am {{ $order->created_at->format("d.m.Y H:i:s") }} Uhr</p>
            <p>Gateway: {{$order->gateway}}</p>
            <p>Gesamtsumme: @money($order->total)</p>
            <p>Anzahl Tickets: {{ $order->tickets->count() }}</p>
        </x-body-box>
        <x-body-box>
            <h3 class="mb-2 font-semibold text-lg">Tickets in dieser Bestellung</h3>
            <div class="flex flex-col gap-4">
                @forelse($order->tickets as $ticket)
                    <div class="p-4 rounded bg-slate-100 flex justify-between items-center">
                        <div>
                            <p class="font-semibold">Ticket #{{ $ticket->id }} - {{ $ticket->ticketProduct->name}}</p>
                            <p>Preiskategorie: {{$ticket->ticketPrice->category}}</p>
                            <p>gewährt Zugang zu: 
                                @foreach ($ticket->ticketProduct->permittedEvents as $event)
                                    {{ $event->name }} ({{ $event->dateString() }}){{ $loop->last ? '' : ', ' }}
                                @endforeach
                            </p>
                        </div>
                        <div class="flex gap-4 items-center">
                        <div>
                            @money($ticket->ticketPrice->price)
                        </div>
                        <div>
                            @if($ticket->checkins->count() == $ticket->permits->count())
                                <x-icon name="check-circle" size="1.5" color="green"/>
                            @elseif($ticket->checkins->count() > 0)
                                <x-icon name="radio-button-checked" size="1.5" color="orange"/>
                            @else
                                <x-icon name="radio-button-unchecked" size="1.5" color="gray"/>
                            @endif
                        </div>
                            
                        </div>
                    </div>
                @empty 
                    <p>Zu dieser Bestellung gehören keine Tickets</p>
                @endforelse
                <p class="flex gap-1 text-sm p-2 bg-slate-100 rounded items-center justify-end"><span class="font-semibold">Legende:</span> <x-icon name="check-circle" size="1.5" color="green"/> = Überall eingecheckt; <x-icon name="radio-button-checked" size="1.5" color="orange"/> = mind. einmal eingecheckt, für weitere Events gültig; <x-icon name="radio-button-unchecked" size="1.5" color="gray"/> = noch nicht eingecheckt</p>
            </div>
        </x-body-box>

    </x-body>
</x-app-layout>
