<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AnnualReportingResource\Pages;
use App\Filament\Resources\AnnualReportingResource\RelationManagers;
use App\Models\AnnualReporting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class AnnualReportingResource extends Resource
{
    protected static ?string $model = AnnualReporting::class;
    protected static ?string $navigationGroup = 'Отчетность';
    protected static ?string $navigationIcon = 'heroicon-o-document-chart-bar';
    protected static ?string $navigationLabel = 'Ежегодные отчёты';
    protected static ?string $modelLabel = 'ежегодный отчёт';
    protected static ?string $pluralModelLabel = 'Ежегодные отчёты';
    protected static ?string $breadcrumb = 'Ежегодные отчёты';
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
                            ->maxLength(255)
                            ->unique(AnnualReporting::class, 'slug', ignoreRecord: true),
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
                                    ->disk('annual-reporting')
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
            'index' => Pages\ListAnnualReportings::route('/'),
            'create' => Pages\CreateAnnualReporting::route('/create'),
            'edit' => Pages\EditAnnualReporting::route('/{record}/edit'),
        ];
    }
}
