<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewsPostResource\Pages;
use App\Models\NewsPost;
use App\Services\ImageService;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class NewsPostResource extends Resource
{
    use Translatable;

    protected static ?string $model           = NewsPost::class;
    protected static ?string $navigationIcon  = 'heroicon-o-newspaper';
    protected static ?string $navigationLabel = 'News Posts';
    protected static ?string $navigationGroup = 'Content Management';
    protected static ?int    $navigationSort  = 1;

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
                            Forms\Components\TextInput::make('title')
                                ->label('Title')
                                ->required()
                                ->maxLength(255)
                                ->columnSpanFull(),
                            Forms\Components\TextInput::make('slug')
                                ->label('Slug')
                                ->required()
                                ->maxLength(255)
                                ->columnSpanFull()
                                ->helperText('Klik "Generate Slug" di atas untuk membuat slug dari Title otomatis, atau ketik secara manual.')
                                ->hintAction(
                                    Forms\Components\Actions\Action::make('generateSlug')
                                        ->label('Generate Slug')
                                        ->icon('heroicon-m-sparkles')
                                        ->action(function (Forms\Set $set, Forms\Get $get) {
                                            $title = $get('title');
                                            if ($title) {
                                                $set('slug', \Illuminate\Support\Str::slug($title));
                                            }
                                        })
                                ),
                            Forms\Components\DatePicker::make('published_at')
                                ->label('Published At')
                                ->default(now())
                                ->columnSpanFull(),
                            Forms\Components\RichEditor::make('content')
                                ->label('Content')
                                ->required()
                                ->fileAttachmentsDisk('public')
                                ->fileAttachmentsDirectory('content/news')
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
                                ->columnSpanFull(),
                        ]),

                    // ── Tab 2: Media ──────────────────────────────────────
                    Forms\Components\Tabs\Tab::make('Media')
                        ->icon('heroicon-o-photo')
                        ->schema([
                            static::imageUpload('featured_image_desktop', 'Featured Image (Desktop)', 'news')
                                ->helperText('This image will also be automatically used as the SEO Open Graph (OG) Image.')
                                ->required()
                                ->columnSpanFull(),
                            Forms\Components\Toggle::make('use_mobile_image')
                                ->label('Use Mobile Image')
                                ->live()
                                ->columnSpanFull(),
                            static::imageUpload('featured_image_mobile', 'Featured Image (Mobile)', 'news/mobile')
                                ->columnSpanFull()
                                ->visible(fn (Forms\Get $get) => $get('use_mobile_image'))
                                ->required(fn (Forms\Get $get) => $get('use_mobile_image')),
                        ]),

                    // ── Tab 3: SEO ────────────────────────────────────────
                    Forms\Components\Tabs\Tab::make('SEO')
                        ->icon('heroicon-o-magnifying-glass')
                        ->schema([
                            Forms\Components\TextInput::make('meta_title')
                                ->label('Meta Title')
                                ->required()
                                ->maxLength(120)
                                ->helperText('Recommended 50–60 characters')
                                ->columnSpanFull(),
                            Forms\Components\Textarea::make('meta_description')
                                ->label('Meta Description')
                                ->required()
                                ->rows(3)
                                ->maxLength(320)
                                ->helperText('Recommended 150–160 characters'),
                            Forms\Components\TextInput::make('seo_keywords')
                                ->label('Meta Keywords')
                                ->maxLength(500)
                                ->helperText('Comma-separated keywords')
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
                Tables\Columns\TextColumn::make('title')
                    ->label('Title')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('published_at')
                    ->label('Published At')
                    ->date('M d, Y')
                    ->sortable(),
            ])
            ->defaultSort('published_at', 'desc')
            ->filters([
                Tables\Filters\Filter::make('published')
                    ->query(fn ($query) => $query->whereNotNull('published_at')),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListNewsPosts::route('/'),
            'create' => Pages\CreateNewsPost::route('/create'),
            'edit'   => Pages\EditNewsPost::route('/{record}/edit'),
        ];
    }
}
