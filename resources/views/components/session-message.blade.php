@props(['success' => '', 'failed' => ''])

<div id="session" {{$attributes->merge(['class' => "relative col-span-2 flex justify-between items-center w-full" ])}}>
    @if ($success)
        <div class="bg-green-700 py-2 px-4 text-white h-full flex justify-between items-center flex-grow">
            <div>
                {{$success}}
            </div>
            <div id="close" class="cursor-pointer right-1 h-6 w-6 bg-gray-600 rounded-full grid place-items-center">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </div>
            </div>
        </div>
    @endif
    @if ($failed)
        <div class="bg-red-700 py-2 px-4 text-white h-full flex flex-grow">
            {{$failed}}
        </div>
        <div id="close" class="cursor-pointer right-1 h-6 w-6 bg-gray-600 rounded-full grid place-items-center">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </div>
        </div>
    @endif

    <span id="loading" class="absolute ease-linear bottom-0 left-0 h-[2px] bg-blue-500 w-full"></span>
</div>

<script>
    const session = document.getElementById('session');
    const loading = document.getElementById('loading');
    const close = document.getElementById('close');

    /**
     * Set element to invisible.
     * @param {object} element - The target element that you wanna set to invisible.
     */
     const setInvisible = (element) => {
        if(!element.classList.contains("hidden")){
            element.classList.add('hidden');
        }
    }

    setTimeout(() => {
        loading.classList.add('duration-[10s]');
        loading.classList.replace('w-full', 'w-0');
    }, 100);

    setTimeout(() => {
        loading.classList.remove('duration-[10s]');
        loading.classList.replace('w-0', 'w-full');
        setInvisible(session)
    }, 10000);

    close.addEventListener('click', () => {
        setTimeout(() => {
            setInvisible(session)
        }, 100);
    })
</script>
