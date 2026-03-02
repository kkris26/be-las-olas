<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FooterSettingResource\Pages;
use App\Models\FooterSetting;
use App\Services\ImageService;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class FooterSettingResource extends Resource
{
    use Translatable;

    protected static ?string $model           = FooterSetting::class;
    protected static ?string $navigationIcon  = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Footer';
    protected static ?string $navigationGroup = 'Global Settings';
    protected static ?int    $navigationSort  = 2;

    // ─── Reusable image-upload factory ───────────────────────────────────────

    private static function logoUpload(string $field, string $label, string $dir): Forms\Components\FileUpload
    {
        return Forms\Components\FileUpload::make($field)
            ->label($label)
            ->disk('public')
            ->directory($dir)
            ->image()
            ->imageEditor()
            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/gif', 'image/bmp', 'image/tiff'])
            ->maxSize(3072)
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

                    // ── Tab 1: Headings ───────────────────────────────────
                    Forms\Components\Tabs\Tab::make('Headings')
                        ->icon('heroicon-o-h1')
                        ->schema([
                            Forms\Components\TextInput::make('footer_link_heading')
                                ->label('Quick Links Heading')
                                ->required()
                                ->maxLength(255)
                                ->columnSpanFull(),
                            Forms\Components\TextInput::make('footer_service_heading')
                                ->label('Services Heading')
                                ->required()
                                ->maxLength(255)
                                ->columnSpanFull(),
                            Forms\Components\TextInput::make('footer_location_heading')
                                ->label('Location / Visit Us Heading')
                                ->required()
                                ->maxLength(255)
                                ->columnSpanFull(),
                        ]),

                    // ── Tab 2: Navigation ─────────────────────────────────
                    Forms\Components\Tabs\Tab::make('Navigation')
                        ->icon('heroicon-o-bars-3')
                        ->schema([
                            Forms\Components\Repeater::make('footer_services')
                                ->label('Footer Service Links')
                                ->addActionLabel('Add Service Link')
                                ->collapsible()
                                ->cloneable()
                                ->defaultItems(0)
                                ->columnSpanFull()
                                ->schema([
                                    Forms\Components\Grid::make(2)->schema([
                                        Forms\Components\TextInput::make('title')
                                            ->label('Link Title')
                                            ->required()
                                            ->maxLength(255),
                                        Forms\Components\TextInput::make('url')
                                            ->label('URL / Path')
                                            ->required()
                                            ->maxLength(500)
                                            ->placeholder('/onboarding or https://...'),
                                    ]),
                                ]),
                        ]),

                    // ── Tab 3: Branding & Legal ───────────────────────────
                    Forms\Components\Tabs\Tab::make('Branding & Legal')
                        ->icon('heroicon-o-shield-check')
                        ->schema([
                            Forms\Components\TextInput::make('footer_left_description')
                                ->label('Footer Left Description (e.g. Official Recruitment Agency)')
                                ->required()
                                ->maxLength(500)
                                ->columnSpanFull(),
                            Forms\Components\Repeater::make('footer_brand_logos')
                                ->label('Brand / Partner Logos')
                                ->addActionLabel('Add Logo')
                                ->collapsible()
                                ->cloneable()
                                ->required()
                                ->defaultItems(0)
                                ->columnSpanFull()
                                ->schema([
                                    static::logoUpload('logo_image', 'Logo Image', 'footer/brands')
                                    ->required()
                                        ->columnSpanFull(),
                                ]),
                            Forms\Components\Textarea::make('footer_copyright_text')
                                ->label('Copyright Text')
                                ->required()
                                ->helperText('Use :year as a placeholder for the current year. e.g. Copyright © :year PT. Las Olas Indonesia')
                                ->rows(2)
                                ->columnSpanFull(),
                        ]),

                ]),
        ]);
    }

    // ─── Table ────────────────────────────────────────────────────────────────

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('footer_link_heading')
                    ->label('Links Heading')
                    ->getStateUsing(fn ($record) => $record->getTranslation('footer_link_heading', app()->getLocale())),
                Tables\Columns\TextColumn::make('footer_copyright_text')
                    ->label('Copyright')
                    ->getStateUsing(fn ($record) => $record->getTranslation('footer_copyright_text', app()->getLocale()))
                    ->limit(60),
            ])
            ->paginated(false);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListFooterSettings::route('/'),
            'create' => Pages\CreateFooterSetting::route('/create'),
            'edit'   => Pages\EditFooterSetting::route('/{record}/edit'),
        ];
    }
}
