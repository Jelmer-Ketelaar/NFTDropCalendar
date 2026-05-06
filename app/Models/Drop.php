<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class Drop extends Model
{
    protected $table = 'projects';

    public $timestamps = false;

    protected $fillable = [
        'name', 'description', 'blockchain', 'category', 'thumbnail',
        'mintPrice', 'dropDate', 'roadmap', 'royality', 'supply', 'teamAmount',
        'twitterName', 'discordLink', 'websiteLink', 'emailContact',
        'discordMemberNumber', 'twitterFollowerNumber', 'signature', 'traits',
        'promoted', 'verified', 'banner', 'bannerPicture', 'updateStatus',
    ];

    public function isPromoted(): bool
    {
        return $this->promoted === 'promote';
    }

    public function isVerified(): bool
    {
        return $this->verified === 'true';
    }

    public function isLive(): bool
    {
        return (strtotime((string) $this->dropDate) ?: PHP_INT_MAX) <= time();
    }

    public function dropTimestamp(): int
    {
        $parts = explode('T', (string) $this->dropDate);

        return strtotime(($parts[0] ?? '') . ' ' . ($parts[1] ?? '')) ?: 0;
    }

    public function dropDatePart(): string
    {
        return explode('T', (string) $this->dropDate)[0] ?? '';
    }

    public function dropTimePart(): string
    {
        return explode('T', (string) $this->dropDate)[1] ?? '';
    }
}

