<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AuditLog;
use Illuminate\Http\Request;

class AuditLogController extends Controller
{
    public function index(Request $request)
    {
        $query = AuditLog::latest();

        // Filter berdasarkan target type
        if ($request->filled('type')) {
            $query->where('target_type', $request->type);
        }

        // Search nama admin / label target
        if ($request->filled('search')) {
            $s = $request->search;
            $query->where(function ($q) use ($s) {
                $q->where('user_name', 'like', "%{$s}%")
                  ->orWhere('target_label', 'like', "%{$s}%")
                  ->orWhere('action', 'like', "%{$s}%");
            });
        }

        $logs = $query->paginate(30)->withQueryString();

        // Daftar tipe untuk dropdown filter
        $types = AuditLog::distinct()->pluck('target_type');

        return view('admin.logs.index', compact('logs', 'types'));
    }
}