<?php
class MataKuliahController
{
    public function __construct(private MataKuliah $model) {}

    public function index(): void
    {
        $daftar = $this->model->getAll();
        $flash = $this->getFlash();
        require __DIR__ . '/../views/matakuliah/index.php';
    }

    public function create(): void
    {
        $flash = $this->getFlash();
        require __DIR__ . '/../views/matakuliah/create.php';
    }

    public function store(): void
    {
        [$data, $error] = $this->validateInput($_POST);
        if ($error) {
            $this->redirect('create', 'error', $error);
        }

        try {
            $this->model->insert($data);
        } catch (PDOException $e) {
            $this->redirect('create', 'error', 'Gagal menyimpan. Kode MK mungkin sudah dipakai.');
        }
        $this->redirect('index', 'success', 'Data mata kuliah berhasil ditambahkan.');
    }

    public function edit(): void
    {
        $id = (int) ($_GET['id'] ?? 0);
        $matkul = $this->model->findById($id);
        if (!$matkul) {
            http_response_code(404);
            exit('Data mata kuliah tidak ditemukan.');
        }
        $flash = $this->getFlash();
        require __DIR__ . '/../views/matakuliah/edit.php';
    }

    public function update(): void
    {
        $id = (int) ($_POST['id'] ?? 0);
        [$data, $error] = $this->validateInput($_POST);
        if ($error) {
            $this->redirect('edit', 'error', $error, "&id=$id");
        }

        try {
            $this->model->update($id, $data);
        } catch (PDOException $e) {
            $this->redirect('edit', 'error', 'Gagal update. Kode MK mungkin sudah dipakai.', "&id=$id");
        }
        $this->redirect('index', 'success', 'Data mata kuliah berhasil diperbarui.');
    }

    public function delete(): void
    {
        $id = (int) ($_POST['id'] ?? 0);
        try {
            $this->model->delete($id);
        } catch (PDOException $e) {
            $this->redirect('index', 'error', 'Gagal menghapus data.');
        }
        $this->redirect('index', 'success', 'Data mata kuliah berhasil dihapus.');
    }

    private function validateInput(array $input): array
    {
        $data = [
            'kode_mk'  => trim($input['kode_mk'] ?? ''),
            'nama_mk'  => trim($input['nama_mk'] ?? ''),
            'sks'      => (int) ($input['sks'] ?? 0),
            'semester' => (int) ($input['semester'] ?? 0),
            'dosen'    => trim($input['dosen'] ?? '')
        ];

        if ($data['kode_mk'] === '' || $data['nama_mk'] === '' || $data['dosen'] === '') {
            return [$data, 'Kode MK, nama MK, dan dosen wajib diisi.'];
        }
        if ($data['sks'] < 1 || $data['sks'] > 6) {
            return [$data, 'SKS harus antara 1 sampai 6.'];
        }
        if ($data['semester'] < 1 || $data['semester'] > 8) {
            return [$data, 'Semester harus antara 1 sampai 8.'];
        }
        return [$data, null];
    }

    private function redirect(string $action, string $type, string $message, string $extra = ''): void
    {
        $_SESSION['flash'] = ['type' => $type, 'message' => $message];
        header("Location: index.php?page=matakuliah&action={$action}{$extra}");
        exit;
    }

    private function getFlash(): ?array
    {
        $flash = $_SESSION['flash'] ?? null;
        unset($_SESSION['flash']);
        return $flash;
    }
}
?>