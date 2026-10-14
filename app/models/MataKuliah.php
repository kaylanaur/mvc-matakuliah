<?php
class MataKuliah
{
    public function __construct(private PDO $db) {}

    public function getAll(): array
    {
        $stmt = $this->db->query(
            'SELECT id, kode_mk, nama_mk, sks, semester, dosen
             FROM mata_kuliah ORDER BY semester, nama_mk'
        );
        return $stmt->fetchAll();
    }

    public function findById(int $id): array|false
    {
        $stmt = $this->db->prepare(
            'SELECT id, kode_mk, nama_mk, sks, semester, dosen
             FROM mata_kuliah WHERE id = :id'
        );
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    public function insert(array $data): bool
    {
        $sql = 'INSERT INTO mata_kuliah (kode_mk, nama_mk, sks, semester, dosen)
                VALUES (:kode_mk, :nama_mk, :sks, :semester, :dosen)';
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':kode_mk'  => $data['kode_mk'],
            ':nama_mk'  => $data['nama_mk'],
            ':sks'      => $data['sks'],
            ':semester' => $data['semester'],
            ':dosen'    => $data['dosen']
        ]);
    }

    public function update(int $id, array $data): bool
    {
        $sql = 'UPDATE mata_kuliah
                SET kode_mk = :kode_mk, nama_mk = :nama_mk, sks = :sks,
                    semester = :semester, dosen = :dosen
                WHERE id = :id';
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':id'       => $id,
            ':kode_mk'  => $data['kode_mk'],
            ':nama_mk'  => $data['nama_mk'],
            ':sks'      => $data['sks'],
            ':semester' => $data['semester'],
            ':dosen'    => $data['dosen']
        ]);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->db->prepare('DELETE FROM mata_kuliah WHERE id = :id');
        return $stmt->execute([':id' => $id]);
    }
}
?>