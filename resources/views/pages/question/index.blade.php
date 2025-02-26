<x-app-layout>
  <div x-data="{open: false}" @question-added.window="open = false" @close-modal.window="open = false" class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

      {{-- <section class="py-4 border-b border-slate-100 dark:border-slate-700">
        <a href="{{ route('question.create') }}"
          class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded text-sm">Agregar</a>
      </section> --}}
    <section class="py-4 border-b border-slate-100 dark:border-slate-700">
      <button @click="open = true"
          class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded text-sm">
          Agregar
      </button>
    </section>

    <div class="col-span-full xl:col-span-8 bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700">

      <header class="px-5 py-4 border-b border-slate-100 dark:border-slate-700">
        <h2 class="font-semibold text-slate-800 dark:text-slate-100 text-2xl tracking-tight">Preguntas</h2>
      </header>

      <div class="p-3">
        <div class="tabpanel-container" x-data="{ activeTab: {{ $majors->first()->id ?? 'null' }} }">

          <!-- Pestañas dinámicas -->
          <div role="tablist" class="flex border-b">
              @foreach ($majors as $key => $major)
                  <button id="tab{{ $major->id }}" role="tab" aria-selected="{{ $key === 0 ? 'true' : 'false' }}" 
                      aria-controls="panel{{ $major->id }}"
                      class="px-4 py-2 focus:outline-none border-b-2 {{ $key === 0 ? 'border-blue-500' : '' }}">
                      {{ $major->name }}
                  </button>
              @endforeach
          </div>

          <!-- Table -->
          @foreach ($majors as $key => $major)
              <div id="panel{{ $major->id }}" role="tabpanel" aria-labelledby="tab{{ $major->id }}" class="p-4 {{ $key !== 0 ? 'hidden' : '' }}">
                  <table id="table_{{ $major->id }}" class="display text-lg w-full">
                    <thead>
                      <tr>
                        <th>Nombre</th>
                        {{-- <th class="w-32">Visible</th> --}}
                        <th class="w-32">Acciones</th>
                      </tr>
                    </thead>
                    
                    <tbody>

                      @foreach ($question as $item)
                        @if ($item->majors->id === $major->id)
                          <tr>
                            <td class="">{{ $item->question }}</td>
                           
                  
                            <td class="flex flex-row justify-end items-center gap-5 ">
                  
                              <a href="{{ route('question.edit', $item->id) }}"
                                class="bg-yellow-400 px-3 py-2 rounded text-white  "><i
                                  class="fa-regular fa-pen-to-square"></i></a>
                              {{-- {{  route('servicios.destroy', $item->id) }} --}}
                              <form action=" " method="POST">
                                @csrf
                                <a data-idService='{{ $item->id }}'
                                  class="btn_delete bg-red-600 px-3 py-2 rounded text-white cursor-pointer"><i
                                    class="fa-regular fa-trash-can"></i></a>
                                <!-- <a href="" class="bg-red-600 p-2 rounded text-white"><i class="fa-regular fa-trash-can"></i></a> -->
                              </form>
                  
                            </td>
                          </tr>
                        @endif
                      @endforeach
                
                    </tbody>

                    <tfoot>
                      <tr>
                        <th>Nombre</th>
                        {{-- <th class="w-32">Visible</th> --}}
                        <th class="w-32">Acciones</th>
                      </tr>
                    </tfoot>
                  </table>
              </div>
          @endforeach

        </div>
      </div>
    </div>

    
    <div x-show="open" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50">
        <div class="bg-white dark:bg-slate-800 p-6 rounded-lg shadow-lg">
          <h2 class="text-xl font-semibold">Agregar Pregunta</h2>
          <livewire:create-question />
        </div>
    </div>

  </div>

