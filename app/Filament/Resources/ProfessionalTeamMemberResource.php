<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProfessionalTeamMemberResource\Pages;
use App\Models\ProfessionalTeamMember;
use App\Services\ImageService;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class ProfessionalTeamMemberResource extends Resource
{
    use Translatable;

    protected static ?string $model           = ProfessionalTeamMember::class;
    protected static ?string $navigationIcon  = 'heroicon-o-user-group';
    protected static ?string $navigationLabel = 'Professional Team';
    protected static ?string $navigationGroup = 'Content Management';
    protected static ?int    $navigationSort  = 4;

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
            ->nullable()
            ->helperText('Recommended upload WebP images. Non-WebP images will be automatically converted to WebP. Maximum file size: 3MB.')
            ->saveUploadedFileUsing(
                fn (TemporaryUploadedFile $file) => ImageService::storeAsWebp($file, $dir)
            );
    }

    public static function form(Form $form): Form
    {
        return $form->schema([

            Forms\Components\TextInput::make('name')
                ->label('Full Name')
                ->required()
                ->maxLength(255),

            Forms\Components\TextInput::make('role')
                ->label('Role / Job Title')
                ->required()
                ->maxLength(255),

            static::imageUpload('image', 'Profile Photo', 'team/professional')
                ->columnSpanFull(),

            Forms\Components\TextInput::make('linkedin')
                ->label('LinkedIn URL')
                ->url()
                ->maxLength(500)
                ->placeholder('https://linkedin.com/in/username'),

            Forms\Components\TextInput::make('email')
                ->label('Email')
                ->email()
                ->maxLength(255),

            Forms\Components\TextInput::make('sort_order')
                ->label('Sort Order')
                ->numeric()
                ->default(0)
                ->helperText('Lower number = shown first.'),

        ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('sort_order', 'asc')
            ->columns([
                Tables\Columns\ImageColumn::make('image')->label('Photo')->disk('public')->circular()->size(50),
                Tables\Columns\TextColumn::make('name')->label('Name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('role')
                    ->label('Role')
                    ->getStateUsing(fn ($record) => $record->getTranslation('role', 'id')
                        ?? $record->getTranslation('role', 'en')
                        ?? 'N/A')
                    ->limit(60),
                Tables\Columns\TextColumn::make('email')->label('Email')->searchable()->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('sort_order')->label('#')->sortable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()]),
            ]);
    }

    public static function getRelations(): array { return []; }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListProfessionalTeamMembers::route('/'),
            'create' => Pages\CreateProfessionalTeamMember::route('/create'),
            'edit'   => Pages\EditProfessionalTeamMember::route('/{record}/edit'),
        ];
    }
}
