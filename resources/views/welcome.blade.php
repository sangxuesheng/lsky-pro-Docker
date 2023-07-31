@push('styles')
    <link rel="stylesheet" href="{{ asset('css/markdown-css/github-markdown-light.css') }}">
@endpush

<x-guest-layout>
    <div class="py-14">
       <style>
    header {
        background-color: rgba(55, 55, 55, 0.75); /* Replace with your desired semi-transparent color */
    }
</style>

<header class="w-full h-14 bg-white bg-opacity-50 text-white flex justify-center fixed top-0 z-[9]">

    <div class="container mx-auto px-5 sm:px-10 md:px-10 lg:px-10 xl:px-10 2xl:px-60 flex justify-between items-center">
        <div class="flex justify-start items-center max-w-[70%]">
<img src="data:image/x-icon;base64,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" alt="Logo" class="h-8">
            <a href="{{ route('/') }}" class="text-white text-xl truncate">{{ \App\Utils::config(\App\Enums\ConfigKey::AppName) }}</a>
        </div>
        <div class="flex justify-end items-center space-x-4">
            @includeWhen($_is_notice, 'layouts.notice')
            @includeWhen($_group->strategies->isNotEmpty(), 'layouts.strategies')

            @if(Auth::check())
                @include('layouts.user-nav')
            @else
                <a href="{{ route('login') }}" class="text-gray-300 hover:bg-gray-600 hover:text-white px-3 py-2 rounded-md text-sm font-medium text-black" style="background-color: rgba(255, 255, 255, 0.5);">登录</a>
                @if(\App\Utils::config(\App\Enums\ConfigKey::IsEnableRegistration))
                    <a href="{{ route('register') }}" class="text-gray-300 hover:bg-gray-600 hover:text-white px-3 py-2 rounded-md text-sm font-medium" style="background-color: rgba(255, 255, 255, 0.5);">注册</a>
                @endif
            @endif
        </div>
    </div>
</header>

        <div class="mt-10 container mx-auto px-5 sm:px-10 md:px-10 lg:px-10 xl:px-10 2xl:px-60">
            <x-upload/>
        </div>
        <footer class="absolute bottom-0 left-0 right-0 w-full bg-gray-200" style="background-color: rgba(255, 255, 255, 0);">
    <p class="container mx-auto py-2 px-5 sm:px-10 md:px-10 lg:px-10 xl:px-10 2xl:px-60 text-gray-500 text-sm" style="background-color: rgba(255, 255, 255, 0);">
        <a href="https://www.sangxuesheng.com/" target="_blank"> 听闻 All in the game.</a> <br> &nbsp;<a href="https://beian.miit.gov.cn/" target="_blank" rel="noreferrer"><?php echo e(\App\Utils::config(\App\Enums\ConfigKey::IcpNo)); ?></a>&nbsp;请勿上传违反中国大陆和香港法律的图片，违者后果自负。
    </p>
</footer>
    </div>

    @include('common.notice')

</x-guest-layout>