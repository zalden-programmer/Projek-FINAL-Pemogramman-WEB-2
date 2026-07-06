<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
 
class KategoriController extends Controller
{
    // data kategori
    private $kategori_list = [
        [
            'id' => 1,
            'nama' => 'Programming',
            'deskripsi' => 'Buku pemrograman dan coding',
            'jumlah_buku' => 25
        ],
        [
            'id' => 2,
            'nama' => 'Database',
            'deskripsi' => 'Buku database dan SQL',
            'jumlah_buku' => 18
        ],
        [
            'id' => 3,
            'nama' => 'Jaringan',
            'deskripsi' => 'Buku networking dan keamanan',
            'jumlah_buku' => 12
        ],
        [
            'id' => 4,
            'nama' => 'Desain Web',
            'deskripsi' => 'Buku UI UX dan frontend',
            'jumlah_buku' => 15
        ],
        [
            'id' => 5,
            'nama' => 'Artificial Intelligence',
            'deskripsi' => 'Buku AI dan Machine Learning',
            'jumlah_buku' => 10
        ]
    ];


    // method index
    public function index()
    {
        $kategori_list = $this->kategori_list;
        return view('kategori.index', compact('kategori_list'));
    }


    // method show
    public function show($id)
    {
        $kategori = collect($this->kategori_list)->firstWhere('id', $id);

        if (!$kategori) {
            abort(404);
        }

        $buku_list = [
            [
                'kode' => 'BK-001',
                'judul' => 'Belajar Laravel',
                'pengarang' => 'Budi Santoso'
            ],
            [
                'kode' => 'BK-002',
                'judul' => 'Mastering PHP',
                'pengarang' => 'Andi Saputra'
            ],
            [
                'kode' => 'BK-003',
                'judul' => 'Bootstrap untuk Pemula',
                'pengarang' => 'Dewi Lestari'
            ]
        ];

        return view('kategori.show', compact('kategori', 'buku_list'));
    }

    // method search
    public function search($keyword)
    {
        $hasil = collect($this->kategori_list)->filter(function ($kategori) use ($keyword) {
            return str_contains(
                strtolower($kategori['nama']),
                strtolower($keyword)
            );
        });

        return view('kategori.search', [
            'hasil' => $hasil,
            'keyword' => $keyword
        ]);
    }
}