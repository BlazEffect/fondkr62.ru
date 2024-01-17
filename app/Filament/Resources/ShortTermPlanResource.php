<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ShortTermPlanResource\Pages;
use App\Filament\Resources\ShortTermPlanResource\RelationManagers;
use App\Models\ShortTermPlan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class ShortTermPlanResource extends Resource
{
    protected static ?string $model = ShortTermPlan::class;
    protected static ?string $navigationGroup = 'Проведение каремонта';
    protected static ?string $modelLabel = 'краткосрочный план';
    protected static ?string $navigationLabel = 'Красткосрочные планы';
    protected static ?string $pluralModelLabel = 'Красткосрочные планы';
    protected static ?string $breadcrumb = 'Красткосрочные планы';
    protected static bool $hasTitleCaseModelLabel = false;
    protected static ?string $navigationIcon = 'heroicon-o-clock';

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
                                    ->disk('short-term-plan')
                                    ->directory('documents')
                                    ->required(),
                            ])
                            ->label('Файлы')
                            ->addActionLabel('Добавить файл')
                            ->columns(2)
                    ]),

                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\Repeater::make('early-documents')
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->label('Отображаемое название')
                                    ->required(),

                                Forms\Components\FileUpload::make('document')
                                    ->label('Файлы')
                                    ->disk('short-term-plan')
                                    ->directory('early-documents')
                                    ->required(),
                            ])
                            ->label('Ранние редакции')
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
            'index' => Pages\ListShortTermPlans::route('/'),
            'create' => Pages\CreateShortTermPlan::route('/create'),
            'edit' => Pages\EditShortTermPlan::route('/{record}/edit'),
        ];
    }
}
