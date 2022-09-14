<div>
    <x-slot name="header">
        {{ __('Rooms') }}
    </x-slot>
    <div class="content-window">
        <div class="content-window-header">{{ __('Index if rooms') }}</div>
        <div class="overflow-x-auto w-full">
            <table class="table w-full">
              <!-- head -->
              <thead>
                <tr>
                  <th>{{ __('Room name') }}</th>
                  <th>{{ __('Temperature') }}</th>
                  <th>{{ __('Humidity') }}</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($rooms as $room)
                    <!-- row 1 -->
                    <tr class="hover">
                        <td>
                            <div>
                                <div class="font-bold">{{ $room->name }}</div>
                                <div class="text-sm opacity-50">{{ $room->floor }}. {{ __('floor') }}</div>
                            </div>
                        </td>
                        <td>
                            <div>
                                {{ __('Actual temperature') }}:
                                @if (!empty($room->actual_temp))
                                    <span>{{ $room->actual_temp }} &deg;C</span>
                                @else
                                    <span class="text-base-content/60 text-xs">{{ __('unmeasured') }}</span>
                                @endif
                            </div>
                            <div class="text-base-content/80 text-sm">{{ __('Goal temperature') }}: {{ $room->goal_temp }} &deg;C</div>
                            <div class="mt-2 text-center">
                                <button class="btn btn-ghost btn-xs btn-outline">{{ __('Set temperature') }}</button>
                            </div>
                        </td>
                        <td>
                            @if (!empty($room->humidity))
                                <span>{{ $room->humidity }} %</span>
                            @else
                                <span class="text-base-content/60 text-xs">{{ __('unmeasured') }}</span>
                            @endif
                        </td>
                        <th>
                            <button class="btn btn-ghost btn-xs">{{ __('Show') }}</button>
                            <button class="btn btn-ghost btn-xs">{{ __('Edit') }}</button>
                            @can('delete', $room)
                                <button class="btn btn-ghost btn-xs">{{ __('Delete') }}</button>
                            @endcan
                        </th>
                    </tr>
                </tbody>
                @endforeach
              <!-- foot -->
              <tfoot>
                <tr>
                    <th>{{ __('Room name') }}</th>
                    <th>{{ __('Temperature') }}</th>
                    <th>{{ __('Humidity') }}</th>
                    <th></th>
                  </tr>
              </tfoot>

            </table>
          </div>
          <div class="text-center md:text-right mt-5">
            <a href="{{ route('rooms.create') }}" class="btn btn-primary btn-sm gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                {{ __('Add room') }}
            </a>
        </div>
    </div>

</div>
