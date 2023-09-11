<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Files\File;

class GalleryController extends BaseController
{
    public function index()
    {
        $directoryPath = 'uploads/';
        $allowedFileTypes = array("jpg", "png", "jpeg");
        $images = array();
        foreach (glob($directoryPath . '/*.*') as $file) {
            $image = new File($file);

            $imageName = $image->getBasename();
            $ext = $image->guessExtension();
            if (in_array($ext, $allowedFileTypes)) {

                array_push($images, array('name' => $imageName, 'size' => $image->getSizeByUnit('kb')));
            }
        }
        $data['images'] = $images;
        return view('gallery', $data);
    }

    public function upload()
    {
        $validationRules = [
            'image' => [
                'label' => 'Image',
                'rules' => [
                    'uploaded[image]',
                    'is_image[image]',
                    'mime_in[image,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                    'max_size[image,1000]',
                ],
            ],
        ];
        if (!$this->validate($validationRules)) {

            $this->session->setFlashdata('error', $this->validator->getErrors());
            return redirect()->to(site_url());
        }

        $img = $this->request->getFile('image');

        if (!$img->hasMoved()) {
            $fileName = $img->getRandomName();

            if ($img->move('uploads/', $fileName)) {
                $this->session->setFlashdata('success', 'Image uploaded successfully.');
                return redirect()->to(site_url());
            }
        }

        $this->session->setFlashdata('error', array('Failed to move the file or it has already been moved'));
        return redirect()->to(site_url());
    }

    public function delete($imageName)
    {
        if (file_exists('uploads/' . $imageName)) {
            unlink('uploads/' . $imageName);
        }
        return redirect()->to(site_url());
    }

    public function download($imageName)
    {
        if (file_exists('uploads/' . $imageName)) {
            return $this->response->download('uploads/' . $imageName, null);
        }
        //return redirect()->to(site_url());
    }
}
