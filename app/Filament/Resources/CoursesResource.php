<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CoursesResource\Pages;
use App\Filament\Resources\CoursesResource\RelationManagers;
use App\Models\Courses;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CoursesResource extends Resource
{
    protected static ?string $model = Courses::class;

    protected static ?string $modelLabel = "Курс";

    protected static ?string $pluralModelLabel = "Курсы";

    protected static ?string $navigationLabel = 'Курсы';

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Section::make('Курсы')->schema([
                TextInput::make('name')
                    ->label('Название курса')
                    ->maxLength(255)
                    ->required(),
                TextInput::make('description')
                    ->label('Описание курса')
                    ->required(),
                TextInput::make('price')
                    ->label('Стоимость курса')
                    ->integer()
                    ->required(),
                TextInput::make('time')
                    ->label('Время прохождения')
                    ->integer()
                    ->placeholder(8-15)
                    ->required(),
                FileUpload::make('image')
                    ->image()
                    ->label('изображение курса')
                    ->directory('images/'),
                Fieldset::make('Опции')->schema([
                    Toggle::make('is_active')
                        ->default(true)
                        ->label('Активный курс'),
                    Toggle::make('is_promo')
                        ->default(false)
                        ->label('курс по акции'),
                    Toggle::make('is_new')
                        ->default(false)
                        ->label('Новый курс'),
                    Toggle::make('is_popular')
                        ->default(false)
                        ->label('Популярный курс'),
                ])
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                     ->searchable()
                     ->label('Название курса'),
                ImageColumn::make('image')
                    ->label('Изображение')
                    ->size(50)
                    ->circular()
                    ->square(),
                 ToggleColumn::make('is_active')
                     ->label('Активный курс'),
                 ToggleColumn::make('is_promo')
                     ->label('Акция'),
                 ToggleColumn::make('is_new')
                     ->label('Новый курс'),
                 ToggleColumn::make('is_popular')
                     ->label('Популярный курс'),
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
            'index' => Pages\ListCourses::route('/'),
            'create' => Pages\CreateCourses::route('/create'),
            'edit' => Pages\EditCourses::route('/{record}/edit'),
        ];
    }
}
