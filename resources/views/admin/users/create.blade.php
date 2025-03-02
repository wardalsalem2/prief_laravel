<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إضافة مستخدم جديد</title>
    <link rel="stylesheet" href="path/to/your/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1>إضافة مستخدم جديد</h1>

        <form method="POST" action="{{ route('admin.users.store') }}">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">الاسم:</label>
                <input type="text" id="name" name="name" required class="form-control">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">البريد الإلكتروني:</label>
                <input type="email" id="email" name="email" required class="form-control">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">كلمة المرور:</label>
                <input type="password" id="password" name="password" required class="form-control">
            </div>

            <div class="mb-3">
                <label for="role" class="form-label">نوع المستخدم:</label>
                <select id="role" name="role" required class="form-select">
                    <option value="user">user</option>
                    <option value="admin">admin</option>
                    <option value="owner">owner</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">إضافة مستخدم</button>
            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">إلغاء</a>
        </form>
    </div>

    <script src="path/to/your/js/bootstrap.bundle.min.js"></script>
</body>
</html>
