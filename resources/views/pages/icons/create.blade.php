<x-app-layout>

  <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

    @csrf
    <div
      class="col-span-full xl:col-span-8 bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700">
      <header class="px-5 py-4 border-b border-slate-100 dark:border-slate-700">
        <h2 class="font-semibold text-slate-800 dark:text-slate-100 text-2xl tracking-tight">Agregar nuevo icono</h2>
      </header>

      <div class="p-3">

        <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
          <form action="{{ route('icons.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
              <label for="name">Name:</label>
              <input type="text" id="name" name="name" required>
            </div>
            <div>
              <label for="icon">Icon:</label>
              <input type="file" id="icon" name="icon" required>
            </div>
            <button type="submit">Add Icon</button>
          </form>
        </div>

      </div>
    </div>


  </div>

  <script>
    $('document').ready(function() {

      tinymce.init({
        selector: 'textarea#description',
        height: 500,
        plugins: [
          'advlist', 'autolink', 'lists', 'link', 'charmap', 'preview',
          'searchreplace', 'visualblocks', 'code', 'fullscreen',
          'insertdatetime', 'table'
        ],
        toolbar: 'undo redo | blocks | ' +
          'bold italic backcolor | alignleft aligncenter ' +
          'alignright alignjustify | bullist numlist outdent indent | ' +
          'removeformat | help',
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px;}'
      });

    })
  </script>

</x-app-layout>
