<x-app-layout>
{{--    <x-slot name="header">--}}
{{--        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">--}}
{{--            {{ __('Evènement') }}--}}
{{--        </h2>--}}
{{--    </x-slot>--}}
    @php
    $events = \App\Models\Event::all();
    @endphp
    <div class="pt-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                   {{__('Découvrez tous les Evènements MOMO')}}
                </div>
            </div>
        </div>
    </div>
    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <ul class="divide-y divide-slate-100">
                        @foreach($events as $event)
                            <article class="flex items-start space-x-6 p-6">
                                <img src="{{ asset('upload/admin_images/images/'. $event->image) }}" alt="" width="90" height="98" class="flex-none rounded-md bg-slate-100" />
                                <div class="min-w-0 relative flex-auto">
                                    <h2 class="font-semibold text-[#ffcc00] truncate pr-20"><a class="d-inline-block text-[#004f71] hover:text-[#ffcc00]" href="{{route('superadmin.show_event', $event->id)}}">{{ $event->name }}</a></h2>
                                    <dl class="mt-2 flex flex-wrap text-sm leading-6 font-medium">
                                        <div class="ml-2 font-bold text-[#004f71]">
                                            <dt class="sr-only">Day</dt>
                                            <dd><i class="fa fa-calendar"></i>&nbsp;&nbsp;{{ date('d.m.Y', strtotime($event->date_heure_debut)) }}</dd>
                                        </div>
                                        <div class="ml-5 font-bold text-[#004f71]">
                                            <dt class="sr-only">Hour</dt>
                                            <dd class="flex items-center">
                                                <i class="fa fa-clock"></i>&nbsp;&nbsp;{{ date('H:i', strtotime($event->date_heure_debut)) }}
                                            </dd>
                                        </div>


                                    </dl>
                                </div>
                            </article>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
