<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AboutPageResource\Pages;
use App\Models\AboutPage;
use App\Services\ImageService;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class AboutPageResource extends Resource
{
    use Translatable;

    protected static ?string $model             = AboutPage::class;
    protected static ?string $navigationIcon    = 'heroicon-o-information-circle';
    protected static ?string $navigationLabel   = 'About Us';
    protected static ?string $navigationGroup   = 'Page Settings';
    protected static ?int    $navigationSort    = 2;

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

                    // ── Tab 1: Banner ─────────────────────────────────────
                    Forms\Components\Tabs\Tab::make('Banner')
                        ->icon('heroicon-o-photo')
                        ->schema([
                            Forms\Components\TextInput::make('banner_title')
                                ->label('Page Title')
                                ->required()
                                ->maxLength(255)
                                ->columnSpanFull(),
                            static::imageUpload('banner_image', 'Banner Background Image', 'about-us/banner')
                                ->columnSpanFull(),
                        ]),

                    // ── Tab 2: Owner Message ──────────────────────────────
                    Forms\Components\Tabs\Tab::make('Owner Message')
                        ->icon('heroicon-o-user-circle')
                        ->schema([
                            Forms\Components\Grid::make(2)->schema([
                                Forms\Components\TextInput::make('owner_headline')
                                    ->label('Headline')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('owner_name')
                                    ->label('Director Name')
                                    ->required()
                                    ->maxLength(255),
                            ]),
                            Forms\Components\TextInput::make('owner_position')
                                ->label('Director Position / Title')
                                ->required()
                                ->maxLength(255)
                                ->columnSpanFull(),
                            Forms\Components\RichEditor::make('owner_message')
                                ->label('Message (WYSIWYG)')
                                ->required()
                                ->fileAttachmentsDisk('public')
                                ->fileAttachmentsDirectory('content/about')
                                ->toolbarButtons([
                                    'bold', 'italic', 'underline', 'strike',
                                    'link', 'blockquote',
                                    'h2', 'h3', 'h4', 'h5', 'h6',
                                    'bulletList', 'orderedList',
                                    'attachFiles', 'codeBlock',
                                    'undo', 'redo',
                                ])
                                ->columnSpanFull(),
                            static::imageUpload('owner_image', 'Director Photo', 'about-us/owner')
                                ->columnSpanFull(),
                        ]),

                    // ── Tab 3: About Company ──────────────────────────────
                    Forms\Components\Tabs\Tab::make('About Company')
                        ->icon('heroicon-o-building-office')
                        ->schema([
                            Forms\Components\TextInput::make('about_headline')
                                ->label('Headline')
                                ->required()
                                ->maxLength(255)
                                ->columnSpanFull(),
                            Forms\Components\RichEditor::make('about_description')
                                ->label('Company Description (WYSIWYG)')
                                ->required()
                                ->fileAttachmentsDisk('public')
                                ->fileAttachmentsDirectory('content/about')
                                ->toolbarButtons([
                                    'bold', 'italic', 'underline', 'strike',
                                    'link', 'blockquote',
                                    'h2', 'h3', 'h4', 'h5', 'h6',
                                    'bulletList', 'orderedList',
                                    'attachFiles', 'codeBlock',
                                    'undo', 'redo',
                                ])
                                ->columnSpanFull(),
                        ]),

                    // ── Tab 4: Company Values ─────────────────────────────
                    Forms\Components\Tabs\Tab::make('Company Values')
                        ->icon('heroicon-o-star')
                        ->schema([
                            Forms\Components\Grid::make(2)->schema([
                                Forms\Components\TextInput::make('value_subheading')
                                    ->label('Subheading')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('value_heading')
                                    ->label('Main Heading')
                                    ->required()
                                    ->maxLength(255),
                            ]),
                            Forms\Components\Textarea::make('value_description')
                                ->label('Section Description')
                                ->required()
                                ->rows(3)
                                ->columnSpanFull(),
                            static::imageUpload('value_image', 'Section Image', 'about-us/values')
                                ->columnSpanFull(),
                            Forms\Components\Repeater::make('value_items')
                                ->label('Value Items (Vision, Mission, Commitment…)')
                                ->addActionLabel('Add Value Item')
                                ->collapsible()
                                ->cloneable()
                                ->defaultItems(0)
                                ->columnSpanFull()
                                ->schema([
                                    Forms\Components\TextInput::make('title')
                                        ->label('Title')
                                        ->required()
                                        ->columnSpanFull(),
                                    Forms\Components\RichEditor::make('content')
                                        ->label('Content (WYSIWYG)')
                                        ->required()
                                        ->fileAttachmentsDisk('public')
                                        ->fileAttachmentsDirectory('content/about')
                                        ->toolbarButtons([
                                            'bold', 'italic', 'underline', 'strike',
                                            'link', 'blockquote',
                                            'h2', 'h3', 'h4', 'h5', 'h6',
                                            'bulletList', 'orderedList',
                                            'attachFiles', 'codeBlock',
                                            'undo', 'redo',
                                        ])
                                        ->columnSpanFull(),
                                ]),
                        ]),

                    // ── Tab 5: Collaboration ──────────────────────────────
                    Forms\Components\Tabs\Tab::make('Collaboration')
                        ->icon('heroicon-o-academic-cap')
                        ->schema([
                            Forms\Components\TextInput::make('collaboration_heading')
                                ->label('Section Heading')
                                ->required()
                                ->maxLength(255)
                                ->columnSpanFull(),
                            Forms\Components\Textarea::make('collaboration_description')
                                ->label('Description')
                                ->required()
                                ->rows(4)
                                ->columnSpanFull(),
                            static::imageUpload('collaboration_image', 'Collaboration Image', 'about-us/collaboration')
                                ->columnSpanFull(),
                        ]),

                    // ── Tab 6: Certified ──────────────────────────────────
                    Forms\Components\Tabs\Tab::make('Certified')
                        ->icon('heroicon-o-shield-check')
                        ->schema([
                            Forms\Components\TextInput::make('certified_heading')
                                ->label('Section Heading')
                                ->required()
                                ->maxLength(255)
                                ->columnSpanFull(),
                            Forms\Components\Textarea::make('certified_description')
                                ->label('Description')
                                ->required()
                                ->rows(3)
                                ->columnSpanFull(),
                            static::imageUpload('certified_image', 'Section Image', 'about-us/certified')
                                ->columnSpanFull(),
                            Forms\Components\Repeater::make('certified_logos')
                                ->label('Certification / Partner Logos')
                                ->addActionLabel('Add Logo')
                                ->collapsible()
                                ->cloneable()
                                ->defaultItems(0)
                                ->columnSpanFull()
                                ->schema([
                                    static::imageUpload('logo_image', 'Logo Image', 'about-us/certifications')
                                        ->columnSpanFull(),
                                ]),
                        ]),

                    // ── Tab 7: Directors & Team ───────────────────────────
                    Forms\Components\Tabs\Tab::make('Directors & Team')
                        ->icon('heroicon-o-users')
                        ->schema([
                            Forms\Components\Section::make('Board of Directors')
                                ->columns(2)
                                ->schema([
                                    Forms\Components\TextInput::make('director_heading')
                                        ->label('Section Heading')
                                        ->required()
                                        ->maxLength(255),
                                    Forms\Components\Textarea::make('director_description')
                                        ->label('Description')
                                        ->required()
                                        ->rows(3),
                                ]),
                            Forms\Components\Section::make('Professional Team')
                                ->columns(2)
                                ->schema([
                                    Forms\Components\TextInput::make('team_heading')
                                        ->label('Section Heading')
                                        ->required()
                                        ->maxLength(255),
                                    Forms\Components\Textarea::make('team_description')
                                        ->label('Description')
                                        ->required()
                                        ->rows(3),
                                ]),
                        ]),

                    // ── Tab 8: SEO ────────────────────────────────────────
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
                                ->helperText('Comma-separated, e.g. about us, company profile')
                                ->maxLength(500)
                                ->columnSpanFull(),
                            static::imageUpload('seo_og_image', 'OG Image (Open Graph)', 'about-us/seo')
                                ->helperText('Recommended size: 1200×630 px.')
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
                Tables\Columns\TextColumn::make('id')->label('#')->width(40),
                Tables\Columns\TextColumn::make('banner_title')->label('Page Title')->limit(60),
                Tables\Columns\TextColumn::make('updated_at')->label('Last Updated')->dateTime('d M Y, H:i')->sortable(),
            ])
            ->actions([Tables\Actions\EditAction::make()])
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
            'index'  => Pages\ListAboutPages::route('/'),
            'create' => Pages\CreateAboutPage::route('/create'),
            'edit'   => Pages\EditAboutPage::route('/{record}/edit'),
        ];
    }
}
