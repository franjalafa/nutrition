<div>
	<div class="py-12">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
				<div class="flex justify-end pb-3">
					<div class="relative">
						<button
							wire:click="create()"
							type="button"
							class="w-12 transition duration-400 ease-in-out justify-center
								bg-green-300 text-gray-800 font-bold rounded border-b-4 border-green-500
								hover:border-green-600
								hover:bg-green-700
								hover:text-white
								shadow-md py-3 inline-flex items-center">
							<span>
								<i class="fas fa-user-plus"></i>
								<div class="w-12 opacity-0 hover:opacity-100 duration-300 absolute inset-0 z-10 flex justify-center pt-8 text-xs text-white font-semibold">Agregar</div>
							</span>
						</button>
					</div>
				</div>

				<?php if($isOpen): ?>
					<?php echo $__env->make('livewire.pacientes.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
				<?php endif; ?>

				
				<table id="tablePacientes" class="py-2 w-full table-bordered">
					<thead>
						<tr class="bg-gray-100">
							<th class="px-4 py-2 w-20">No.</th>
							<th class="px-4 py-2">Title</th>
							<th class="px-4 py-2">Body</th>
							<th class="px-4 py-2">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $__currentLoopData = $pacientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paciente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td class="border px-4 py-2"><?php echo e($paciente->id); ?></td>
							<td class="border px-4 py-2"><?php echo e($paciente->nombre); ?></td>
							<td class="border px-4 py-2"><?php echo e($paciente->paterno); ?></td>
							<td class="border px-4 py-2 text-right">
								<div class="relative inline-block">
									<button
										wire:click=""
										type="button"
										class="w-12 transition duration-400 ease-in-out justify-center
											bg-orange-300 text-gray-800 font-bold rounded border-b-4 border-orange-500
											hover:border-orange-600
											hover:bg-orange-700
											hover:text-white
											shadow-md py-3 inline-flex items-center">
										<span>
											<i class="fas fa-user-cog"></i>
											<div class="w-12 opacity-0 hover:opacity-100 duration-300 absolute inset-0 z-10 flex justify-center pt-8 text-xs text-white font-semibold">Ver</div>
										</span>
									</button>
								</div>
								<div class="relative inline-block">
									<button
										wire:click="edit(<?php echo e($paciente->id); ?>)"
										type="button"
										class="w-12 transition duration-400 ease-in-out justify-center
											bg-blue-300 text-gray-800 font-bold rounded border-b-4 border-blue-500
											hover:border-blue-600
											hover:bg-blue-700
											hover:text-white
											shadow-md py-3 inline-flex items-center">
										<span>
											<i class="fas fa-user-edit"></i>
											<div class="w-12 opacity-0 hover:opacity-100 duration-300 absolute inset-0 z-10 flex justify-center pt-8 text-xs text-white font-semibold">Editar</div>
										</span>
									</button>
								</div>
								
									<button
										wire:click="deleteConfirm(<?php echo e($paciente->id); ?>)"
										type="button"
										class="w-12 transition duration-400 ease-in-out justify-center
											bg-red-300 text-gray-800 font-bold rounded border-b-4 border-red-400
											hover:border-red-500
											hover:bg-red-600
											hover:text-white
											shadow-md py-3 inline-flex items-center">
										<span>
											<i class="fas fa-user-times"></i>
											
										</span>
									</button>
								
							</td>
							
						</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>
				</table>
				
			</div>
		</div>
	</div>
</div>

<?php $__env->startPush('scripts'); ?>
	
	<script type="text/javascript" data-turbo-eval="true" data-turbolinks-eval="true">
		document.addEventListener('livewire:load', function () {
			$('#tablePacientes').DataTable();
		});
	
		
	</script>
<?php $__env->stopPush(); ?><?php /**PATH D:\wamp64\www\gem_nutricion\resources\views/livewire/pacientes/pacientes.blade.php ENDPATH**/ ?>