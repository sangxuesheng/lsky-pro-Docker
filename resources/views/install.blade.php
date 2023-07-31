<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="relative min-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Lsky Pro 安装程序</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body class="font-sans antialiased">
<div class="min-h-screen text-gray-900 bg-gray-100">
    <div class="min-h-screen flex justify-center items-center px-6 py-10 md:py-20">
        <div class="md:w-[600px]">
            <img src="data:image/png;base64,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">
    
            <div id="checking" class="mt-4 p-6 rounded-md bg-white w-full">
                <p class="text-md mb-4 block text-center">Step 1 > 运行环境检测</p>

                <div class="relative rounded-md bg-white overflow-hidden space-y-4 max-h-[500px] overflow-y-auto">
                    @foreach($extensions as $extension)
                        <dl>
                            <div class="rounded-md bg-gray-50 px-3 py-3 flex items-center justify-between">
                                <dt class="w-[95%] text-md font-medium text-gray-700 {{ ! $extension['result'] ? 'text-red-500' : '' }}">
                                    {{ $extension['name'] }}
                                    <p class="mt-2 text-sm text-gary-400">{{ $extension['intro'] }}</p>
                                </dt>
                                <dd class="mt-1 text-md text-gray-900 truncate">
                                    @if($extension['result'])
                                        <i class="fas fa-check text-green-500"></i>
                                    @else
                                        <i class="fas text-lg fa-times text-red-500"></i>
                                    @endif
                                </dd>
                            </div>
                        </dl>
                    @endforeach
                </div>

                <div class="mt-6 text-sm text-gray-500">
                    <p><i class="fas fa-exclamation-circle"></i> 请确保<b>数据库版本</b>达到要求。</p>
                    <p><i class="fas fa-exclamation-circle"></i> 请确保程序<b>目录、文件的权限</b>设置正确。</p>
                    <p><i class="fas fa-exclamation-circle"></i> 出现安装拓展、启用函数后未生效，请尝试<b>重启 PHP</b>。</p>
                </div>

                <div class="mt-6 text-right">
                    @if($status)
                        <a href="javascript:void(0)" id="next" class="rounded-md px-4 py-2 bg-blue-500 text-white">下一步</a>
                    @else
                        <span class="rounded-md px-4 py-2 bg-gray-400 text-white" disabled>检测未通过</span>
                    @endif
                </div>
            </div>

            <div id="installing" class="mt-4 p-6 rounded-md bg-white w-full hidden">
                <p class="text-md mb-4 block text-center">Step 2 > 配置数据库和管理员账号</p>

                <form class="w-full" method="post">
                    <div class="px-3 py-4 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6">
                                <label for="connection" class="block text-sm font-medium text-gray-700">数据库类型</label>
                                <x-select id="connection" name="connection">
                                    <option value="mysql">MySQL 5.7+</option>
                                    <option value="pgsql">PostgreSQL 9.6+</option>
                                    <option value="sqlite">SQLite 3.8.8+</option>
                                    <option value="sqlsrv">SQL Server 2017+</option>
                                </x-select>
                                <p class="mt-2 text-sm text-red-500 hidden"></p>
                            </div>
                            <div class="col-span-6">
                                <label for="host" class="block text-sm font-medium text-gray-700">数据库连接地址</label>
                                <x-input type="text" name="host" id="host" placeholder="请输入数据库连接地址" value="127.0.0.1"/>
                            </div>
                            <div class="col-span-6">
                                <label for="port" class="block text-sm font-medium text-gray-700">数据库连接端口</label>
                                <x-input type="number" name="port" id="port" placeholder="请输入数据库连接端口" value="3306"/>
                            </div>
                            <div class="col-span-6">
                                <label for="database" class="block text-sm font-medium text-gray-700">数据库名称或路径</label>
                                <x-input type="text" name="database" id="database" placeholder="请输入数据库名称或路径" value=""/>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="username" class="block text-sm font-medium text-gray-700">数据库用户名</label>
                                <x-input type="text" name="username" id="username" placeholder="请输入数据库用户名" value="root"/>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="password" class="block text-sm font-medium text-gray-700">数据库密码</label>
                                <x-input type="password" name="password" id="password" placeholder="请输入数据库密码" value="root"/>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="email" class="block text-sm font-medium text-gray-700"><span class="text-red-500">*</span>管理员账号邮箱</label>
                                <x-input type="email" name="account[email]" id="email" placeholder="请输入管理员账号邮箱"/>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="admin-password" class="block text-sm font-medium text-gray-700"><span class="text-red-500">*</span>管理员账号密码</label>
                                <x-input type="password" name="account[password]" id="admin-password" placeholder="请输入管理员账号密码"/>
                            </div>
                        </div>
                    </div>
                </form>

                <p id="response" class="rounded-md text-red-500 bg-slate-700 p-4 hidden overflow-auto"></p>

                <div class="mt-6 text-right">
                    <a href="javascript:void(0)" id="install" class="rounded-md px-4 py-2 bg-blue-500 text-white">立即安装</a>
                </div>
            </div>

            <div id="success" class="mt-4 p-6 rounded-md bg-white w-full hidden">
                <i class="fas fa-check-circle text-5xl text-teal-500"></i>
                <p class="mt-4 text-lg">程序安装完成。</p>
                <div class="mt-3 space-y-1 text-gray-600">
                    <p>你可以点击 <a class="text-green-500" href="{{ route('/') }}">这里</a> 去首页。</p>
                    <p>更多帮助请访问 <a class="text-green-500" href="https://www.lsky.pro" target="_blank">https://www.lsky.pro</a>。</p>
                    <p>使用过程中出现任何问题请务必阅读 <a class="text-green-500" href="https://docs.lsky.pro" target="_blank">官方文档</a>。</p>
                    <p>如果你觉得兰空图床给你带来帮助，不妨请我喝一杯咖啡☕️  <a class="text-green-500" href="https://github.com/wisp-x/lsky-pro#-%E6%8D%90%E8%B5%A0" target="_blank">去打赏</a>。</p>
                    <p>这个页面将在下次访问时返回 404 错误，如果你想要重新安装，请删除程序根目录中的 installed.lock 文件，然后重新访问首页。</p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script>
    $('#next').click(function () {
        $('#checking').remove();
        $('#installing').removeClass('hidden');
    });

    $('#connection').change(function () {
        let selector = '#host, #port, #username, #password';
        $(selector).parent().show();
        let message = '';
        switch ($(this).val()) {
            case 'pgsql':
                break;
            case 'sqlite':
                message = 'SQLite 数据库本质上只是一个存在你文件系统上的文件，下面的数据库路径如果为空，程序将会自动在根目录 database 文件夹中创建 database.sqlite 文件，否则请填写该数据库文件的绝对路径。';
                $(selector).parent().hide();
                break;
            case 'sqlsrv':
                message = '在使用 SQL Server 数据库前，你需要先确保你已安装并启用了 sqlsrv 和 pdo_sqlsrv PHP 扩展以及它们所需要的依赖项，例如 Microsoft SQL ODBC 驱动。';
                break;
            default:
        }
        if (message) {
            $(this).siblings('p').text(message).removeClass('hidden');
        } else {
            $(this).siblings('p').text(message).addClass('hidden');
        }
    });

    $('#install').click(function () {
        if ($(this).attr('disabled')) {
            return;
        }
        $(this).attr('disabled', true).removeClass('bg-blue-500').addClass('cursor-not-allowed bg-gray-400').text('执行安装中...')
        $('#response').html('').addClass('hidden');
        axios.post('{{ route('install') }}', $('#installing form').serialize()).then(response => {
            $('#response').addClass('hidden')
            if (response.data.status) {
                $('#installing').hide();
                $('#success').show();
            } else {
                $('#response').html(response.data.message + ' ' +(response.data.data.response || '')).removeClass('hidden');
            }
        }).finally(() => {
            $(this).attr('disabled', false).removeClass('cursor-not-allowed bg-gray-400').addClass('bg-blue-500').text('立即安装')
        });
    });
</script>
</html>
