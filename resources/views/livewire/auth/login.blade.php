<form wire:submit="submit" class="flex flex-col gap-5">

    <input type="email"
           name="email"
           id="email"
           wire:model="email"
    >

    @error('email')
    <div>{{ $message }} </div>
    @enderror

    <input type="password"
           name="password"
           id="password"
           wire:model="password"
    >

    @error('password')
    <div>{{ $message }} </div>
    @enderror

    <div class="">
        <input type="checkbox"
               name="remember"
               id="remember"
               wire:model="remember"
        >
        <label for="remember">{{ 'Запомнить' }}</label>
    </div>

    @env('local')
        <button type="button" wire:click="fastLogin">{{ 'Быстрых вход' }}</button>
    @endenv

    <button type="submit">{{ 'Войти' }}</button>
</form>
