<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\User;
use App\Models\Chalet;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    // عرض قائمة الحجوزات مع الفلترة والبحث
    public function index(Request $request)
    {
        $bookings = Booking::with(['user', 'chalet'])
            ->when($request->user_id, function ($query) use ($request) {
                $query->where('user_id', $request->user_id);
            })
            ->when($request->chalet_id, function ($query) use ($request) {
                $query->where('chalet_id', $request->chalet_id);
            })
            ->when($request->status, function ($query) use ($request) {
                $query->where('status', $request->status);
            })
            ->when($request->start_date && $request->end_date, function ($query) use ($request) {
                $query->whereBetween('start', [$request->start_date, $request->end_date]);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $users = User::all();
        $chalets = Chalet::all();
        return view('admin.bookings.index', compact('bookings', 'users', 'chalets'));
    }

    // تغيير حالة الحجز
    public function updateStatus(Request $request, Booking $booking)
    {
        $request->validate(['status' => 'required|in:confirmed,pending,canceled']);
        $booking->update(['status' => $request->status]);
        
        // إرسال إشعار للمستخدم
        // $booking->user->notify(new \App\Notifications\BookingStatusUpdated($booking));

        // return redirect()->back()->with('success', 'تم تحديث حالة الحجز بنجاح');
    }

    // حذف الحجز
    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect()->back()->with('success', 'تم حذف الحجز بنجاح');
    }
}
