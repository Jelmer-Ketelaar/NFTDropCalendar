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

    public function isPromoted(): bool
    {
        return $this->promoted === 'promote';
    }

    public function isVerified(): bool
    {
        return $this->verified === 'true';
    }
}

