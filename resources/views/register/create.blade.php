<x-layout>
    <section class="px-6 py-8 mt-190">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 p-6 rounded-xl border border-grey-200">
            <h1 class="text-center font-bold text-xl ">Register</h1>
            <form method="post" action="/register" class="mt-10">
                @csrf
                <div class="mb-6">

                    <label class="text-gray-700 uppercase text-xs font-bold block mb-2" for="name">
                        Name
                    </label>
                    <input class="border border-grey-400 p-2 w-full"
                           type="text"
                           name="name"
                           id="name"
                           value="{{ old('name') }}"
                           required>

                    @error('name')
                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror

                    <label class="text-gray-700 uppercase text-xs font-bold block mb-2" for="username">
                        Username
                    </label>
                    <input class="border border-grey-400 p-2 w-full"
                           type="text"
                           name="username"
                           id="username"
                           value="{{ old('username') }}"
                           required>

                    @error('username')
                    <div class="text-red-500 text-xs">{{ $message }}</div>
                    @enderror

                    <label class="text-gray-700 uppercase text-xs font-bold block mb-2" for="email">
                        Email
                    </label>
                    <input class="border border-grey-400 p-2 w-full"
                           type="email"
                           name="email"
                           id="email"
                           value="{{ old('email') }}"
                           required>

                    <label class="text-gray-700 uppercase text-xs font-bold block mb-2" for="password">
                        Password
                    </label>
                    <input class="border border-grey-400 p-2 w-full"
                           type="password"
                           name="password"
                           id="password"
                           required>

                </div>

                <div class="mb-6">
                    <button
                        class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                        Button
                    </button>
                </div>
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <li class="text-red-500 text-xs">{{ $error }}</li>
                    @endforeach
                @endif
            </form>
        </main>
    </section>
</x-layout>
