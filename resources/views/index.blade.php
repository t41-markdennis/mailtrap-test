<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mailtrap Test</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="max-w-4xl h-[100vh] mx-auto flex flex-col gap-8 mt-8">
        <div class="text-center font-bold text-4xl">
            Mailtrap
        </div>
        <form method="POST" action="/send-mail" class="grid grid-cols-2">
            @if (session()->has('failed') || session()->has('success'))
                <x-session-message :success="session('success')" :failed="session('failed')" />

            @endif

            @csrf
            <div class="flex flex-col gap-4 p-4">
                <div class="flex flex-col gap-2">
                    <div>
                        <label class="mb-2" for="email">Your Email</label>
                    </div>
                    <div>
                        <input value="{{old('email')}}" class="w-full px-4 py-2 rounded-lg bg-[#D6D6D6]" placeholder="example@gmail.com" type="text" name="email" id="email">
                        @if ($errors->has('email'))
                            <div class="text-red-600">{{ $errors->first('email') }}</div>
                        @endif
                    </div>
                </div>
                <div class="flex flex-col gap-2">
                    <div>
                        <label class="mb-2" for="subject">Subject</label>
                    </div>
                    <div>
                        <input value="{{old('subject')}}" class="w-full px-4 py-2 rounded-lg bg-[#D6D6D6]" placeholder="Just wanna say hi" type="text" name="subject" id="subject">
                        @if ($errors->has('subject'))
                            <div class="text-red-600">{{ $errors->first('subject') }}</div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="p-4 flex flex-col gap-2">
                <div>
                    <label class="mb-2" for="message">Message</label>
                </div>
                <div>
                    <textarea class="w-full px-4 py-2 rounded-lg bg-[#D6D6D6]" placeholder="Write your message..." name="message" id="message" cols="30" rows="10">
                        {{old('message')}}
                    </textarea>
                    @if ($errors->has('message'))
                        <div class="text-red-600">{{ $errors->first('message') }}</div>
                    @endif
                </div>
            </div>
            <div class="col-span-2 flex justify-end items-center p-4">
                <button type="submit" class="text-white gap-2 flex items-center bg-blue-500 hover:bg-blue-600 rounded-lg px-4 py-2">Send
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                    </svg>
                </button>
            </div>
        </form>
    </div>
</body>
</html>
