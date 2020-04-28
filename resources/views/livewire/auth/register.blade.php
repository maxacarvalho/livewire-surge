<div>
    <form wire:submit.prevent="register" action="#" method="POST">
        <div>
            <label for="email" class="block text-sm font-medium leading-5 text-gray-700">
                Email address
            </label>
            <div class="mt-1 rounded-md shadow-sm">
                <input wire:model="email" id="email" type="email" required autofocus class="@error('email') border-red-500 @enderror appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
            </div>
            @error('email') <div class="mt-1 text-red-500 text-sm">{{ $message }}</div> @enderror
        </div>

        <div class="mt-6">
            <label for="password" class="block text-sm font-medium leading-5 text-gray-700">
                Password
            </label>
            <div class="mt-1 rounded-md shadow-sm">
                <input wire:model.lazy="password" id="password" type="password" required class="@error('password') border-red-500 @enderror appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
            </div>
            @error('password') <div class="mt-1 text-red-500 text-sm">{{ $message }}</div> @enderror
        </div>

        <div class="mt-6">
            <label for="passwordConfirmation" class="block text-sm font-medium leading-5 text-gray-700">
                Confirm Password
            </label>
            <div class="mt-1 rounded-md shadow-sm">
                <input wire:model.lazy="passwordConfirmation" id="passwordConfirmation" type="password" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
            </div>
        </div>

        <div class="mt-6">
            <span class="block w-full rounded-md shadow-sm">
                <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                    Register
                </button>
            </span>
        </div>

        <div class="mt-6">
            <p class="mt-2 text-center text-sm leading-5 text-gray-600 max-w">
                <a href="/login" class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                    Already Have An Account?
                </a>
            </p>
        </div>
    </form>
</div>
