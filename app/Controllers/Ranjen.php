<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\RanjenModel;

class Ranjen extends ResourceController
{
    use ResponseTrait;
    
    public function index()
    {
        $model = new RanjenModel();
        $data = $model->findAll();
        return $this->respond($data, 200);
    }

    
    public function show($id = null)
    {
        $model = new RanjenModel();
        $data = $model->getWhere(['kartu_id' => $id])->getResult();
        if($data){
            return $this->respond($data);
        }else{
            return $this->failNotFound('No Data Found with id '.$id);
        }
    }

    
    public function create()
    {
        $model = new RanjenModel();
        $data = [
            'kartu_tag_no' => $this->request->getPost('kartu_tag_no'),
            'kartu_tipe' => $this->request->getPost('kartu_tipe'),
            'kartu_ranjen_is' => $this->request->getPost('kartu_ranjen_is'),
            'kartu_kendaraan' => $this->request->getPost('kartu_kendaraan'),
            'kartu_banned' => $this->request->getPost('kartu_banned'),
            'kartu_created_tgl' => $this->request->getPost('kartu_created_tgl'),
            'kartu_paired' => $this->request->getPost('kartu_paired'),
            'kartu_paired_by' => $this->request->getPost('kartu_paired_by'),
            'kartu_paired_tgl' => $this->request->getPost('kartu_paired_tgl'),
            'kartu_deleted' => $this->request->getPost('kartu_deleted'),
            'kartu_deleted_by' => $this->request->getPost('kartu_deleted_by'),
            'kartu_deleted_tgl' => $this->request->getPost('kartu_deleted_tgl'),
        ];
        $model->insert($data);
        $response = [
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => 'Data Saved'
            ]
        ];
		
        return $this->respondCreated($response);
    }

    
    public function update($id = null)
    {
        $model = new RanjenModel();
		$json = $this->request->getJSON();
		if($json){
			$data = [
                'kartu_tag_no' => $json->kartu_tag_no,
                'kartu_tipe' => $json->kartu_tipe,
                'kartu_ranjen_is' => $json->kartu_ranjen_is,
                'kartu_kendaraan' => $json->kartu_kendaraan,
                'kartu_banned' => $json->kartu_banned,
                'kartu_created_tgl' => $json->kartu_created_tgl,
                'kartu_paired' => $json->kartu_paired,
                'kartu_paired_by' => $json->kartu_paired_by,
                'kartu_paired_tgl' => $json->kartu_paired_tgl,
                'kartu_deleted' => $json->kartu_deleted,
                'kartu_deleted_by' => $json->kartu_deleted_by,
                'kartu_deleted_tgl' => $json->kartu_deleted_tgl
			];
		}else{
			$input = $this->request->getRawInput();
			$data = [
                'kartu_tag_no' => $input['kartu_tag_no'],
                'kartu_tipe' => $input['kartu_tipe'],
                'kartu_ranjen_is' => $input['kartu_ranjen_is'],
                'kartu_kendaraan' => $input['kartu_kendaraan'],
                'kartu_banned' => $input['kartu_banned'],
                'kartu_created_tgl' => $input['kartu_created_tgl'],
                'kartu_paired' => $input['kartu_paired'],
                'kartu_paired_by' => $input['kartu_paired_by'],
                'kartu_paired_tgl' => $input['kartu_paired_tgl'],
                'kartu_deleted' => $input['kartu_deleted'],
                'kartu_deleted_by' => $input['kartu_deleted_by'],
                'kartu_deleted_tgl' => $input['kartu_deleted_tgl']
			];
		}
        $model->update($id, $data);
        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Data Updated'
            ]
        ];
        return $this->respond($response);
    }

    
    public function delete($id = null)
    {
        $model = new RanjenModel();
        $data = $model->find($id);
        if($data){
            $model->delete($id);
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'Data Deleted'
                ]
            ];
			
            return $this->respondDeleted($response);
        }else{
            return $this->failNotFound('No Data Found With ID '.$id);
        }
        
    }

}