</x-app-layout>

  <script>
    window.addEventListener('close-modal', () => {
        document.querySelector('.modal').classList.add('hidden');
    });
  </script>
  
  <script>
    document.addEventListener("DOMContentLoaded", function() {
        const tabs = document.querySelectorAll('[role="tab"]');
        const panels = document.querySelectorAll('[role="tabpanel"]');

        tabs.forEach(tab => {
            tab.addEventListener("click", function() {
                tabs.forEach(t => {
                    t.setAttribute("aria-selected", "false");
                    t.classList.remove("border-blue-500");
                });
                panels.forEach(p => p.classList.add("hidden"));

                this.setAttribute("aria-selected", "true");
                this.classList.add("border-blue-500");
                document.getElementById(this.getAttribute("aria-controls")).classList.remove("hidden");
            });
        });

        // Inicializar DataTables en cada tabla
        @foreach ($majors as $major)
            new DataTable('#table_{{ $major->id }}', {
                language: {
                    "lengthMenu": "Mostrar _MENU_ registros",
                    "zeroRecords": "No se encontraron resultados",
                    "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "sSearch": "Buscar:",
                    "sProcessing": "Procesando...",
                }
            });
        @endforeach
    });
</script>

  <script>
    $('document').ready(function() {

      new DataTable('#tabladatos', {
        buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
        layout: {
          topStart: 'buttons'
        },
        language: {
          "lengthMenu": "Mostrar _MENU_ registros",
          "zeroRecords": "No se encontraron resultados",
          "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
          "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
          "infoFiltered": "(filtrado de un total de _MAX_ registros)",
          "sSearch": "Buscar:",

          "sProcessing": "Procesando...",
        },
        buttons: [

          {
            extend: 'excelHtml5',
            text: '<i class="fas fa-file-excel"></i> ',
            titleAttr: 'Exportar a Excel',
            className: 'btn btn-success',
          },
          {
            extend: 'pdfHtml5',
            text: '<i class="fas fa-file-pdf"></i> ',
            titleAttr: 'Exportar a PDF',
          },
          {
            extend: 'csvHtml5',
            text: '<i class="fas fa-file-csv"></i> ',
            titleAttr: 'Imprimir',
            className: 'btn btn-info',
          },
          {
            extend: 'print',
            text: '<i class="fa fa-print"></i> ',
            titleAttr: 'Imprimir',
            className: 'btn btn-info',
          },
          {
            extend: 'copy',
            text: '<i class="fas fa-copy"></i> ',
            titleAttr: 'Copiar',
            className: 'btn btn-success',
          },
        ]
      });

      $(".btn_delete").on("click", function(e) {

        var id = $(this).attr('data-idService');

        Swal.fire({
          title: "Seguro que deseas eliminar?",
          text: "Vas a eliminar una pregunta",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Si, borrar!",
          cancelButtonText: "Cancelar"
        }).then((result) => {
          if (result.isConfirmed) {

            $.ajax({

              url: '{{ route('question.deleteQuestionExam') }}',
              method: 'POST',
              data: {
                _token: $('input[name="_token"]').val(),
                id: id,

              }

            }).done(function(res) {

              Swal.fire({
                title: res.message,
                icon: "success"
              });

              location.reload();

            })


          }
        });

      });

      // $('.check_d:not(:checked)').prop('disabled', true);

      $(".btn_swithc").on("change", function() {

        var status = 0;
        var id = $(this).attr('data-idService');
        let contenedor = $(this);
        var titleService = $(this).attr('data-titleService');
        var field = $(this).attr('data-field');

        if ($(this).is(':checked')) {
          status = 1;

        } else {
          status = 0;
        }



        $.ajax({
          url: "{{ route('question.updateVisible') }}",
          method: 'POST',
          data: {
            _token: $('input[name="_token"]').val(),
            status: status,
            id: id,
            field: field,
          },
          success: function(response) {
            Swal.fire({
              position: "top-end",
              icon: "success",
              title: titleService + " a sido modificado",
              showConfirmButton: false,
              timer: 1500

            });
          },
          error: function(response) {

            Swal.close();
            Swal.fire({
              title: response.responseJSON.message,
              icon: "error",
            });
          }
        })



      });
    })
  </script>






                            {{-- <td class="">
                              <form method="POST" action="">
                                @csrf
                                <input type="checkbox" id="hs-basic-usage"
                                  class="check_d btn_swithc relative w-[3.25rem] h-7 p-px bg-gray-100 border-transparent text-transparent 
                                                      rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:ring-transparent disabled:opacity-50 disabled:pointer-events-none 
                                                      checked:bg-none checked:text-blue-600 checked:border-blue-600 focus:checked:border-blue-600 dark:bg-gray-800 dark:border-gray-700 
                                                      dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-600 before:inline-block before:size-6
                                                      before:bg-white checked:before:bg-blue-200 before:translate-x-0 checked:before:translate-x-full before:rounded-full before:shadow 
                                                      before:transform before:ring-0 before:transition before:ease-in-out before:duration-200 dark:before:bg-gray-400 dark:checked:before:bg-blue-200"
                                  id='{{ 'd_' . $item->id }}' data-field='destacar' data-idService='{{ $item->id }}'
                                  data-titleService='{{ $item->name }}' {{ $item->destacar == 1 ? 'checked' : '' }}>
                                <label for="{{ 'v_' . $item->id }}"></label>
                              </form>
                            </td> --}}
                  
                            {{-- <td class="">
                              <form method="POST" action="">
                                @csrf
                                <input type="checkbox" id="hs-basic-usage"
                                  class="check_v btn_swithc relative w-[3.25rem] h-7 p-px bg-gray-100 border-transparent text-transparent 
                                                      rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:ring-transparent disabled:opacity-50 disabled:pointer-events-none 
                                                      checked:bg-none checked:text-blue-600 checked:border-blue-600 focus:checked:border-blue-600 dark:bg-gray-800 dark:border-gray-700 
                                                      dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-600 before:inline-block before:size-6
                                                      before:bg-white checked:before:bg-blue-200 before:translate-x-0 checked:before:translate-x-full before:rounded-full before:shadow 
                                                      before:transform before:ring-0 before:transition before:ease-in-out before:duration-200 dark:before:bg-gray-400 dark:checked:before:bg-blue-200"
                                  id='{{ 'v_' . $item->id }}' data-field='visible' data-idService='{{ $item->id }}'
                                  data-titleService='{{ $item->name }}' {{ $item->visible == 1 ? 'checked' : '' }}>
                                <label for="{{ 'v_' . $item->id }}"></label>
                              </form>
                            </td> --}}
                            
                            {{-- <td class="">
                              <form method="POST" action="">
                                @csrf
                                <input type="checkbox" id="hs-basic-usage"
                                  class="check_v btn_swithc relative w-[3.25rem] h-7 p-px bg-gray-100 border-transparent text-transparent 
                                                      rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:ring-transparent disabled:opacity-50 disabled:pointer-events-none 
                                                      checked:bg-none checked:text-blue-600 checked:border-blue-600 focus:checked:border-blue-600 dark:bg-gray-800 dark:border-gray-700 
                                                      dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-600 before:inline-block before:size-6
                                                      before:bg-white checked:before:bg-blue-200 before:translate-x-0 checked:before:translate-x-full before:rounded-full before:shadow 
                                                      before:transform before:ring-0 before:transition before:ease-in-out before:duration-200 dark:before:bg-gray-400 dark:checked:before:bg-blue-200"
                                  id='{{ 'v_' . $item->id }}' data-field='is_menu' data-idService='{{ $item->id }}'
                                  data-titleService='{{ $item->name }}' {{ $item->is_menu == 1 ? 'checked' : '' }}>
                                <label for="{{ 'v_' . $item->id }}"></label>
                              </form>
                            </td> --}}
