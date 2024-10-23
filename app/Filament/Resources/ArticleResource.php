<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArticleResource\Pages;
use App\Filament\Resources\ArticleResource\RelationManagers;
use App\Models\Article;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieTagsInput;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;

    public static function getNavigationLabel(): string
    {
        return 'Новости';
    }

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('новая запись')->schema([
                    Tabs::make('Основная Информация')->tabs([
                        Tabs\Tab::make('Основное')->schema([
                            Grid::make(2)->schema([
                                Select::make('category_id')
                                ->relationship('Category', 'name')
                                ->label('Категория')
                                ->required(),
                                TextInput::make('title')
                                ->label('Название записи')
                                ->placeholder('Сезон скидок и акций')
                                ->live()
                                ->afterStateUpdated(fn(string $operation, $state, Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null)
                                ->required(),
                            TextInput::make('slug')
                                ->label('URL')
                                ->disabled()
                                ->maxLength(255)
                                ->dehydrated()
                                ->unique(Article::class, 'slug', ignoreRecord: true)
                                ->required(),
                            ]),
                            Textarea::make('small_text')
                                ->rows(10)
                                ->label('краткое описание')
                                ->required()
                        ]),
                        Tabs\Tab::make('Мета-поля')->schema([
                            TextInput::make('meta_title')
                                ->label('Мета-загаловок')
                                ->placeholder('Сезон скидок и акций')
                                ->required(),
                            TextInput::make('meta_keywords')
                                ->label('Мета-ключевые слова')
                                ->placeholder('Товары по скидкам, рассрочка, смартфоны, iphone 20')
                                ->required(),
                            Textarea::make('meta_description')
                                ->rows(5)
                                ->label('мета описание')
                                ->required(),
                        ]),
                    ])
                ])->columnSpanFull(),
                Section::make('Контент')->schema([
                    RichEditor::make('content')
                        ->label('Контент статьи')
                        ->toolbarButtons([
                            'attachFiles',
                            'blockquote',
                            'bold',
                            'bulletList',
                            'codeBlock',
                            'h2',
                            'h3',
                            'italic',
                            'link',
                            'orderedList',
                            'redo',
                            'strike',
                            'underline',
                            'undo',
                        ])
                        ->required(),
                ])->columnSpanFull(),
                Section::make('Медиа и изображения')->schema([
                    FileUpload::make('image')
                    ->label('Изображение новости')
                    ->image()
                    ->directory('article')
                    ->imageEditor()
                    ->required(),
                ])->columnSpanFull(),
                Toggle::make('is_active')
                    ->label('Активная новость')
                    ->default(false),
                Toggle::make('is_popular')
                    ->label('Популярная новость')
                    ->default(false),
                Section::make('Теги')->schema([
                    SpatieTagsInput::make('tag_id'),
                    ])->columnSpanFull()
            
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title'),            
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
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }
}
