<?php

namespace App\Http\Livewire\Pacientes;

use App\Models\Pacientes\Paciente;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Pacientes extends Component {
	public $pacientes, $id_paciente, $nombre, $paterno, $materno, $edad, $sexo, $edo_civil, $curp, $origen, $ocupacion, $domicilio, $num_ext, $num_int, $colonia, $tel1, $tel2;
	public $isOpen = 0;
	public $updateMode = false;

	protected $listeners = ['delete'];
	/* protected $listeners = [
		'refreshComponent' => '$refresh',
	]; */

	protected $rules = [
        'nombre' => 'required|max:50',
        'paterno' => 'required|max:50',
        'materno' => 'required|max:50',
		'edad' => 'required|numeric|min:1|max:100',
		'sexo' => 'required',
		'edo_civil' => 'required',
		'curp' => 'required|min:18|max:18',
		// 'origen' => '',
		'ocupacion' => 'required|max:255',
		'domicilio' => 'required|max:255',
		'num_ext' => 'required|max:30',
		'num_int' => 'max:30',
		'colonia' => 'required|max:30',
		'tel1' => 'required|max:20',
		'tel2' => 'max:20',
    ];

	protected $messages = [
		'required' => 'Este campo no debe estar vacío',
		'nombre.max' => 'Máximo 50 caracteres',
		'paterno.max' => 'Máximo 50 caracteres',
		'materno.max' => 'Máximo 50 caracteres',
		'edad.numeric' => 'Este campo deben ser números',
		'edad.max' => 'La edad máxima es 100',
		'edad.min' => 'La edad mínima es 1',
		'curp.min' => 'Deben ser 18 caracteres',
		'curp.max' => 'Deben ser 18 caracteres',
		'ocupacion.max' => 'Máximo 255 caracteres',
		'domicilio.max' => 'Máximo 255 caracteres',
		'num_ext.max' => 'Máximo 30 caracteres',
		'num_int.max' => 'Máximo 30 caracteres',
		'colonia.max' => 'Máximo 30 caracteres',
		'tel1.max' => 'Máximo 20 caracteres',
		'tel2.max' => 'Máximo 20 caracteres',
	];

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	public function render() {
		$this->pacientes = Paciente::all();
		return view('livewire.pacientes.pacientes');
	}

	/**
	* The attributes that are mass assignable.
	*
	* @var array
	*/
	public function create() {
		$this->resetInputFields();
		$this->openModal();
		$this->updateMode = false;
	}

	/**
	* The attributes that are mass assignable.
	*
	* @var array
	*/
	public function openModal() {
		$this->isOpen = true;
	}

	/**
	* The attributes that are mass assignable.
	*
	* @var array
	*/
	public function closeModal() {
		$this->isOpen = false;
		$this->dispatchBrowserEvent('tabla', [
			'nombreTabla' => '#tablePacientes'
		]);
	}

	/**
	* The attributes that are mass assignable.
	*
	* @var array
	*/
	private function resetInputFields() {
		$this->id_paciente = '';
		$this->nombre = '';
		$this->paterno = '';
		$this->materno = '';
		$this->edad = '';
		$this->sexo = '';
		$this->edo_civil = '';
		$this->curp = '';
		$this->origen = '';
		$this->ocupacion = '';
		$this->domicilio = '';
		$this->num_ext = '';
		$this->num_int = '';
		$this->colonia = '';
		$this->tel1 = '';
		$this->tel2 = '';
		$this->resetErrorBag();
        $this->resetValidation();
	}
	
	/**
	* The attributes that are mass assignable.
	*
	* @var array
	*/
	public function store() {
		$this->validate();
		
		try {
			DB::beginTransaction();
				Paciente::updateOrCreate(['id' => $this->id_paciente], [
					'nombre' => $this->nombre,
					'paterno' => $this->paterno,
					'materno' => $this->materno,
					'edad' => $this->edad,
					'sexo' => $this->sexo,
					'edo_civil' => $this->edo_civil,
					'curp' => $this->curp,
					'origen' => $this->origen,
					'ocupacion' => $this->ocupacion,
					'domicilio' => $this->domicilio,
					'num_ext' => $this->num_ext,
					'num_int' => $this->num_int,
					'colonia' => $this->colonia,
					'tel1' => $this->tel1,
					'tel2' => $this->tel2
				]);
			DB::commit();

			if(!$this->id_paciente) {
				$this->dispatchBrowserEvent('swal:success', [
					'title' => "<h3 style='color: white'>Información creada</h3>",
				]);
			} else {
				$this->dispatchBrowserEvent('swal:success', [
					'title' => "<h3 style='color: white'>Información actualizada</h3>",
				]);
			}
		} catch (\Throwable $th) {
			// dd($th->getMessage());
			DB::rollback();
			$this->dispatchBrowserEvent('swal:error', [
				'title' => "<h3 style='color: white'>Error al guardar la información</h3>",
			]);
		}

		$this->closeModal();
		$this->resetInputFields();
	}

	/**
	* The attributes that are mass assignable.
	*
	* @var array
	*/
	public function edit($id) {
		$paciente = Paciente::findOrFail($id);
		$this->id_paciente = $id;
		$this->nombre = $paciente->nombre;
		$this->paterno = $paciente->paterno;
		$this->materno = $paciente->materno;
		$this->edad = $paciente->edad;
		$this->sexo = $paciente->sexo;
		$this->edo_civil = $paciente->edo_civil;
		$this->curp = $paciente->curp;
		$this->origen = $paciente->origen;
		$this->ocupacion = $paciente->ocupacion;
		$this->domicilio = $paciente->domicilio;
		$this->num_ext = $paciente->num_ext;
		$this->num_int = $paciente->num_int;
		$this->colonia = $paciente->colonia;
		$this->tel1 = $paciente->tel1;
		$this->tel = $paciente->tel2;
		$this->openModal();
		$this->resetErrorBag();
        $this->resetValidation();
		$this->updateMode = true;
	}

	public function deleteConfirm($id) {
		$this->dispatchBrowserEvent('swal:confirm', [
			'id' => $id
		]);
	}
	/**
	* The attributes that are mass assignable.
	*
	* @var array
	*/
	public function delete($id){
		try {
			DB::beginTransaction();
				Paciente::findOrFail($id)->delete();
			DB::commit();
			$this->dispatchBrowserEvent('swal:success', [
				'title' => "<h3 style='color: white'>Información eliminada</h3>",
			]);
		} catch (\Throwable $th) {
			DB::rollback();
			$this->dispatchBrowserEvent('swal:error', [
				'title' => "<h3 style='color: white'>Error al eliminar la información</h3>",
			]);
		}
	}
}
