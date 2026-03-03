<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewsSettingResource\Pages;
use App\Models\NewsSetting;
use App\Services\ImageService;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class NewsSettingResource extends Resource
{
    use Translatable;

    protected static ?string $model          = NewsSetting::class;
    protected static ?string $navigationIcon = 'heroicon-o-megaphone';
    protected static ?string $navigationLabel = 'News Page';
    protected static ?string $navigationGroup = 'Page Settings';
    protected static ?int    $navigationSort  = 5;

    // ─── Reusable image-upload factory ───────────────────────────────────────

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

    // ─── Form ─────────────────────────────────────────────────────────────────

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Tabs::make('Sections')
                ->persistTabInQueryString()
                ->columnSpanFull()
                ->tabs([

                    // ── Tab 1: Content ────────────────────────────────────
                    Forms\Components\Tabs\Tab::make('Content')
                        ->icon('heroicon-o-document-text')
                        ->schema([
                            Forms\Components\TextInput::make('banner_title')
                                ->label('Banner Title')
                                ->required()
                                ->maxLength(255)
                                ->columnSpanFull(),
                            static::imageUpload('banner_image', 'Banner Background Image', 'news/banner')
                                ->columnSpanFull(),
                            Forms\Components\TextInput::make('subheading')
                                ->label('Subheading (e.g. INFORMATION)')
                                ->required()
                                ->maxLength(255)
                                ->columnSpanFull(),
                            Forms\Components\TextInput::make('heading')
                                ->label('Main Heading')
                                ->required()
                                ->maxLength(255)
                                ->columnSpanFull(),
                            Forms\Components\Textarea::make('short_description')
                                ->label('Short Description')
                                ->required()
                                ->rows(4)
                                ->columnSpanFull(),
                        ]),

                    // ── Tab 2: SEO ────────────────────────────────────────
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
                                ->required()
                                ->helperText('Comma-separated, e.g. news, activities, alumni')
                                ->maxLength(500)
                                ->columnSpanFull(),
                            static::imageUpload('seo_og_image', 'OG Image (Open Graph)', 'news/seo')
                                ->helperText('Recommended size: 1200×630 px.')
                                ->columnSpanFull(),
                        ]),

                ]),
        ]);
    }

    // ─── Table (unused – single record) ───────────────────────────────────────

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('banner_title')
                    ->label('Banner Title')
                    ->getStateUsing(fn ($record) => $record->getTranslation('banner_title', app()->getLocale())),
            ])
            ->paginated(false);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListNewsSettings::route('/'),
            'create' => Pages\CreateNewsSetting::route('/create'),
            'edit'   => Pages\EditNewsSetting::route('/{record}/edit'),
        ];
    }
}
