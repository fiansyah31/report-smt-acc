<?php
 
namespace App\Controllers;

use App\Models\EmailModel;
use \Myth\Auth\Models\UserModel;
use App\Models\LaporanModel;
use App\Models\LaporanResult;
use App\Models\MesinLaporan;
use App\Models\MesinModel;
use App\Libraries\MY_TCPDF AS TCPDF;
use Config\Services;
 

class Laporan extends BaseController
{
    protected $laporanmodel;
    protected $resultjudgement;
    protected $aircompresor;
    protected $mesinmodel;

    public function __construct()
    {
        $this->laporanmodel = new LaporanModel();
        $this->mesinmodel = new MesinModel();
    }
    public function index()
    {
      $id= user_id();
       $admin = in_groups('administrator');
       if($admin == true) {
         $tampilkan = $this->laporanmodel->getLaporan();
       }
       else {
         $tampilkan = $this->laporanmodel->where(['user_id' => $id])->findAll();
       }
        $data['title'] = 'Laporan';
        $data['validation'] = \Config\Services::validation();
        $data['laporan'] = $tampilkan;
        
        return view('laporan/index', $data);
    }
    public function date()
    { 
      $tanggal = $this->request->getVar('tanggal_awal');
      $tanggal_akh = $this->request->getVar('tanggal_akhir');
      $id= user_id();
      $admin = in_groups('administrator');
      $ids = $this->laporanmodel->where(['user_id' => $id]);
      if($admin == true) {
        $this->laporanmodel->getLaporan();
        $tampilkan = $this->laporanmodel->where( ['tanggal >=' => $tanggal , 'tanggal <=' => $tanggal_akh])->findAll();

      }
      elseif($ids == true ) {
        $tampilkan = $this->laporanmodel->where( ['tanggal >=' => $tanggal , 'tanggal <=' => $tanggal_akh])->findAll();
      }
      

        $data['title'] = 'Laporan Mingguan';
        $data['validation'] = \Config\Services::validation();
        $data['laporan'] = $tampilkan;
        
        return view('laporan/laporan_mingguan', $data);
    }
    public function detail($id_laporan)
    {

      $query = $this->mesinmodel->getMesin($id_laporan);
        $data = [
        'title' => 'Detail Laporan',
        'validation' => \Config\Services::validation(),
        'detail' => $this->laporanmodel->getLaporan($id_laporan),
        'keterangan' =>$query,
        'semua' => $this->laporanmodel->LaporanFind($id_laporan)
        ];
     
        return view('laporan/detail', $data);
    }





    
    public function viewpdf($id_laporan){
      $query = $this->mesinmodel->getMesin($id_laporan);
      $datapdf = [
      'details' => $this->laporanmodel->getLaporan($id_laporan),
      'keterangan' =>$query,
      ];
      
       // create new PDF document
       $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        
       // set document information
       $pdf->SetCreator(PDF_CREATOR);
       $pdf->SetAuthor('REPORT-SMT-ACC');
       $pdf->SetTitle('Laporan');
       $pdf->SetSubject('Laporan');
       $pdf->SetKeywords('TCPDF, PDF, example, Report-smt-acc');

       // set default header data
       $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
       $pdf->setFooterData(array(0,64,0), array(0,64,128));

       // set header and footer fonts
       $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
       $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

       // set default monospaced font
       $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

       // set margins
       $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
       $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
       $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

       // set auto page breaks
       $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

       // set image scale factor
       $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

       // set default font subsetting mode
       $pdf->setFontSubsetting(true);

       // Set font
       // dejavusans is a UTF-8 Unicode font, if you only need to
       // print standard ASCII chars, you can use core fonts like
       // helvetica or times to reduce file size.
       $pdf->SetFont('dejavusans', '', 14, '', true);

       // Add a page
       // This method has several options, check the source code documentation for more information.
       $pdf->AddPage();

      //view mengarah ke invoice.php
       $html =  view('pdf/invoice' , $datapdf);

       // Print text using writeHTMLCell()
       $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

       // ---------------------------------------------------------
       $this->response->setContentType('application/pdf');
       // Close and output PDF document
       // This method has several options, check the source code documentation for more information.
       $pdf->Output('hasil-laporan.pdf', 'I');
      
    }

    public function delete($id_laporan)
    {
$mesinlaporan = new MesinLaporan();

   $loh=  $this->mesinmodel->where('laporan_id', $id_laporan);
   $this->laporanmodel->delete($id_laporan);
   $loh->delete();

			 
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('laporan/index');
    }

    //public function addlaporan()
   // {
   //     $id = user_id();
//
            
    //        $data ['title'] =  'Tambah Laporan';

     //       return view('laporan/addlaporan', $data);       
       
    //}

    public function laporanResult()
	{
			$request = Services::request();
			$UserServersideModel = new laporanResult($request);

			if ($request->getMethod(true) == 'POST') {
				$lists = $UserServersideModel->get_datatables();
				$data = [];
				$no = $request->getPost("start");
				foreach ($lists as $list) {
					$no++;
					$row = [];

					$tomboledit = "<button type=\"button\" class=\"btn btn-primary btn-sm my-1\" onclick=\"editData(" . $list['id_laporan'] . ")\"><i class=\"fa fa-edit\"></i> </button>";

					$tombolhapus = "<button type=\"button\" class=\"btn btn-danger btn-sm my-1\" onclick=\"deleteData(" . $list['id_laporan'] . ")\"><i class=\"fa fa-trash-alt\"></i> </button>";

					$row[] = "<input type=\"checkbox\" class=\"checkbox_user\" value=\"" . $list['id_laporan'] . "\">";
					$row[] = $no;
					$row[] = $list['nama'];
					$row[] = $list['tanggal'];
					$row[] = $list['keterangan_laporan'];
					$row[] = $tomboledit . " " . $tombolhapus;

					$data[] = $row;
				}
				$output = [
					"draw" => $request->getPost('draw'),
					"recordsTotal" => $UserServersideModel->count_all(),
					"recordsFiltered" => $UserServersideModel->count_filtered(),
					"data" => $data
				];
				echo json_encode($output);
			}
		} 
	


