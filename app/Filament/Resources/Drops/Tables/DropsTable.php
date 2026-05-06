<?php

namespace App\Filament\Resources\Drops\Tables;

use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class DropsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('thumbnail')->circular()->size(48),
                TextColumn::make('name')->searchable()->sortable(),
                TextColumn::make('blockchain')->badge()->sortable(),
                TextColumn::make('category')->badge(),
                TextColumn::make('dropDate')->dateTime()->sortable(),
                TextColumn::make('mintPrice')->sortable(),
                TextColumn::make('twitterFollowerNumber')->label('Twitter #')->numeric()->sortable(),
                TextColumn::make('discordMemberNumber')->label('Discord #')->numeric()->sortable(),
                TextColumn::make('promoted')->badge()
                    ->color(fn (string $state) => match ($state) {
                        'promote' => 'success',
                        'promote1', 'promote2', 'promote3' => 'warning',
                        default => 'gray',
                    }),
                TextColumn::make('verified')->badge()
                    ->color(fn (string $state) => $state === 'true' ? 'success' : 'danger'),
                TextColumn::make('created_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('verified')->options(['true' => 'Verified', 'false' => 'Pending']),
                SelectFilter::make('blockchain')->options(['ethereum' => 'Ethereum', 'solana' => 'Solana', 'polygon' => 'Polygon', 'cardano' => 'Cardano', 'avalanche' => 'Avalanche']),
                SelectFilter::make('promoted')->options(['promote' => 'Promote', 'promote1' => 'Promote1', 'promote2' => 'Promote2', 'promote3' => 'Promote3']),
            ])
            ->recordActions([
                Action::make('approve')
                    ->label('Approve')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->requiresConfirmation()
                    ->hidden(fn ($record) => $record->verified === 'true')
                    ->action(fn ($record) => $record->update(['verified' => 'true'])),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
