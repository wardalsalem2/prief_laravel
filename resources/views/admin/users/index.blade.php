<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إدارة المستخدمين</title>
    <link rel="stylesheet" href="path/to/your/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1>إدارة المستخدمين</h1>

        <form method="GET" action="{{ route('admin.users.index') }}" style="margin-bottom: 20px;">
            <input type="text" name="search" placeholder="البحث بالاسم أو البريد الإلكتروني" style="padding: 5px; width: 250px;">
            <select name="role" style="padding: 5px;">
                <option value="">الكل</option>
                <option value="user">user</option>
                <option value="admin">admin</option>
                <option value="owner">owner</option>
            </select>
            <button type="submit" style="padding: 5px 10px;">بحث</button>
            <a href="{{ route('admin.users.create') }}" style="padding: 5px 10px; background-color: green; color: white; text-decoration: none;">إضافة مستخدم جديد</a>
        </form>

        @if (session('success'))
        <div id="success-message" class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    

        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr>
                    <th style="border: 1px solid #ccc; padding: 10px;">الاسم</th>
                    <th style="border: 1px solid #ccc; padding: 10px;">البريد الإلكتروني</th>
                    <th style="border: 1px solid #ccc; padding: 10px;">الدور</th>
                    <th style="border: 1px solid #ccc; padding: 10px;">العمليات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td style="border: 1px solid #ccc; padding: 10px;">
                            <a href="{{ route('admin.users.show', $user) }}" style="text-decoration: none; color: blue;">
                                {{ $user->name }}
                            </a>
                        </td>
                        <td style="border: 1px solid #ccc; padding: 10px;">{{ $user->email }}</td>
                        <td style="border: 1px solid #ccc; padding: 10px;">{{ $user->role }}</td>
                        <td style="border: 1px solid #ccc; padding: 10px;">
                            <a href="{{ route('admin.users.edit', $user) }}" style="color: blue; text-decoration: none;">تعديل</a>
                            <form method="POST" action="{{ route('admin.users.destroy', $user) }}" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="color: red; background: none; border: none; cursor: pointer;">حذف</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $users->links() }} <!-- روابط الصفحات -->
    </div>
    <script>
        setTimeout(function() {
            document.getElementById('success-message')?.remove();
        }, 2000); // 1000 ميلي ثانية = 1 ثانية
    </script>
    
    <script src="path/to/your/js/bootstrap.bundle.min.js"></script>
</body>
</html>
