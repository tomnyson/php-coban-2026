<?php
session_start();
if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = [];
}
$index = $_GET['id'];
$errors = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //them
    if ($_POST['action'] == 'sua') {
        if (
            isset($_POST['gen']) && isset($_POST['name']) && isset($_POST['branch'])
            && isset($_POST['birth']) && isset($_POST['death'])
        ) {

            if (empty($_POST['gen']))
                $errors['gen'] = " gen khong de trong";
        }

        if (empty($_POST['name'])) {
            $errors['gen'] = " name khong de trong";
        }
        if (count($errors) == 0) {
            $user = array(
                'id' => (int)$_GET['id'],
                'gen' => $_POST['gen'],
                'name' => $_POST['name'],
                'branch' => $_POST['branch'] ?? '',
                'birth' => $_POST['birth'] ?? '',
                'death' => $_POST['death'] ?? '',
            );
            $_SESSION['users'][$index] =  $user;
        }
    }
}
$user = $_SESSION['users'][$index];
?>
<!doctype html>
<html lang="vi">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Quản lý thành viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-4">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Quản lý thành viên</h4>
            <a class="btn btn-outline-secondary btn-sm" href="/members">Làm mới</a>
        </div>

        <form method="post" action="" enctype="multipart/form-data" class="row g-3 mb-4">

            <div class="col-md-2">
                <label class="form-label">Đời *</label>
                <input type="number" name="gen" value="1" class="form-control" required>
            </div>

            <div class="col-md-5">
                <label class="form-label">Họ tên *</label>
                <input type="text" name="name" value="<?php echo $_SESSION['users'][$index]['name'] ?>" class="form-control" required>
            </div>

            <div class="col-md-5">
                <label class="form-label">Chi/Nhánh</label>
                <input type="text" name="branch" class="form-control">
            </div>

            <div class="col-md-3">
                <label class="form-label">Năm sinh</label>
                <input type="number" name="birth" class="form-control">
            </div>

            <div class="col-md-3">
                <label class="form-label">Năm mất</label>
                <input type="number" name="death" class="form-control">
            </div>

            <div class="col-md-6">
                <label class="form-label">Vợ/Chồng</label>
                <input type="text" name="spouse" class="form-control">
            </div>

            <div class="col-md-6">
                <label class="form-label">Hình đại diện (tuỳ chọn)</label>
                <input type="file" name="avatar" class="form-control" accept="image/*">
                <div class="form-text">Backend nên giới hạn: jpg/png/webp, max 2MB.</div>
            </div>

            <div class="col-md-6">
                <label class="form-label">Cha (ID)</label>
                <input type="text" name="father_id" class="form-control">
            </div>

            <div class="col-12">
                <label class="form-label">Ghi chú</label>
                <textarea name="note" class="form-control" rows="2"></textarea>
            </div>

            <div class="col-12">
                <button type="submit" name="action" value="them" class="btn btn-primary">Lưu</button>
                <button type="reset" class="btn btn-outline-secondary">Reset</button>
            </div>
        </form>
    </div>
    <script>
        function deleteConfirm(event) {
            var confirmed = confirm(`ban muon xoa khong`);
            if (!confirmed) {
                event.preventDefault();
                return false
            }
            return true;

        }
    </script>

</body>

</html>