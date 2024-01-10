<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RegulatoryBaseSectionResource\Pages;
use App\Filament\Resources\RegulatoryBaseSectionResource\RelationManagers;
use App\Models\RegulatoryBaseSection;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RegulatoryBaseSectionResource extends Resource
{
    protected static ?string $model = RegulatoryBaseSection::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRegulatoryBaseSections::route('/'),
            'create' => Pages\CreateRegulatoryBaseSection::route('/create'),
            'edit' => Pages\EditRegulatoryBaseSection::route('/{record}/edit'),
        ];
    }
}
