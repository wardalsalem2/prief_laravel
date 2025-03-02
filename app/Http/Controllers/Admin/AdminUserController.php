<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    // عرض قائمة بجميع المستخدمين مع البحث والتصفية
    public function index(Request $request)
    {
        $query = User::query();

        // البحث حسب الاسم أو البريد الإلكتروني أو الدور
        if ($request->has('search')) {
            $query->where(function ($query) use ($request) {
                $query->where('name', 'LIKE', '%' . $request->search . '%')
                      ->orWhere('email', 'LIKE', '%' . $request->search . '%')
                      ->orWhere('role', $request->search);
            });
        }
          // التصفية حسب الدور
          if ($request->has('role') && $request->role != ''){
            $query->where('role',$request->role);
          }
        $users = $query->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    // عرض نموذج إضافة مستخدم جديد
    public function create()
    {
        return view('admin.users.create');
    }

    // تخزين مستخدم جديد
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8',
        'role' => 'required|in:user,admin,owner',
    ]);

    // إنشاء المستخدم الجديد
    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password), // تشفير كلمة المرور
        'role' => $request->role,
    ]);

    return redirect()->route('admin.users.index')->with('success', 'تم إضافة المستخدم بنجاح.');
}


    // عرض تفاصيل المستخدم مع حجوزاته، تقييماته، الشاليهات، وملفه الشخصي إن وجد
    public function show(User $user)
    {
        // تحميل العلاقات المرتبطة
        $user->load(['bookings', 'reviews', 'chalets', 'ownerProfile']);

        return view('admin.users.show', compact('user'));
    }

    // عرض نموذج تعديل المستخدم
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    // تحديث بيانات المستخدم
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required|in:user,admin,owner',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'تم تحديث بيانات المستخدم بنجاح.');
    }

    // تعطيل أو حذف المستخدم
    public function destroy(User $user)
    {
        // حذف جميع الحجوزات، التقييمات، الشاليهات، والملف الشخصي قبل حذف المستخدم
        $user->bookings()->delete();
        $user->reviews()->delete();
        $user->chalets()->delete();
        $user->ownerProfile()->delete();

        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'تم حذف المستخدم بنجاح.');
    }
}
