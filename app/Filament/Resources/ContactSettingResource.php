<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactSettingResource\Pages;
use App\Models\ContactSetting;
use App\Services\ImageService;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class ContactSettingResource extends Resource
{
    use Translatable;

    protected static ?string $model           = ContactSetting::class;
    protected static ?string $navigationIcon  = 'heroicon-o-phone';
    protected static ?string $navigationLabel = 'Contact Page';
    protected static ?string $navigationGroup = 'Page Settings';
    protected static ?int    $navigationSort  = 4;

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
                            static::imageUpload('banner_image', 'Banner Background Image', 'contact/banner')
                                ->columnSpanFull(),
                            Forms\Components\TextInput::make('contact_heading')
                                ->label('Contact Heading')
                                ->required()
                                ->maxLength(255)
                                ->columnSpanFull(),
                            Forms\Components\Textarea::make('contact_description')
                                ->label('Contact Description')
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
                                ->helperText('Comma-separated, e.g. contact, inquiry, collaboration')
                                ->maxLength(500)
                                ->columnSpanFull(),
                            static::imageUpload('seo_og_image', 'OG Image (Open Graph)', 'contact/seo')
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
            'index'  => Pages\ListContactSettings::route('/'),
            'create' => Pages\CreateContactSetting::route('/create'),
            'edit'   => Pages\EditContactSetting::route('/{record}/edit'),
        ];
    }
}
