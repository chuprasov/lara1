<x-layout.main title="Main page">
    <h2>Messages</h2>

    <x-form method="get" action="{{ route('messages.index') }}">
        <div class="container">
            <x-form-input type="date" class="d-inline w-25" id="dt" name="msg_date"
                value="{{ $msgDate->format('Y-m-d') }}" />
            <x-form-submit class="col-2">Обновить</x-form-submit>
        </div>
    </x-form>

    @foreach ($msgList as $message)
        <hr>
        <div>
            <h3>{{ $message->name }} ({{ $message->source->type->id }}):</h3>
        </div>
        @foreach ($message->messages as $msg)
            <div>
                @switch($msg->whoSend)
                    @case('client')
                        <strong>Клиент:</strong>
                    @break

                    @case('operator')
                        <strong>Оператор:</strong>
                    @break
                @endswitch
                ({{ $msg->dateTime }})
                {{ $msg->text }}
            </div>
        @endforeach
    @endforeach
</x-layout.main>
