<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">
        <flux:sidebar sticky stashable class="border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
            <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

            <a href="{{ route('dashboard') }}" class="me-5 flex items-center space-x-2 rtl:space-x-reverse" wire:navigate>
                <x-app-logo />
            </a>

            <flux:navlist variant="outline">
                <flux:navlist.group :heading="__('Platform')" class="grid">
                    <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>{{ __('الصفحة الرئيسية') }}</flux:navlist.item>
                    @if (auth()->user()->can('user.view') ||
                        auth()->user()->can('user.create')||
                        auth()->user()->can('user.edit')||
                        auth()->user()->can('user.delete') ||
                        auth()->user()->can('role.view') ||
                        auth()->user()->can('role.create')||
                        auth()->user()->can('role.edit')||
                        auth()->user()->can('role.delete'))
                    <flux:navlist.group heading="الاعضاء" expandable>
                    @endif
                        @if (auth()->user()->can('user.view') ||
                        auth()->user()->can('user.create')||
                        auth()->user()->can('user.edit')||
                        auth()->user()->can('user.delete'))
                        <flux:navlist.item icon="users" :href="route('user.index')" :current="request()->routeIs('user.index')" wire:navigate>{{ __('كل الاعضاء') }}</flux:navlist.item>
                    @endif
                    @if (auth()->user()->can('role.view') ||
                        auth()->user()->can('role.create')||
                        auth()->user()->can('role.edit')||
                        auth()->user()->can('role.delete'))
                        <flux:navlist.item icon="link-slash" :href="route('role.index')" :current="request()->routeIs('role.index')" wire:navigate>{{ __('الصلاحيات') }}</flux:navlist.item>
                    @endif
                    @if (auth()->user()->can('user.view') ||
                    auth()->user()->can('user.create')||
                    auth()->user()->can('user.edit')||
                    auth()->user()->can('user.delete') ||
                    auth()->user()->can('role.view') ||
                    auth()->user()->can('role.create')||
                    auth()->user()->can('role.edit')||
                    auth()->user()->can('role.delete'))
                    </flux:navlist.group>
                    @endif


                    @if (auth()->user()->can('teacher.view') ||
                        auth()->user()->can('teacher.create')||
                        auth()->user()->can('teacher.edit')||
                        auth()->user()->can('teacher.delete'))
                    <flux:navlist.item icon="identification" :href="route('teacher.index')" :current="request()->routeIs('teacher.index')" wire:navigate>{{ __('المعلمات') }}</flux:navlist.item>
                    @endif
                    @if (auth()->user()->can('educationalexperience.create')||
                    auth()->user()->can('educationalexperience.edit')||
                    auth()->user()->can('educationalexperience.delete') ||
                    auth()->user()->can('level.create')||
                        auth()->user()->can('level.edit')||
                        auth()->user()->can('level.delete')||
                        auth()->user()->can('period.create')||
                        auth()->user()->can('period.edit')||
                        auth()->user()->can('period.delete')||
                        auth()->user()->can('week.create')||
                        auth()->user()->can('week.edit')||
                        auth()->user()->can('week.delete')||
                        auth()->user()->can('estimate.create')||
                        auth()->user()->can('estimate.edit')||
                        auth()->user()->can('estimate.delete')||
                        auth()->user()->can('competence.create')||
                        auth()->user()->can('competence.edit')||
                        auth()->user()->can('competence.delete')||
                        auth()->user()->can('field.create')||
                        auth()->user()->can('field.edit')||
                        auth()->user()->can('field.delete')||
                        auth()->user()->can('activity.create')||
                        auth()->user()->can('activity.edit')||
                        auth()->user()->can('activity.delete'))

                    <flux:navlist.group heading="إدارة التقويمات" expandable>
                    @endif
                        @if (auth()->user()->can('educationalexperience.create')||
                        auth()->user()->can('educationalexperience.edit')||
                        auth()->user()->can('educationalexperience.delete'))
                        <flux:navlist.item icon="adjustments-vertical" :href="route('eduexp.index')" :current="request()->routeIs('eduexp.index')" wire:navigate>{{ __('الخبرات التربويه') }}</flux:navlist.item>
                        @endif
                        @if (auth()->user()->can('level.create')||
                        auth()->user()->can('level.edit')||
                        auth()->user()->can('level.delete'))
                        <flux:navlist.item icon="check-badge" :href="route('level.index')" :current="request()->routeIs('level.index')" wire:navigate>{{ __('المستوى') }}</flux:navlist.item>
                        @endif
                        @if (auth()->user()->can('period.create')||
                        auth()->user()->can('period.edit')||
                        auth()->user()->can('period.delete'))
                        <flux:navlist.item icon="clock" :href="route('period.index')" :current="request()->routeIs('period.index')" wire:navigate>{{ __('الفتره') }}</flux:navlist.item>
                        @endif
                        @if (auth()->user()->can('week.create')||
                        auth()->user()->can('week.edit')||
                        auth()->user()->can('week.delete'))
                        <flux:navlist.item icon="calendar-days" :href="route('week.index')" :current="request()->routeIs('week.index')" wire:navigate>{{ __('الاسبوع') }}</flux:navlist.item>
                        @endif
                        @if (auth()->user()->can('estimate.create')||
                        auth()->user()->can('estimate.edit')||
                        auth()->user()->can('estimate.delete'))
                        <flux:navlist.item icon="shield-check" :href="route('estimate.index')" :current="request()->routeIs('estimate.index')" wire:navigate>{{ __('التقديرات') }}</flux:navlist.item>
                        @endif
                        @if (auth()->user()->can('competence.create')||
                        auth()->user()->can('competence.edit')||
                        auth()->user()->can('competence.delete'))
                        <flux:navlist.item icon="cpu-chip" :href="route('competence.index')" :current="request()->routeIs('competence.index')" wire:navigate>{{ __('الكفايات') }}</flux:navlist.item>
                        @endif
                        @if (auth()->user()->can('field.create')||
                        auth()->user()->can('field.edit')||
                        auth()->user()->can('field.delete'))
                        <flux:navlist.item icon="bookmark" :href="route('field.index')" :current="request()->routeIs('field.index')" wire:navigate>{{ __('المجالات') }}</flux:navlist.item>
                        @endif
                        @if (auth()->user()->can('activity.create')||
                        auth()->user()->can('activity.edit')||
                        auth()->user()->can('activity.delete'))
                        <flux:navlist.item icon="clipboard-document-list" :href="route('activity.index')" :current="request()->routeIs('activity.index')" wire:navigate>{{ __('النشاطات') }}</flux:navlist.item>
                        @endif
                    </flux:navlist.group>
                    <flux:navlist.item icon="users" :href="route('form.index')" :current="request()->routeIs('form.index')" wire:navigate>{{ __('التقويمات') }}</flux:navlist.item>
                    <flux:navlist.group heading="إدارة التقييمات" expandable>
                        <flux:navlist.item icon="adjustments-vertical" :href="route('rating.index')" :current="request()->routeIs('rating.index')" wire:navigate>{{ __('التقييمات') }}</flux:navlist.item>
                    </flux:navlist.group>
                </flux:navlist.group>
            </flux:navlist>

            <flux:spacer />

            <flux:navlist variant="outline">
                {{-- <flux:navlist.item icon="folder-git-2" href="https://github.com/laravel/livewire-starter-kit" target="_blank">
                {{ __('Repository') }}
                </flux:navlist.item> --}}

                <flux:navlist.item icon="document-check" href="{{ route('sign.create') }}">
                {{ __('التوقيع الرقمي') }}
                </flux:navlist.item>
            </flux:navlist>

            <!-- Desktop User Menu -->
            <flux:dropdown position="bottom" align="start">
                <flux:profile
                    :name="auth()->user()->name"
                    :initials="auth()->user()->initials()"
                    icon-trailing="chevrons-up-down"
                />

                <flux:menu class="w-[220px]">
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span
                                        class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white"
                                    >
                                        {{ auth()->user()->initials() }}
                                    </span>
                                </span>

                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                    <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>{{ __('Settings') }}</flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:sidebar>

        <!-- Mobile User Menu -->
        <flux:header class="lg:hidden">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

            <flux:spacer />

            <flux:dropdown position="top" align="end">
                <flux:profile
                    :initials="auth()->user()->initials()"
                    icon-trailing="chevron-down"
                />

                <flux:menu>
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span
                                        class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white"
                                    >
                                        {{ auth()->user()->initials() }}
                                    </span>
                                </span>

                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                    <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>{{ __('Settings') }}</flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:header>

        {{ $slot }}

        @fluxScripts
    </body>
</html>
