<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RegulatoryBaseResource\Pages;
use App\Models\RegulatoryBase;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class RegulatoryBaseResource extends Resource
{
    protected static ?string $model = RegulatoryBase::class;
    protected static ?string $navigationGroup = 'Нормативно-правовая база';
    protected static ?string $navigationLabel = 'Нормативно-правовая база';
    protected static ?string $modelLabel = 'запись';
    protected static ?string $pluralModelLabel = 'Нормативно-правовая база';
    protected static ?string $breadcrumb = 'Нормативно-правовая база';
    protected static bool $hasTitleCaseModelLabel = false;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Название')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (string $operation, $state, Forms\Set $set) {
                                if ($operation !== 'create') {
                                    return;
                                }

                                $set('slug', Str::slug($state));
                            }),

                        Forms\Components\TextInput::make('slug')
                            ->label('Символьный код')
                            ->disabled()
                            ->dehydrated()
                            ->required()
                            ->maxLength(255),

                        Forms\Components\Select::make('section_name')
                            ->label('Название раздела')
                            ->options([
                                'federal' => 'Федеральное законодательство',
                                'regional' => 'Региональное законодательство',
                            ])
                            ->required()
                    ])
                    ->columns(2),

                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\Repeater::make('documents')
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->label('Отображаемое название')
                                    ->required(),

                                Forms\Components\FileUpload::make('document')
                                    ->label('Файлы')
                                    ->disk('regulatory-base')
                                    ->required(),
                            ])
                            ->label('Файлы')
                            ->addActionLabel('Добавить файл')
                            ->columns(2)
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Название')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('section_name')
                    ->label('Название раздела')
                    ->sortable(),
                Tables\Columns\TextColumn::make('slug')
                    ->label('Символьный код')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
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
            'index' => Pages\ListRegulatoryBases::route('/'),
            'create' => Pages\CreateRegulatoryBase::route('/create'),
            'edit' => Pages\EditRegulatoryBase::route('/{record}/edit'),
        ];
    }
}
