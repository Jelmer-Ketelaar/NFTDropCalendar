<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class ListedProject extends Model
{
    protected $table = 'projectsExist';

    public $timestamps = false;

    protected $fillable = [
        'name', 'description', 'blockchain', 'category', 'thumbnail',
        'traits', 'floorPrice', 'roadmap', 'volume', 'royality', 'supply',
        'teamAmount', 'twitterName', 'discordLink', 'websiteLink', 'emailContact',
        'discordMemberNumber', 'twitterFollowerNumber', 'signature', 'promoted',
        'marketplaceLink', 'verified', 'updateStatus', 'ethChoice',
    ];

    public function thumbnailUrl(): string
    {
        if (str_starts_with($this->thumbnail ?? '', 'http')) {
            return $this->thumbnail;
        }

        return asset($this->thumbnail ?? '');
    }

    protected function casts(): array
    {
        return [
            'verified'             => 'boolean',
            'updateStatus'         => 'boolean',
            'discordMemberNumber'  => 'integer',
            'twitterFollowerNumber'=> 'integer',
            'supply'               => 'integer',
            'teamAmount'           => 'integer',
            'dateUploadDropUser'   => 'datetime',
        ];
    }
}
