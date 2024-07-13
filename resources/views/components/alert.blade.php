<div class="alert alert-{{ $type }}" id="alert">
    <span class="message">
        {{ $slot }}
    </span>
    @if (isset($close) && $close === "true")
        <input type="button" id="alert-close-btn"
            class="text-xl font-mono font-bold cursor-pointer border px-2 rounded-lg hover:text-white transition-colors duration-150"
            value="X" />
    @endif
</div>
<script>
    document.getElementById('alert-close-btn').addEventListener('click', (ev) => {
        ev.preventDefault();
        let alert = document.getElementById('alert');
        alert.style.display = "none";
    });
</script>
