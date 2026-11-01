<?php

use Livewire\Component;

new class extends Component
{
    public string $locale = 'ja';

    public bool $sidebarOpen = false;

    public function mount(): void
    {
        $locale = session('locale', 'ja');

        $this->locale = in_array($locale, ['ja', 'en'], true) ? $locale : 'ja';
    }

    public function switchLanguage(): void
    {
        $this->locale = $this->locale === 'ja' ? 'en' : 'ja';

        session(['locale' => $this->locale]);
    }

    public function toggleSidebar(): void
    {
        $this->sidebarOpen = ! $this->sidebarOpen;
    }

    public function closeSidebar(): void
    {
        $this->sidebarOpen = false;
    }
};
?>

<div
    wire:keydown.escape.window="closeSidebar"
    class="min-h-screen bg-slate-100 text-slate-800"
>

    {{-- Sidebar Overlay --}}
    @if ($sidebarOpen)
        <button
            type="button"
            wire:click="closeSidebar"
            style="position:fixed;top:0;right:0;bottom:0;left:0;width:100%;height:100%;z-index:40;border:0;padding:0;background:rgba(15,23,42,0.5);cursor:default;"
            aria-label="{{ $locale === 'ja' ? 'ナビゲーションを閉じる' : 'Close navigation overlay' }}"
        ></button>
    @endif

    {{-- Sidebar --}}
    <aside
        id="sidebar"
        aria-hidden="{{ $sidebarOpen ? 'false' : 'true' }}"
        class="flex flex-col border-r border-slate-200 bg-white"
        style="
            position:fixed;
            top:0;
            bottom:0;
            left:0;
            z-index:50;
            width:18rem;
            max-width:85vw;
            background:#fff;
            transition:transform 300ms ease-in-out, visibility 300ms;
            transform:{{ $sidebarOpen ? 'translateX(0)' : 'translateX(-100%)' }};
            visibility:{{ $sidebarOpen ? 'visible' : 'hidden' }};
            box-shadow:{{ $sidebarOpen ? '0 20px 25px -5px rgba(0,0,0,0.15), 0 8px 10px -6px rgba(0,0,0,0.1)' : 'none' }};
        "
    >

        {{-- Sidebar Brand --}}
        <div class="flex h-20 shrink-0 items-center justify-between gap-3 border-b border-slate-100 px-5">

            <div class="flex items-center gap-3">

                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-blue-600 text-xl font-bold text-white">
                    B
                </div>

                <div>
                    <p class="text-base font-bold tracking-tight text-slate-900">
                        BusinessFlow
                    </p>

                    <p class="text-xs text-slate-400">
                        Business Management SaaS
                    </p>
                </div>

            </div>

            {{-- Close Sidebar Button --}}
            <button
                type="button"
                wire:click="closeSidebar"
                class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg text-xl font-bold text-slate-500 hover:bg-slate-100 hover:text-slate-900"
                aria-label="{{ $locale === 'ja' ? 'ナビゲーションを閉じる' : 'Close navigation' }}"
            >
                ✕
            </button>

        </div>

        {{-- Navigation --}}
        <nav
            class="flex-1 space-y-7 overflow-y-auto px-4 py-6"
            aria-label="{{ $locale === 'ja' ? 'メインナビゲーション' : 'Main navigation' }}"
        >

            {{-- Main Menu --}}
            <div>

                <p class="mb-3 px-3 text-xs font-semibold uppercase tracking-wider text-slate-400">
                    {{ $locale === 'ja' ? 'メインメニュー' : 'MAIN MENU' }}
                </p>

                <div class="space-y-1">

                    <a href="#" aria-current="page" class="flex items-center gap-3 rounded-xl bg-blue-50 px-4 py-3 text-sm font-semibold text-blue-700">
                        <span class="text-lg" aria-hidden="true">▦</span>
                        {{ $locale === 'ja' ? 'ダッシュボード' : 'Dashboard' }}
                    </a>

                    <a href="#" class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm text-slate-600 hover:bg-slate-50">
                        <span class="text-lg" aria-hidden="true">♙</span>
                        {{ $locale === 'ja' ? '顧客管理' : 'Customers' }}
                    </a>

                    <a href="#" class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm text-slate-600 hover:bg-slate-50">
                        <span class="text-lg" aria-hidden="true">▣</span>
                        {{ $locale === 'ja' ? '予約管理' : 'Reservations' }}
                    </a>

                    <a href="#" class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm text-slate-600 hover:bg-slate-50">
                        <span class="text-lg" aria-hidden="true">◷</span>
                        {{ $locale === 'ja' ? 'サービス管理' : 'Services' }}
                    </a>

                    <a href="#" class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm text-slate-600 hover:bg-slate-50">
                        <span class="text-lg" aria-hidden="true">♧</span>
                        {{ $locale === 'ja' ? 'スタッフ管理' : 'Staff' }}
                    </a>

                </div>

            </div>

            {{-- Business --}}
            <div>

                <p class="mb-3 px-3 text-xs font-semibold uppercase tracking-wider text-slate-400">
                    {{ $locale === 'ja' ? '売上・分析' : 'BUSINESS' }}
                </p>

                <div class="space-y-1">

                    <a href="#" class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm text-slate-600 hover:bg-slate-50">
                        <span class="text-lg" aria-hidden="true">¥</span>
                        {{ $locale === 'ja' ? '売上・支払い' : 'Payments' }}
                    </a>

                    <a href="#" class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm text-slate-600 hover:bg-slate-50">
                        <span class="text-lg" aria-hidden="true">▤</span>
                        {{ $locale === 'ja' ? 'レポート・分析' : 'Reports & Analytics' }}
                    </a>

                </div>

            </div>

            {{-- System --}}
            <div>

                <p class="mb-3 px-3 text-xs font-semibold uppercase tracking-wider text-slate-400">
                    {{ $locale === 'ja' ? 'システム' : 'SYSTEM' }}
                </p>

                <div class="space-y-1">

                    <a href="#" class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm text-slate-600 hover:bg-slate-50">
                        <span class="text-lg" aria-hidden="true">⚙</span>
                        {{ $locale === 'ja' ? '設定' : 'Settings' }}
                    </a>

                </div>

            </div>

        </nav>

        {{-- Sidebar Footer --}}
        <div class="shrink-0 border-t border-slate-100 p-4">

            <div class="flex items-center gap-3 rounded-xl bg-slate-50 p-3">

                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-blue-100 font-bold text-blue-700">
                    A
                </div>

                <div class="min-w-0">
                    <p class="truncate text-sm font-semibold text-slate-800">
                        Admin User
                    </p>

                    <p class="text-xs text-slate-400">
                        Business Admin
                    </p>
                </div>

            </div>

        </div>

    </aside>

    {{-- Main Content --}}
    <div class="min-h-screen min-w-0">

        {{-- Header --}}
        <header class="sticky top-0 z-30 flex h-20 items-center justify-between border-b border-slate-200 bg-white px-4 sm:px-6 lg:px-8">

            <div class="flex items-center gap-3">

                {{-- Menu Toggle Button --}}
                <button
                    type="button"
                    wire:click="toggleSidebar"
                    class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg border border-slate-200 bg-white text-xl font-bold text-slate-700 hover:bg-slate-100"
                    aria-label="{{ $locale === 'ja' ? 'ナビゲーションを切り替え' : 'Toggle navigation' }}"
                    aria-controls="sidebar"
                    aria-expanded="{{ $sidebarOpen ? 'true' : 'false' }}"
                >
                    ☰
                </button>

                <div>
                    <p class="text-xs text-slate-400">
                        {{ $locale === 'ja' ? 'ビジネス管理' : 'Business Management' }}
                    </p>

                    <p class="text-lg font-bold text-slate-900">
                        {{ $locale === 'ja' ? 'ダッシュボード' : 'Dashboard' }}
                    </p>
                </div>

            </div>

            {{-- Header Right --}}
            <div class="flex items-center gap-3">

                {{-- Language Toggle --}}
                <button
                    type="button"
                    wire:click="switchLanguage"
                    class="rounded-lg border border-slate-200 px-3 py-2 text-sm font-medium text-slate-700 hover:bg-slate-50"
                >
                    {{ $locale === 'ja' ? 'English' : '日本語' }}
                </button>

                <div class="hidden h-10 w-10 items-center justify-center rounded-full bg-blue-100 font-semibold text-blue-700 sm:flex">
                    A
                </div>

            </div>

        </header>

        {{-- Dashboard Content --}}
        <main class="mx-auto max-w-7xl space-y-7 p-4 sm:p-6 lg:p-8">

            {{-- Welcome Section --}}
            <section class="flex flex-col justify-between gap-4 sm:flex-row sm:items-center">

                <div>

                    <h1 class="text-2xl font-bold tracking-tight text-slate-900">
                        {{ $locale === 'ja' ? 'おかえりなさい！' : 'Welcome back!' }}
                    </h1>

                    <p class="mt-1 text-sm text-slate-500">
                        {{ $locale === 'ja'
                            ? 'ビジネスの最新状況を確認しましょう。'
                            : 'Here is what is happening with your business today.' }}
                    </p>

                </div>

                <div class="rounded-lg border border-slate-200 bg-white px-4 py-2 text-sm text-slate-600">
                    {{ $locale === 'ja'
                        ? now()->timezone('Asia/Tokyo')->format('Y年m月d日')
                        : now()->timezone('Asia/Tokyo')->format('F j, Y') }}
                </div>

            </section>

            {{-- Summary Cards --}}
            <section class="grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-4">

                {{-- Customers --}}
                <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

                    <div class="flex items-center justify-between">

                        <p class="text-sm font-medium text-slate-500">
                            {{ $locale === 'ja' ? '総顧客数' : 'Total Customers' }}
                        </p>

                        <span class="rounded-lg bg-blue-50 px-3 py-2 text-lg text-blue-600" aria-hidden="true">
                            ♙
                        </span>

                    </div>

                    <p class="mt-4 text-3xl font-bold text-slate-900">0</p>

                    <p class="mt-2 text-xs text-slate-400">
                        {{ $locale === 'ja' ? '登録済み顧客' : 'Registered customers' }}
                    </p>

                </div>

                {{-- Reservations --}}
                <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

                    <div class="flex items-center justify-between">

                        <p class="text-sm font-medium text-slate-500">
                            {{ $locale === 'ja' ? '本日の予約' : "Today's Reservations" }}
                        </p>

                        <span class="rounded-lg bg-violet-50 px-3 py-2 text-lg text-violet-600" aria-hidden="true">
                            ▣
                        </span>

                    </div>

                    <p class="mt-4 text-3xl font-bold text-slate-900">0</p>

                    <p class="mt-2 text-xs text-slate-400">
                        {{ $locale === 'ja' ? '本日の予約件数' : 'Reservations scheduled today' }}
                    </p>

                </div>

                {{-- Staff --}}
                <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

                    <div class="flex items-center justify-between">

                        <p class="text-sm font-medium text-slate-500">
                            {{ $locale === 'ja' ? 'スタッフ数' : 'Total Staff' }}
                        </p>

                        <span class="rounded-lg bg-emerald-50 px-3 py-2 text-lg text-emerald-600" aria-hidden="true">
                            ♧
                        </span>

                    </div>

                    <p class="mt-4 text-3xl font-bold text-slate-900">0</p>

                    <p class="mt-2 text-xs text-slate-400">
                        {{ $locale === 'ja' ? '登録済みスタッフ' : 'Registered staff members' }}
                    </p>

                </div>

                {{-- Revenue --}}
                <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

                    <div class="flex items-center justify-between">

                        <p class="text-sm font-medium text-slate-500">
                            {{ $locale === 'ja' ? '今月の売上' : 'Monthly Revenue' }}
                        </p>

                        <span class="rounded-lg bg-amber-50 px-3 py-2 text-lg text-amber-600" aria-hidden="true">
                            ¥
                        </span>

                    </div>

                    <p class="mt-4 text-3xl font-bold text-slate-900">¥0</p>

                    <p class="mt-2 text-xs text-slate-400">
                        {{ $locale === 'ja' ? '今月の売上合計' : 'Total revenue this month' }}
                    </p>

                </div>

            </section>

            {{-- Lower Dashboard Sections --}}
            <section class="grid grid-cols-1 gap-5 xl:grid-cols-3">

                {{-- Recent Reservations --}}
                <div class="rounded-2xl border border-slate-200 bg-white p-6 xl:col-span-2">

                    <div class="flex items-center justify-between">

                        <div>

                            <h2 class="font-bold text-slate-900">
                                {{ $locale === 'ja' ? '最近の予約' : 'Recent Reservations' }}
                            </h2>

                            <p class="mt-1 text-xs text-slate-400">
                                {{ $locale === 'ja' ? '最新の予約状況' : 'Latest reservation activity' }}
                            </p>

                        </div>

                        <a href="#" class="rounded-lg bg-slate-100 px-3 py-2 text-xs font-medium text-slate-500 hover:bg-slate-200">
                            {{ $locale === 'ja' ? 'すべて表示' : 'View all' }}
                        </a>

                    </div>

                    <div class="mt-8 flex flex-col items-center justify-center rounded-xl border border-dashed border-slate-200 py-12 text-center">

                        <div class="text-4xl text-slate-300" aria-hidden="true">
                            ▣
                        </div>

                        <p class="mt-3 text-sm font-semibold text-slate-600">
                            {{ $locale === 'ja' ? '予約はまだありません' : 'No reservations yet' }}
                        </p>

                        <p class="mt-1 text-xs text-slate-400">
                            {{ $locale === 'ja'
                                ? '予約が登録されると、ここに表示されます。'
                                : 'New reservations will appear here.' }}
                        </p>

                    </div>

                </div>

                {{-- Recent Activity --}}
                <div class="rounded-2xl border border-slate-200 bg-white p-6">

                    <h2 class="font-bold text-slate-900">
                        {{ $locale === 'ja' ? '最近のアクティビティ' : 'Recent Activity' }}
                    </h2>

                    <p class="mt-1 text-xs text-slate-400">
                        {{ $locale === 'ja' ? 'システムの最新情報' : 'Latest system updates' }}
                    </p>

                    <div class="mt-8 flex flex-col items-center justify-center py-10 text-center">

                        <div class="text-4xl text-slate-300" aria-hidden="true">
                            ◷
                        </div>

                        <p class="mt-3 text-sm font-semibold text-slate-600">
                            {{ $locale === 'ja' ? 'アクティビティはありません' : 'No activity yet' }}
                        </p>

                        <p class="mt-1 text-xs text-slate-400">
                            {{ $locale === 'ja'
                                ? '操作履歴がここに表示されます。'
                                : 'Your recent actions will appear here.' }}
                        </p>

                    </div>

                </div>

            </section>

            {{-- Footer --}}
            <footer class="border-t border-slate-200 pt-5 text-center text-xs text-slate-400">
                © {{ date('Y') }} BusinessFlow. All rights reserved.
            </footer>

        </main>

    </div>

</div>