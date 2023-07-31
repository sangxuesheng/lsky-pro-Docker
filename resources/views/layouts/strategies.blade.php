<!-- Strategies dropdown -->
<x-dropdown>
    <x-slot name="trigger">
<button type="button" class="bg-gray-300 bg-opacity-50 flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
    <span class="sr-only">Open strategies menu</span>
    <div class="h-8 w-8 rounded-full flex items-center justify-center bg-white bg-opacity-50">

        <svg t="1690121342796" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="4114" width="20" height="20"><path d="M218.059388 132.7617l44.807509 0 0 119.189589-44.807509 0 0-119.189589Z" p-id="4115" fill="#8a8a8a"></path><path d="M319.325769 132.7617l44.807509 0 0 119.189589-44.807509 0 0-119.189589Z" p-id="4116" fill="#8a8a8a"></path><path d="M736.039589 192.805214m-55.561433 0a54.296 54.296 0 1 0 111.122867 0 54.296 54.296 0 1 0-111.122867 0Z" p-id="4117" fill="#8a8a8a"></path><path d="M858.81382 68.238151 165.18618 68.238151c-24.196075 0-43.015699 19.715017-43.015699 43.912116l0 161.308873c0 24.196075 19.715017 43.015699 43.015699 43.015699L858.81382 316.474838c24.196075 0 43.015699-19.716041 43.015699-43.015699L901.82952 112.150266C901.82952 87.954191 882.113479 68.238151 858.81382 68.238151zM865.086687 273.459139c0 3.584642-2.688225 6.272867-6.272867 6.272867L165.18618 279.732006c-3.584642 0-6.272867-2.688225-6.272867-6.272867L158.913313 112.150266c0-3.584642 2.688225-6.272867 6.272867-6.272867L858.81382 105.877399c3.584642 0 6.272867 2.688225 6.272867 6.272867L865.086687 273.459139z" p-id="4118" fill="#8a8a8a"></path><path d="M218.059388 454.484052l44.807509 0 0 119.189589-44.807509 0 0-119.189589Z" p-id="4119" fill="#8a8a8a"></path><path d="M319.325769 454.484052l44.807509 0 0 119.189589-44.807509 0 0-119.189589Z" p-id="4120" fill="#8a8a8a"></path><path d="M736.039589 513.630127m-55.561433 0a54.296 54.296 0 1 0 111.122867 0 54.296 54.296 0 1 0-111.122867 0Z" p-id="4121" fill="#8a8a8a"></path><path d="M858.81382 389.960503 165.18618 389.960503c-24.196075 0-43.015699 19.716041-43.015699 43.015699l0 161.308873c0 24.196075 19.715017 43.015699 43.015699 43.015699L858.81382 637.300774c24.196075 0 43.015699-19.715017 43.015699-43.015699L901.82952 432.976202C901.82952 409.67552 882.113479 389.960503 858.81382 389.960503zM865.086687 594.284051c0 3.584642-2.688225 6.272867-6.272867 6.272867L165.18618 600.556918c-3.584642 0-6.272867-2.688225-6.272867-6.272867L158.913313 432.976202c0-3.584642 2.688225-6.272867 6.272867-6.272867L858.81382 426.703335c3.584642 0 6.272867 2.688225 6.272867 6.272867L865.086687 594.284051z" p-id="4122" fill="#8a8a8a"></path><path d="M218.059388 775.308965l44.807509 0 0 119.189589-44.807509 0 0-119.189589Z" p-id="4123" fill="#8a8a8a"></path><path d="M319.325769 775.308965l44.807509 0 0 119.189589-44.807509 0 0-119.189589Z" p-id="4124" fill="#8a8a8a"></path><path d="M736.039589 835.351456m-55.561433 0a54.296 54.296 0 1 0 111.122867 0 54.296 54.296 0 1 0-111.122867 0Z" p-id="4125" fill="#8a8a8a"></path><path d="M858.81382 710.785415 165.18618 710.785415c-24.196075 0-43.015699 19.715017-43.015699 43.015699l0 161.308873c0 24.196075 19.715017 43.015699 43.015699 43.015699L858.81382 958.125687c24.196075 0 43.015699-19.715017 43.015699-43.015699L901.82952 753.801115C901.82952 730.500433 882.113479 710.785415 858.81382 710.785415zM865.086687 915.109987c0 3.584642-2.688225 6.272867-6.272867 6.272867L165.18618 921.382854c-3.584642 0-6.272867-2.688225-6.272867-6.272867L158.913313 753.801115c0-2.688225 2.688225-5.376451 6.272867-5.376451L858.81382 748.424664c3.584642 0 6.272867 2.688225 6.272867 6.272867L865.086687 915.109987z" p-id="4126" fill="#8a8a8a"></path></svg>
    </div>
    <span class="px-2 sm:block hidden" id="strategy-selected" data-id="0">获取中...</span>
</button>

    </x-slot>

        <x-slot name="content">
            <div id="strategies">
            @foreach($_group->strategies as $strategy)
                <x-dropdown-link data-id="{{ $strategy->id }}" href="javascript:void(0)" @click="open = false">{{ $strategy->name }}</x-dropdown-link>
            @endforeach
            </div>
        </x-slot>
</x-dropdown>

@push('scripts')
    <script>
        let defaultStrategy = {{ Auth::check() ? Auth::user()->configs->get('default_strategy') : 0 }} || (localStorage.getItem('strategy') || 0);
        let setStrategy = function (id) {
            let isSelected = false;
            $('#strategies a').each(function () {
                if (parseInt($(this).data('id')) === parseInt(id)) {
                    localStorage.setItem('strategy', id)
                    $('#strategy-selected').text($(this).text()).data('id', id);
                    isSelected = true;

                    @if(Auth::check())
                        if (defaultStrategy != id) {
                            axios.put('{{ route('settings.strategy.set') }}', {id: id}).then(response => {
                                if (! response.data.status) {
                                    toastr.error(response.data.message);
                                }
                            });
                        }
                    @endif
                }
            });
            if (! isSelected) {
                let $first = $('#strategies a:first-child');
                localStorage.setItem('strategy', $first.data('id'))
                $('#strategy-selected').text($first.text()).data('id', $first.data('id'));
            }
        };

        setStrategy(defaultStrategy);

        $('#strategies a').click(function () {
            setStrategy($(this).data('id'))
        });
    </script>
@endpush
