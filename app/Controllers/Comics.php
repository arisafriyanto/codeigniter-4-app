<?php

namespace App\Controllers;

use App\Models\ComicModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Comics extends BaseController
{
    protected $comicModel;

    public function __construct()
    {
        $this->comicModel = new ComicModel();
    }

    public function index(): string
    {
        // Not model
        // $db = \Config\Database::connect();
        // $comics = $db->query("select * from comics");
        // foreach ($comics->getResultArray() as $row) {
        //     d($row);
        // }

        // $comics = $this->comicModel->findAll();

        $data = [
            'page_title' => 'Comics',
            'comics' => $this->comicModel->getComic()
        ];

        // $comicModel = new ComicModel();
        // dd($comics);

        return view('comics/index', $data);
    }

    public function detail($slug)
    {
        // $comic = $this->comicModel->where('slug', $slug)->first();
        // $comic = $this->comicModel->getComic($slug);

        $data = [
            'page_title' => 'Comic Detail',
            'comic' => $this->comicModel->getComic($slug)
        ];

        if (empty($data['comic'])) {
            throw new PageNotFoundException("Comic title $slug not found!");
        }

        return view('comics/detail', $data);
    }

    public function create()
    {
        $data = [
            'page_title' => 'Add Comic',
            'validation' => session()->getFlashdata('validation')
        ];

        return view('comics/create', $data);
    }

    public function save()
    {
        // dd($this->request->getVar());

        // validasi input
        $config = [
            'title' => [
                'rules' => 'required|is_unique[comics.title]',
                'errors' => [
                    'required' => 'The {field} field is required!',
                    // field lain
                ]
            ],
            'cover' => [
                'rules' => 'uploaded[cover]|max_size[cover,2048]|is_image[cover]|mime_in[cover,image/jpg,image/jpeg,image/png]',
            ]
        ];

        if (!$this->validate($config)) {
            return redirect()->back()->withInput();
        }

        $coverFile = $this->request->getFile('cover');
        $coverFile->move('images');
        $fileName = $coverFile->getName();

        $slug = url_title($this->request->getVar('title'), '-', true);
        $this->comicModel->save([
            'title' => $this->request->getVar('title'),
            'slug' => $slug,
            'author' => $this->request->getVar('author'),
            'publisher' => $this->request->getVar('publisher'),
            'cover' => $fileName,
        ]);

        session()->setFlashdata('message', 'Comic data added successfully!');

        return redirect()->to('comics');
    }

    public function delete($id)
    {
        $this->comicModel->delete($id);
        session()->setFlashdata('message', 'Comic data deleted successfully!');

        return redirect()->to('comics');
    }

    public function edit($slug)
    {
        $data = [
            'page_title' => 'Edit Comic',
            'validation' => session()->getFlashdata('validation'),
            'comic' => $this->comicModel->getComic($slug)
        ];

        return view('comics/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'title' => [
                'rules' => "required|is_unique[comics.title,id,{$id}]",
                'errors' => [
                    'required' => 'The {field} field is required!',
                    'is_unique' => 'The {field} must be unique!',
                    // field lain
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        $this->comicModel->save([
            'id' => $id,
            'title' => $this->request->getVar('title'),
            'author' => $this->request->getVar('author'),
            'publisher' => $this->request->getVar('publisher'),
            'cover' => $this->request->getVar('cover'),
        ]);

        session()->setFlashdata('message', 'Comic data edited successfully!');

        return redirect()->to('comics');
    }
}
