<?php

// app/Http/Middleware/LogVisitor.php

namespace App\Http\Middleware;

use App\Models\Visitor;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $today = Carbon::today();
        $ipAddress = $request->ip();
        $sessionKey = 'visitor_logged_' . $today->format('Y-m-d') . '_' . $ipAddress;

        // Cek apakah pengunjung dengan IP ini sudah dihitung hari ini
        if (!session()->has($sessionKey)) {
            // Cari atau buat record untuk hari ini
            $visitor = Visitor::firstOrCreate(
                ['date' => $today],
                ['visits' => 0]
            );

            // Tambahkan jumlah pengunjung
            $visitor->increment('visits');

            // Tandai bahwa pengunjung ini sudah dihitung
            session([$sessionKey => true]);
        }

        return $next($request);
    }
}