<div class="fi-ta-text grid w-full gap-y-1 px-3 py-4">
    <div class="flex gap-1.5 flex-wrap ">
        <div class="flex w-max">
            <div style="--c-50:var(--primary-50);--c-400:var(--primary-400);--c-600:var(--primary-600);"
                class="fi-badge flex items-center justify-center gap-x-1 rounded-md text-xs font-medium ring-1 ring-inset px-2 min-w-[theme(spacing.6)] py-1 fi-color-custom bg-custom-50 text-custom-600 ring-custom-600/10 dark:bg-custom-400/10 dark:text-custom-400 dark:ring-custom-400/30">
                <span class="grid">
                    <span class="truncate">
                        {{ $getState() ? count($getState()) : 0 }}
                    </span>
                </span>
            </div>
        </div>
    </div>
</div>
