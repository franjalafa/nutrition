<div>
<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
	<div class="flex w-full items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
		<div class="fixed inset-0 transition-opacity">
			<div class="absolute inset-0 bg-gray-500 opacity-75"></div>
		</div>
		<!-- This element is to trick the browser into centering the modal contents. -->
		<span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​
		<div class="inline-block align-bottom bg-gray-100 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full md:max-w-6xl" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
			<form>
				<div class="flex flex-col h-screen">
					<header>
						<div class="grid grid-cols-12 bg-lime-400 py-2">
							<div class="col-start-1 col-span-10 text-center">
								@if($updateMode)
									<p class="font-mono font-extrabold text-white text-2xl py-2">EDITAR PACIENTE</p>
								@else
									<p class="font-mono font-extrabold text-white text-2xl py-2">CREAR PACIENTE</p>
								@endif
							</div>
							<div class="col-start-11 col-end-12 bg-lime-400">
								<div class="relative">
									<button
										wire:click.prevent="store()"
										type="button"
										class="w-12 transition duration-400 ease-in-out justify-center
											bg-green-300 text-gray-800 font-bold rounded border-b-4 border-green-500
											hover:border-green-600
											hover:bg-green-700
											hover:text-white
											shadow-md py-3 inline-flex items-center">
										<span>
											<i class="fas fa-save"></i>
											<div class="w-12 opacity-0 hover:opacity-100 duration-300 absolute inset-0 z-10 flex justify-center pt-8 text-xs text-white font-semibold">Guardar</div>
										</span>
									</button>
								</div>
							</div>
							
							<div class="col-start-12 col-end-13 bg-lime-400">
								<div class="relative">
									<button
										wire:click="closeModal()"
										type="button"
										class="w-12 transition duration-400 ease-in-out justify-center
											bg-red-300 text-gray-800 font-bold rounded border-b-4 border-red-500
											hover:border-red-600
											hover:bg-red-700
											hover:text-white
											shadow-md py-3 inline-flex items-center">
											<span>
												<i class="fas fa-times"></i>
												<div class="w-12 opacity-0 hover:opacity-100 duration-300 absolute inset-0 z-10 flex justify-center pt-8 text-xs text-white font-semibold">Cerrar</div>
											</span>
									</button>
								</div>
							</div>
						</div>
					</header>
					<main class="flex-1 overflow-y-auto p-5">
						<div class="bg-white px-4 pt-5 pb-4 rounded-2xl sm:p-6 sm:pb-4">
							<div class="w-full border-b-4 border-lime-400 font-semibold">
								PERSONALES
							</div>
							<div class="grid grid-cols-3 gap-4 pt-4">
								<div class="mb-4">
									<label for="nombre" class="block text-gray-700 text-sm font-bold mb-2 requerido">Nombre(s):</label>
									<input type="text" id="nombre" placeholder="Nombre de paciente" wire:model="nombre" class="placeholder-gray-300 text-sm shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:border-lime-300 focus:bg-lime-50 focus:shadow-outline">
									@error('nombre') <span class="text-red-500 text-sm">{{ $message }}</span>@enderror
								</div>
								<div class="mb-4">
									<label for="paterno" class="block text-gray-700 text-sm font-bold mb-2 requerido">Apellido paterno:</label>
									<input type="text" id="paterno" placeholder="Apellido paterno" wire:model="paterno" class="placeholder-gray-300 text-sm shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:border-lime-300 focus:bg-lime-50 focus:shadow-outline">
									@error('paterno') <span class="text-red-500 text-sm">{{ $message }}</span>@enderror
								</div>
								<div class="mb-4">
									<label for="materno" class="block text-gray-700 text-sm font-bold mb-2 requerido">Apellido materno:</label>
									<input type="text" id="materno" placeholder="Apellido materno" wire:model="materno" class="placeholder-gray-300 text-sm shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:border-lime-300 focus:bg-lime-50 focus:shadow-outline">
									@error('materno') <span class="text-red-500 text-sm">{{ $message }}</span>@enderror
								</div>
							</div>
							<div class="grid grid-cols-4 gap-4">
								<div class="mb-4">
									<label for="edad" class="block text-gray-700 text-sm font-bold mb-2 requerido">Edad:</label>
									<input type="number" id="edad" placeholder="Edad" wire:model="edad" min="1" max="100" class="placeholder-gray-300 text-sm shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:border-lime-300 focus:bg-lime-50 focus:shadow-outline">
									@error('edad') <span class="text-red-500 text-sm">{{ $message }}</span>@enderror
								</div>
								<div class="mb-4">
									<label for="sexo" class="block text-gray-700 text-sm font-bold mb-2 requerido">Sexo:</label>
									<select wire:model="sexo" name="sexo" id="sexo" class="text-sm shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:border-lime-300 focus:bg-lime-50 focus:shadow-outline">
										<option value="" hidden selected disabled></option>
										<option value="F">Femenino</option>
										<option value="M">Masculino</option>
									</select>
									@error('sexo') <span class="text-red-500 text-sm is-invalid">{{ $message }}</span>@enderror
								</div>
								<div class="mb-4">
									<label for="edo_civil" class="block text-gray-700 text-sm font-bold mb-2 requerido">Estado civil:</label>
									<select wire:model="edo_civil" name="edo_civil" id="edo_civil" class="text-sm shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:border-lime-300 focus:bg-lime-50 focus:shadow-outline">
										<option value="" hidden selected disabled></option>
										<option value="Casado">Casado</option>
										<option value="Concubinato">Concubinato</option>
										<option value="Divorciado">Divorciado</option>
										<option value="Separación">Separación</option>
										<option value="Soltero">Soltero</option>
										<option value="Viudo">Viudo</option>
									</select>
									@error('edo_civil') <span class="text-red-500 text-sm">{{ $message }}</span>@enderror
								</div>
								<div class="mb-4">
									<label for="curp" class="block text-gray-700 text-sm font-bold mb-2 requerido">Curp:</label>
									<input type="text" id="curp" placeholder="CURP" wire:model="curp" class="placeholder-gray-300 text-sm shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:border-lime-300 focus:bg-lime-50 focus:shadow-outline">
									@error('curp') <span class="text-red-500 text-sm">{{ $message }}</span>@enderror
								</div>
							</div>
							<div class="w-full mt-4 border-b-4 border-lime-400 font-semibold">
								DOMICILIO
							</div>
							<div class="grid grid-cols-12 gap-4 mt-4">
								{{-- <div class="mb-4">
									<label for="origen" class="block text-gray-700 text-sm font-bold mb-2">Origen:</label>
									<input type="text" id="origen" placeholder="origen" wire:model="origen" class="placeholder-gray-300 text-sm shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:border-lime-300 focus:bg-lime-50 focus:shadow-outline">
									@error('origen') <span class="text-red-500 text-sm">{{ $message }}</span>@enderror
								</div> --}}
								<div class="mb-4 col-start-1 col-span-6">
									<label for="domicilio" class="block text-gray-700 text-sm font-bold mb-2 requerido">Domicilio:</label>
									<input type="text" id="domicilio" placeholder="Domicilio" wire:model="domicilio" class="placeholder-gray-300 text-sm shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:border-lime-300 focus:bg-lime-50 focus:shadow-outline">
									@error('domicilio') <span class="text-red-500 text-sm">{{ $message }}</span>@enderror
								</div>
								<div class="mb-4 col-start-7 col-end-10">
									<label for="num_ext" class="block text-gray-700 text-sm font-bold mb-2 requerido">Número exterior:</label>
									<input type="text" id="num_ext" placeholder="Número exterior" wire:model="num_ext" class="placeholder-gray-300 text-sm shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:border-lime-300 focus:bg-lime-50 focus:shadow-outline">
									@error('num_ext') <span class="text-red-500 text-sm">{{ $message }}</span>@enderror
								</div>
								<div class="mb-4 col-start-10 col-end-13">
									<label for="num_int" class="block text-gray-700 text-sm font-bold mb-2">Número interior:</label>
									<input type="text" id="num_int" placeholder="Número interior" wire:model="num_int" class="placeholder-gray-300 text-sm shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:border-lime-300 focus:bg-lime-50 focus:shadow-outline">
									@error('num_int') <span class="text-red-500 text-sm">{{ $message }}</span>@enderror
								</div>
							</div>
							<div class="grid grid-cols-3 gap-4">
								<div class="mb-4">
									<label for="colonia" class="block text-gray-700 text-sm font-bold mb-2 requerido">Colonia:</label>
									<input type="text" id="colonia" placeholder="Colonia" wire:model="colonia" class="placeholder-gray-300 text-sm shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:border-lime-300 focus:bg-lime-50 focus:shadow-outline">
									@error('colonia') <span class="text-red-500 text-sm">{{ $message }}</span>@enderror
								</div>
								<div class="mb-4">
									<label for="tel1" class="block text-gray-700 text-sm font-bold mb-2 requerido">Teléfono:</label>
									<input type="text" id="tel1" placeholder="Teléfono/Celular" wire:model="tel1" class="placeholder-gray-300 text-sm shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:border-lime-300 focus:bg-lime-50 focus:shadow-outline">
									@error('tel1') <span class="text-red-500 text-sm">{{ $message }}</span>@enderror
								</div>
								<div class="mb-4">
									<label for="tel2" class="block text-gray-700 text-sm font-bold mb-2">Teléfono:</label>
									<input type="text" id="tel2" placeholder="Teléfono/Celular" wire:model="tel2" class="placeholder-gray-300 text-sm shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:border-lime-300 focus:bg-lime-50 focus:shadow-outline">
									@error('tel2') <span class="text-red-500 text-sm">{{ $message }}</span>@enderror
								</div>
							</div>
							<div class="w-full mt-4 border-b-4 border-lime-400 font-semibold">
								OCUPACIÓN
							</div>
							<div class="w-full mt-4">
								<div class="mb-4">
									<label for="ocupacion" class="block text-gray-700 text-sm font-bold mb-2">Ocupación:</label>
									<input type="text" id="ocupacion" placeholder="ocupacion" wire:model="ocupacion" class="placeholder-gray-300 text-sm shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:border-lime-300 focus:bg-lime-50 focus:shadow-outline">
									@error('ocupacion') <span class="text-red-500 text-sm">{{ $message }}</span>@enderror
								</div>
							</div>
						</div>
					</main>
				</div>
			</form>
		</div>
	</div>
</div>
</div>