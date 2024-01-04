<?php

namespace App\Filament\Resources\StoryResource\Pages;

use App\Models\Story;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\ViewRecord;
use App\Filament\Resources\StoryResource;

class ViewStory extends ViewRecord
{
    protected static string $resource = StoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Action::make('PDF')
            ->label('PDF')
            ->icon('heroicon-o-book-open')
            ->action(function (Story $story) {
                redirect()->route('story.download.pdf', $story->id);
            }),
        ];
    }
}
