<form wire:submit.prevent="register">
    <div>
        <label for="email">email</label>
        <input wire:model="email" type="text" id="email" name="email">
        @error('email') <span>{{ $message }}</span> @enderror
    </div>

    <div>
        <label for="password">password</label>
        <input wire:model.lazy="password" type="password" id="password" name="password">
        @error('password') <span>{{ $message }}</span> @enderror
    </div>

    <div>
        <label for="passwordConfirmation">passwordConfirmation</label>
        <input wire:model.lazy="passwordConfirmation" type="password" id="passwordConfirmation" name="passwordConfirmation">
    </div>

    <div>
        <input type="submit" value="Register">
    </div>
</form>
