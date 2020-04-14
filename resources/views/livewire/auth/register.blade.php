<form wire:submit.prevent="register">
    <div>
        <label for="email">email</label>
        <input wire:model="email" type="text" id="email" name="email">
    </div>

    <div>
        <label for="password">password</label>
        <input wire:model="password" type="password" id="password" name="password">
    </div>

    <div>
        <label for="passwordConfirmation">passwordConfirmation</label>
        <input wire:model="passwordConfirmation" type="password" id="passwordConfirmation" name="passwordConfirmation">
    </div>

    <div>
        <input type="submit" value="Register">
    </div>
</form>
