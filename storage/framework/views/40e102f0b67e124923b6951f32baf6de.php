<?php $__env->startSection('content'); ?>
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div
                class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <div class="flex flex-wrap -mx-3">
                        <div class="flex items-center flex-none w-1/2 max-w-full px-3">
                            <h6 class="mb-0">Roles Management</h6>
                        </div>
                        <div class="flex-none w-1/2 max-w-full px-3 text-right">
                            <button onclick="openAddModal()"
                                class="inline-block px-6 py-3 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer active:opacity-85 shadow-soft-md bg-150 bg-x-25 bg-gradient-to-tl from-purple-700 to-pink-500 leading-pro text-xs ease-soft-in tracking-tight-soft hover:shadow-soft-2xl hover:scale-102">
                                <i class="fas fa-plus mr-2"></i> Add Role
                            </button>
                        </div>
                    </div>
                </div>
                <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="p-4 overflow-x-auto">
                        <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500" id="roles-table">
                            <thead class="align-bottom">
                                <tr>
                                    <th
                                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        #</th>
                                    <th
                                        class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Role Name</th>
                                    <th
                                        class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Status</th>
                                    <th
                                        class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Created Date</th>
                                    <th
                                        class="px-6 py-3 font-semibold text-center align-middle bg-transparent border-b border-gray-200 border-solid shadow-none tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- DataTables will populate this -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modals -->
    <?php if (isset($component)) { $__componentOriginal9f64f32e90b9102968f2bc548315018c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9f64f32e90b9102968f2bc548315018c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.modal','data' => ['id' => 'roleModal','title' => 'Role Management']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'roleModal','title' => 'Role Management']); ?>
        <form id="roleForm">
            <?php echo csrf_field(); ?>
            <input type="hidden" id="roleId" name="roleId">
            <div class="mb-4">
                <label class="block mb-2 text-xs font-bold uppercase text-slate-700">Role Name</label>
                <input type="text" id="roleName" name="name" required
                    class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:border-fuchsia-300">
            </div>
            <div class="mb-4">
                <label class="block mb-2 text-xs font-bold uppercase text-slate-700">Description</label>
                <textarea id="roleDescription" name="description"
                    class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:border-fuchsia-300"></textarea>
            </div>
            <div class="mb-4">
                <label class="block mb-2 text-xs font-bold uppercase text-slate-700">Status</label>
                <select id="roleStatus" name="status"
                    class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:border-fuchsia-300">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>
            <div class="flex justify-end space-x-2 pt-4">
                <button type="button" onclick="window.closeGlobalModal('roleModal')"
                    class="px-6 py-3 font-bold text-center text-slate-700 uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer active:opacity-85 leading-pro text-xs ease-soft-in tracking-tight-soft hover:scale-102">Cancel</button>
                <button type="submit"
                    class="px-6 py-3 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer active:opacity-85 shadow-soft-md bg-150 bg-x-25 bg-gradient-to-tl from-purple-700 to-pink-500 leading-pro text-xs ease-soft-in tracking-tight-soft hover:shadow-soft-2xl hover:scale-102">Save</button>
            </div>
        </form>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9f64f32e90b9102968f2bc548315018c)): ?>
