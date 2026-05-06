@extends('layouts.admin')

@push('head')
<style>
    th { color: white; font-size: 18px; }
    td { color: white; font-size: 14px; }
    @media (max-width: 768px) { .btn-save-all { text-align: center; width: 100%; margin-top: 10px; } }
</style>
@endpush

@section('content')
<section class="activity-area load-more">
    <div class="container">
        <div class="intro mb-4">
            <div class="intro-content">
                <span>All Drops</span>
                <h3 class="mt-3 mb-0">Edit</h3>
                <a href="{{ route('admin.review', ['ww' => 'Test']) }}" class="btn btn-success float-end">Projecten Goedkeuren</a>
            </div>
        </div>
        <div style="overflow-x:auto; white-space:nowrap;">
            <form action="{{ route('admin.update-db') }}" method="POST">
                @csrf
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th><th>Verified</th><th>Name</th><th>Blockchain</th><th>Category</th>
                            <th>Thumbnail</th><th>dropDate</th><th>mintPrice</th><th>Royalty</th>
                            <th>Supply</th><th>Team</th><th>Twitter</th><th>Discord</th><th>Website</th>
                            <th>Promoted</th><th>Discord#</th><th>Twitter#</th><th>Signature</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($drops as $drop)
                        <tr>
                            <input type="hidden" name="id[]" value="{{ $drop->id }}">
                            <td>{{ $drop->id }}</td>
                            <td>
                                <select name="verified[]">
                                    <option value="true" {{ $drop->verified === 'true' ? 'selected' : '' }}>true</option>
                                    <option value="false" {{ $drop->verified === 'false' ? 'selected' : '' }}>false</option>
                                </select>
                            </td>
                            <td><input type="text" name="name[]" value="{{ $drop->name }}"></td>
                            <td>
                                <select name="blockchain[]">
                                    @foreach(['ethereum','solana','polygon','cardano','avalanche'] as $bc)
                                    <option value="{{ $bc }}" {{ $drop->blockchain === $bc ? 'selected' : '' }}>{{ $bc }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>{{ $drop->category }}</td>
                            <td><img style="width:50px;" src="{{ $drop->thumbnail }}" alt=""></td>
                            <td><input type="datetime-local" name="dropDate[]" value="{{ $drop->dropDate }}"></td>
                            <td><input type="text" name="mintPrice[]" value="{{ $drop->mintPrice }}"></td>
                            <td><input type="number" step="0.5" name="royality[]" value="{{ $drop->royality }}"></td>
                            <td><input type="number" name="supply[]" value="{{ $drop->supply }}"></td>
                            <td><input type="number" name="teamAmount[]" value="{{ $drop->teamAmount }}"></td>
                            <td><input type="text" name="twitterName[]" value="{{ $drop->twitterName }}"></td>
                            <td><input type="text" name="discordLink[]" value="{{ $drop->discordLink }}"></td>
                            <td><input type="text" name="websiteLink[]" value="{{ $drop->websiteLink }}"></td>
                            <td><input type="text" name="promoted[]" value="{{ $drop->promoted }}"></td>
                            <td><input type="number" name="discordMemberNumber[]" value="{{ $drop->discordMemberNumber }}"></td>
                            <td><input type="number" name="twitterFollowerNumber[]" value="{{ $drop->twitterFollowerNumber }}"></td>
                            <td>{{ $drop->signature }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <button type="submit" class="btn btn-success">Save All</button>
            </form>
        </div>
    </div>
</section>
@endsection
