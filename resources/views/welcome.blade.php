<x-layout.main title="Welcome">

    <div class="mb-3">
        <h1>Welcome</h1>
        <h2>UTC: {{ now() }}</h2>
        <h2>Europe/Istanbul: {{ now()->timezone('Europe/Istanbul') }} </h2>
    </div>

</x-layout.main>