<?php $attributes = $__attributesOriginal9f64f32e90b9102968f2bc548315018c; ?>
<?php unset($__attributesOriginal9f64f32e90b9102968f2bc548315018c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9f64f32e90b9102968f2bc548315018c)): ?>
<?php $component = $__componentOriginal9f64f32e90b9102968f2bc548315018c; ?>
<?php unset($__componentOriginal9f64f32e90b9102968f2bc548315018c); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
   

    <script>
        let table;

        $(document).ready(function () {
            table = $('#roles-table').DataTable({
                ajax: "<?php echo e(route('roles.index')); ?>",
                columns: [
                    {
                        data: null,
                        render: (data, type, row, meta) => meta.row + 1
                    },
                    { data: 'name' },
                    {
                        data: 'status',
                        className: 'text-center align-middle',
                        render: function (data) {
                            let statusClass = data ? 'from-green-600 to-lime-400' : 'from-slate-600 to-slate-300';
                            let statusText = data ? 'Active' : 'Inactive';
                            // Uniform styling for status badge to match action buttons
                            return `<span class="inline-block px-3 py-2 mb-0 text-xs font-bold text-center text-white uppercase transition-all bg-transparent border-0 rounded-lg shadow-none leading-pro ease-soft-in bg-150 tracking-tight-soft bg-x-25 bg-gradient-to-tl ${statusClass} cursor-default">${statusText}</span>`;
                        }
                    },
                    {
                        data: 'created_at',
                        className: 'text-center align-middle',
                        render: function (data) {
                            let date = new Date(data);
                            return `<span class="text-xs font-semibold leading-tight text-slate-400">${date.toLocaleDateString('en-GB', { day: '2-digit', month: '2-digit', year: '2-digit' })}</span>`;
                        }
                    },
                    {
                        data: null,
                        className: 'text-center align-middle',
                        render: function (data) {
                            let statusIcon = data.status ? 'fa-toggle-on text-green-500' : 'fa-toggle-off text-slate-400';
                            let statusTitle = data.status ? 'Deactivate' : 'Activate';
                            return `
                                            <div class="flex items-center justify-center gap-2">
                                                <button onclick="confirmToggleStatus(${data.id}, ${data.status})" class="inline-block px-3 py-2 mb-0 text-xs font-bold text-center text-white uppercase transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-pro ease-soft-in bg-150 tracking-tight-soft bg-x-25 bg-gradient-to-tl from-gray-900 to-slate-800 hover:scale-102 hover:shadow-soft-xs active:opacity-85" title="${statusTitle}">
                                                    <i class="fas ${statusIcon} mr-1"></i> Status
                                                </button>
                                                <button onclick="openEditModal(${data.id}, '${data.name}', ${data.status}, '${data.description || ''}')" class="inline-block ml-2 px-3 py-2 mb-0 text-xs font-bold text-center text-white uppercase transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-pro ease-soft-in bg-150 tracking-tight-soft bg-x-25 bg-gradient-to-tl from-blue-600 to-cyan-400 hover:scale-102 hover:shadow-soft-xs active:opacity-85" title="Edit">
                                                    <i class="fas fa-edit mr-1"></i> Edit
                                                </button>
                                                <button onclick="confirmDelete(${data.id})" class="inline-block ml-2 px-3 py-2 mb-0 text-xs font-bold text-center text-white uppercase transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-pro ease-soft-in bg-150 tracking-tight-soft bg-x-25 bg-gradient-to-tl from-red-600 to-rose-400 hover:scale-102 hover:shadow-soft-xs active:opacity-85" title="Delete">
                                                    <i class="fas fa-trash mr-1"></i> Delete
                                                </button>
                                            </div>
                                        `;
                        }
                    }
                ],
                "paging": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "responsive": true,
                "language": {
                    "search": "_INPUT_",
                    "searchPlaceholder": "Search roles..."
                }
            });
        });

        function openAddModal() {
            $('#roleModal-title').text('Add Role');
            $('#roleId').val('');
            $('#roleForm')[0].reset();
            window.openGlobalModal('roleModal');
        }

        function openEditModal(id, name, status, description) {
            $('#roleModal-title').text('Edit Role');
            $('#roleId').val(id);
            $('#roleName').val(name);
            $('#roleStatus').val(status);
            $('#roleDescription').val(description);
            window.openGlobalModal('roleModal');
        }

        function closeModal() {
            window.closeGlobalModal('roleModal');
        }

        $('#roleForm').on('submit', function (e) {
            e.preventDefault();
            let roleId = $('#roleId').val();
            let url = roleId ? `<?php echo e(url('roles/update')); ?>/${roleId}` : `<?php echo e(route('roles.store')); ?>`;

            $.ajax({
                url: url,
                type: 'POST',
                data: $(this).serialize(),
                success: function (response) {
                    closeModal();
                    Toast.fire({
                        icon: 'success',
                        title: response.success
                    });
                    table.ajax.reload();
                },
                error: function (xhr) {
                    let errors = xhr.responseJSON.errors;
                    let errorMsg = '';
                    for (let key in errors) {
                        errorMsg += errors[key][0] + '\n';
                    }
                    Swal.fire('Error', errorMsg, 'error');
                }
            });
        });

        function confirmToggleStatus(id, currentStatus) {
            let action = currentStatus ? 'Deactivate' : 'Activate';
            Swal.fire({
                title: 'Are you sure?',
                text: `You want to ${action.toLowerCase()} this role?`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#cb0c9f',
                cancelButtonColor: '#8392ab',
                confirmButtonText: `Yes, ${action} it!`
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `<?php echo e(url('roles/status')); ?>/${id}`,
                        type: 'POST',
                        data: {
                            _token: '<?php echo e(csrf_token()); ?>'
                        },
                        success: function (response) {
                            Toast.fire({
                                icon: 'success',
                                title: response.success
                            });
                            table.ajax.reload();
                        }
                    });
                }
            });
        }

        function confirmDelete(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "This role will be soft deleted!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#cb0c9f',
                cancelButtonColor: '#8392ab',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `<?php echo e(url('roles/delete')); ?>/${id}`,
                        type: 'DELETE',
                        data: {
                            _token: '<?php echo e(csrf_token()); ?>'
                        },
                        success: function (response) {
                            Toast.fire({
                                icon: 'success',
                                title: response.success
                            });
                            table.ajax.reload();
                        }
                    });
                }
            });
        }

        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
        });

    </script>

    <style>
        .dataTables_wrapper .dataTables_length,
        .dataTables_wrapper .dataTables_filter,
        .dataTables_wrapper .dataTables_info,
        .dataTables_wrapper .dataTables_processing,
        .dataTables_wrapper .dataTables_paginate {
            color: #8392ab;
            font-size: 0.75rem;
            margin-bottom: 1rem;
        }

        .dataTables_wrapper .dataTables_filter input {
            border: 1px solid #e2e8f0;
            border-radius: 0.5rem;
            padding: 0.25rem 0.75rem;
            outline: none;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current,
        .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
            background: linear-gradient(310deg, #7928ca 0%, #ff0080 100%);
            color: white !important;
            border: none;
            border-radius: 0.5rem;
        }

        table.dataTable thead th {
            border-bottom: 1px solid #f8f9fa;
        }

        table.dataTable tbody td {
            border-bottom: 1px solid #f8f9fa;
            vertical-align: middle !important;
        }

        .overflow-hidden {
            overflow: hidden !important;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/Raif/Documents/Soft-UI-Dashboard-Tailwind-1.0.0/finance-website/resources/views/roles/index.blade.php ENDPATH**/ ?>