    public function addlaporan()
	{

			//$data['tbl_resultjudgement'] = $this->resultjudgement->select('id_resultjudgement, keterangan_laporan')->findAll();
      $data ['title'] =  'Tambah Laporan';

		return	view('laporan/addlaporan', $data);


			

			
		}
	


    public function create()
    {
      
      $jumlah_data = count($this->request->getVar('nama_mesin'));
      
			$validation = \Config\Services::validation();
			// Perulangan untuk validasi
		// Perulangan untuk validasi

    for ($i = 0; $i < $jumlah_data; $i++) {
      $valid = $this->validate([
        "nama_mesin.$i" => [
          "label" => "Nama Mesin",
          "rules" => "required|max_length[1000]",
          "errors" => [
            "required" => "{field} tidak boleh kosong",
          // "alpha_space" => "{field} hanya boleh mengandung huruf dan spasi",
            "max_length" => "{field} terlalu panjang (max:1000)",
          ]
        ],
        "result.$i" => [
          "label" => "Result",
          "rules" => "required|max_length[1000]",
          "errors" => [
            "required" => "{field} tidak boleh kosong",
           // "alpha_space" => "{field} hanya boleh mengandung huruf dan spasi",
            "max_length" => "{field} terlalu panjang (max:1000)",
          ]
        ],
        "judgement.$i" => [
          "label" => "Judgement",
          "rules" => "required|max_length[1000]",
          "errors" => [
            "required" => "{field} tidak boleh kosong",
           // "alpha_space" => "{field} hanya boleh mengandung huruf dan spasi",
            "max_length" => "{field} terlalu panjang (max:1000)",
          ]
        ],
      ]);
      
      $error[$i] = [
        'nama_mesin' => $validation->getError("nama_mesin.$i"),
        'result' => $validation->getError("result.$i"),
        'judgement' => $validation->getError("keterangan.$i"),
      ];

      // Validasi khusus untuk kewarganegaraan (jika user melakukan inspect element)
   //   if ($this->mesinmodel->select('id')->find($this->request->getVar('keterangan')[$i]) == null) {
      //  $error[$i]['keterangan'] = 'Data tersebut tidak ada';
     // }
    }
	
				// Jika terdapat kesalahan
			if (!$valid ) {
				$error["jumlah_data"] = $jumlah_data;
        session()->setFlashdata('pesan', "$jumlah_data Data Gagal di input");
			} else {
				// Mengambil data dari request
				$idkaryawan = $this->request->getVar('idkaryawan');
				$nama = $this->request->getVar('nama');
				$tanggal = $this->request->getVar('tanggal');
				$nama_mesin = $this->request->getVar('nama_mesin');
				$result = $this->request->getVar('result');
				$judgement = $this->request->getVar('judgement');
				// Perulangan untuk menyiapkan array yang akan diinsert
        $datas= array([
          'user_id' =>user()->id ,
          'idkaryawan' => $this->request->getVar('idkaryawan'),
          'nama' => $this->request->getVar('nama'),
          'tanggal' => $this->request->getVar('tanggal'),
        ]);
       
				// Insert banyak ke database
				if($this->laporanmodel->insertBatch($datas) == true){
          $id_laporan = $this->laporanmodel->insertID();
          for ($i = 0; $i < $jumlah_data; $i++) {
            $data[$i] = [
              'nama_mesin' => htmlspecialchars($nama_mesin[$i]),
              'result' => htmlspecialchars($result[$i]),
              'judgement' => htmlspecialchars($judgement[$i]),
              'laporan_id' => $id_laporan,
            ];
          }
          $this->mesinmodel->insertBatch($data);
        }
         
        $query = $this->mesinmodel->getMesin($id_laporan);
      $datapdf = [
      'detail' => $this->laporanmodel->getLaporan($id_laporan),
      'keterangan' =>$query,
      ];
    
       // $message=  "Laporan telah di upload oleh $nama, pada tanggal $tanggal ".anchor('laporan/detail/'.$id_laporan,'Lihat laporan', '');
        
        $email = \Config\Services::email();
        
        $emailmodel = new EmailModel();
        $emaildata = $emailmodel->getEmail();
        
        $body = view('laporan_print/index.php',$datapdf);
				// Mengembalikan pesan berhasil
        //	$view = [
          //	'success' => "$jumlah_data data tersebut berhasil ditambahkan",
          //	];
          session()->setFlashdata('pesan', "$jumlah_data Data berhasil ditambahkan.");
          $emailclient =  user()->email;
          $nameclient =  user()->fullname;
          $email->setFrom('admin@report-smt-acc.site', $emailclient);
          foreach ($emaildata as $k):
          $email->setTo($k['email']);
          endforeach;
          $email->setSubject('Laporan Kerusakan mesin');
          $email->setMessage($body);
          $email->send();

          
			}
      return redirect()->to('laporan/index');
		 

	//}
//}





   
}
}

