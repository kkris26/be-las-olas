<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HomePageResource\Pages;
use App\Models\HomePage;
use App\Services\ImageService;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class HomePageResource extends Resource
{
    use Translatable;

    protected static ?string $model = HomePage::class;

    protected static ?string $navigationIcon    = 'heroicon-o-home';
    protected static ?string $navigationLabel   = 'Home Page';
    protected static ?string $navigationGroup   = 'Page Settings';
    protected static ?int    $navigationSort     = 1;

    // ─────────────────────────────────────────────────────────────────────────
    // Reusable image-upload schema factory
    // ─────────────────────────────────────────────────────────────────────────
    private static function imageUpload(string $field, string $label, string $dir): Forms\Components\FileUpload
    {
        return Forms\Components\FileUpload::make($field)
            ->label($label)
            ->disk('public')
            ->directory($dir)
            ->image()
            ->imageEditor()
            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/gif', 'image/bmp', 'image/tiff'])
            ->maxSize(3072)
            ->required()
            ->helperText('Recommended upload WebP images. Non-WebP images will be automatically converted to WebP. Maximum file size: 3MB.')
            ->saveUploadedFileUsing(
                fn (TemporaryUploadedFile $file) => ImageService::storeAsWebp($file, $dir)
            );
    }

    // ─────────────────────────────────────────────────────────────────────────
    // Form
    // ─────────────────────────────────────────────────────────────────────────
    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Tabs::make('Sections')
                ->persistTabInQueryString()
                ->columnSpanFull()
                ->tabs([

                    // ── Tab 1: Hero ─────────────────────────────────────────
                    Forms\Components\Tabs\Tab::make('Hero')
                        ->icon('heroicon-o-photo')
                        ->schema([
                            Forms\Components\Grid::make(2)->schema([
                                Forms\Components\TextInput::make('hero_subheading')
                                    ->label('Subheading')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('hero_heading')
                                    ->label('Main Heading')
                                    ->required()
                                    ->maxLength(255),
                            ]),
                            Forms\Components\Textarea::make('hero_description')
                                ->label('Description')
                                ->required()
                                ->rows(3)
                                ->columnSpanFull(),
                            Forms\Components\Grid::make(2)->schema([
                                Forms\Components\TextInput::make('hero_button_text')
                                    ->label('Button Text')
                                    ->required()
                                    ->maxLength(100),
                                Forms\Components\TextInput::make('hero_button_link')
                                    ->label('Button Link')
                                    ->required()
                                    ->helperText('e.g. https://tms.lasolas.id/jobs')
                                    ->maxLength(255),
                            ]),
                            Forms\Components\Section::make('Background Images')
                         ->description('Desktop background is required. Mobile background can be enabled via toggle.')
                                ->columns(2)
                                ->schema([
                                    static::imageUpload('hero_desktop_bg_image', 'Desktop Background', 'home/hero')
                                        ->columnSpanFull()
                                        ->required(),

                                    Forms\Components\Toggle::make('hero_use_mobile_image')
                                        ->label('Use Custom Mobile Background')
                                        ->live()
                                        ->columnSpanFull(),

                                    static::imageUpload('hero_mobile_bg_image', 'Mobile Background', 'home/hero')
                                        ->columnSpanFull()
                                        ->visible(fn (Forms\Get $get) => $get('hero_use_mobile_image'))
                                        ->required(fn (Forms\Get $get) => $get('hero_use_mobile_image')),
                                ]),
                        ]),

                    // ── Tab 2: Highlight ────────────────────────────────────
                    Forms\Components\Tabs\Tab::make('Highlight')
                        ->icon('heroicon-o-star')
                        ->schema([
                            Forms\Components\Grid::make(2)->schema([
                                Forms\Components\TextInput::make('highlight_subheading')
                                    ->label('Subheading')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('highlight_heading')
                                    ->label('Main Heading')
                                    ->required()
                                    ->maxLength(255),
                            ]),
                            Forms\Components\Textarea::make('highlight_description')
                                ->label('Description')
                                ->required()
                                ->rows(5)
                                ->columnSpanFull(),

                                Forms\Components\TextInput::make('highlight_button_text')
                                    ->label('Button Text')
                                    ->required()
                                    ->maxLength(100)
                                          ->columnSpanFull(),

                            static::imageUpload('highlight_image', 'Highlight Image', 'home/highlight')
                                ->columnSpanFull()
                                ->required(),
                        ]),

                    // ── Tab 3: Statistics ───────────────────────────────────
                    Forms\Components\Tabs\Tab::make('Statistics')
                        ->icon('heroicon-o-chart-bar')
                        ->schema([
                            Forms\Components\Repeater::make('statistics_items')
                                ->label('Statistics Items')
                                ->addActionLabel('Add Statistic')
                                ->collapsible()
                                ->cloneable()
                                ->defaultItems(0)
                                ->schema([
                                    Forms\Components\Grid::make(2)->schema([
                                        Forms\Components\TextInput::make('value')
                                            ->label('Numeric Value')
                                            ->numeric()
                                            ->required(),
                                        Forms\Components\TextInput::make('heading')
                                            ->label('Heading')
                                            ->required(),
                                    ]),
                                    Forms\Components\Toggle::make('has_prefix')
                                        ->label('Show Prefix/Suffix?')
                                        ->live()
                                        ->columnSpanFull(),
                                    Forms\Components\TextInput::make('prefix_text')
                                        ->label('Prefix / Suffix Text (e.g. +)')
                                        ->maxLength(10)
                                        ->hidden(fn (Forms\Get $get) => ! $get('has_prefix')),
                                ])
                                ->columns(2),
                        ]),

                    // ── Tab 4: Cruise Services ───────────────────────────────
                    Forms\Components\Tabs\Tab::make('Cruise Services')
                        ->icon('heroicon-o-globe-alt')
                        ->schema([
                            Forms\Components\Grid::make(2)->schema([
                                Forms\Components\TextInput::make('cruise_subheading')
                                    ->label('Section Subheading')
                                    ->required(),
                                Forms\Components\TextInput::make('cruise_heading')
                                    ->label('Section Heading')
                                    ->required(),
                            ]),
                            Forms\Components\Textarea::make('cruise_short_description')
                                ->label('Section Short Description')
                                ->required()
                                ->rows(3)
                                ->columnSpanFull(),
                        ]),

                    // ── Tab 5: Land Services ─────────────────────────────────
                    Forms\Components\Tabs\Tab::make('Land Services')
                        ->icon('heroicon-o-building-office-2')
                        ->schema([
                            Forms\Components\Grid::make(2)->schema([
                                Forms\Components\TextInput::make('land_subheading')
                                    ->label('Section Subheading')
                                    ->required(),
                                Forms\Components\TextInput::make('land_heading')
                                    ->label('Section Heading')
                                    ->required(),
                            ]),
                            Forms\Components\Textarea::make('land_short_description')
                                ->label('Section Short Description')
                                ->required()
                                ->rows(3)
                                ->columnSpanFull(),
                        ]),

                    // ── Tab 6: News Section ──────────────────────────────────
                    Forms\Components\Tabs\Tab::make('News')
                        ->icon('heroicon-o-newspaper')
                        ->schema([
                            Forms\Components\Grid::make(2)->schema([
                                Forms\Components\TextInput::make('news_subheading')
                                    ->label('Subheading')
                                    ->required()
                                    ->maxLength(100),
                                Forms\Components\TextInput::make('news_heading')
                                    ->label('Main Heading')
                                    ->required()
                                    ->maxLength(255),
                            ]),
                            Forms\Components\Textarea::make('news_short_description')
                                ->label('Short Description')
                                ->required()
                                ->rows(3)
                                ->columnSpanFull(),
                            Forms\Components\Grid::make(2)->schema([
                                Forms\Components\TextInput::make('news_button_text')
                                    ->label('Button Text')
                                    ->required()
                                    ->maxLength(100),
                                Forms\Components\TextInput::make('news_button_link')
                                    ->label('Button Link')
                                    ->required()
                                    ->maxLength(255),
                            ]),
                        ]),

                    // ── Tab 7: SEO ────────────────────────────────────────
                    Forms\Components\Tabs\Tab::make('SEO')
                        ->icon('heroicon-o-magnifying-glass')
                        ->schema([
                            Forms\Components\TextInput::make('seo_title')
                                ->label('Meta Title')
                                ->required()
                                ->helperText('Recommended: 50–60 characters')
                                ->maxLength(120)
                                ->columnSpanFull(),
                            Forms\Components\Textarea::make('seo_description')
                                ->label('Meta Description')
                                ->required()
                                ->helperText('Recommended: 150–160 characters')
                                ->rows(3)
                                ->maxLength(320)
                                ->columnSpanFull(),
                            Forms\Components\TextInput::make('seo_keywords')
                                ->label('Meta Keywords')
                                ->helperText('Comma-separated, e.g. cruise jobs, hospitality, Indonesia')
                                ->maxLength(500)
                                ->columnSpanFull(),
                            static::imageUpload('seo_og_image', 'OG Image (Open Graph)', 'home/seo')
                                ->helperText('Recommended size: 1200×630 px. Converted to .webp on upload.')
                                ->columnSpanFull(),
                        ]),

                ]),
        ]);
    }

    // ─────────────────────────────────────────────────────────────────────────
    // Table (minimal – single record, auto-redirects to Edit)
    // ─────────────────────────────────────────────────────────────────────────
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('#')
                    ->width(40),
                Tables\Columns\TextColumn::make('hero_heading')
                    ->label('Hero Heading')
                    ->limit(60),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Last Updated')
                    ->dateTime('d M Y, H:i')
                    ->sortable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([])
            ->paginated(false);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListHomePages::route('/'),
            'create' => Pages\CreateHomePage::route('/create'),
            'edit'   => Pages\EditHomePage::route('/{record}/edit'),
        ];
    }
}

