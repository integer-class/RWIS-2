<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dokumentasi;
use App\Models\Pengumuman_rt;
use App\Models\Pengumuman;
use App\Models\Komplain;

class NotificationController extends Controller
{
    public function getLatestActivities()
    {
        $activities = DB::table('dokumentasi')
            ->select('title as activity', 'created_at')
            ->union(DB::table('pengumuman')->select('title as activity', 'created_at'))
            ->union(DB::table('komplain ')->select('description as activity', 'created_at'))
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        return response()->json($activities);
    }
}
