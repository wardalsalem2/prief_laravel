<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تعديل المستخدم</title>
    <link rel="stylesheet" href="path/to/your/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1>تعديل المستخدم</h1>

        <form method="POST" action="{{ route('admin.users.update', $user) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">الاسم:</label>
                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required class="form-control">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">البريد الإلكتروني:</label>
                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required class="form-control">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">كلمة المرور الجديدة (إذا كنت تريد تغييرها):</label>
                <input type="password" id="password" name="password" class="form-control">
                <small class="form-text text-muted">اترك هذا الحقل فارغًا إذا لم تكن تريد تغيير كلمة المرور.</small>
            </div>


            <div class="mb-3">
                <label for="role" class="form-label">نوع المستخدم:</label>
                <select id="role" name="role" required class="form-select">
                    <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>user</option>
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>admin</option>
                    <option value="owner" {{ $user->role == 'owner' ? 'selected' : '' }}>owner</option>
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary">تحديث المستخدم</button>
            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">إلغاء</a>
        </form>
    </div>

    <script src="path/to/your/js/bootstrap.bundle.min.js"></script>
</body>
</html>
