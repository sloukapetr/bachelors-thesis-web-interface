<div>
    <x-slot name="header">
        {{ __('Users') }}
    </x-slot>
    <div class="content-window">
        <div class="content-window-header">{{ __('Index if users') }}</div>
        <div class="overflow-x-auto w-full">
            <table class="table w-full">
              <!-- head -->
              <thead>
                <tr>
                  <th>{{ __('Username') }}</th>
                  <th>{{ __('Room access') }}</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $user)
                    <!-- row 1 -->
                    <tr class="hover">
                        <td>
                            <div>
                                <div class="font-bold">{{ $user->name }}</div>
                                @if ($user->admin == 1)
                                    <div class="text-xs text-success/80">{{ __('Administrator') }}</div>
                                @endif
                            </div>
                        </td>
                        <td>
                            @if ($user->admin == 1)
                                <span class="text-sm text-base-content/60">{{ __('User has administrator persmission, eh has acces to all rooms.') }}</span>
                            @else
                                @if ($user->accessRooms()->count() > 0)
                                    @foreach ($user->accessRooms()->get() as $room)
                                        {{ $room->name }}
                                    @endforeach
                                @else
                                    <span class="text-sm text-base-content/60">{{ __('User has not access to any room.') }}</span>
                                @endif
                            @endif
                        </td>
                        <th>
                            @can('view', $user)
                                <button class="btn btn-ghost btn-xs" wire:click.prevent="showShowModal({{ $user->id }})">{{ __('Show') }}</button>
                            @endcan
                            @if ($user->admin == 0)
                                @can('update', $user)
                                    <button class="btn btn-ghost btn-xs">{{ __('Edit') }}</button>
                                @endcan
                                @can('delete', $user)
                                    <button class="btn btn-ghost btn-xs" wire:click.prevent="deleteShowModal({{ $user->id }})">{{ __('Delete') }}</button>
                                @endcan
                            @endif
                        </th>
                    </tr>
                </tbody>
                @endforeach
              <!-- foot -->
              <tfoot>
                <tr>
                    <th>{{ __('user name') }}</th>
                    <th>{{ __('Temperature') }}</th>
                    <th>{{ __('Humidity') }}</th>
                    <th></th>
                  </tr>
              </tfoot>

            </table>
          </div>
          <div class="text-center md:text-right mt-5">
            <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                {{ __('Add user') }}
            </a>
        </div>
    </div>

    @if ($this->modalItem)
        {{-- The Delete Modal --}}
        <x-jet-confirmation-modal wire:model="modalConfirmDeleteVisible">
            <x-slot name="title">
                {{ __('Remove user') }}
            </x-slot>

            <x-slot name="content">
                <p>{{ __('Are you sure? Do you want to remove user') }} <strong>{{ $this->modalItem->getName() }}</strong>?</p>
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('modalConfirmDeleteVisible')" wire:loading.attr="disabled">
                    {{ __('Zavřít') }}
                </x-jet-secondary-button>

                <x-jet-danger-button class="ml-2" wire:click="remove" wire:loading.attr="disabled">
                    {{ __('Remove') }}
                </x-jet-danger-button>
            </x-slot>
        </x-jet-confirmation-modal>

        {{-- The Restore Modal --}}
        <x-jet-confirmation-modal wire:model="modalConfirmRestoreVisible">
            <x-slot name="title">
                {{ __('Obnovit člena spolku') }}
            </x-slot>

            <x-slot name="content">
                <p>{{ __('Opravdu chceš obnovit člena') }} <strong>{{ $this->modalItem->getName() }}</strong>?</p>

            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('modalConfirmRestoreVisible')" wire:loading.attr="disabled">
                    {{ __('Zavřít') }}
                </x-jet-secondary-button>

                <x-jet-button class="ml-2 btn-success" wire:click="restore" wire:loading.attr="disabled">
                    {{ __('Obnovit') }}
                </x-jet-button>
            </x-slot>
        </x-jet-confirmation-modal>

        {{-- The Show Modal --}}
        <x-jet-dialog-modal wire:model="modalShowVisible">
            <x-slot name="title">
                <h1>
                    {{ __('Náhled člena spolku') }}: {{ $this->modalItem->getName() }} <span class="text-xs text-base-content/[.6]">(ID: {{ $this->modalItem->id }})</span>
                </h1>
            </x-slot>

            <x-slot name="content">
                <table class="table-info mt-5">
                    <tbody>
                        <tr>
                            <th>{{ __('Jméno a příjmení') }}</th>
                            <td>{{ $this->modalItem->getName() }}</td>
                        </tr>
                    </tbody>
                </table>
            </x-slot>

            <x-slot name="footer">
                <div class="flex gap-2">
                    @can('update', $member = $this->modalItem)
                        <a class="btn btn-warning btn-sm" href="{{ route('administration.members.edit', compact('member')) }}">
                            {{ __('Upravit') }}
                        </a>
                    @endcan
                    <button class="btn btn-ghost btn-sm" wire:click="$toggle('modalShowVisible')" wire:loading.attr="disabled">
                        {{ __('Zavřít') }}
                    </button>
                </div>
            </x-slot>
        </x-jet-dialog-modal>
    @endif

</div>
